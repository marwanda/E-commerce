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
$query = "select o.id, o.user_id, u.name, u.phone, o.status, o.date, o.total, o.note from orders o inner join user u on o.user_id = u.id where o.status = 2 ";


if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = $lang['sql_problem'];
    echo '<input id="error-msg" data-type="error"  type="hidden" value="'.$_SESSION['error_msg'].'">';
    $_SESSION['error_msg'] ='';
}
?>
<div id="cart-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cart</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover mt-5">
                    <thead>
                    <tr class="bg-info text-white">
                        <th class="text-left" style="width: 5%">#</th>
                        <th class="table-width-4">Product Name</th>
                        <th class="table-width-4">quantity</th>
                        <th class="table-width-4">Sub-total</th>
                    </tr>
                    </thead>
                    <tbody id="cart-table">

                    </tbody>
                </table>
                <strong id="cart-total" class="text-center "></strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="note-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User Notes</h4>
            </div>
            <div class="modal-body">
                <textarea disabled class="form-control" id="note-text"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="confirm-modal-reject-order" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <textarea id="reject-text" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <div class="row" style="margin: auto;">
                    <div class="col">
                        <button id="" type="button" class="btn btn-info btn yes-status-order" data-dismiss="modal">Yes
                        </button>
                    </div>
                    <div class="col">
                        <button id="" type="button" class="btn btn-info btn no-status-order" data-dismiss="modal">No
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div id="confirm-modal-status-order" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-footer">
                <div class="row" style="margin: auto;">
                    <div class="col">
                        <button type="button" class="btn btn-info btn yes-status-order" data-dismiss="modal">Yes
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-info btn no-status-order" data-dismiss="modal">No</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="content-inner chart-cont">

    <div class="row ">
        <h2 class="mb-5">Pending Orders</h2>
        <table style="width: 100% " id="datatable" class="table table-hover mt-5 table-striped">
            <thead>
            <tr class="bg-info text-white">
                <th class="text-left" style="width: 5%">#</th>
                <th class="table-width-3">User Name</th>
                <th class="table-width-3">Mobile</th>
                <th class="table-width-3">Date</th>
                <th class="table-width-3">Cart</th>
                <th class="table-width-3">Total Cost</th>
                <th class="" style="width: 20%">User Note</th>
                <th class="" style="">Status</th>
            </tr>
            </thead>
            <tbody>

            <?php

            if ($result = mysqli_query($link, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr class="order-row" id="order-<?php echo $row['id']; ?>">
                        <td class=""><?php echo $row['id']; ?></td>
                        <td class=""><?php echo $row['name']; ?></td>
                        <td class=""><?php echo $row['phone']; ?></td>
                        <td class=""><?php echo $row['date']; ?></td>
                        <td class="">
                            <input type="button" name="options" data-id="<?php echo $row['id']; ?>"
                                   class="btn btn-blue check-cart" autocomplete="off" value="Cart">
                        </td>
                        <td class=""><?php echo $row['total']; ?></td>
                        <td class="">
                            <input data-note="<?php echo $row['note']; ?>" type="button" name="options"
                                   data-id="<?php echo $row['id']; ?>"
                                   class="btn btn-blue check-note" autocomplete="off" value="Note"></td>
                        <td class="table-width-3">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-info  ">
                                    <input data-id="<?php echo $row['id']; ?>" type="radio" name="options"
                                           class="reject" autocomplete="off"> Reject
                                </label>
                                <label class="btn btn-info btn">
                                    <input data-userid="<?php echo $row['user_id'] ?>" data-id="<?php echo $row['id']; ?>" type="radio" name="options"
                                           class="resolve" autocomplete="off"> Resolve
                                </label>
                                <label class="btn btn-info btn">
                                    <input data-userid="<?php echo $row['user_id'] ?>" data-id="<?php echo $row['id']; ?>" type="radio" name="options" class="fail"
                                           autocomplete="off"> Fail
                                </label>
                            </div>
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


