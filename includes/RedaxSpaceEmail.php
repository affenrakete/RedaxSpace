<?php
namespace Redaxscript\Modules\RedaxSpace;

use Redaxscript\Db;
use Redaxscript\Head;
use Redaxscript\Registry;
use Redaxscript\Request;

/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 26.11.2016
 * Time: 13:32
 */

class RedaxSpaceEmail extends RedaxSpace
{

    public function __construct()
    {
        //TEST
    }

    protected static function getShorty()
    {
        $emailShorty = Db::forTablePrefix('redaxspace')
            ->where(array(
                'user_id' => Registry::get('myId'),
                'alias' => 'emailShorty'
            ))
            ->findOne();

        if(!empty($emailShorty['value']))
        {
            self::set('emailShorty', $emailShorty['value']);
            return true;
        }
        return false;
    }

    protected static function setShorty()
    {
        if(isset($_POST['setShorty']) && $_POST['setShorty'] == 1)
        {
            $input = array(
                'shorty' => clean($_POST['Shorty'], 0)
            );

            /*
            if(!ctype_alpha($input['shorty']) || strlen($input['shorty'])>10 || strlen($input['shorty'])<2)
            {
                self::set('error', array('Ungültiges Benutzerkürzel angegeben. Nur Buchstaben und zwischen 2 und 10 Zeichen sind zugelassen.'));
            }
            else
            {
                $shorty['user_id'] = Registry::get('myId');
                $shorty['key'] =  'shorty';
                $shorty['value'] =  $input['shorty'];

                $check = Db::forTablePrefix('nkio')
                    ->where(array(
                        'key' => 'shorty',
                        'value' => $shorty['value']
                        ))
                    ->count();

                if($check>0)
                {
                    self::set('error', array('Gesperrtes Benutzerkürzel angegeben.'));
                    return 0;
                }

                Db::forTablePrefix('nkio')
                    ->create()
                    ->set($shorty)
                    ->save();

                self::set('shorty', $shorty['value']);
            }
            */


        }
    }

    public static function render($start = null)
    {
        if(Registry::get('loggedIn') !== Registry::get('token'))
        {
            return false;
        }

        if(!self::getShorty())
        {
            self::setShorty();

            self::setNotification('info', 'Bitte zuerst ein Benutzerkürzel anlegen.');

            echo"
<form method=\"post\" class=\"js_validate_form form_default form_comment\"  action=\"\" role=\"form\">
<fieldset class=\"set_comment\">
  <div class=\"line clearfix\">
	<div class=\"grid_space s2o8\"><label for=\"Shorty\">Benutzerkürzel:</label></div>
	<div class=\"grid_space s6o8\"><input class=\"field_text field_note\" name=\"Shorty\" type=\"text\" placeholder=\"Benutzerkürzel\"  value=\"\" /></div>
  </div>
</fieldset>  
  <input type=\"hidden\" name=\"token\" value=\"". TOKEN ."\">
  <input type=\"hidden\" name=\"setShorty\" value=\"1\">
  <button type=\"submit\" class=\"js_submit button_default\" name=\"Anlegen\">Anlegen</button>
</form>";

            print_r(Request::getPost());
        }


    }


}

?>