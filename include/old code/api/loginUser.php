<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/13/2018
 * Time: 1:08 AM
 */

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './../config/Database.php';
include_once './../models/User.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
$posts_arr['data'] = array();

// Instantiate blog post object
$user = new User ($db);

if (isset($_POST['action']) && isset($_POST['email']) && isset($_POST['password']) && $_POST['action'] == 'loginUser')
{
    $result = $user->login( $_POST['email'], $_POST['password']);
    $num = $result->rowCount();

    if ($num > 0) {
        // Post array
        //    $posts_arr = array();
        // Check if any posts
        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $post_item = array(
            'userId' => $id,
            'userName' => $name
        );
        // Push to "data"
        array_push($posts_arr['data'], $post_item);
        echo json_encode($posts_arr);

    }

    // Turn to JSON & output
    // echo json_encode($posts_arr);

    else {
        // No Posts
        echo json_encode(
            array('message' => 'wrong email or password')
        );
    }

}

else if (isset($_POST['action']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['pic']) && isset($_POST['email']) && isset($_POST['phone']) && $_POST['action'] == 'userRegistration')
{
    $result = $user->addUser($_POST['name'],$_POST['email'],$_POST['password'],$_POST['phone'],$_POST['gender'],$_POST['pic'],$_POST['age']);
    $num = $result->rowCount();

    if ($num > 0) {
        // Post array
        //    $posts_arr = array();
        // Check if any posts
        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $post_item = array(
            'userId' => $userId
        );
        // Push to "data"
        array_push($posts_arr['data'], $post_item);
        echo json_encode($posts_arr);

    }

    // Turn to JSON & output
    // echo json_encode($posts_arr);

    else {
        // No Posts
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }
}

