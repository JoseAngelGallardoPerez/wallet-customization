<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: customization.proto

namespace Velmie\Wallet\Customization;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>velmie.wallet.customization.Request</code>
 */
class Request extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string Key = 1;</code>
     */
    protected $Key = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $Key
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Customization::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string Key = 1;</code>
     * @return string
     */
    public function getKey()
    {
        return $this->Key;
    }

    /**
     * Generated from protobuf field <code>string Key = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->Key = $var;

        return $this;
    }

}

