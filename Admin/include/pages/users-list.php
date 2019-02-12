<?php include '../layout/header.php'?>
<div id="confirm-modal-user-status" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are You Sure?</h4>
            </div>
            <div class="modal-body">
                <textarea class="form-control"></textarea>
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
        <h2 class="mb-5">Users Listing</h2>
        <table style="width: 100% " id="datatable" class="table table-hover mt-5 table-striped">
            <thead>
            <tr class="bg-info text-white">
                <th class="text-left"style="width: 5%">#</th>
                <th class="text-left">Name</th>
                <th class="text-left">Mobile</th>
                <th class="text-left">Email</th>
                <th class="text-left">Gender</th>
                <th class="text-left">Age</th>
                <th class="text-left" >Address</th>
                <th class="text-left" >Purchases</th>
                <th class="text-left" >Fails</th>
                <th class="text-left" style="">Status</th>
            </tr>
            </thead>
            <tbody>
            <tr class="table-primary">
                <td class="text-left">136</td>
                <td class="text-left">Marwan Agha</td>
                <td class="text-left">0366985698</td>
                <td class="text-left">marwan@gmail.com</td>
                <td class="text-left">male</td>
                <td class="text-left">23</td>
                <td class="text-left">Damascus, Hamra</td>
                <td class="text-left">350000</td>
                <td class="text-left">2</td>
                <td class="text-left">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-user" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-user" autocomplete="off"> Inactive
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="vip-user" autocomplete="off"> VIP
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-user" autocomplete="off"> Blocked
                        </label>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>


<?php include '../layout/footer.php'?>

