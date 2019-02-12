<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/14/2018
 * Time: 5:13 PM
 */

/*
$_POST['action'];
$_POST['article_id'];
$_POST['user_id'];
$_POST['article'];
$_POST['subject'];
$_POST['headline'];
$_POST['pic'];
$_POST['admin_id'];
$_POST['size'];
$_POST['consultation_id'];
$_POST['answer'];
$_POST['pre_illnesses'];
$_POST['consultation'];
*/
include 'functions.php';

if(isset($_POST))
{
    if(isset($_SESSION['u_id']))
    $_POST['user_id']=$_SESSION['u_id'];
    if(isset($_SESSION['a_id']))
        $_POST['admin_id']=$_SESSION['a_id'];
    $result = post('http://localhost/ConsultingSystem/api/'.$_POST['url'] , $_POST);
    echo $result;
}

