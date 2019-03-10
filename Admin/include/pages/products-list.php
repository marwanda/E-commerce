<?php
var_dump($_SESSION);
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



$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$query = "select p.id, p.name, p.price, p.price_vip, p.description_ar, p.description_en, p.pic, p.subcategory_id, p.quantity, p.date, p.status, s.name_ar as sub_name_ar, s.name_en as sub_name_en, s.status as sub_status, s.category_id, c.name_ar as cat_name_ar, c.name_en as cat_name_en, c.status as cat_status from product p inner join subcategory s on p.subcategory_id=s.id inner join category c on s.category_id = c.id where s.status=1 and c.status=1 order by date desc";


if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = $lang['sql_problem'];
    echo '<input id="error-msg" data-type="error"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    $_SESSION['error_msg'] ='';
}

//
//
//
//
//
////    $_SESSION['error_msg'] = $lang['Can_nor_edit'];
////    echo '<script language="javascript">';
////    echo 'alert("'.$_SESSION['error_msg'].'")';
////    echo '</script>';
////    $_SESSION['error_msg']='';
////    mysqli_close($link);
////    exit();
//
//
///* free result set */
////    mysqli_free_result($result);
//
//
//
//
//var_dump($_SESSION);
//

?>


<div id="confirm-modal-delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are You Sure?</h4>
            </div>
            <div class="modal-footer">
                <div class="row" style="margin: auto;">
                    <div class="col">
                        <button id="yes-delete-product" type="button" class="btn btn-info btn" data-dismiss="modal">
                            Yes
                        </button>
                    </div>
                    <div class="col">
                        <button id="no-delete-product" type="button" class="btn btn-info btn" data-dismiss="modal">No
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div id="confirm-modal-product-status" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are You Sure?</h4>
            </div>

            <div class="modal-footer">
                <div class="row" style="margin: auto;">
                    <div class="col">
                        <button id="yes-status-product" type="button" class="btn btn-info btn" data-dismiss="modal">
                            Yes
                        </button>
                    </div>
                    <div class="col">
                        <button id="no-status-product" type="button" class="btn btn-info btn" data-dismiss="modal">No
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<div class="content-inner chart-cont">

    <div class="row ">
        <h2 class="mb-5">Products Listing</h2>
        <table style="width: 100% " id="datatable" class="table table-responsive table-hover mt-5 table-bordered ">
            <thead class="bg-info " style="color: white;">
            <tr>
                <th class="" style="">#</th>
                <th class="">Name</th>
                <th class="">Thumbnail</th>
                <th class="">Price</th>
                <th class="">Special Price</th>
                <th class="">Date</th>
                <th class="">Category</th>
                <th class="">Subcategory</th>
                <th class="" style="">Status</th>
                <th class="" style="width: 100px;">Actions</th>
            </tr>
            </thead>
            <tbody class="table-primary">
            <?php

            if ($result = mysqli_query($link, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr class="product-row" id="product-<?php echo $row['id']; ?>">
                        <td class=""><?php echo $row['id']; ?></td>
                        <td class=""><?php echo $row['name']; ?></td>
                        <td class=""><img class="thumb"
                                          src="<?php echo $FILES_ROOT . 'images/products/large/' . $row['pic']; ?>"
                                          alt=""></td>
                        <td class=""><?php echo $row['price']; ?></td>
                        <td class=""><?php echo $row['price_vip']; ?></td>
                        <td class=""><?php echo $row['date']; ?></td>
                        <td class=""><?php if ($_SESSION['lang'] == 'ar') echo $row['cat_name_ar']; else echo $row['cat_name_en']; ?></td>
                        <td class=""><?php if ($_SESSION['lang'] == 'ar') echo $row['sub_name_ar']; else echo $row['sub_name_en']; ?></td>
                        <td class="">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-info <?php if ($row['status'] == 1) echo 'active'; ?> ">
                                    <input <?php if ($row['status'] == 1) echo 'checked'; ?> type="radio" name="options"
                                                                                             data-id="<?php echo $row['id']; ?>"
                                                                                             class="active-product"
                                                                                             autocomplete="off"> Active
                                </label>
                                <label class="btn btn-info btn <?php if ($row['status'] == 2) echo 'active'; ?>">
                                    <input <?php if ($row['status'] == 2) echo 'checked'; ?> type="radio" name="options"
                                                                                             data-id="<?php echo $row['id']; ?>"
                                                                                             class="inactive-product "
                                                                                             autocomplete="off">
                                    Inactive</label>
                            </div>
                        </td>
                        <td class="">

                            <button data-id="<?php echo $row['id']; ?>" class="btn btn-blue btn edit-product"><i
                                        class="fa fa-pencil-square-o  "
                                        aria-hidden="true"></i></button>
                            <button data-id="<?php echo $row['id']; ?>" class="btn btn-blue btn delete-product"><i
                                        class="fa fa-trash-o  "
                                        aria-hidden="true"></i></button>

                        </td>
                    </tr>
                    <?php
                }
            } else {
                $_SESSION['error_msg']=$lang['sql_problem'];
                $_SESSION['msg_type']=-1;
                redirect('orders-list');
                mysqli_close($link);
                exit();
            }
            ?>


            </tbody>
        </table>
    </div>
</div>



