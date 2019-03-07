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
?>
<div id="home-p" class="home-p pages-head3 text-center">
    <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;"><?php echo $lang['create_new_offer']?></h1>
    </div><!--/end container-->
</div>
<div  class="container-fluid bg-light-gray">
    <div class="row">

        <div class="col personal-info " align="center">
            <h3 class="mt-5 mb-5"><?php echo $lang['project_form_title']?></h3>
            <form action="requests/offer.php"  method="post" class="form-horizontal  col-8 " enctype="multipart/form-data" >
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements"><?php echo $lang['full_name'] ?></label>
                    <div class="col-lg-8">
                        <input required  class="form-control" placeholder="<?php echo $lang['name']?>" name="full-name" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements "><?php echo $lang['mobile'] ?></label>
                    <div class="col-lg-8">
                        <input required class="form-control" placeholder="<?php echo $lang['mobile']?>" name="mobile" type="tel" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements "><?php echo $lang['email'] ?></label>
                    <div class="col-lg-8">
                        <input  class="form-control"name="email" placeholder="<?php echo $lang['email']?>" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label align-elements "><?php echo $lang['file'] ?></label>
                    <div class="col-lg-8">
                        <input  class="form-control" name="file" type="file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left "></label>
                    <div class="col-md-8">
                        <input required type="submit" name="submit-offer" class=" form-group btn btn-general btn-white" value="<?php echo $lang['submit'] ?>">
                        <span></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
</div>



