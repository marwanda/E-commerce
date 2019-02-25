<?php
$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$subcategory_query = "select * from category";


?>
<div class="content-inner chart-cont">
    <div class="col personal-info " align="center">
        <!--                <div class="alert alert-info alert-dismissable">-->
        <!--                    <a class="panel-close close" data-dismiss="alert">×</a>-->
        <!--                    <i class="fa fa-coffee"></i>-->
        <!--                    This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
        <!--                </div>-->
        <div class="card form" id="form1">
            <div class="card-header">
                <h3><i class="fa fa-archive"></i> Product Info</h3>
            </div>
            <br>
            <form action="requests/submit-product.php" enctype="multipart/form-data"  method="post" class="form-horizontal  col-8 " >
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Product name (Arabic):</label>
                    <div class="col-lg-8">
                        <input required  class="form-control" name="product-name-ar" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Product name (English):</label>
                    <div class="col-lg-8">
                        <input required  class="form-control" name="product-name-en" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Price:</label>
                    <div class="col-lg-8">
                        <input required class="form-control" name="price" type="number" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Special Price:</label>
                    <div class="col-lg-8">
                        <input required class="form-control" name="special-price" type="number" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Description (Arabic):</label>
                    <div class="col-lg-8">
                        <input  class="form-control" name="description-ar" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label text-left ">Description (English):</label>
                    <div class="col-lg-8">
                        <input  class="form-control" name="description-en" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Subcategory:</label>
                    <div class="col-md-8">
                        <select id="subcategory-select" required class="form-control " name="subcategory" >
                            <option selected value="-1">Please Choose</option>
                            <?php
                            if ($result = mysqli_query($link, $subcategory_query)) {

                                while ($row = mysqli_fetch_assoc($result)) {
                                    if($_SESSION['lang']=='ar')
                                    {
                                       if($row['status']==1)
                                       {
                                           echo '<option value="'.$row['id'].'" >'.$row['name_ar'].'</option>';
                                       }


                                    }
                                    else
                                    {
                                        if($row['status']==1)
                                        {
                                            echo '<option value="'.$row['id'].'" >'.$row['name_en'].'</option>';
                                        }
                                    }


                                }
                                mysqli_close($link);

                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">thumbnail:</label>
                    <div class="col-md-8">
                        <input required type="file" class="form-control" name="picture" accept="image/*" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left ">Pictures:</label>
                    <div class="col-md-8">
                        <input required type="file" multiple class="form-control" name="pictures[]" accept="image/*" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8 control-label text-left "></label>
                    <div class="col-md-8">
                        <button type="submit" id="submit-product" name="submit-product" class="btn btn-general btn-blue mr-2">Submit</button>
                        <span></span>
                    </div>
                </div>
            </form>

        </div>

    </div>





</div>



