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
                <h3><i class="fa fa-newspaper-o"></i> News Info</h3>
            </div>
            <br>
            <form action=""  method="post" class="form-horizontal  col-8 " >
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Title:</label>
                    <div class="col-lg-8">
                        <input required  class="form-control" name="title" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Content:</label>
                    <div class="col-lg-8">
                        <textarea rows="10" required  class="form-control" name="content" type="text" value=""></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Picture:</label>
                    <div class="col-md-8">
                        <input required type="file" multiple class="form-control" name="picture" accept="image/*" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left "></label>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-general btn-blue mr-2">Submit</button>
                        <span></span>
                    </div>
                </div>
            </form>

        </div>

    </div>





</div>


<?php include '../layout/footer.php'?>

