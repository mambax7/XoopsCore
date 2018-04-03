<?php
/*
 You may not change or alter any portion of this comment or credits of supporting
 developers from this source code or any supporting source code which is considered
 copyrighted (c) material of the original  comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

namespace Xoops\Core\Service\Data;

use Xmf\Assert;

/**
 * The Message data object is a minimal message from one user to another user
 *
 * This is an Immutable data object. That means any changes to the data (state)
 * return a new object, while the internal state of the original object is preserved.
 *
 * All data is validated for type and value, and an exception is generated when
 * data on any operation for a property when it is not valid.
 *
 * The Message data object is used for message and mailer services
 *
 * @category  Xoops\Core\Service\Data
 * @package   Xoops\Core
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2018 XOOPS Project (https://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @link      https://xoops.org
 */
class Message
{
    /* assert messages */
    protected const MESSAGE_BODY = 'Body must be specified';

    protected const MESSAGE_FROM = 'From id must be a valid userid';

    protected const MESSAGE_SUBJECT = 'Subject must be specified';

    protected const MESSAGE_TO = 'To Id must be a valid userid';

    /** @var string $subject the subject of the message, a non-empty string */
    protected $subject;

    /** @var string $body the body of the message, a non-empty string */
    protected $body;

    /** @var int $fromId the user id sending the message, a positive integer */
    protected $fromId;

    /** @var int $toId the user id to receive the message, a positive integer */
    protected $toId;

    /**
     * Message constructor.
     *
     * If an argument is null, the corresponding value will not be set. Values can be set
     * later with the with*() methods, but each will result in a new object.
     *
     * @param null|string $subject the subject of the message, a non-empty string
     * @param null|string $body    the body of the message, a non-empty string
     * @param null|int    $fromId  the user id sending the message, a positive integer
     * @param null|int    $toId    the user id to receive the message, a positive integer
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(?string $subject = null, ?string $body = null, ?int $fromId = null, ?int $toId = null)
    {
        if ($subject !== null) {
            $subject = trim($subject);
            Assert::stringNotEmpty($subject, static::MESSAGE_SUBJECT);
            $this->subject = $subject;
        }
        if ($body !== null) {
            $body = trim($body);
            Assert::stringNotEmpty($body, static::MESSAGE_BODY);
            $this->body = $body;
        }
        if ($fromId !== null) {
            Assert::greaterThan($fromId, 0, static::MESSAGE_FROM);
            $this->fromId = $fromId;
        }
        if ($toId !== null) {
            Assert::greaterThan($toId, 0, static::MESSAGE_TO);
            $this->toId = $toId;
        }
    }

    /**
     * Return a new object with a the specified toId
     *
     *
     * @param int $toId userid message is to
     *
     * @throws \InvalidArgumentException
     */
    public function withToId(int $toId): self
    {
        return new static($this->subject, $this->body, $this->fromId, $toId);
    }

    /**
     * Return a new object with a the specified fromId
     *
     *
     * @param int $fromId userid message is from
     *
     * @throws \InvalidArgumentException
     */
    public function withFromId(int $fromId): self
    {
        return new static($this->subject, $this->body, $fromId, $this->toId);
    }

    /**
     * Return a new object with a the specified subject
     *
     *
     * @param string $subject message subject
     *
     * @throws \InvalidArgumentException
     */
    public function withSubject(string $subject): self
    {
        return new static($subject, $this->body, $this->fromId, $this->toId);
    }

    /**
     * Return a new object with a the specified body
     *
     *
     * @param string $body message body
     *
     * @throws \InvalidArgumentException
     */
    public function withBody(string $body): self
    {
        return new static($this->subject, $body, $this->fromId, $this->toId);
    }

    /**
     * getToId
     *
     * @return int the toId
     *
     * @throws \LogicException (property was not properly set before used)
     */
    public function getToId(): int
    {
        try {
            Assert::greaterThan($this->toId, 0, static::MESSAGE_TO);
        } catch (\InvalidArgumentException $e) {
            throw new \LogicException($e->getMessage(), $e->getCode(), $e);
        }
        return $this->toId;
    }

    /**
     * getFromId
     *
     * @return int the fromId
     *
     * @throws \LogicException (property was not properly set before used)
     */
    public function getFromId(): int
    {
        try {
            Assert::greaterThan($this->fromId, 0, static::MESSAGE_FROM);
        } catch (\InvalidArgumentException $e) {
            throw new \LogicException($e->getMessage(), $e->getCode(), $e);
        }
        return $this->fromId;
    }

    /**
     * getSubject
     *
     * @return string the message subject
     *
     * @throws \LogicException (property was not properly set before used)
     */
    public function getSubject(): string
    {
        try {
            Assert::stringNotEmpty($this->subject, static::MESSAGE_SUBJECT);
        } catch (\InvalidArgumentException $e) {
            throw new \LogicException($e->getMessage(), $e->getCode(), $e);
        }

        return $this->subject;
    }

    /**
     * getBody
     *
     * @return string the message body
     *
     * @throws \LogicException (property was not properly set before used)
     */
    public function getBody(): string
    {
        try {
            Assert::stringNotEmpty($this->body, static::MESSAGE_BODY);
        } catch (\InvalidArgumentException $e) {
            throw new \LogicException($e->getMessage(), $e->getCode(), $e);
        }
        return $this->body;
    }
}
