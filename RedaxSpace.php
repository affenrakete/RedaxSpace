<?php
namespace Redaxscript\Modules\RedaxSpace;

use Redaxscript\Db;
use Redaxscript\Head;
use Redaxscript\Registry;

/**
 *
 * @since
 *
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
            'author' => 'Peter Siemer',
            'description' => '',
            'version' => '1.0.0'
        ];

    /**
     * renderStart
     *
     * @since 1.0.0
     *
     * @param string
     */

    public static function render($start = null)
    {
        if (Registry::get('loggedIn') === Registry::get('token')) {
            switch ($start) {
                case 'password' :
                    break;

                case 'email' :
                    include_once('modules/RedaxSpace/includes/RedaxSpaceEmail.php');

                    $renderNow = new RedaxSpaceEmail();
                    $renderNow -> render();

                    break;
            }
        }
    }
}