<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: notifications.proto

namespace Velmie\Wallet\Notifications;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>velmie.wallet.notifications.templateData</code>
 */
class templateData extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string userName = 1;</code>
     */
    protected $userName = '';
    /**
     * Generated from protobuf field <code>string firstName = 2;</code>
     */
    protected $firstName = '';
    /**
     * Generated from protobuf field <code>string lastName = 3;</code>
     */
    protected $lastName = '';
    /**
     * Generated from protobuf field <code>string siteName = 4;</code>
     */
    protected $siteName = '';
    /**
     * Generated from protobuf field <code>string siteLoginUrl = 5;</code>
     */
    protected $siteLoginUrl = '';
    /**
     * Generated from protobuf field <code>string logo = 6;</code>
     */
    protected $logo = '';
    /**
     * Generated from protobuf field <code>string oneTimeLoginUrl = 7;</code>
     */
    protected $oneTimeLoginUrl = '';
    /**
     * Generated from protobuf field <code>string privateMessageRecipient = 8;</code>
     */
    protected $privateMessageRecipient = '';
    /**
     * Generated from protobuf field <code>string privateMessageAuthor = 9;</code>
     */
    protected $privateMessageAuthor = '';
    /**
     * Generated from protobuf field <code>string privateMessageUrl = 10;</code>
     */
    protected $privateMessageUrl = '';
    /**
     * Generated from protobuf field <code>string privateMessageRecipientEditUrl = 11;</code>
     */
    protected $privateMessageRecipientEditUrl = '';
    /**
     * Generated from protobuf field <code>string reason = 12;</code>
     */
    protected $reason = '';
    /**
     * Generated from protobuf field <code>string link = 13;</code>
     */
    protected $link = '';
    /**
     * Generated from protobuf field <code>string documentName = 14;</code>
     */
    protected $documentName = '';
    /**
     * Generated from protobuf field <code>string tan = 15;</code>
     */
    protected $tan = '';
    /**
     * Generated from protobuf field <code>string siteUrl = 16;</code>
     */
    protected $siteUrl = '';
    /**
     * Generated from protobuf field <code>string password = 17;</code>
     */
    protected $password = '';
    /**
     * Generated from protobuf field <code>string entityType = 18;</code>
     */
    protected $entityType = '';
    /**
     * Generated from protobuf field <code>uint64 entityID = 19;</code>
     */
    protected $entityID = 0;
    /**
     * Generated from protobuf field <code>uint64 messageUnreadedCount = 20;</code>
     */
    protected $messageUnreadedCount = 0;
    /**
     * Generated from protobuf field <code>string senderID = 21;</code>
     */
    protected $senderID = '';
    /**
     * Generated from protobuf field <code>string verificationLink = 22;</code>
     */
    protected $verificationLink = '';
    /**
     * Generated from protobuf field <code>string accountNumber = 23;</code>
     */
    protected $accountNumber = '';
    /**
     * Generated from protobuf field <code>uint64 transactionId = 24;</code>
     */
    protected $transactionId = 0;
    /**
     * Generated from protobuf field <code>string confirmationCode = 25;</code>
     */
    protected $confirmationCode = '';
    /**
     * Generated from protobuf field <code>string setPasswordConfirmationCode = 26;</code>
     */
    protected $setPasswordConfirmationCode = '';
    /**
     * Generated from protobuf field <code>uint64 requestId = 27;</code>
     */
    protected $requestId = 0;
    /**
     * Generated from protobuf field <code>uint64 count = 28;</code>
     */
    protected $count = 0;
    /**
     * Generated from protobuf field <code>string invoiceID = 29;</code>
     */
    protected $invoiceID = '';
    /**
     * Generated from protobuf field <code>string supplierCompany = 30;</code>
     */
    protected $supplierCompany = '';
    /**
     * Generated from protobuf field <code>string funderCompany = 31;</code>
     */
    protected $funderCompany = '';
    /**
     * Generated from protobuf field <code>string date = 32;</code>
     */
    protected $date = '';
    /**
     * Generated from protobuf field <code>string platformAdmin = 33;</code>
     */
    protected $platformAdmin = '';
    /**
     * Generated from protobuf field <code>string staffFirstName = 34;</code>
     */
    protected $staffFirstName = '';
    /**
     * Generated from protobuf field <code>string ownerFirstName = 35;</code>
     */
    protected $ownerFirstName = '';
    /**
     * Generated from protobuf field <code>string ownerLastName = 36;</code>
     */
    protected $ownerLastName = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $userName
     *     @type string $firstName
     *     @type string $lastName
     *     @type string $siteName
     *     @type string $siteLoginUrl
     *     @type string $logo
     *     @type string $oneTimeLoginUrl
     *     @type string $privateMessageRecipient
     *     @type string $privateMessageAuthor
     *     @type string $privateMessageUrl
     *     @type string $privateMessageRecipientEditUrl
     *     @type string $reason
     *     @type string $link
     *     @type string $documentName
     *     @type string $tan
     *     @type string $siteUrl
     *     @type string $password
     *     @type string $entityType
     *     @type int|string $entityID
     *     @type int|string $messageUnreadedCount
     *     @type string $senderID
     *     @type string $verificationLink
     *     @type string $accountNumber
     *     @type int|string $transactionId
     *     @type string $confirmationCode
     *     @type string $setPasswordConfirmationCode
     *     @type int|string $requestId
     *     @type int|string $count
     *     @type string $invoiceID
     *     @type string $supplierCompany
     *     @type string $funderCompany
     *     @type string $date
     *     @type string $platformAdmin
     *     @type string $staffFirstName
     *     @type string $ownerFirstName
     *     @type string $ownerLastName
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Notifications::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string userName = 1;</code>
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Generated from protobuf field <code>string userName = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setUserName($var)
    {
        GPBUtil::checkString($var, True);
        $this->userName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string firstName = 2;</code>
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Generated from protobuf field <code>string firstName = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setFirstName($var)
    {
        GPBUtil::checkString($var, True);
        $this->firstName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string lastName = 3;</code>
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Generated from protobuf field <code>string lastName = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setLastName($var)
    {
        GPBUtil::checkString($var, True);
        $this->lastName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string siteName = 4;</code>
     * @return string
     */
    public function getSiteName()
    {
        return $this->siteName;
    }

    /**
     * Generated from protobuf field <code>string siteName = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setSiteName($var)
    {
        GPBUtil::checkString($var, True);
        $this->siteName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string siteLoginUrl = 5;</code>
     * @return string
     */
    public function getSiteLoginUrl()
    {
        return $this->siteLoginUrl;
    }

    /**
     * Generated from protobuf field <code>string siteLoginUrl = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setSiteLoginUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->siteLoginUrl = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string logo = 6;</code>
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Generated from protobuf field <code>string logo = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setLogo($var)
    {
        GPBUtil::checkString($var, True);
        $this->logo = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string oneTimeLoginUrl = 7;</code>
     * @return string
     */
    public function getOneTimeLoginUrl()
    {
        return $this->oneTimeLoginUrl;
    }

    /**
     * Generated from protobuf field <code>string oneTimeLoginUrl = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setOneTimeLoginUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->oneTimeLoginUrl = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string privateMessageRecipient = 8;</code>
     * @return string
     */
    public function getPrivateMessageRecipient()
    {
        return $this->privateMessageRecipient;
    }

    /**
     * Generated from protobuf field <code>string privateMessageRecipient = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setPrivateMessageRecipient($var)
    {
        GPBUtil::checkString($var, True);
        $this->privateMessageRecipient = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string privateMessageAuthor = 9;</code>
     * @return string
     */
    public function getPrivateMessageAuthor()
    {
        return $this->privateMessageAuthor;
    }

    /**
     * Generated from protobuf field <code>string privateMessageAuthor = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setPrivateMessageAuthor($var)
    {
        GPBUtil::checkString($var, True);
        $this->privateMessageAuthor = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string privateMessageUrl = 10;</code>
     * @return string
     */
    public function getPrivateMessageUrl()
    {
        return $this->privateMessageUrl;
    }

    /**
     * Generated from protobuf field <code>string privateMessageUrl = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setPrivateMessageUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->privateMessageUrl = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string privateMessageRecipientEditUrl = 11;</code>
     * @return string
     */
    public function getPrivateMessageRecipientEditUrl()
    {
        return $this->privateMessageRecipientEditUrl;
    }

    /**
     * Generated from protobuf field <code>string privateMessageRecipientEditUrl = 11;</code>
     * @param string $var
     * @return $this
     */
    public function setPrivateMessageRecipientEditUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->privateMessageRecipientEditUrl = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string reason = 12;</code>
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Generated from protobuf field <code>string reason = 12;</code>
     * @param string $var
     * @return $this
     */
    public function setReason($var)
    {
        GPBUtil::checkString($var, True);
        $this->reason = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string link = 13;</code>
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Generated from protobuf field <code>string link = 13;</code>
     * @param string $var
     * @return $this
     */
    public function setLink($var)
    {
        GPBUtil::checkString($var, True);
        $this->link = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string documentName = 14;</code>
     * @return string
     */
    public function getDocumentName()
    {
        return $this->documentName;
    }

    /**
     * Generated from protobuf field <code>string documentName = 14;</code>
     * @param string $var
     * @return $this
     */
    public function setDocumentName($var)
    {
        GPBUtil::checkString($var, True);
        $this->documentName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string tan = 15;</code>
     * @return string
     */
    public function getTan()
    {
        return $this->tan;
    }

    /**
     * Generated from protobuf field <code>string tan = 15;</code>
     * @param string $var
     * @return $this
     */
    public function setTan($var)
    {
        GPBUtil::checkString($var, True);
        $this->tan = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string siteUrl = 16;</code>
     * @return string
     */
    public function getSiteUrl()
    {
        return $this->siteUrl;
    }

    /**
     * Generated from protobuf field <code>string siteUrl = 16;</code>
     * @param string $var
     * @return $this
     */
    public function setSiteUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->siteUrl = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string password = 17;</code>
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Generated from protobuf field <code>string password = 17;</code>
     * @param string $var
     * @return $this
     */
    public function setPassword($var)
    {
        GPBUtil::checkString($var, True);
        $this->password = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string entityType = 18;</code>
     * @return string
     */
    public function getEntityType()
    {
        return $this->entityType;
    }

    /**
     * Generated from protobuf field <code>string entityType = 18;</code>
     * @param string $var
     * @return $this
     */
    public function setEntityType($var)
    {
        GPBUtil::checkString($var, True);
        $this->entityType = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 entityID = 19;</code>
     * @return int|string
     */
    public function getEntityID()
    {
        return $this->entityID;
    }

    /**
     * Generated from protobuf field <code>uint64 entityID = 19;</code>
     * @param int|string $var
     * @return $this
     */
    public function setEntityID($var)
    {
        GPBUtil::checkUint64($var);
        $this->entityID = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 messageUnreadedCount = 20;</code>
     * @return int|string
     */
    public function getMessageUnreadedCount()
    {
        return $this->messageUnreadedCount;
    }

    /**
     * Generated from protobuf field <code>uint64 messageUnreadedCount = 20;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMessageUnreadedCount($var)
    {
        GPBUtil::checkUint64($var);
        $this->messageUnreadedCount = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string senderID = 21;</code>
     * @return string
     */
    public function getSenderID()
    {
        return $this->senderID;
    }

    /**
     * Generated from protobuf field <code>string senderID = 21;</code>
     * @param string $var
     * @return $this
     */
    public function setSenderID($var)
    {
        GPBUtil::checkString($var, True);
        $this->senderID = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string verificationLink = 22;</code>
     * @return string
     */
    public function getVerificationLink()
    {
        return $this->verificationLink;
    }

    /**
     * Generated from protobuf field <code>string verificationLink = 22;</code>
     * @param string $var
     * @return $this
     */
    public function setVerificationLink($var)
    {
        GPBUtil::checkString($var, True);
        $this->verificationLink = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string accountNumber = 23;</code>
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Generated from protobuf field <code>string accountNumber = 23;</code>
     * @param string $var
     * @return $this
     */
    public function setAccountNumber($var)
    {
        GPBUtil::checkString($var, True);
        $this->accountNumber = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 transactionId = 24;</code>
     * @return int|string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Generated from protobuf field <code>uint64 transactionId = 24;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTransactionId($var)
    {
        GPBUtil::checkUint64($var);
        $this->transactionId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string confirmationCode = 25;</code>
     * @return string
     */
    public function getConfirmationCode()
    {
        return $this->confirmationCode;
    }

    /**
     * Generated from protobuf field <code>string confirmationCode = 25;</code>
     * @param string $var
     * @return $this
     */
    public function setConfirmationCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->confirmationCode = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string setPasswordConfirmationCode = 26;</code>
     * @return string
     */
    public function getSetPasswordConfirmationCode()
    {
        return $this->setPasswordConfirmationCode;
    }

    /**
     * Generated from protobuf field <code>string setPasswordConfirmationCode = 26;</code>
     * @param string $var
     * @return $this
     */
    public function setSetPasswordConfirmationCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->setPasswordConfirmationCode = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 requestId = 27;</code>
     * @return int|string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Generated from protobuf field <code>uint64 requestId = 27;</code>
     * @param int|string $var
     * @return $this
     */
    public function setRequestId($var)
    {
        GPBUtil::checkUint64($var);
        $this->requestId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 count = 28;</code>
     * @return int|string
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Generated from protobuf field <code>uint64 count = 28;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCount($var)
    {
        GPBUtil::checkUint64($var);
        $this->count = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string invoiceID = 29;</code>
     * @return string
     */
    public function getInvoiceID()
    {
        return $this->invoiceID;
    }

    /**
     * Generated from protobuf field <code>string invoiceID = 29;</code>
     * @param string $var
     * @return $this
     */
    public function setInvoiceID($var)
    {
        GPBUtil::checkString($var, True);
        $this->invoiceID = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string supplierCompany = 30;</code>
     * @return string
     */
    public function getSupplierCompany()
    {
        return $this->supplierCompany;
    }

    /**
     * Generated from protobuf field <code>string supplierCompany = 30;</code>
     * @param string $var
     * @return $this
     */
    public function setSupplierCompany($var)
    {
        GPBUtil::checkString($var, True);
        $this->supplierCompany = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string funderCompany = 31;</code>
     * @return string
     */
    public function getFunderCompany()
    {
        return $this->funderCompany;
    }

    /**
     * Generated from protobuf field <code>string funderCompany = 31;</code>
     * @param string $var
     * @return $this
     */
    public function setFunderCompany($var)
    {
        GPBUtil::checkString($var, True);
        $this->funderCompany = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string date = 32;</code>
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Generated from protobuf field <code>string date = 32;</code>
     * @param string $var
     * @return $this
     */
    public function setDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->date = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string platformAdmin = 33;</code>
     * @return string
     */
    public function getPlatformAdmin()
    {
        return $this->platformAdmin;
    }

    /**
     * Generated from protobuf field <code>string platformAdmin = 33;</code>
     * @param string $var
     * @return $this
     */
    public function setPlatformAdmin($var)
    {
        GPBUtil::checkString($var, True);
        $this->platformAdmin = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string staffFirstName = 34;</code>
     * @return string
     */
    public function getStaffFirstName()
    {
        return $this->staffFirstName;
    }

    /**
     * Generated from protobuf field <code>string staffFirstName = 34;</code>
     * @param string $var
     * @return $this
     */
    public function setStaffFirstName($var)
    {
        GPBUtil::checkString($var, True);
        $this->staffFirstName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string ownerFirstName = 35;</code>
     * @return string
     */
    public function getOwnerFirstName()
    {
        return $this->ownerFirstName;
    }

    /**
     * Generated from protobuf field <code>string ownerFirstName = 35;</code>
     * @param string $var
     * @return $this
     */
    public function setOwnerFirstName($var)
    {
        GPBUtil::checkString($var, True);
        $this->ownerFirstName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string ownerLastName = 36;</code>
     * @return string
     */
    public function getOwnerLastName()
    {
        return $this->ownerLastName;
    }

    /**
     * Generated from protobuf field <code>string ownerLastName = 36;</code>
     * @param string $var
     * @return $this
     */
    public function setOwnerLastName($var)
    {
        GPBUtil::checkString($var, True);
        $this->ownerLastName = $var;

        return $this;
    }

}
