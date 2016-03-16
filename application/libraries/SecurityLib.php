<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/16
 * Time: 16:14
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class SecurityLib
{

    private $salt;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->salt = $this->CI->config->item('encryption_key');
    }

    function getPassword($password, $passwordConfirm = false)
    {
        if ($passwordConfirm && $password != $passwordConfirm) {
            return false;
        }
        return do_hash($password, 'md5');
    }

    function md5($rawStr)
    {
        return do_hash($rawStr, 'md5');
    }

}