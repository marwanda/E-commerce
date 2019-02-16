<?php
include '../include/config.php';
$mobile = isset($_POST['phone']) ? make_safe($_POST['phone']) : null;
$password = isset($_POST['password']) ? make_safe($_POST['password']) : null;

$link = mysqli_connect("localhost", "root", "", "itsource");
$sq = "'";
$path = '../';
$query = "select * from user where phone = {$sq}{$mobile}{$sq} and password = {$sq}{$password}{$sq}";
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($result = mysqli_query($link, $query)) {
//    printf("Select returned %d rows.\n", mysqli_num_rows($result));

    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['phone']=$row['phone'];
        $_SESSION['user_id']=$row['id'];

        if ($row['role'] == 1) {
            $_SESSION['role'] = 1;
            mysqli_close($link);
            redirect('verification',$path);
            exit();
        } else if ($row['role'] == 2) {
            $_SESSION['role'] = 2;
            mysqli_close($link);
            redirect('home',$path);
            exit();

        } else if ($row['role'] == 3) {
            $_SESSION['role'] = 3;
            mysqli_close($link);
            redirect('home',$path);
            exit();

        }

    }

    $_SESSION['error_msg'] = $lang['wrong_login_info'];
    mysqli_close($link);
    redirect('home',$path);
    exit();

}

/* free result set */
//    mysqli_free_result($result);

else {

    $_SESSION['error_msg'] = $lang['general_error'];
    mysqli_close($link);
    redirect('home',$path);
    exit();

}


?>