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

//$phone='';
//$name='';
//$email='';
//$gender='';
//$birthday='';
//$address='';

$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';

$query = "select * from gallary_home where type= 9";

if ($result = mysqli_query($link, $query)) {
/*    style="background-image: url('files/images/gallary/large/<?php echo $pic_name ?>')"*/
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $pic_name = $row['name'];
            $pic_text = explode('-', $row['text']);

        }
    }
}

$query = "select * from user where id = {$_SESSION['user_id']}";

if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = $lang['sql_problem'];
    echo '<input id="error-msg" data-type="error"  type="hidden" value="' . $_SESSION['error_msg'] . '">';
    $_SESSION['error_msg'] = '';
}

if ($result = mysqli_query($link, $query)) {

    while ($row = mysqli_fetch_assoc($result)) {

        $phone = $row['phone'];
        $name = $row['name'];
        $email = $row['email'];
        $gender = $row['gender'];
        $birthday = $row['birthdate'];
        $address = $row['address'];

    }

//    $_SESSION['error_msg'] = $lang['Can_nor_edit'];
//    echo '<script language="javascript">';
//    echo 'alert("'.$_SESSION['error_msg'].'")';
//    echo '</script>';
//    $_SESSION['error_msg']='';
//    mysqli_close($link);
//    exit();

}

/* free result set */
//    mysqli_free_result($result);

else {

    $_SESSION['error_msg'] = $lang['general_error'];
    $_SESSION['msg_type'] = -1;
    redirect('home');
    mysqli_close($link);
    exit();

}


//var_dump($_SESSION);


?>
<div id="home-p" style="background-image: url('files/images/gallary/large/<?php echo $pic_name ?>')" class="home-p pages-head1 text-center">
    <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;"><?php echo $lang['edit_profile'] ?></h1>
    </div><!--/end container-->
</div>
<div class="container-fluid bg-light-gray">
    <div class="container">
        <div class="row">
            <!-- left column -->
            <!-- edit form column -->
            <div align="center" class="col-12 personal-info mt-5">
                <!--                <div class="alert alert-info alert-dismissable">-->
                <!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
                <!--                    <i class="fa fa-coffee"></i>-->
                <!--                    This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
                <!--                </div>-->
                <h3><?php echo $lang['personal_info'] ?></h3>
                <!--            <ul class="nav nav-tabs">-->
                <!--                <li class="active"><a data-toggle="tab" href="#profile">profile</a></li>-->
                <!--                <li><a data-toggle="tab" href="#change-password">change password</a></li>-->
                <!---->
                <!--            </ul>-->
                <!---->
                <!--            <div class="tab-content">-->
                <!--                <div id="profile" class="tab-pane fade in active">-->
                <!--
                               </div>-->
                <!--                <div id="change-password" class="tab-pane fade">-->
                <!--
                               </div>-->
                <!---->
                <!--            </div>-->

                <div class="service-h-tab">
                    <nav class="nav nav-tabs" id="myTab" role="tablist">
                        <a class="nav-item nav-link <?php if (!isset($_SESSION['change_password'])) { ?>
                        active
    <?php } ?> " id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                           role="tab" aria-controls="nav-profile"><?php echo $lang['profile'] ?></a>
                        <a class="nav-item nav-link <?php if (isset($_SESSION['change_password']) && $_SESSION['change_password'] == 1) { ?>
                        active
    <?php } ?>  " id="nav-password-tab" data-toggle="tab" href="#nav-password"
                           role="tab" aria-controls="nav-password"><?php echo $lang['change_password'] ?></a>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade <?php if (!isset($_SESSION['change_password'])) { ?>
  show active  <?php } ?>" id="nav-profile" role="tabpanel"
                             aria-labelledby="nav-profile-tab">
                            <form id="" action="requests/edit-profile.php" method="post"
                                  class="form-horizontal  col-8 ">
                                <div class="form-group">
                                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['full_name'] ?>
                                        :</label>
                                    <div class="col-lg-8">
                                        <input placeholder="<?php echo $lang['full_name'] ?>" required
                                               class="form-control" name="full-name" type="text"
                                               value="<?php echo isset($name) ? $name : null; ?>">
                                    </div>
                                </div>
