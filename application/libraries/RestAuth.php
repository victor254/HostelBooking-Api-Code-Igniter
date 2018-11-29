<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 10/27/2018
 * Time: 6:33 PM
 */

namespace Restserver\Libraries;


class RestAuth extends  \CI_Model
{
    public function __construct()
    {

    }

    /**
     * @param $username
     * @param $password
     * @return string
     */
    function  authenticate($username,$password)
    {
      return md5($username);
    }
}