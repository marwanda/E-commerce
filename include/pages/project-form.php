<?php
if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])) {
    echo '<script language="javascript">';
    echo "alert('".$_SESSION['error_msg']."')";
    echo '</script>';
    $_SESSION['error_msg']='';
}

?>
<div class="container-fluid bg-light-gray">
    <div class="row">
        <div class="col personal-info " align="center">
            <h3 class="mt-5 mb-5"><?php echo $lang['project_form_title']?></h3>
            <form action="requests/project.php"  method="post" class="form-horizontal  col-8 " enctype="multipart/form-data" >
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements "><?php echo $lang['full_name'] ?></label>
                    <div class="col-lg-8">
                        <input required class="form-control" name="full-name" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements "><?php echo $lang['mobile'] ?></label>
                    <div class="col-lg-8">
                        <input required class="form-control" name="mobile" type="tel" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements "><?php echo $lang['email'] ?></label>
                    <div class="col-lg-8">
                        <input class="form-control" name="email" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements "><?php echo $lang['file'] ?></label>
                    <div class="col-lg-8">
                        <input class="form-control" name="file" type="file"
                               accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label align-elements "></label>
                    <div class="col-md-8">
                        <input  name="submit-project" required type="submit" class=" form-group btn btn-general btn-white"  value="<?php echo $lang['submit'] ?>">

                        <span></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
</div>



