<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: users.proto

namespace Velmie\Wallet\Users;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>velmie.wallet.users.Response</code>
 */
class Response extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.velmie.wallet.users.User user = 2;</code>
     */
    protected $user = null;
    /**
     * Generated from protobuf field <code>repeated .velmie.wallet.users.User users = 3;</code>
     */
    private $users;
    /**
     * Generated from protobuf field <code>.velmie.wallet.users.Error error = 4;</code>
     */
    protected $error = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Velmie\Wallet\Users\User $user
     *     @type \Velmie\Wallet\Users\User[]|\Google\Protobuf\Internal\RepeatedField $users
     *     @type \Velmie\Wallet\Users\Error $error
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Users::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.velmie.wallet.users.User user = 2;</code>
     * @return \Velmie\Wallet\Users\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Generated from protobuf field <code>.velmie.wallet.users.User user = 2;</code>
     * @param \Velmie\Wallet\Users\User $var
     * @return $this
     */
    public function setUser($var)
    {
        GPBUtil::checkMessage($var, \Velmie\Wallet\Users\User::class);
        $this->user = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .velmie.wallet.users.User users = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Generated from protobuf field <code>repeated .velmie.wallet.users.User users = 3;</code>
     * @param \Velmie\Wallet\Users\User[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setUsers($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Velmie\Wallet\Users\User::class);
        $this->users = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.velmie.wallet.users.Error error = 4;</code>
     * @return \Velmie\Wallet\Users\Error
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Generated from protobuf field <code>.velmie.wallet.users.Error error = 4;</code>
     * @param \Velmie\Wallet\Users\Error $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkMessage($var, \Velmie\Wallet\Users\Error::class);
        $this->error = $var;

        return $this;
    }

}
