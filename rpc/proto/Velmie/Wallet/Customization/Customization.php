<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: customization.proto

namespace Velmie\Wallet\Customization;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>velmie.wallet.customization.Customization</code>
 */
class Customization extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int64 Id = 1;</code>
     */
    protected $Id = 0;
    /**
     * Generated from protobuf field <code>string Key = 2;</code>
     */
    protected $Key = '';
    /**
     * Generated from protobuf field <code>string Type = 3;</code>
     */
    protected $Type = '';
    /**
     * Generated from protobuf field <code>string Label = 4;</code>
     */
    protected $Label = '';
    /**
     * Generated from protobuf field <code>string Value = 5;</code>
     */
    protected $Value = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $Id
     *     @type string $Key
     *     @type string $Type
     *     @type string $Label
     *     @type string $Value
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Customization::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int64 Id = 1;</code>
     * @return int|string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Generated from protobuf field <code>int64 Id = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->Id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Key = 2;</code>
     * @return string
     */
    public function getKey()
    {
        return $this->Key;
    }

    /**
     * Generated from protobuf field <code>string Key = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->Key = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Type = 3;</code>
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * Generated from protobuf field <code>string Type = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkString($var, True);
        $this->Type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Label = 4;</code>
     * @return string
     */
    public function getLabel()
    {
        return $this->Label;
    }

    /**
     * Generated from protobuf field <code>string Label = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setLabel($var)
    {
        GPBUtil::checkString($var, True);
        $this->Label = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Value = 5;</code>
     * @return string
     */
    public function getValue()
    {
        return $this->Value;
    }

    /**
     * Generated from protobuf field <code>string Value = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, True);
        $this->Value = $var;

        return $this;
    }

}

