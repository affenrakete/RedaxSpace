<?php
namespace Redaxscript\Modules\RedaxSpace;

use Redaxscript\Head;
use Redaxscript\Language;
use Redaxscript\Registry;
use Redaxscript\Request;

/**
 * Use Redaxscript to controll parts of Uberspace
 **
 * @package Redaxscript
 * @category Modules
 * @author Peter Siemer
 */

class RedaxSpace extends Config
{
    /**
     * array of the module
     *
     * @var array
     */
    protected static $_moduleArray =
        [
            'name' => 'RedaxSpace',
            'alias' => 'RedaxSpace',
            'author' => 'nkler',
            'description' => 'Use Redaxscript to controll parts of Uberspace',
            'version' => '3.0.0',
            'access' => '1'
        ];
}

?>