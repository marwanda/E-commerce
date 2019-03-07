<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/14/2018
 * Time: 4:36 PM
 */
include "functions.php";
if (isset($_POST['login_username']) && isset($_POST['login_password'])) {
    $email = $_POST['login_username'];
    $password = $_POST['login_password'];

    $result = post('http://localhost/ConsultingSystem/api/loginUser.php', array('action' => 'loginUser', 'email' => $email, 'password' => $password));
    $result = json_decode($result, true);
    if (isset($result['data'])) {
        $_SESSION['u_id'] = $result['data'][0]['userId'];
        $_SESSION['u_name'] = $result['data'][0]['userName'];
        $_SESSION['msg']='';
        header('location: http://localhost/ConsultingSystem/index.php');

//        var_dump($_SESSION);

    } else {

        $_SESSION['msg'] = 'wrong email or password';
        header('location: http://localhost/ConsultingSystem/index.php');

    }


}
