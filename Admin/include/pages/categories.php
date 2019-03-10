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

$link = connectDb_mysqli();
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$query = "select * from category";
$query2 = "select * from subcategory";

if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = $lang['sql_problem'];
    echo '<input id="error-msg" data-type="error"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    $_SESSION['error_msg'] ='';
}
?>


<div id="category-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <form action="requests/category-management.php" method="post" class="form-horizontal  col ">
                    <div class="form-group">
                        <label class="col control-label text-left ">Category Arabic Name:</label>
                        <div class="col">
                            <input required class="form-control" name="category-name-ar" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Category English Name:</label>
                        <div class="col">
                            <input required class="form-control" name="category-name-en" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left "></label>
                        <div class="col-md-8">
                            <button type="submit" id="submit-category" name="submit-category"
                                    class="btn btn-general btn-blue mr-2">Submit
                            </button>
                            <span></span>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>
<div id="subcategory-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Subcategory</h4>
            </div>
            <div class="modal-body">
                <form action="requests/subcategory-management.php" method="post" class="form-horizontal  col ">
                    <div class="form-group">
                        <label class="col control-label text-left ">Category:</label>
                        <div class="col">
                            <select required name="category-select" id="category-select" class="selectpicker"
                                    menuPlacement="top">
                                <?php
                                echo '<option selected value="-1" >please choose</option>';
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Subcategory Arabic Name:</label>
                        <div class="col">
                            <input required class="form-control" name="subcategory-name-ar" type="text" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col control-label text-left ">Subcategory English Name:</label>
                        <div class="col">
                            <input required class="form-control" name="subcategory-name-en" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label text-left "></label>
                        <div class="col-md-8">
                            <button type="submit" id="submit-subcategory" name="submit-subcategory"
                                    class="btn btn-general btn-blue mr-2">Submit
                            </button>
                            <span></span>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>
