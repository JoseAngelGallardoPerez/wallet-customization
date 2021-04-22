<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property boolean $is_active
 * @property boolean $is_default
 * @property string $colors
 *
 * Class ColorSchema
 * @package App\Models
 */
class ColorSchema extends Model
{
    public const KEY_HEADER_BACKGROUND = 'headerBackground';
    public const KEY_HEADER_ELEMENTS = 'headerElements';
    public const KEY_HEADER_BOTTOM_LINE = 'headerBottomLine';
    public const KEY_MENU_BACKGROUND = 'menuBackground';
    public const KEY_MENU_ELEMENTS = 'menuElements';
    public const KEY_NON_ACTIVE_MENU_ICONS = 'nonActiveMenuIcons';// unused
    public const KEY_MAIN_COLOR = 'mainColor';
    public const KEY_LOGIN_FOOTER = 'loginFooter';
    public const KEY_LOGIN_PAGE_MIDDLE = 'loginPageMiddle';

    protected $table = 'color_schemes';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_active',
        'is_default',
        'colors',
    ];

    /**
     * @param string $value
     * @return array
     */
    public function getColorsAttribute(string $value)
    {
        return json_decode($value, true);
    }

    /**
     * @param integer $value
     * @return mixed
     */
    public function getIsActiveAttribute($value)
    {
        return (bool)$value;
    }

    /**
     * @param integer $value
     * @return mixed
     */
    public function getIsDefaultAttribute($value)
    {
        return (bool)$value;
    }

    /**
     * @param array $colors
     * @return $this
     */
    public function setColors(array $colors)
    {
        $this->colors = json_encode($colors);
        return $this;
    }

    /**
     * @param array $data
     * @return void
     */
    public function updateByData(array $data)
    {
        $this->name = $data['name'];
        if (isset($data['isActive'])) {
            $this->is_active = $data['isActive'];
        }

        $this->is_default = false;
        $this->setColors($data['colors']);
        $this->save();
    }

    /**
     * @return $this
     */
    public static function getActive()
    {
        $item = self::where('is_active', '=', true)->take(1)->first();
        if (!$item) {
            $item = self::where('is_default', '=', true)->take(1)->first();
        }

        return $item;
    }

    /**
     * @param array $data
     * @return ColorSchema
     */
    public static function createNewSchema(array $data)
    {
        $item = new self();
        $item->updateByData($data);

        return $item;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'isActive' => $this->getIsActiveAttribute($this->is_active),
            'isDefault' => $this->getIsDefaultAttribute($this->is_default),
            'colors' => $this->colors,
        ];
    }

    /**
     * @return array
     */
    public static function getColorKeys()
    {
        return [
            self::KEY_HEADER_BACKGROUND,
            self::KEY_HEADER_ELEMENTS,
            self::KEY_HEADER_BOTTOM_LINE,
            self::KEY_MENU_BACKGROUND,
            self::KEY_MENU_ELEMENTS,
            self::KEY_MAIN_COLOR,
            self::KEY_LOGIN_FOOTER,
            self::KEY_LOGIN_PAGE_MIDDLE,
        ];
    }
}
