<?php
/**
 * Created by PhpStorm.
 * User: Krisz
 * Date: 2016.11.14.
 * Time: 14:23
 */

namespace Modules\BusinessLogic\ContentSettings;
use Modules\BusinessLogic\Models as Models;

class Profile extends Base
{
    public $id;
    
    public $username;
    
    public $password;
    
    public $email;
    
    public $name;
    
    public $role;
    
    public $group;

    /**
     * @param $obj
     * @param $lang
     * @return Profile
     */
    public function generate($obj,$lang){
        $profile = new Profile();
        $profile->id = $obj->id;
        $profile->username = $obj->username;
        $profile->password = isset($obj->password)?$obj->password:null;
        $profile->email = $obj->email;
        $profile->name = $obj->name;
        $profile->role = $obj->role;
        $profile->group = $obj->group;

        return $profile;
    }

    /**
     * @param $username
     * @param $password
     * @return bool|Profile
     */
    public static function login($username, $password){
        $cp = new Profile();
        $mp = new Models\Profiles();
        $profile = $mp->loginProfile($username, $password);
        if($profile){
            return $cp->generate($profile);
        }
        return false;

    }

}