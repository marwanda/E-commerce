<?php

if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg']) && isset($_SESSION['msg_type'])) {
    if($_SESSION['msg_type']==1)
        echo '<input id="error-msg" data-type="success"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    else if($_SESSION['msg_type']==-1)
        echo '<input id="error-msg" data-type="error"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    else
        echo '<input id="error-msg" data-type="warn"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    $_SESSION['error_msg'] = '';
    $_SESSION['msg_type'] = '';

}


//var_dump($_SESSION);
if ($_POST) {

    $code = isset($_POST['verification-code']) ? make_safe($_POST['verification-code']) : null;
    $link = connectDb_mysqli();
    $sq = "'";
    $query = "select * from user where id = {$_SESSION['user_id_verification']} and code = {$code}";
    $query2 = "update user set role = 2 where id = {$_SESSION['user_id_verification']}";
//    var_dump($query);exit;

    if (mysqli_connect_errno()) {
        $_SESSION['error_msg'] = $lang['sql_problem'];
        echo '<input id="error-msg" data-type="error"  type="hidden" value="'.$_SESSION['error_msg'].'">';
        $_SESSION['error_msg'] ='';
    }

    if ($result = mysqli_query($link, $query)) {

        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                if (mysqli_query($link, $query2) === TRUE) {
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['user_id'] = $_SESSION['user_id_verification'];
                    unset($_SESSION['user_id_verification']);
                    $_SESSION['change_password'] = 1;
                    if ($_SESSION['role'] == 2 || $_SESSION['role'] == 3) {
                        $query2 = "select o.id from orders o inner join user u on o.user_id = u.id where u.id= {$_SESSION['user_id']} and (o.status=1 or o.status=2)";
                        $date = date('Y-m-d', time());
                        $query3 = "insert into orders (user_id, status, date) VALUES ({$_SESSION['user_id']},1,{$sq}{$date}{$sq})";

                        if ($result2 = mysqli_query($link, $query2)) {

                            $count = mysqli_num_rows($result2);
                            if ($count > 0) {

                                while ($row1 = mysqli_fetch_assoc($result2)) {


                                    $_SESSION['order_id'] = $row1['id'];


                                }

                            } else {
                                if (mysqli_query($link, $query3) === TRUE) {
                                    $last_id = mysqli_insert_id($link);
                                    $_SESSION['order_id'] = $last_id;

                                } else {
                                    $_SESSION['error_msg'] = $lang['general_error'];
                                    $_SESSION['msg_type'] = -1;
                                    mysqli_close($link);
                                    redirect('home', $path);
                                    exit();
                                }


                            }


                        } else {

                            $_SESSION['error_msg'] = $lang['general_error'];
                            $_SESSION['msg_type'] = -1;
                            mysqli_close($link);
                            redirect('home', $path);
                            exit();
                        }
                        mysqli_close($link);
                        redirect('profile');
                        exit;
                    } else {
                        $_SESSION['error_msg'] = $lang['general_error'];
                        $_SESSION['msg_type'] = -1;
                        mysqli_close($link);
                        redirect('home', $path);
                        exit();
                    }

                }else
                {
                    $_SESSION['error_msg'] = $lang['general_error'];
                    $_SESSION['msg_type'] = -1;
                    mysqli_close($link);
                    redirect('home', $path);
                    exit();
                }

            }
        } else {

            $_SESSION['error_msg'] = $lang['wrong_code'];
            $_SESSION['msg_type'] = -1;
            redirect('reset-password');
            mysqli_close($link);
            exit;
        }


    } else {

        $_SESSION['error_msg'] = $lang['general_error'];
        $_SESSION['msg_type'] = -1;
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
                <input required id="mobile_number_verification" style="width: 50%; margin: auto;"
                       class="form-control mt-3 mb-1"
                       value="<?php if (isset($_SESSION['phone'])) echo $_SESSION['phone']; ?>"
                       placeholder="<?php if (!isset($_SESSION['phone'])) echo $lang['enter_mobile']; ?>" </input>
                <div class=" mt-3 ">
                    <a href="" id="send-verification-code"><?php echo $lang['send'] ?></a>
                    <!--or <a id="goback" onclick="goBack();" href="" > Go Back</a>-->
                </div>

                <br>

                <!--                    --><?php //echo $lang['verification_info2'] ?>
            </h5>
        </div>

        <form id="verification-form" method="post" class="form-horizontal col-8 hidden ">
            <div class="form-group ">
                <label class="col-lg-8 control-label text- "><?php echo $lang['verification_code'] ?></label>
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
        <!--            <div class="row  ">-->
        <!--                <div class="col-8 alert alert-info alert-dismissable bg-danger border-danger  "-->
        <!--                     style=" color: #FFFFFF;margin: auto; opacity: 0.7">-->
        <!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
        <!--                    <strong>--><?php //echo $lang['wrong_code'] ?><!--</strong>-->
        <!--                </div>-->
        <!--            </div>-->
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
