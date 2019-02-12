<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/consultation.php';
include_once '../../models/Articles.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
$posts_arr['data'] = array();

// Instantiate blog post object
$article_obj = new Articles($db);
if (isset($_POST['action']) && isset($_POST['admin_id']) &&  $_POST['action'] == 'readAdminArticles') {
    $result = $article_obj->readAdminArticles($_POST['admin_id']);
    $num = $result->rowCount();

    if ($num > 0) {

        // Post array
        //    $posts_arr = array();

        // Check if any posts

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $post_item = array(
                'articleId' => $articleId,
                'adminId' => $adminId,
                'adminName' => $adminName,
                'content' => $content,
                'subject' => $subject,
                'headline' => $headline,
                'views' => $views,
                'date' => $date,
                'pic' => $pic,
            );

            // Push to "data"
            array_push($posts_arr['data'], $post_item);
            // array_push($posts_arr['data'], $post_item);
        }

        // Turn to JSON & output
        echo json_encode($posts_arr);

    } else {
        // No Posts
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }
}

else if (isset($_POST['action']) && isset($_POST['article_id']) && isset($_POST['article']) && isset($_POST['subject']) && isset($_POST['admin_id']) && $_POST['action'] == 'editArticle') {
    $result = $article_obj->editArticle($_POST['article_id'], $_POST['article'], $_POST['subject'], $_POST['admin_id']);
//    $num = $result->rowCount();
//
//    if ($num > 0) {
//        // Post array
//        //    $posts_arr = array();
//
//        // Check if any posts
//
//        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//
//            extract($row);
//
//
//            // Push to "data"
//            array_push($posts_arr['data'], $post_item);
//            // array_push($posts_arr['data'], $post_item);
//        }
//
//        // Turn to JSON & output
//        echo json_encode($posts_arr);
//
//    } else {
//        // No Posts
//        echo json_encode(
//            array('message' => 'No Posts Found')
//        );
//    }
} else if (isset($_POST['action']) && isset($_POST['article']) && isset($_POST['subject']) && isset($_POST['headline']) && isset($_POST['pic']) && isset($_POST['admin_id']) && $_POST['action'] == 'addArticle')
{
    $result = $article_obj->addArticle(
        $_POST['article'],
        $_POST['headline'],
        $_POST['subject'],
        $_POST['pic'],
        $_POST['admin_id']);
    $num = $result->rowCount();

    if ($num > 0) {
        // Post array
        //    $posts_arr = array();

        // Check if any posts

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $post_item = array(
                'articleId' => $articleId
            );

            // Push to "data"
            array_push($posts_arr['data'], $post_item);
            // array_push($posts_arr['data'], $post_item);
        }

        // Turn to JSON & output
        echo json_encode($posts_arr);

    } else {
        // No Posts
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }
} else if (isset($_POST['action']) && isset($_POST['article_id']) && isset($_POST['admin_id']) && $_POST['action'] == 'deleteArticle') {
    $result = $article_obj->deleteArticle($_POST['article_id'],$_POST['admin_id']);
//    $num = $result->rowCount();
//
//    if ($num > 0) {
//        // Post array
//        //    $posts_arr = array();
//
//        // Check if any posts
//
//        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//
//            extract($row);
//
//            $post_item = array(
//                'answerId' => $answerId,
//                'answer' => $answer,
//                'adminId' => $adminId,
//                'adminName' => $adminName,
//            );
//
//            // Push to "data"
//            array_push($posts_arr['data'], $post_item);
//            // array_push($posts_arr['data'], $post_item);
//        }
//
//        // Turn to JSON & output
//        echo json_encode($posts_arr);

//    } else {
//        // No Posts
//        echo json_encode(
//            array('message' => 'No Posts Found')
//        );
//    }
} else if (isset($_POST['action']) && isset($_POST['article_id']) && $_POST['action'] == 'getArticleDetails') {
    $result = $article_obj->readArticle($_POST['article_id']);
    $num = $result->rowCount();

    if ($num > 0) {
        // Post array
        //    $posts_arr = array();
        // Check if any posts
        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $post_item = array(
            'articleId' => $articleId,
            'adminId' => $adminId,
            'adminName' => $adminName,
            'content' => $content,
            'subject' => $subject,
            'headline' => $headline,
            'views' => $views,
            'date' => $date,
            'pic' => $pic,
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
else {
    // No Posts
    echo json_encode(
        array('message' => 'No action or admin id found!')
    );

    exit;
}


// Get row count





