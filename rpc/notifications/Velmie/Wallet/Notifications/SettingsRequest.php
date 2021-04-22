<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: notifications.proto

namespace Velmie\Wallet\Notifications;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>velmie.wallet.notifications.SettingsRequest</code>
 */
class SettingsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated string settingNames = 1;</code>
     */
    private $settingNames;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $settingNames
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Notifications::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated string settingNames = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSettingNames()
    {
        return $this->settingNames;
    }

    /**
     * Generated from protobuf field <code>repeated string settingNames = 1;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSettingNames($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->settingNames = $arr;

        return $this;
    }

}

