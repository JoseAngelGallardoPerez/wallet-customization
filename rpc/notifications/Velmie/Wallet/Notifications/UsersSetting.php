<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: notifications.proto

namespace Velmie\Wallet\Notifications;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>velmie.wallet.notifications.UsersSetting</code>
 */
class UsersSetting extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string notificationName = 1;</code>
     */
    protected $notificationName = '';
    /**
     * Generated from protobuf field <code>string uid = 2;</code>
     */
    protected $uid = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $notificationName
     *     @type string $uid
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Notifications::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string notificationName = 1;</code>
     * @return string
     */
    public function getNotificationName()
    {
        return $this->notificationName;
    }

    /**
     * Generated from protobuf field <code>string notificationName = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setNotificationName($var)
    {
        GPBUtil::checkString($var, True);
        $this->notificationName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string uid = 2;</code>
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Generated from protobuf field <code>string uid = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setUid($var)
    {
        GPBUtil::checkString($var, True);
        $this->uid = $var;

        return $this;
    }

}

