<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InitTables extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // skip the migration if there are another migrations
        // It means this migration was already applied
        $migrations = DB::select('SELECT * FROM migrations LIMIT 1');
        if (!empty($migrations)) {
            return;
        }
        $oldMigrationTable = DB::select("SHOW TABLES LIKE 'schema_migrations'");
        if (!empty($oldMigrationTable)) {
            return;
        }

        DB::beginTransaction();

        try {
            app("db")->getPdo()->exec($this->getSql());
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();
    }

    private function getSql()
    {
        return <<<SQL
            CREATE TABLE `color_schemes` (
              `id` int(10) UNSIGNED NOT NULL,
              `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
              `is_active` tinyint(1) NOT NULL DEFAULT '0',
              `is_default` tinyint(1) NOT NULL DEFAULT '0',
              `colors` text COLLATE utf8mb4_unicode_ci NOT NULL,
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

            INSERT INTO `color_schemes` (`id`, `name`, `is_active`, `is_default`, `colors`, `created_at`, `updated_at`) VALUES
            (1, 'Default', 1, 1, '{\"headerBackground\":\"#ffffff\",\"headerElements\":\"#5b5b5b\",\"headerBottomLine\":\"#e3e3e3\",\"menuBackground\":\"#5b5b5b\",\"menuElements\":\"#b6b6b6\",\"mainColor\":\"#94c817\",\"loginFooter\":\"#ffffff\",\"loginPageMiddle\":\"#ffffff\"}', '2018-11-20 10:21:52', '2019-10-28 08:04:09');

            CREATE TABLE `customizations` (
              `id` int(10) UNSIGNED NOT NULL,
              `key` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
              `type` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
              `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
              `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

            INSERT INTO `customizations` (`id`, `key`, `type`, `label`, `value`, `created_at`, `updated_at`) VALUES
            (1, 'gdpr', 'string', 'General Data Protection Regulation', '<div><span style=\"font-family: HelveticaNeueCyr-Thin;\">﻿</span><span style=\"font-family: HelveticaNeueCyr-Thin;\">﻿</span><span style=\"font-family: HelveticaNeueCyr-Thin;\">&lt;p class=\"rtejustify\"&gt;1. I hereby agree and consent that VELMIE_WALLET FINTECH SL may collect, use, disclose and process my personal information set out in my Contact Form, Sign Up form. Demo Request form and/or otherwise provided by me or possessed by VELMIE_WALLET FINTECH SL, for one or more of the purposes as stated in VELMIE_WALLET FINTECH SLâ€™s Personal Data Protection Terms and Conditions, which in summary includes but is not limited to the following:&lt;/p&gt;&lt;p class=\"rteindent1 rtejustify\"&gt;(a) processing my application for and providing me with the services and products of VELMIE_WALLET FINTECH SL as well as services and products by external providers as applicable;&lt;/p&gt;&lt;p class=\"rteindent1 rtejustify\"&gt;(b) administering and/or managing my relationship with VELMIE_WALLET FINTECH SL; and&lt;/p&gt;&lt;p class=\"rteindent1 rtejustify\"&gt;(c) sending me marketing, advertising and promotional information about other products/services that VELMIE_WALLET FINTECH SL, VELMIE_WALLET FINTECH SLâ€™s affiliates, business partners and related companies may be offering, and which VELMIE_WALLET FINTECH SL believes may be of interest or benefit to me (â€œMarketing Messagesâ€), by way of postal mail and/or electronic transmission to my email address(es);&lt;/p&gt;&lt;p class=\"rteindent1 rtejustify\"&gt;(d) sending me marketing, advertising and promotional information about other products/services that VELMIE_WALLET FINTECH SL, VELMIE_WALLET FINTECH SLâ€™s affiliates, business partners and related companies may be offering, and which VELMIE_WALLET FINTECH SL believes may be of interest or benefit to me (the â€œMarketing Purposeâ€), to my telephone number(s) (as set out in my application form, account opening documents and/ or otherwise provided by me or possessed by VELMIE_WALLET FINTECH SL) by way of: voice call/phone call* SMS/MMS (text message)* fax* (collectively the â€œPurposesâ€)&lt;/p&gt;&lt;p class=\"rtejustify\"&gt;2. My personal data may/will be disclosed by VELMIE_WALLET FINTECH SL to its third party service providers or agents (including its lawyers/law firms), for one or more of the Purposes, as such third party service providers or agents, if engaged by VELMIE_WALLET FINTECH SL, would be processing my personal data for VELMIE_WALLET FINTECH SL for one or more of the Purposes.&lt;/p&gt;&lt;p&gt;</span></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><span style=\"font-family: HelveticaNeueCyr-Thin;\">&lt;/p&gt;&lt;p class=\"rtejustify\"&gt;3. By clicking ACCEPT, I represent and warrant that I am the user and/or subscriber of the phone and email address as set out in my application form, account opening documents and/or otherwise provided by me or possessed by VELMIE_WALLET FINTECH SL, and that I have read and understood all of the above provisions, including the Personal Data Protection Terms and Conditions.&lt;/p&gt;</span></div>', '2018-11-20 10:21:52', '2019-10-24 16:16:38'),
            (2, 'termsAndConditions', 'string', '', 'Terms and conditions.', '2018-11-20 10:21:52', '2019-10-25 06:40:53'),
            (3, 'firstLoginText', 'string', '', '<p>Please always ensure that your client profile is complete and up to date.</p>', '2018-11-20 10:21:52', '2019-07-16 08:01:28'),
            (4, 'secondLoginText', 'string', '', 'Never share your password with anyone. Change your password regularly and avoid accessing your account from public computers.', '2018-11-20 10:21:52', '2018-11-27 08:22:02'),
            (5, 'thirdLoginText', 'string', '', 'We will never send personal information by email or ask you to confirm any account details by email.', '2018-11-20 10:21:52', '2018-11-27 08:22:02'),
            (6, 'logoMargin', 'integer', '', '5', '2018-11-20 10:21:52', '2018-11-28 09:04:17'),
            (7, 'logoXPoint', 'integer', '', '0', '2018-12-03 07:11:34', '2019-10-28 11:12:36'),
            (8, 'logoYPoint', 'integer', '', '0', '2018-12-03 07:11:34', '2019-10-28 11:12:36'),
            (9, 'logoWidth', 'integer', '', '420', '2018-12-03 07:11:34', '2019-10-28 11:12:36'),
            (10, 'logoHeight', 'integer', '', '78', '2018-12-03 07:11:34', '2019-10-28 11:12:36');

            ALTER TABLE `color_schemes`
              ADD PRIMARY KEY (`id`);

            ALTER TABLE `customizations`
              ADD PRIMARY KEY (`id`),
              ADD UNIQUE KEY `customizations_key_unique` (`key`);

            ALTER TABLE `color_schemes`
              MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

            ALTER TABLE `customizations`
              MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
SQL;
    }
}
