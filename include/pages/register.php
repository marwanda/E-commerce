

    <div  class="container-fluid bg-light-gray">
        <div class="row">

            <div class="col personal-info " align="center">

<!--                <div class="alert alert-info alert-dismissable">-->
<!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
<!--                    <i class="fa fa-coffee"></i>-->
<!--                    This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
<!--                </div>-->

                <h3 class="mt-5 mb-5"><?php echo $lang['register']?></h3>

                <form id="register-form-user" action="requests/register.php"  method="post" class="form-horizontal  col-8 " >
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left "><?php echo $lang['full_name'] ?>:</label>
                        <div class="col-lg-8">
                            <input placeholder="<?php echo $lang['full_name'] ?>" required  class="form-control" name="full-name" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left "><?php echo $lang['mobile'] ?>:</label>
                        <div class="col-lg-8">
                            <input placeholder="<?php echo $lang['mobile'] ?>" required class="form-control"name="mobile" type="tel" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left "><?php echo $lang['email'] ?>:</label>
                        <div class="col-lg-8">
                            <input placeholder="<?php  echo $lang['email'] ?>"  class="form-control"name="email" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left "><?php  echo $lang['gender'] ?>:</label>
                        <div class="col-lg-8">
                            <input required  class="text-left" type="radio" name="gender" value="0" ><label class="mr-5"><?php echo $lang['male'] ?></label>
                            <input required class="text-left" class="ml-5" type="radio" value="1" name="gender"><label><?php echo $lang['female'] ?></label>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left "><?php echo $lang['birthday'] ?>:</label>
                        <div class="col-lg-8">
                            <input placeholder="<?php echo $lang['birthday'] ?>"  class="form-control" name="birthday" type="date" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left "><?php echo $lang['address'] ?>:</label>
                        <div class="col-lg-8">
                            <input placeholder="<?php echo $lang['address'] ?>" required class="form-control" name="address" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left "><?php echo $lang['password'] ?>:</label>
                        <div class="col-md-8">
                            <input id="register-password-user" placeholder="<?php echo $lang['password'] ?>" required class="form-control" name="password" type="password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left "><?php echo $lang['re_password'] ?>:</label>
                        <div class="col-md-8">
                            <input id="register-re-password-user" placeholder="<?php echo $lang['re_password'] ?>" required class="form-control" name="re-password" type="password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left "></label>
                        <div class="col-md-8">
                            <input id="submit-registration-user" type="submit" class=" form-group btn btn-general btn-white" value="<?php echo $lang['submit'] ?>">
                            <span></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>



