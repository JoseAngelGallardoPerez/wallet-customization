<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: permissions.proto

namespace Velmie\Wallet\Permissions;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>velmie.wallet.permissions.PermissionReq</code>
 */
class PermissionReq extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string user_id = 1;</code>
     */
    protected $user_id = '';
    /**
     * Generated from protobuf field <code>string action_key = 2;</code>
     */
    protected $action_key = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $user_id
     *     @type string $action_key
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Permissions::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string user_id = 1;</code>
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Generated from protobuf field <code>string user_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setUserId($var)
    {
        GPBUtil::checkString($var, True);
        $this->user_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string action_key = 2;</code>
     * @return string
     */
    public function getActionKey()
    {
        return $this->action_key;
    }

    /**
     * Generated from protobuf field <code>string action_key = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setActionKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->action_key = $var;

        return $this;
    }

}

