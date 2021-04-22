<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Customization;

class CreateModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->getData() as $item) {
            Customization::create($item);
        }
    }

    /**
     * @return array
     */
    private function getData()
    {
        return [
            [
                'key' => Customization::KEY_GDPR,
                'type' => Customization::TYPE_STRING,
                'label' => 'Consent to Process Data',
                'value' => '1. I hereby agree and consent that [Enter entity name here] may collect, use, disclose and process my personal information set out in my Contact Form, Sign Up form. Demo Request form and/or otherwise provided by me or possessed by [Enter entity name here], for one or more of the purposes as stated in [Enter entity name here] Personal Data Protection Terms and Conditions, which in summary includes but is not limited to the following:
<br>
(a) processing my application for and providing me with the services and products of [Enter entity name here] as well as services and products by external providers as applicable;<br>

(b) administering and/or managing my relationship with [Enter entity name here]; and<br>

(c) sending me marketing, advertising and promotional information about other products/services that [Enter entity name here], [Enter entity name here] affiliates, business partners and related companies may be offering, and which [Enter entity name here] believes may be of interest or benefit to me (“Marketing Messages”), by way of postal mail and/or electronic transmission to my email address(es);<br>

(d) sending me marketing, advertising and promotional information about other products/services that [Enter entity name here], [Enter entity name here] affiliates, business partners and related companies may be offering, and which [Enter entity name here] believes may be of interest or benefit to me (the “Marketing Purpose”), to my telephone number(s) (as set out in my application form, account opening documents and/ or otherwise provided by me or possessed by [Enter entity name here]) by way of: voice call/phone call* SMS/MMS (text message)* fax* (collectively the “Purposes”)<br>

2. My personal data may/will be disclosed by [Enter entity name here] SL to its third party service providers or agents (including its lawyers/law firms), for one or more of the Purposes, as such third party service providers or agents, if engaged by [Enter entity name here], would be processing my personal data for [Enter entity name here] for one or more of the Purposes.<br>

3. By clicking ACCEPT, I represent and warrant that I am the user and/or subscriber of the phone and email address as set out in my application form, account opening documents and/or otherwise provided by me or possessed by [Enter entity name here], and that I have read and understood all of the above provisions, including the Personal Data Protection Terms and Conditions.<br>',
            ],
            [
                'key' => Customization::KEY_TERMS_AND_CONDITIONS,
                'type' => Customization::TYPE_STRING,
                'label' => '',
                'value' => 'Terms and conditions',
            ],
            [
                'key' => Customization::KEY_FIRST_LOGIN_TEXT,
                'type' => Customization::TYPE_STRING,
                'label' => '',
                'value' => 'Please always ensure that your client profile is complete and up to date.',
            ],
            [
                'key' => Customization::KEY_SECOND_LOGIN_TEXT,
                'type' => Customization::TYPE_STRING,
                'label' => '',
                'value' => 'Never share your password with anyone. Change your password regularly and avoid accessing your account from public computers.',
            ],
            [
                'key' => Customization::KEY_THIRD_LOGIN_TEXT,
                'type' => Customization::TYPE_STRING,
                'label' => '',
                'value' => 'We will never send personal information by email or ask you to confirm any account details by email.',
            ],
            [
                'key' => Customization::KEY_LOGO_MARGIN,
                'type' => Customization::TYPE_INTEGER,
                'label' => '',
                'value' => 0,
            ],
        ];
    }
}
