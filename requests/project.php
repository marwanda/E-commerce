<?php
include '../include/config.php';
$full_name = isset($_POST['full-name']) ? make_safe($_POST['full-name']) : null;
$mobile = isset($_POST['mobile']) ? make_safe($_POST['mobile']) : null;
$email = isset($_POST['email']) ? make_safe($_POST['email']) : null;
$file = isset($_FILES['file']) ? make_safe($_FILES['file']) : null;
$path='../';
$allowed_files = array(

    "application/pdf",
    "application/doc",
    "application/docx",
    "application/txt",
    "application/msword",
    "application/xlsx",
    "image/png",
    "image/jpeg",
    "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
);

$msg = '';
$result = upload_file($file, 'documents/projects/', $allowed_files, $msg);

if ($msg != '') {
    $_SESSION['error_msg'] = $msg;
    redirect('project-form', $path);
} else {

    $link = mysqli_connect("localhost", "root", "", "itsource");
    mysqli_set_charset($link, "utf8");

    $sq = "'";
    $path = '../';
    $date = date('Y-m-d', time());
    $query = "INSERT INTO projects ( name, phone, file, type, date) VALUES ({$sq}{$full_name}{$sq}, {$sq}{$mobile}{$sq}, {$sq}{$result}{$sq},0,{$sq}{$date}{$sq})";

    if (mysqli_connect_errno()) {
        $_SESSION['error_msg'] = mysqli_connect_error();
        mysqli_close($link);
        redirect('project-form', $path);
        exit;
    }

    if (mysqli_query($link, $query) === TRUE) {
        mysqli_close($link);
        $_SESSION['error_msg']=$lang['successfully_done'];
        redirect('home', $path);
        exit;
    } else {

        $_SESSION['error_msg'] = $lang['general_error'];
        mysqli_close($link);
        redirect('home', $path);
        exit();

    }

}


?>
