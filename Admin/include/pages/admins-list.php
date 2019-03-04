<?php



if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])) {

    echo '<script language="javascript">';
    echo "alert('" . $_SESSION['error_msg'] . "')";
    echo '</script>';
    $_SESSION['error_msg'] = '';
}

$link = mysqli_connect("localhost", "root", "", "itsource");
mysqli_set_charset($link, "utf8");
$sq = "'";
$path = '../';
$query = "select * from user where role = 5 || role=7";


if (mysqli_connect_errno()) {
    $_SESSION['error_msg'] = mysqli_connect_error();
    echo '<script language="javascript">';
    echo 'alert("' . $_SESSION['error_msg'] . '")';
    echo '</script>';
    $_SESSION['error_msg'] = '';
}
?>

<div id="confirm-modal-user-status" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are You Sure?</h4>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col"><button id="yes-status-user" type="button" class="btn btn-info btn" data-dismiss="modal">Yes</button></div>
                    <div class="col"><button id="no-status-user" type="button" class="btn btn-info btn" data-dismiss="modal">No</button></div>
                </div>

            </div>
        </div>

    </div>
</div>



<div class="content-inner chart-cont">

    <div class="row ">
        <h2 class="mb-5">Admins Listing</h2>
        <table style="width: 100% " id="datatable" class="table table-hover mt-5 table-striped">
            <thead>
            <tr class="bg-info text-white">
                <th class="text-left"style="width: 5%">#</th>
                <th class="text-left">Name</th>
                <th class="text-left">Job</th>
                <th class="text-left">Mobile</th>
                <th class="text-left">Email</th>
                <th class="text-left">Gender</th>
                <th class="text-left">Birthday</th>
                <th class="text-left" >Address</th>
                <th class="text-left" style="">Status</th>
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
                        <td class=""><?php echo $row['job']; ?></td>
                        <td class=""><?php echo $row['phone']; ?></td>
                        <td class=""><?php echo $row['email']; ?></td>
                        <td class=""><?php if ($row['gender']==0) echo 'Male'; else echo 'Female'; ?></td>
                        <td class=""><?php echo $row['birthdate']; ?></td>
                        <td class=""><?php echo $row['address']; ?></td>

                        <td class="table-width-3">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-info <?php echo isset($row['role'])&& $row['role']==5? 'active':'' ?>  ">
                                    <input <?php echo isset($row['role'])&& $row['role']==5 ? 'checked':'' ?> data-id="<?php echo $row['id']; ?>" type="radio" name="options"
                                                                                                             class="active-admin" autocomplete="off"> Active
                                </label>
                                <label class="btn btn-info btn <?php echo isset($row['role'])&& $row['role']==7? 'active':'' ?> ">
                                    <input <?php echo isset($row['role'])&& $row['role']==7? 'checked':'' ?>   data-id="<?php echo $row['id']; ?>" type="radio" name="options" class="block-admin"
                                                                                                               autocomplete="off"> Blocked
                                </label>
                            </div>
                        </td>
                    </tr>
                    <?php
                }

            } else {
                echo '<script language="javascript">';
                echo "alert('" . $lang['general_error'] . "')";
                echo '</script>';
                mysqli_close($link);

            }
            ?>


            </tbody>
        </table>
    </div>
</div>



