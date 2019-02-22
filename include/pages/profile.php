<?php
if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])) {

    echo '<script language="javascript">';
    echo "alert('".$_SESSION['error_msg']."')";
    echo '</script>';
    $_SESSION['error_msg']='';
}


//$phone='';
//$name='';
//$email='';
//$gender='';
//$birthday='';
//$address='';

$link = mysqli_connect("localhost", "root", "", "itsource");
$sq = "'";
$path = '../';
$query = "select * from user where id = {$_SESSION['user_id']}";

if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    echo '<script language="javascript">';
    echo 'alert("'.$_SESSION['error_msg'].'")';
    echo '</script>';
    $_SESSION['error_msg']='';
}

if ($result = mysqli_query($link, $query)) {

    while ($row = mysqli_fetch_assoc($result)) {

        $phone=$row['phone'];
        $name=$row['name'];
        $email=$row['email'];
        $gender=$row['gender'];
        $birthday=$row['birthdate'];
        $address=$row['address'];

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
    redirect('home');
    mysqli_close($link);
    exit();

}



//var_dump($_SESSION);


?>
    <div class="container-fluid bg-light-gray">
        <div class=" row ">
            <div class="col"> <h1 class="mt-5 ml-5"><?php echo $lang['edit_profile'] ?></h1></div>
        </div>
<div class="container">
    <hr>
    <div class="row">
        <!-- left column -->
        <!-- edit form column -->
        <div align="center" class="col-12 personal-info mt-5"  >
            <!--                <div class="alert alert-info alert-dismissable">-->
            <!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
            <!--                    <i class="fa fa-coffee"></i>-->
            <!--                    This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
            <!--                </div>-->
            <h3><?php echo $lang['personal_info'] ?></h3>

            <form id="" action="requests/edit-profile.php"  method="post" class="form-horizontal  col-8 " >
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['full_name'] ?>:</label>
                    <div class="col-lg-8">
                        <input placeholder="<?php echo $lang['full_name'] ?>" required  class="form-control" name="full-name" type="text" value="<?php echo isset($name)?$name: null; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['mobile'] ?>:</label>
                    <div class="col-lg-8">
                        <input placeholder="<?php echo $lang['mobile'] ?>" required class="form-control"name="mobile" type="tel" value="<?php echo isset($phone)?$phone: null; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['email'] ?>:</label>
                    <div class="col-lg-8">
                        <input placeholder="<?php  echo $lang['email'] ?>"  class="form-control"name="email" type="text" value="<?php echo isset($email)?$email: null; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements"><?php  echo $lang['gender'] ?>:</label>
                    <div class="col-lg-8">
                        <input <?php echo (isset($gender)&& $gender==0)?'checked':null; ?> required  class="align-elements" type="radio" name="gender" value="0" ><label class="male_label"><?php echo $lang['male'] ?></label>
                        <input <?php echo (isset($gender)&& $gender==1)?'checked':null; ?> required class="align-elements" class="" type="radio" value="1" name="gender"><label><?php echo $lang['female'] ?></label>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['birthday'] ?>:</label>
                    <div class="col-lg-8">
                        <input placeholder="<?php echo $lang['birthday'] ?>"  class="form-control" name="birthday" type="date" value="<?php echo isset($birthday)?$birthday: null; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['address'] ?>:</label>
                    <div class="col-lg-8">
                        <input placeholder="<?php echo $lang['address'] ?>" required class="form-control" name="address" type="text" value="<?php echo isset($address)?$address: null; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label align-elements"></label>
                    <div class="col-md-8">
                        <input id="submit-edit-user" type="submit" class=" form-group btn btn-general btn-white" value="<?php echo $lang['submit'] ?>">
                        <span></span>
                    </div>
                </div>
            </form>
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
    <hr>
</div>


    </div>
