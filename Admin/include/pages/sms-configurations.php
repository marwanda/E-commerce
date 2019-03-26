<?php

if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg']) && isset($_SESSION['msg_type'])) {
    if ($_SESSION['msg_type'] == 1)
        echo '<input id="error-msg" data-type="success"  type="hidden" value="' . $_SESSION['error_msg'] . '">';
    else if ($_SESSION['msg_type'] == -1)
        echo '<input id="error-msg" data-type="error"  type="hidden" value="' . $_SESSION['error_msg'] . '">';
    else
        echo '<input id="error-msg" data-type="warn"  type="hidden" value="' . $_SESSION['error_msg'] . '">';
    $_SESSION['error_msg'] = '';
    $_SESSION['msg_type'] = '';

}


$sq = "'";
$path = '../';
$id = isset($_GET['id']) ? make_safe($_GET['id']) : null;
$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");

if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = $lang['sql_problem'];
    echo '<input id="error-msg" data-type="error"  type="hidden" value="' . $_SESSION['error_msg'] . '">';
    $_SESSION['error_msg'] = '';
}

if (isset($_POST['submit-configurations'])) {

    $username = isset($_POST['username']) ? make_safe($_POST['username']) : null;
    $password = isset($_POST['password']) ? make_safe($_POST['password']) : null;
    $from = isset($_POST['from']) ? make_safe($_POST['from']) : null;
    $query = "update settings set username={$sq}{$username}{$sq} , password={$sq}{$password}{$sq} ,sms_from={$sq}{$from}{$sq} where id=1";

    if (mysqli_query($link, $query) === TRUE) {

        $_SESSION['error_msg'] =$lang['successfully_done'];
        $_SESSION['msg_type'] =1;
        redirect('sms-configurations');
    }
    else
    {
        $_SESSION['error_msg'] =$lang['general_error'];
        $_SESSION['msg_type'] =-1;
        redirect('sms-configurations');
    }
}
?>
<div class="content-inner chart-cont">
    <div class="col personal-info " align="center">
        <!--                <div class="alert alert-info alert-dismissable">-->
        <!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
        <!--                    <i class="fa fa-coffee"></i>-->
        <!--                    This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
        <!--                </div>-->
        <div class="card form" id="form1">
            <div class="card-header">
                <h3><i class="fa fa-archive"></i>SMS Configurations</h3>
            </div>
            <br>
            <form action="" enctype="multipart/form-data"
                  method="post"
                  class="form-horizontal  col-8 ">
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Username:</label>
                    <div class="col-lg-8">
                        <input value="" required
                               class="form-control" placeholder="Username" name="username" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Password:</label>
                    <div class="col-lg-8">
                        <input required class="form-control" name="password" placeholder="Password" type="password"
                               value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">From:</label>
                    <div class="col-lg-8">
                        <input required class="form-control" name="from" placeholder="From" type="text"
                               value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left "></label>
                    <div class="col-md-8">
                        <button type="submit" name="submit-configurations" id="submit-configurations"
                                class="btn btn-general btn-blue mr-2">Submit
                        </button>
                        <span></span>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>



