<?php include "../layout/header.php"; ?>

    <div  class="container-fluid bg-light-gray">
        <div class="row">

            <div class="col personal-info " align="center">
<!--                <div class="alert alert-info alert-dismissable">-->
<!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
<!--                    <i class="fa fa-coffee"></i>-->
<!--                    This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
<!--                </div>-->
                <h3 class="mt-5 mb-5">Register</h3>

                <form action="requests/register.php"  method="post" class="form-horizontal  col-8 " >
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left ">Full name:</label>
                        <div class="col-lg-8">
                            <input required  class="form-control" name="full-name" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left ">Mobile:</label>
                        <div class="col-lg-8">
                            <input required class="form-control"name="mobile" type="tel" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left ">Email:</label>
                        <div class="col-lg-8">
                            <input  class="form-control"name="email" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left ">Gender:</label>
                        <div class="col-lg-8">
                            <input required  class="text-left" type="radio" name="gender" value="male" ><label class="mr-5">Male</label>
                            <input required class="text-left" class="ml-5" type="radio" value="female" name="gender"><label>Female</label>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left ">Birthday:</label>
                        <div class="col-lg-8">
                            <input  class="form-control" name="birthday" type="date" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-8 control-label text-left ">Address:</label>
                        <div class="col-lg-8">
                            <input required class="form-control" name="address" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left ">Password:</label>
                        <div class="col-md-8">
                            <input required class="form-control" name="password" type="password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left ">Confirm password:</label>
                        <div class="col-md-8">
                            <input required class="form-control" name="re-password" type="password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left "></label>
                        <div class="col-md-8">
                            <input type="submit" class=" form-group btn btn-general btn-white" value="Submit">
                            <span></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>



<?php include "../layout/footer.php"; ?>