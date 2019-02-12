<?php include '../layout/header.php'?>

<div class="content-inner chart-cont">
    <div class="col personal-info " align="center">
        <!--                <div class="alert alert-info alert-dismissable">-->
        <!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
        <!--                    <i class="fa fa-coffee"></i>-->
        <!--                    This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
        <!--                </div>-->
        <div class="card form" id="form1">
            <div class="card-header">
                <h3><i class="fa fa-user-circle"></i>Admin Info</h3>
            </div>
            <br>
            <div class="row">
                <form class="form-group col mt-5 col-8" role="form">
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left ">Current password:</label>
                        <div class="col">
                            <input required class="form-control" name="password" type="password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left ">New Password:</label>
                        <div class="col">
                            <input required class="form-control" name="password" type="password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left ">Confirm new password:</label>
                        <div class="col">
                            <input required class="form-control" name="re-password" type="password" value="">
                        </div>
                    </div>
                    <div class="col-2">
                        <input type="button" class="form-group btn  btn-white" value="Save Changes">
                        <span></span>
                    </div>

                </form>
            </div>


        </div>

    </div>





</div>


<?php include '../layout/footer.php'?>

