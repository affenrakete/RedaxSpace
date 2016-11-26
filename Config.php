<?php
namespace Redaxscript\Modules\RedaxSpace;

use Redaxscript\Module;

/**
 * children class to store module config
 *
 * @since 1.0.0
 *
 * @package Redaxscript
 * @category Modules
 * @author Henry Ruhs
 */

class Config extends Module
{
    /**
     * array of config
     *
     * @var array
     */

    protected static $_configArray =
        [
            'uploaddir' => '/upload'
        ];

    public function get($key = null)
    {
        if (array_key_exists($key, self::$_configArray))
        {
            return self::$_configArray[$key];
        }
        else if (!$key)
        {
            return self::$_configArray;
        }
        return false;
    }

    public function set($key = null, $value = null)
    {
        self::$_configArray[$key] = $value;
    }
}