<div id="confirm-modal-cat-status" class="modal fade" role="dialog">
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
                        <button id="yes-status-cat" type="button" class="btn btn-info btn" data-dismiss="modal">Yes
                        </button>
                    </div>
                    <div class="col">
                        <button id="no-status-cat" type="button" class="btn btn-info btn" data-dismiss="modal">No
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div id="confirm-modal-sub-status" class="modal fade" role="dialog">
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
                        <button id="yes-status-sub" type="button" class="btn btn-info btn" data-dismiss="modal">Yes
                        </button>
                    </div>
                    <div class="col">
                        <button id="no-status-sub" type="button" class="btn btn-info btn" data-dismiss="modal">No
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div id="confirm-modal-delete-cat" class="modal fade" role="dialog">
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
                        <button id="yes-delete-category" type="button" class="btn btn-info btn" data-dismiss="modal">
                            Yes
                        </button>
                    </div>
                    <div class="col">
                        <button id="no-delete-category" type="button" class="btn btn-info btn" data-dismiss="modal">No
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div id="confirm-modal-delete-sub" class="modal fade" role="dialog">
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
                        <button id="yes-delete-subcategory" type="button" class="btn btn-info btn" data-dismiss="modal">
                            Yes
                        </button>
                    </div>
                    <div class="col">
                        <button id="no-delete-subcategory" type="button" class="btn btn-info btn" data-dismiss="modal">
                            No
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="content-inner chart-cont">
<!--    <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-sub" role="tab" aria-controls="pills-home" aria-selected="true">Categories Listing</a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-cat" role="tab" aria-controls="pills-profile" aria-selected="false">Subcategories Listing</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--    <div class="tab-content" id="pills-tabContent">-->
<!--        <div class="tab-pane fade show active" id="pills-sub" role="tabpanel" aria-labelledby="pills-home-tab">-->
            <div class="row">
                <div class="col-7"><h2 class="mb-5">Categories Listing</h2></div>
                <div class="col-5">
                    <button id="add-category" class="btn btn-info admin-add-btn">Add</i></button>
                </div>
            </div>

            <table style="width: 100% " id="datatable" class="table table-hover mt-5 table-striped">
                <thead>
                <tr class="bg-info text-white">
                    <th class="text-left">#</th>
                    <th class="text-left">Arabic Name</th>
                    <th class="text-left">English Name</th>
                    <th class="text-left" style="">Status</th>
                    <th class="text-left" style="">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php

                if ($result = mysqli_query($link, $query)) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                        <tr class="category-row" id="category-<?php echo $row['id']; ?>">
                            <td class=""><?php echo $row['id']; ?></td>
                            <td class=""><?php echo $row['name_ar']; ?></td>
                            <td class=""><?php echo $row['name_en']; ?></td>
                            <td class="">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-info <?php if ($row['status'] == 1) echo 'active'; ?> ">
                                        <input <?php if ($row['status'] == 1) echo 'checked'; ?> type="radio"
                                                                                                 name="options"
                                                                                                 data-id="<?php echo $row['id']; ?>"
                                                                                                 class="active-category"
                                                                                                 autocomplete="off">
                                        Active
                                    </label>
                                    <label class="btn btn-info btn <?php if ($row['status'] == 2) echo 'active'; ?>">
                                        <input <?php if ($row['status'] == 2) echo 'checked'; ?> type="radio"
                                                                                                 name="options"
                                                                                                 data-id="<?php echo $row['id']; ?>"
                                                                                                 class="inactive-category"
                                                                                                 autocomplete="off">
                                        Inactive</label>
                                </div>
                            </td>
                            <td class="d-flex justify-content-center">
                                <button data-id="<?php echo $row['id']; ?>" class="btn btn-blue btn delete-category">
                                    <i
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
<!--        </div>-->
<!--        <div class="tab-pane fade" id="pills-cat" role="tabpanel" aria-labelledby="pills-profile-tab">-->
<!--            <div class="row">-->
<!--                <div class="col-7"><h2 class="mb-5">Subcategories Listing</h2></div>-->
<!--                <div class="col-5">-->
<!--                    <button id="add-subcategory" class="btn btn-info btn  ">Add</button>-->
<!--                </div>-->
<!--            </div>-->
<!--            <table style="width: 100% " id="datatable2" class="table table-hover mt-5 table-striped">-->
<!--                <thead>-->
<!--                <tr class="bg-info text-white">-->
<!--                    <th class="text-left">#</th>-->
<!--                    <th class="text-left">#</th>-->
<!--                    <th class="text-left">Arabic Name</th>-->
<!--                    <th class="text-left">English Name</th>-->
<!--                    <th class="text-left" style="">Status</th>-->
<!--                    <th class="text-left" style="">Actions</th>-->
<!---->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                --><?php
//
//                if ($result = mysqli_query($link, $query2)) {
//                    while ($row = mysqli_fetch_assoc($result)) {
//
//                        ?>
<!--                        <tr class="subcategory-row" id="subcategory---><?php //echo $row['id']; ?><!--">-->
<!--                            <td class="">--><?php //echo $row['id']; ?><!--</td>-->
<!--                            <td class="">--><?php //echo $row['category_id']; ?><!--</td>-->
<!--                            <td class="">--><?php //echo $row['name_ar']; ?><!--</td>-->
<!--                            <td class="">--><?php //echo $row['name_en']; ?><!--</td>-->
<!--                            <td class="">-->
<!--                                <div class="btn-group btn-group-toggle" data-toggle="buttons">-->
<!--                                    <label class="btn btn-info --><?php //if ($row['status'] == 1) echo 'active'; ?><!-- ">-->
<!--                                        <input --><?php //if ($row['status'] == 1) echo 'checked'; ?><!-- type="radio"-->
<!--                                                                                                 name="options"-->
<!--                                                                                                 data-id="--><?php //echo $row['id']; ?><!--"-->
<!--                                                                                                 class="active-subcategory"-->
<!--                                                                                                 autocomplete="off">-->
<!--                                        Active-->
<!--                                    </label>-->
<!--                                    <label class="btn btn-info btn --><?php //if ($row['status'] == 2) echo 'active'; ?><!--">-->
<!--                                        <input --><?php //if ($row['status'] == 2) echo 'checked'; ?><!-- type="radio"-->
<!--                                                                                                 name="options"-->
<!--                                                                                                 data-id="--><?php //echo $row['id']; ?><!--"-->
<!--                                                                                                 class="inactive-subcategory"-->
<!--                                                                                                 autocomplete="off">-->
<!--                                        Inactive</label>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                            <td class="d-flex justify-content-center">-->
<!--                                <button data-id="--><?php //echo $row['id']; ?><!--"-->
<!--                                        class="btn btn-danger btn delete-subcategory"><i-->
<!--                                            class="fa fa-trash-o  "-->
<!--                                            aria-hidden="true"></i></button>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        --><?php
//                    }
//                } else {
//                    $_SESSION['error_msg'] = $lang['general_error'];
//                    redirect('home');
//                    mysqli_close($link);
//                    exit();
//                }
//                ?>
<!---->
<!---->
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
<!--    </div>-->
</div>

