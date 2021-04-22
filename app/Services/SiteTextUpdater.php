<?php

namespace App\Services;

use App\Models\Customization;
use Illuminate\Http\Request;
use Illuminate\Database\DatabaseManager;

/**
 * Class SiteTextUpdater
 * @package App\Services
 */
class SiteTextUpdater
{
    /**
     * @var DatabaseManager
     */
    private $db;

    /**
     * SiteTextUpdater constructor.
     * @param DatabaseManager $db
     */
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * @param Request $request
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Request $request)
    {
        $this->db->transaction(function () use ($request) {
            /** @var string $key */
            foreach (Customization::getSiteTextsKeys() as $key) {
                $item = Customization::findOrFailByKey($key);
                $item->value = $request->input($key);
                $item->save();
            }
        });
    }
}
