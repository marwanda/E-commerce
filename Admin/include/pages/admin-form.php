<div class="content-inner chart-cont">
    <div class="col personal-info " align="center">
        <!--                <div class="alert alert-info alert-dismissable">-->
        <!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
        <!--                    <i class="fa fa-coffee"></i>-->
        <!--                    This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
        <!--                </div>-->
        <div class="card form" id="form1">
            <div class="card-header">
                <h3><i class="fa fa-user-circle"></i> Admin Info</h3>
            </div>
            <br>
            <form id="submit-admin" action="requests/submit-admin.php"  method="post" class="form-horizontal  col-8 " >
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
                    <label class="col-lg-8 control-label text-left ">Job:</label>
                    <div class="col-lg-8">
                        <input required class="form-control" name="job" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Password:</label>
                    <div class="col-md-8">
                        <input required class="form-control" id="password" name="password" type="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Confirm password:</label>
                    <div class="col-md-8">
                        <input required class="form-control" id="re-password" name="re-password" type="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left "></label>
                    <div class="col-md-8">
                        <button type="submit" id="submit-admin" class="btn btn-general btn-blue mr-2">Submit</button>
                        <span></span>
                    </div>
                </div>
            </form>

        </div>

    </div>





</div>



