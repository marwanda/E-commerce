<?php

if (isset($_SESSION['user_id']) && isset($_SESSION['role']) && $_SESSION['role'] == 2)
    redirect('home');

if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {

    echo '<script language="javascript">';
    echo 'alert("' . $_SESSION['msg'] . '")';
    echo '</script>';
    $_SESSION['msg'] = '';
}

//var_dump($_SESSION);
if ($_POST) {
    $code = isset($_POST['verification-code']) ? make_safe($_POST['verification-code']) : null;
    $link = mysqli_connect("localhost", "root", "", "itsource");
    $sq = "'";
    $query = "select * from user where id = {$_SESSION['user_id']} and code = {$code}";
    $query2 = "update user set role = 2 where id = {$_SESSION['user_id']}";


    if (mysqli_connect_errno()) {

        $_SESSION['msg'] = mysqli_connect_error();
        mysqli_close($link);
        echo '<script language="javascript">';
        echo 'alert("' . $_SESSION['msg'] . '")';
        echo '</script>';
        $_SESSION['msg'] = '';
        redirect('verification');
        exit;

    }
    if ($result = mysqli_query($link, $query)) {

        while ($row = mysqli_fetch_assoc($result)) {


            if (mysqli_query($link, $query2) === TRUE) {
                $_SESSION['role'] = 2;
                mysqli_close($link);
                redirect('home');
                exit();
            }


        }

        $_SESSION['msg'] = $lang['wrong_code'];
        echo '<script language="javascript">';
        echo 'alert("' . $_SESSION['msg'] . '")';
        echo '</script>';
        $_SESSION['msg'] = '';
        mysqli_close($link);


    } else {

        $_SESSION['error_msg'] = $lang['general_error'];
        mysqli_close($link);
        redirect('home');

    }

}
//
?>
<div class="container-fluid bg-light-gray " style="margin-bottom: 70px">

        <div class="col personal-info " align="center">

            <div class="row text-center">
                <h5 style="margin: auto" class="mt-5 mb-5"><?php echo $lang['verification_info1'] ?>
                    <input id="mobile_number_verification" style="width: 50%; margin: auto;"
                           class="form-control mt-3 mb-1" value="<?php if(isset($_SESSION['phone'])) echo $_SESSION['phone'];?>" placeholder="<?php if(!isset($_SESSION['phone'])) echo $lang['enter_mobile']; ?>" </input>
                    <div class=" mt-3 ">
                        <a href="" id="send-verification-code"><?php echo $lang['send'] ?></a>
<!--or <a id="goback" onclick="goBack();" href="" > Go Back</a>-->
                    </div>

                    <br>

                    <?php echo $lang['verification_info2'] ?>
                </h5>
            </div>

            <form method="post" class="form-horizontal col-8 ">
                <div class="form-group ">
                    <label class="col-lg-8 control-label text-left ">Verification code</label>
                    <div class="col-lg-8">
                        <input placeholder="<?php echo $lang['verification_code'] ?>" required class="form-control"
                               name="verification-code" type="number" value="">
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-8 control-label text-left "></label>
                    <div class="col-md-8">
                        <input id="submit-verification-code" type="submit" class=" form-group btn btn-general btn-white"
                               value="<?php echo $lang['submit'] ?>">

                    </div>
                </div>
            </form>
            <div class="row  ">
                <div class="col-8 alert alert-info alert-dismissable bg-danger border-danger  "
                     style=" color: #FFFFFF;margin: auto; opacity: 0.7">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    <strong><?php echo $lang['wrong_code'] ?></strong>
                </div>
            </div>
        </div>


</div>
<script>
    // function goBack() {
    //     window.history.back();
    // }
    //
    // $('#goback').click(function (e) {
    //     e.preventDefault();
    // })
</script>
