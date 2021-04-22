<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $key
 * @property string $type
 * @property string $label
 * @property string $value
 *
 * Class Customization
 * @package App\Models
 */
class Customization extends Model
{
    public const TYPE_INTEGER = 'integer';
    public const TYPE_STRING = 'string';

    public const KEY_GDPR = 'gdpr';
    public const KEY_TERMS_AND_CONDITIONS = 'termsAndConditions';
    public const KEY_FIRST_LOGIN_TEXT = 'firstLoginText';
    public const KEY_SECOND_LOGIN_TEXT = 'secondLoginText';
    public const KEY_THIRD_LOGIN_TEXT = 'thirdLoginText';
    public const KEY_LOGO_MARGIN = 'logoMargin';

    public const KEY_LOGO_X_POINT = 'logoXPoint';
    public const KEY_LOGO_Y_POINT = 'logoYPoint';
    public const KEY_LOGO_WIDTH = 'logoWidth';
    public const KEY_LOGO_HEIGHT = 'logoHeight';

    public const IMG_FOLDER = '/img';
    public const DEFAULT_FOLDER = '/default';
    public const LOGO_NAME = 'logo.png';
    public const ORIGINAL_LOGO_NAME = 'original_logo.png';
    public const FAVICON_NAME = 'favicon.ico';

    protected $table = 'customizations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'type',
        'label',
        'value',
    ];

    /**
     * @return mixed
     */
    public function getTypedValue()
    {
        if ($this->type === self::TYPE_INTEGER) {
            return (int)$this->value;
        }

        return (string)$this->value;
    }

    /**
     * @return $this
     */
    public static function findOrFailGdpr()
    {
        return static::findOrFailByKey(self::KEY_GDPR);
    }

    /**
     * @param string $key
     * @return $this
     */
    public static function findOrFailByKey(string $key)
    {
        return static::where('key', '=', $key)->firstOrFail();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function findSiteTexts()
    {
        return static::whereIn('key', self::getSiteTextsKeys())->get();
    }

    /**
     * @return array
     */
    public static function getSiteTextsKeys()
    {
        return [
            self::KEY_TERMS_AND_CONDITIONS,
            self::KEY_FIRST_LOGIN_TEXT,
            self::KEY_SECOND_LOGIN_TEXT,
            self::KEY_THIRD_LOGIN_TEXT,
        ];
    }

    public static function getLogoPath()
    {
        return self::IMG_FOLDER . '/' . self::LOGO_NAME;
    }

    public static function getOriginalLogoPath()
    {
        return self::IMG_FOLDER . '/' .  self::ORIGINAL_LOGO_NAME;
    }

    public static function getFaviconPath()
    {
        return self::IMG_FOLDER . '/' . self::FAVICON_NAME;
    }

    public static function getDefaultLogoPath()
    {
        return self::DEFAULT_FOLDER . '/' . self::LOGO_NAME;
    }

    public static function getDefaultOriginalLogoPath()
    {
        return self::getDefaultLogoPath();
    }

    public static function getDefaultFaviconPath()
    {
        return self::DEFAULT_FOLDER . '/' . self::FAVICON_NAME;
    }
}
