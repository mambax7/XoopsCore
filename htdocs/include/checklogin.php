<?php declare(strict_types=1);

/**
 * XOOPS authentication/authorization.
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           2.0.0
 * @version         $Id$
 * @todo            Will be refactored
 */
use Xmf\Request;
use Xoops\Core\FixedGroups;

$xoops = Xoops::getInstance();

$xoops_url = \XoopsBaseConfig::get('url');

// from $_POST we use keys: uname, pass, rememberme, xoops_redirect
$uname = Request::getString('uname', '', 'POST');
$pass = Request::getString('pass', '', 'POST');
if ('' === $uname || '' === $pass) {
    $xoops->redirect($xoops_url.'/user.php', 1, XoopsLocale::E_INCORRECT_LOGIN);
    exit();
}
$rememberme = Request::getBool('rememberme', false, 'POST');
$xoops_redirect = Request::getUrl('xoops_redirect', '', 'POST');

$member_handler = $xoops->getHandlerMember();

$xoopsAuth = \Xoops\Auth\Factory::getAuthConnection($uname);
$user = $xoopsAuth->authenticate($uname, $pass);

if (false !== $user) {
    /* @var $user XoopsUser */
    if (0 === $user->getVar('level')) {
        $xoops->redirect($xoops_url.'/index.php', 5, XoopsLocale::E_SELECTED_USER_DEACTIVATED_OR_NOT_ACTIVE);
        exit();
    }
    if (in_array(FixedGroups::REMOVED, $user->getGroups(), true)) {
        $xoops->redirect($xoops_url.'/index.php', 1, XoopsLocale::E_NO_ACCESS_PERMISSION);
        exit();
    }
    if (1 === $xoops->getConfig('closesite')) {
        $allowed = false;
        foreach ($user->getGroups() as $group) {
            if (in_array($group, $xoops->getConfig('closesite_okgrp'), true) || FixedGroups::ADMIN === $group) {
                $allowed = true;

                break;
            }
        }
        if (!$allowed) {
            $xoops->redirect($xoops_url.'/index.php', 1, XoopsLocale::E_NO_ACCESS_PERMISSION);
            exit();
        }
    }
    $user->setVar('last_login', time());
    if (!$member_handler->insertUser($user)) {
    }

    $xoops->session()->user()->recordUserLogin($user->getVar('uid'), $rememberme);
    $user_theme = $user->getVar('theme');
    if (in_array($user_theme, $xoops->getConfig('theme_set_allowed'), true)) {
        $_SESSION['xoopsUserTheme'] = $user_theme;
    }

    $xoops->events()->triggerEvent('core.include.checklogin.success');

    if (!empty($xoops_redirect) && !strpos($xoops_redirect, 'register')) {
        $xoops_redirect = rawurldecode($xoops_redirect);
        $parsed = parse_url($xoops_url);
        $url = isset($parsed['scheme']) ? $parsed['scheme'].'://' : 'http://';
        if (isset($parsed['host'])) {
            $url .= $parsed['host'];
            if (isset($parsed['port'])) {
                $url .= ':'.$parsed['port'];
            }
        } else {
            $url .= $_SERVER['HTTP_HOST'];
        }
        if (@$parsed['path']) {
            if (strncmp($parsed['path'], $xoops_redirect, strlen($parsed['path']))) {
                $url .= $parsed['path'];
            }
        }
        $url .= $xoops_redirect;
    } else {
        $url = $xoops_url.'/index.php';
    }

    $xoops->redirect($url, 1, sprintf(XoopsLocale::SF_THANK_YOU_FOR_LOGGING_IN, $user->getVar('uname')), false);
} else {
    $xoops->events()->triggerEvent('core.include.checklogin.failed');
    if (empty($xoops_redirect)) {
        $xoops->redirect($xoops_url.'/user.php', 5, $xoopsAuth->getHtmlErrors());
    } else {
        $xoops->redirect(
            $xoops_url.'/user.php?xoops_redirect='.urlencode($xoops_redirect),
            5,
            $xoopsAuth->getHtmlErrors(),
            false
        );
    }
}
exit();
