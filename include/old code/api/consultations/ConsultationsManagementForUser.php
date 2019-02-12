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

if (isset($_POST['action']) && $_POST['action'] == 'getAll') {
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
                'date' => $date,
                'isViewed' => $isViewed,
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
else if (isset($_POST['action']) && isset($_POST['user_id']) && $_POST['action'] == 'getUserConsultations') {
    $result = $consultation->readUserConsultations($_POST['user_id']);
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
                'date' => $date,
                'isViewed' => $isViewed,
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
else if (isset($_POST['action']) && isset($_POST['user_id'])&& isset($_POST['consultation_id']) && $_POST['action'] == 'viewConsultation') {
    $result = $consultation->viewConsultation($_POST['consultation_id'],$_POST['user_id']);

}
else if (isset($_POST['action']) && isset($_POST['user_id'])&& isset($_POST['consultation'])&& isset($_POST['pre_illnesses'])  && $_POST['action'] == 'addConsultation') {
    $result = $consultation->addConsultation($_POST['user_id'],$_POST['consultation'],$_POST['pre_illnesses']);
    $num = $result->rowCount();

    if ($num > 0) {

        // Post array
        //    $posts_arr = array();

        // Check if any posts

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $post_item = array(

                'consultationId' => $consultationId,
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
else if (isset($_POST['action']) &&isset($_POST['consultation_id'])&& $_POST['action'] == 'deleteConsultation') {
    $result = $consultation->deleteConsultation($_POST['consultation_id']);

}

else {
    // No Posts
    echo json_encode(
        array('message' => 'No action or admin id found!')
    );

    exit;
}


// Get row count





