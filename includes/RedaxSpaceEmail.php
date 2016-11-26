<?php
namespace Redaxscript\Modules\RedaxSpace;

use Redaxscript\Db;
use Redaxscript\Head;
use Redaxscript\Registry;

/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 26.11.2016
 * Time: 13:32
 */

class RedaxSpaceEmail extends Config
{

    public function __construct()
    {
        $emailShorty = Db::forTablePrefix('redaxspace')
            ->where(array(
                'user_id' => Registry::get('myId'),
                'alias' => 'shorty'
            ))
            ->findOne();

        self::set('emailShorty', $emailShorty['value']);
    }

    public static function render($start = null)
    {
        if (Registry::get('loggedIn') !== Registry::get('token'))
        {
            return;
        }

        echo "HELLO";
        echo self::get('emailShorty');
    }


}

?>