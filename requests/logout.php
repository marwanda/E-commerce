<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 2019-02-16
 * Time: 2:27 AM
 */
include "../include/config.php";
$path='../';


unset($_SESSION['user_id']);
unset($_SESSION['role']);
unset($_SESSION['phone']);
unset($_SESSION['error_msg']);

//var_dump($_SESSION);
redirect('home',$path);