
<div id="products-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Products</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover mt-5">
                    <thead>
                    <tr class="bg-info text-white">
                        <th class="text-left"style="width: 5%">#</th>
                        <th class="table-width-4">Product Name</th>
                        <th class="table-width-4">Count</th>
                        <th class="table-width-4">Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr class="table-primary">
                        <td class="text-left">136</td>
                        <td class="table-width-3"><a class="primary-color" target="_blank" href="">D-link</a></td>
                        <td class="table-width-3">4</td>
                        <td class="table-width-3">Available</td>

                    </tr>
                    <tr class="table-primary">
                        <td class="text-left">136</td>
                        <td class="table-width-3"><a class="primary-color" target="_blank" href="">D-link</a></td>
                        <td class="table-width-3">4</td>
                        <td class="table-width-3">Available</td>

                    </tr>
                    <tr class="table-primary">
                        <td class="text-left">136</td>
                        <td class="table-width-3"><a class="primary-color" target="_blank" href="">D-link</a></td>
                        <td class="table-width-3">4</td>
                        <td class="table-width-3">Available</td>

                    </tr>
                    <tr class="table-primary">
                        <td class="text-left">136</td>
                        <td class="table-width-3"><a class="primary-color" target="_blank" href="">D-link</a></td>
                        <td class="table-width-3">4</td>
                        <td class="table-width-3">Available</td>

                    </tr>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="confirm-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are You Sure?</h4>
            </div>
            <div class="modal-body">
              <textarea id="confirm-text" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col"><button id="yes" type="button" class="btn btn-info btn" data-dismiss="modal">Yes</button></div>
                    <div class="col"><button id="no" type="button" class="btn btn-info btn" data-dismiss="modal">No</button></div>
                </div>

            </div>
        </div>

    </div>
</div>
<div id="confirm-modal-resolve" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <textarea id="confirm-text-resolve" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col"><button id="yes-resolve" type="button" class="btn btn-info btn" data-dismiss="modal">Yes</button></div>
                    <div class="col"><button id="no-resolve" type="button" class="btn btn-info btn" data-dismiss="modal">No</button></div>
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
                <th class="text-left"style="width: 5%">#</th>
                <th class="table-width-3">From</th>
                <th class="table-width-3">Mobile</th>
                <th class="table-width-3">Date</th>
                <th class="table-width-3">Items</th>
                <th class="table-width-3" >Cost</th>
                <th class="" style="width: 20%">User Notes</th>
                <th class="" style="">Status</th>
            </tr>
            </thead>
            <tbody>
            <tr class="table-primary">
                <td class="text-left">136</td>
                <td class="table-width-3">Mhd Khaled</td>
                <td class="table-width-3">0966598565</td>
                <td class="table-width-3">12/8/2019 2:07 PM</td>
                <td class="table-width-3">
                    <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#products-modal">Check</button>
                </td>
                <td class="table-width-3" >450000</td>
                <td class=""><textarea  disabled class="form-control">wlekjdlwekjdlwkejdlkwejdlkwjeldjwelkdjwelkjdlkwejdlkwejdlkwejldkjwelkdjwelkdjlwkejdlkwejdlkwjedkjwed</textarea></td>
                <td class="table-width-3">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info  ">
                            <input  type="radio" name="options" class="reject" autocomplete="off" > Reject
                        </label>
                        <label class="btn btn-info btn active">
                            <input type="radio"  name="options" class="pending"  autocomplete="off" > Pending
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="resolve" autocomplete="off"> Resolve
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="fail" autocomplete="off"> Fail
                        </label>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>