<!--                                <div class="form-group">-->
<!--                                    <label class="col-lg-8 control-label align-elements">--><?php //echo $lang['mobile'] ?>
<!--                                        :</label>-->
<!--                                    <div class="col-lg-8">-->
<!--                                        <input placeholder="--><?php //echo $lang['mobile'] ?><!--" required class="form-control"-->
<!--                                               name="mobile" type="tel"-->
<!--                                               value="--><?php //echo isset($phone) ? $phone : null; ?><!--">-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="form-group">
                                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['email'] ?>
                                        :</label>
                                    <div class="col-lg-8">
                                        <input placeholder="<?php echo $lang['email'] ?>" class="form-control"
                                               name="email" type="text"
                                               value="<?php echo isset($email) ? $email : null; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['gender'] ?>
                                        :</label>
                                    <div class="col-lg-8">
                                        <input <?php echo (isset($gender) && $gender == 0) ? 'checked' : null; ?>
                                                required class="align-elements" type="radio" name="gender"
                                                value="0"><label class="male_label"><?php echo $lang['male'] ?></label>
                                        <input <?php echo (isset($gender) && $gender == 1) ? 'checked' : null; ?>
                                                required class="align-elements" class="" type="radio" value="1"
                                                name="gender"><label><?php echo $lang['female'] ?></label>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['birthday'] ?>
                                        :</label>
                                    <div class="col-lg-8">
                                        <input placeholder="<?php echo $lang['birthday'] ?>" class="form-control"
                                               name="birthday" type="date"
                                               value="<?php echo isset($birthday) ? $birthday : null; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['address'] ?>
                                        :</label>
                                    <div class="col-lg-8">
                                        <input placeholder="<?php echo $lang['address'] ?>" required
                                               class="form-control" name="address" type="text"
                                               value="<?php echo isset($address) ? $address : null; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-8 control-label align-elements"></label>
                                    <div class="col-md-8">
                                        <input id="submit-edit-user" type="submit"
                                               class=" form-group btn btn-general btn-white"
                                               value="<?php echo $lang['submit'] ?>">
                                        <span></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade <?php if (isset($_SESSION['change_password']) && $_SESSION['change_password'] == 1) { ?>
                        show active
<?php } ?> " id="nav-password" role="tabpanel"
                             aria-labelledby="nav-password-tab">
                            <form id="change-password-form" action="requests/change-password.php" method="post"
                                  class="form-horizontal  col-8 "
                                  role="form">
                                <?php if (!isset($_SESSION['change_password'])) { ?>
                                    <div class="form-group">
                                        <label class="col-lg-8 control-label align-elements"><?php echo $lang['current_password'] ?>
                                            :</label>
                                        <div class="col-lg-8">
                                            <input required placeholder="<?php echo $lang['current_password'] ?>"
                                                   class="form-control"
                                                   id="current-password" name="current-password" type="password"
                                                   value="">
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="form-group">
                                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['new_password'] ?>
                                        :</label>
                                    <div class="col-lg-8">
                                        <input required placeholder="<?php echo $lang['new_password'] ?>"
                                               class="form-control"
                                               id="new-password" name="new-password" type="password"
                                               value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['re_password'] ?>
                                        :</label>
                                    <div class="col-lg-8">
                                        <input placeholder="<?php echo $lang['re_password'] ?>" required
                                               class="form-control" id="re-password" type="password"
                                               value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-8 control-label align-elements"></label>
                                    <div class="col-md-8">
                                        <input id="submit-change-password" type="submit"
                                               class=" form-group btn btn-general btn-white"
                                               value="<?php echo $lang['submit'] ?>">
                                        <span></span>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <!--        <div class="col-4 personal-info mt-5">-->
            <!--            <h3>Change password</h3>-->
            <!---->
            <!--            <form class="form-group col mt-5" role="form">-->
            <!--                <div class="form-group">-->
            <!--                    <label class="col-md-8 control-label text-left ">Current password:</label>-->
            <!--                    <div class="col">-->
            <!--                        <input required class="form-control" name="password" type="password" value="">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="form-group">-->
            <!--                    <label class="col-md-8 control-label text-left ">New Password:</label>-->
            <!--                    <div class="col">-->
            <!--                        <input required class="form-control" name="password" type="password" value="">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="form-group">-->
            <!--                    <label class="col-md-8 control-label text-left ">Confirm new password:</label>-->
            <!--                    <div class="col">-->
            <!--                        <input required class="form-control" name="re-password" type="password" value="">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-2">-->
            <!--                    <input type="button" class="form-group btn  btn-white" value="Save Changes">-->
            <!--                    <span></span>-->
            <!--                </div>-->
            <!---->
            <!--            </form>-->
            <!--            <div class="row ">-->
            <!--                <div  class="col  alert alert-info alert-dismissable bg-danger border-danger  " style=" color: #FFFFFF;margin: auto; opacity: 0.7">-->
            <!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
            <!--                    <strong >Wrong passward or new passwords are not matched!</strong>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
        </div>
    </div>


</div>
