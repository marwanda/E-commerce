<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/consultation.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
$posts_arr['data'] = array();

// Instantiate blog post object
$consultation = new consultation($db);

if (isset($_POST['action']) && isset($_POST['admin_id']) && $_POST['action'] == 'getAnswered') {
    $result = $consultation->readAnswered($_POST['admin_id']);
    $num = $result->rowCount();

    if ($num > 0) {
        // Post array
        //    $posts_arr = array();

        // Check if any posts

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $post_item = array(
                'id' => $consultationId,
                'content' => $consultationContent,
                'pre_illnesses' => $pre_illnesses,
                'userId' => $userId,
                'userName' => $userName,
                'adminId' => $adminId,
                'adminName' => $adminName,
                'answerId' => $answerId,
                'answer' => $answer,
                'answersNumber'=>$answersNumber
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
            array('message' => 'No data')
        );
    }
}
else if (isset($_POST['action']) && isset($_POST['admin_id']) && $_POST['action'] == 'getUnanswered') {
    $result = $consultation->readUnanswered($_POST['admin_id']);
    $num = $result->rowCount();
    $pre_consId="";
    if ($num > 0) {
        // Post array
        //    $posts_arr = array();

        // Check if any posts

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            extract($row);



                $post_item = array(
                    'id' => $id,
                    'content' => $content,
                    'pre_illnesses' => $pre_illnesses,
                    'userId' => $u_id,
                    'userName' => $name,
                    'answersNumber'=>$answers_number
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
            array('message' => 'No data')
        );
    }
}
else if (isset($_POST['action']) && $_POST['action'] == 'getAll') {
    $result = $consultation->read();
    $num = $result->rowCount();

    if ($num > 0) {

        // Post array
        //    $posts_arr = array();

        // Check if any posts

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $post_item = array(
                'id' => $consultationId,
                'content' => $consultationContent,
                'pre_illnesses' => $pre_illnesses,
                'userId' => $userId,
                'userName' => $userName,
                'answerNumber' => $answerNumber,
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
else if (isset($_POST['action']) && isset($_POST['consultation_id']) && $_POST['action'] == 'getAnswers') {
    $result = $consultation->readAnswers($_POST['consultation_id']);
    $num = $result->rowCount();

    if ($num > 0) {
        // Post array
        //    $posts_arr = array();

        // Check if any posts

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $post_item = array(
                'answerId' => $answerId,
                'answer' => $answer,
                'adminId' => $adminId,
                'adminName' => $adminName,
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
else if (isset($_POST['action']) && isset($_POST['answer']) && isset($_POST['consultation_id']) && isset($_POST['admin_id']) && $_POST['action'] == 'createAnswer')
{
    $result = $consultation->addAnswer($_POST['answer'], $_POST['admin_id'], $_POST['consultation_id']);
    $num = $result->rowCount();

    if ($num > 0) {
        // Post array
        //    $posts_arr = array();
        // Check if any posts
        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $post_item = array(
            'answer_id' => $answer_id
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
else if (isset($_POST['action']) && isset($_POST['answer_id']) && $_POST['action'] == 'deleteAnswer')
{
    $result = $consultation->deleteAnswer($_POST['answer_id']);
}
else if (isset($_POST['action']) && isset($_POST['answer']) && isset($_POST['answer_id']) && $_POST['action'] == 'editAnswer')
{
    $result = $consultation->editAnswer($_POST['answer_id'],$_POST['answer']);
}
else {
    // No Posts
    echo json_encode(
        array('message' => 'No action or admin id found!')
    );

    exit;
}


// Get row count





