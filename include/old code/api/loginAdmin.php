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
include_once './../models/Admin.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
$posts_arr['data'] = array();

// Instantiate blog post object
$admin = new Admin ($db);

if (isset($_POST['action']) && isset($_POST['email']) && isset($_POST['password']) && $_POST['action'] == 'loginAdmin')
{
    $result = $admin->login( $_POST['email'], $_POST['password']);
    $num = $result->rowCount();

    if ($num > 0) {
        // Post array
        //    $posts_arr = array();
        // Check if any posts
        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $post_item = array(
            'adminId' => $id,
            'adminName' => $name
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
