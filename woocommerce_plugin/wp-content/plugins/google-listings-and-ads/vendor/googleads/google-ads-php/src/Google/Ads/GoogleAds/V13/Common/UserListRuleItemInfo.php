<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/common/user_lists.proto

namespace Google\Ads\GoogleAds\V13\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An atomic rule item.
 *
 * Generated from protobuf message <code>google.ads.googleads.v13.common.UserListRuleItemInfo</code>
 */
class UserListRuleItemInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Rule variable name. It should match the corresponding key name fired
     * by the pixel.
     * A name must begin with US-ascii letters or underscore or UTF8 code that is
     * greater than 127 and consist of US-ascii letters or digits or underscore or
     * UTF8 code that is greater than 127.
     * For websites, there are two built-in variable URL (name = 'url__') and
     * referrer URL (name = 'ref_url__').
     * This field must be populated when creating a new rule item.
     *
     * Generated from protobuf field <code>optional string name = 5;</code>
     */
    protected $name = null;
    protected $rule_item;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Rule variable name. It should match the corresponding key name fired
     *           by the pixel.
     *           A name must begin with US-ascii letters or underscore or UTF8 code that is
     *           greater than 127 and consist of US-ascii letters or digits or underscore or
     *           UTF8 code that is greater than 127.
     *           For websites, there are two built-in variable URL (name = 'url__') and
     *           referrer URL (name = 'ref_url__').
     *           This field must be populated when creating a new rule item.
     *     @type \Google\Ads\GoogleAds\V13\Common\UserListNumberRuleItemInfo $number_rule_item
     *           An atomic rule item composed of a number operation.
     *     @type \Google\Ads\GoogleAds\V13\Common\UserListStringRuleItemInfo $string_rule_item
     *           An atomic rule item composed of a string operation.
     *     @type \Google\Ads\GoogleAds\V13\Common\UserListDateRuleItemInfo $date_rule_item
     *           An atomic rule item composed of a date operation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V13\Common\UserLists::initOnce();
        parent::__construct($data);
    }

    /**
     * Rule variable name. It should match the corresponding key name fired
     * by the pixel.
     * A name must begin with US-ascii letters or underscore or UTF8 code that is
     * greater than 127 and consist of US-ascii letters or digits or underscore or
     * UTF8 code that is greater than 127.
     * For websites, there are two built-in variable URL (name = 'url__') and
     * referrer URL (name = 'ref_url__').
     * This field must be populated when creating a new rule item.
     *
     * Generated from protobuf field <code>optional string name = 5;</code>
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : '';
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * Rule variable name. It should match the corresponding key name fired
     * by the pixel.
     * A name must begin with US-ascii letters or underscore or UTF8 code that is
     * greater than 127 and consist of US-ascii letters or digits or underscore or
     * UTF8 code that is greater than 127.
     * For websites, there are two built-in variable URL (name = 'url__') and
     * referrer URL (name = 'ref_url__').
     * This field must be populated when creating a new rule item.
     *
     * Generated from protobuf field <code>optional string name = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * An atomic rule item composed of a number operation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.common.UserListNumberRuleItemInfo number_rule_item = 2;</code>
     * @return \Google\Ads\GoogleAds\V13\Common\UserListNumberRuleItemInfo|null
     */
    public function getNumberRuleItem()
    {
        return $this->readOneof(2);
    }

    public function hasNumberRuleItem()
    {
        return $this->hasOneof(2);
    }

    /**
     * An atomic rule item composed of a number operation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.common.UserListNumberRuleItemInfo number_rule_item = 2;</code>
     * @param \Google\Ads\GoogleAds\V13\Common\UserListNumberRuleItemInfo $var
     * @return $this
     */
    public function setNumberRuleItem($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V13\Common\UserListNumberRuleItemInfo::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * An atomic rule item composed of a string operation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.common.UserListStringRuleItemInfo string_rule_item = 3;</code>
     * @return \Google\Ads\GoogleAds\V13\Common\UserListStringRuleItemInfo|null
     */
    public function getStringRuleItem()
    {
        return $this->readOneof(3);
    }

    public function hasStringRuleItem()
    {
        return $this->hasOneof(3);
    }

    /**
     * An atomic rule item composed of a string operation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.common.UserListStringRuleItemInfo string_rule_item = 3;</code>
     * @param \Google\Ads\GoogleAds\V13\Common\UserListStringRuleItemInfo $var
     * @return $this
     */
    public function setStringRuleItem($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V13\Common\UserListStringRuleItemInfo::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * An atomic rule item composed of a date operation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.common.UserListDateRuleItemInfo date_rule_item = 4;</code>
     * @return \Google\Ads\GoogleAds\V13\Common\UserListDateRuleItemInfo|null
     */
    public function getDateRuleItem()
    {
        return $this->readOneof(4);
    }

    public function hasDateRuleItem()
    {
        return $this->hasOneof(4);
    }

    /**
     * An atomic rule item composed of a date operation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.common.UserListDateRuleItemInfo date_rule_item = 4;</code>
     * @param \Google\Ads\GoogleAds\V13\Common\UserListDateRuleItemInfo $var
     * @return $this
     */
    public function setDateRuleItem($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V13\Common\UserListDateRuleItemInfo::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getRuleItem()
    {
        return $this->whichOneof("rule_item");
    }

}

