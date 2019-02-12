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

if (isset($_POST['action']) && $_POST['action'] == 'getLatestArticles') {
    if(isset($_POST['size']))
    {
        $result = $article_obj->readLatestArticles(3);
    }
    else
        $result = $article_obj->readLatestArticles(0);

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
else if (isset($_POST['action']) && $_POST['action'] == 'getMostViewedArticles') {
    if(isset($_POST['size']))
    {
        $result = $article_obj->readMostViewedArticles(3);
    }
    else
        $result = $article_obj->readMostViewedArticles(0);

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
else if (isset($_POST['action']) &&  isset($_POST['user_id']) && $_POST['action'] == 'getArchivedArticles') {
    $result = $article_obj->readArchivedArticles($_POST['user_id']);

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
else if (isset($_POST['action']) && $_POST['article_id']&& $_POST['user_id']&&  $_POST['action'] == 'archiveArticle') {
    $result = $article_obj->archiveArticle($_POST['article_id'],$_POST['user_id']);
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
//                'articleId' => $articleId,
//                'adminId' => $adminId,
//                'adminName' => $adminName,
//                'content' => $content,
//                'subject' => $subject,
//                'headline' => $headline,
//                'views' => $views,
//                'date' => $date,
//                'pic' => $pic,
//            );
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
}

else if (isset($_POST['action']) && isset($_POST['article_id']) && $_POST['action'] == 'incrementArticleViews') {
    $result = $article_obj->incrementViews($_POST['article_id']);
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
}else {
    // No Posts
    echo json_encode(
        array('message' => 'No action or admin id found!')
    );

    exit;
}


// Get row count





