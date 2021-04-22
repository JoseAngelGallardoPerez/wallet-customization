<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: notifications.proto

namespace Velmie\Wallet\Notifications;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>velmie.wallet.notifications.Request</code>
 */
class Request extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string to = 1;</code>
     */
    protected $to = '';
    /**
     * Generated from protobuf field <code>string eventName = 2;</code>
     */
    protected $eventName = '';
    /**
     * Generated from protobuf field <code>.velmie.wallet.notifications.templateData templateData = 3;</code>
     */
    protected $templateData = null;
    /**
     * Generated from protobuf field <code>repeated string notifiers = 4;</code>
     */
    private $notifiers;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $to
     *     @type string $eventName
     *     @type \Velmie\Wallet\Notifications\templateData $templateData
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $notifiers
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Notifications::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string to = 1;</code>
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Generated from protobuf field <code>string to = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setTo($var)
    {
        GPBUtil::checkString($var, True);
        $this->to = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string eventName = 2;</code>
     * @return string
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Generated from protobuf field <code>string eventName = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setEventName($var)
    {
        GPBUtil::checkString($var, True);
        $this->eventName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.velmie.wallet.notifications.templateData templateData = 3;</code>
     * @return \Velmie\Wallet\Notifications\templateData
     */
    public function getTemplateData()
    {
        return $this->templateData;
    }

    /**
     * Generated from protobuf field <code>.velmie.wallet.notifications.templateData templateData = 3;</code>
     * @param \Velmie\Wallet\Notifications\templateData $var
     * @return $this
     */
    public function setTemplateData($var)
    {
        GPBUtil::checkMessage($var, \Velmie\Wallet\Notifications\templateData::class);
        $this->templateData = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string notifiers = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getNotifiers()
    {
        return $this->notifiers;
    }

    /**
     * Generated from protobuf field <code>repeated string notifiers = 4;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setNotifiers($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->notifiers = $arr;

        return $this;
    }

}
