<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

use Xoops\Core\Kernel\Handlers\XoopsUser;

class UserTest extends \PHPUnit\Framework\TestCase
{
    protected $object;

    protected function setUp(): void
    {
        $this->object = new XoopsUser();
    }

    public function testContracts(): void
    {
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsUser', $this->object);
        $this->assertInstanceOf('\Xoops\Core\Kernel\XoopsObject', $this->object);
    }

    public function test___construct(): void
    {
        $value = $this->object->getVars();
        $this->assertTrue(isset($value['uid']));
        $this->assertTrue(isset($value['name']));
        $this->assertTrue(isset($value['uname']));
        $this->assertTrue(isset($value['email']));
        $this->assertTrue(isset($value['url']));
        $this->assertTrue(isset($value['user_avatar']));
        $this->assertTrue(isset($value['user_regdate']));
        $this->assertTrue(isset($value['user_icq']));
        $this->assertTrue(isset($value['user_from']));
        $this->assertTrue(isset($value['user_sig']));
        $this->assertTrue(isset($value['user_viewemail']));
        $this->assertTrue(isset($value['actkey']));
        $this->assertTrue(isset($value['user_aim']));
        $this->assertTrue(isset($value['user_yim']));
        $this->assertTrue(isset($value['user_msnm']));
        $this->assertTrue(isset($value['pass']));
        $this->assertTrue(isset($value['posts']));
        $this->assertTrue(isset($value['attachsig']));
        $this->assertTrue(isset($value['rank']));
        $this->assertTrue(isset($value['level']));
        $this->assertTrue(isset($value['theme']));
        $this->assertTrue(isset($value['timezone']));
        $this->assertTrue(isset($value['last_login']));
        $this->assertTrue(isset($value['last_pass_change']));
        $this->assertTrue(isset($value['umode']));
        $this->assertTrue(isset($value['uorder']));
        $this->assertTrue(isset($value['notify_method']));
        $this->assertTrue(isset($value['notify_mode']));
        $this->assertTrue(isset($value['user_occ']));
        $this->assertTrue(isset($value['bio']));
        $this->assertTrue(isset($value['user_intrest']));
        $this->assertTrue(isset($value['user_mailok']));
    }

    public function test_isGuest(): void
    {
        $value = $this->object->isGuest();
        $this->assertFalse($value);
    }

    public function test_getUnameFromId(): void
    {
        $value1 = XoopsUser::getUnameFromId(0);
        $this->assertSame(\Xoops::getInstance()->getConfig('anonymous'), $value1);
        $value = XoopsUser::getUnameFromId(1);
        $this->assertInternalType('string', $value);
        $this->assertNotSame($value, $value1);
    }

    public function test_incrementPost(): void
    {
        $value = $this->object->incrementPost();
        $this->assertSame('', $value);
    }

    public function test_getGroups(): void
    {
        $group = $this->object->getGroups();
        $value = $this->object->setGroups($group);
        $this->assertNull($value);
    }

    public function test_groups(): void
    {
        $group1 = $this->object->getGroups();
        $group2 = $this->object->groups();
        $this->assertSame($group1, $group2);
    }

    public function test_isAdmin(): void
    {
        $value = $this->object->isAdmin();
        $this->assertFalse($value);
    }

    public function test_rank(): void
    {
        $value = $this->object->rank();
        $this->assertTrue(null === $value || is_array($value));
    }

    public function test_isActive(): void
    {
        $value = $this->object->isActive();
        $this->assertFalse($value);
    }

    public function test_isOnline(): void
    {
        $value = $this->object->isOnline();
        $this->assertFalse($value);
    }

    public function test_uid(): void
    {
        $value = $this->object->uid();
        $this->assertNull($value);
    }

    public function test_id(): void
    {
        $value = $this->object->id();
        $this->assertSame($this->object->uid(), $value);
    }

    public function test_name(): void
    {
        $value = $this->object->name();
        $this->assertNull($value);
    }

    public function test_email(): void
    {
        $value = $this->object->email();
        $this->assertNull($value);
    }

    public function test_url(): void
    {
        $value = $this->object->url();
        $this->assertNull($value);
    }

    public function test_user_avatar(): void
    {
        $value = $this->object->user_avatar();
        $this->assertNull($value);
    }

    public function test_user_regdate(): void
    {
        $value = $this->object->user_regdate();
        $this->assertNull($value);
    }

    public function test_user_icq(): void
    {
        $value = $this->object->user_icq();
        $this->assertSame('', $value);
    }

    public function test_user_from(): void
    {
        $value = $this->object->user_from();
        $this->assertNull($value);
    }

    public function test_user_sig(): void
    {
        $value = $this->object->user_sig();
        $this->assertNull($value);
    }

    public function test_user_viewemail(): void
    {
        $value = $this->object->user_viewemail();
        $this->assertSame(0, $value);
    }

    public function test_actkey(): void
    {
        $value = $this->object->actkey();
        $this->assertNull($value);
    }

    public function test_user_aim(): void
    {
        $value = $this->object->user_aim();
        $this->assertNull($value);
    }

    public function test_user_yim(): void
    {
        $value = $this->object->user_yim();
        $this->assertNull($value);
    }

    public function test_user_msnm(): void
    {
        $value = $this->object->user_msnm();
        $this->assertNull($value);
    }

    public function test_pass(): void
    {
        $value = $this->object->pass();
        $this->assertNull($value);
    }

    public function test_posts(): void
    {
        $value = $this->object->posts();
        $this->assertNull($value);
    }

    public function test_attachsig(): void
    {
        $value = $this->object->attachsig();
        $this->assertSame(0, $value);
    }

    public function test_level(): void
    {
        $value = $this->object->level();
        $this->assertSame(0, $value);
    }

    public function test_theme(): void
    {
        $value = $this->object->theme();
        $this->assertNull($value);
    }

    public function test_timezone(): void
    {
        $value = $this->object->timezone();
        $this->assertInstanceOf('\DateTimeZone', $value);
        $this->assertSame('UTC', $value->getName());
    }

    public function test_umode(): void
    {
        $value = $this->object->umode();
        $this->assertNull($value);
    }

    public function test_uorder(): void
    {
        $value = $this->object->uorder();
        $this->assertSame(1, $value);
    }

    public function test_notify_method(): void
    {
        $value = $this->object->notify_method();
        $this->assertSame(1, $value);
    }

    public function test_notify_mode(): void
    {
        $value = $this->object->notify_mode();
        $this->assertSame(0, $value);
    }

    public function test_user_occ(): void
    {
        $value = $this->object->user_occ();
        $this->assertNull($value);
    }

    public function test_bio(): void
    {
        $value = $this->object->bio();
        $this->assertNull($value);
    }

    public function test_user_intrest(): void
    {
        $value = $this->object->user_intrest();
        $this->assertNull($value);
    }
}
