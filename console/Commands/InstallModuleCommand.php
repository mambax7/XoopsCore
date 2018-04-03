<?php

namespace XoopsConsole\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xoops\Core\XoopsTpl;

class InstallModuleCommand extends Command
{
    /**
     * establish the command configuration
     */
    protected function configure()
    {
        $this->setName('install-module')
            ->setDescription('Install a module')
            ->setDefinition([
                new InputArgument('module', InputArgument::REQUIRED, 'Module directory name'),
            ])->setHelp(<<<EOT
The <info>install-module</info> command installs a module.
EOT
             );
    }

    /**
     * execute the command
     *
     * @param InputInterface  $input  input handler
     * @param OutputInterface $output output handler
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $xoops = \Xoops::getInstance();
        $module = $input->getArgument('module');
        if (\XoopsLoad::fileExists($xoops->path("modules/${module}/xoops_version.php")) === false) {
            $output->writeln(sprintf('<error>No module named %s found!</error>', $module));
            return;
        }
        $output->writeln(sprintf('Installing %s', $module));
        if ($xoops->getModuleByDirname($module) !== false) {
            $output->writeln(sprintf('<error>%s module is already installed!</error>', $module));
            return;
        }
        $xoops->setTpl(new XoopsTpl());
        \XoopsLoad::load('module', 'system');
        $sysmod = new \SystemModule();
        $result = $sysmod->install($module);
        foreach ($sysmod->trace as $message) {
            if (is_array($message)) {
                foreach ($message as $subMessage) {
                    if (! is_array($subMessage)) {
                        $output->writeln(strip_tags($subMessage));
                    }
                }
            } else {
                $output->writeln(strip_tags($message));
            }
        }
        if ($result === false) {
            $output->writeln(sprintf('<error>Install of %s failed!</error>', $module));
        } else {
            $output->writeln(sprintf('<info>Install of %s completed.</info>', $module));
        }
        $xoops->cache()->delete('system');
    }
}
