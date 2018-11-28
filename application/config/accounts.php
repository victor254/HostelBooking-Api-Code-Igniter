<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 10/22/2018
 * Time: 11:48 PM
 */

$config["guestsession"] = array(
    "username" => "guest",
    "password" => md5("guest"),
    "logged_in" => TRUE,
    "allowedroutes" => array(
        "/user_guide/"
    )
);
$config["loggedinsession"]=array(
    "username" => "loggedin",
    "password" => md5("loggedin"),
    "logged_in" => TRUE,
    "allowedroutes" => array(
        "/user_guide/",
        "api/v1/students/bookings/",
        "api/v1/admin/staff/"
    )
);