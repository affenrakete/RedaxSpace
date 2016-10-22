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
}
