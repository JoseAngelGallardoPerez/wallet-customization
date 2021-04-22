<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: notifications.proto

namespace Velmie\Wallet\Notifications;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>velmie.wallet.notifications.SettingsResponse</code>
 */
class SettingsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .velmie.wallet.notifications.Setting settings = 1;</code>
     */
    private $settings;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Velmie\Wallet\Notifications\Setting[]|\Google\Protobuf\Internal\RepeatedField $settings
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Notifications::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .velmie.wallet.notifications.Setting settings = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Generated from protobuf field <code>repeated .velmie.wallet.notifications.Setting settings = 1;</code>
     * @param \Velmie\Wallet\Notifications\Setting[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSettings($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Velmie\Wallet\Notifications\Setting::class);
        $this->settings = $arr;

        return $this;
    }

}
