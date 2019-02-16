<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 2019-02-16
 * Time: 2:27 AM
 */
include "../include/config.php";
$path='../';
session_destroy();
redirect('home',$path);