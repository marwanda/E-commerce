<?php include '../layout/header.php'?>
<div id="leading-companies-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Company</h4>
            </div>
            <div class="modal-body">
                <form action=""  method="post" class="form-horizontal  col " >
                    <div class="form-group">
                        <label class="col control-label text-left ">Company Name:</label>
                        <div class="col">
                            <input required  class="form-control" name="company-name" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Business:</label>
                        <div class="col">
                            <input required  class="form-control" name="business" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Contact:</label>
                        <div class="col">
                            <input required  class="form-control" name="contact" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Email:</label>
                        <div class="col">
                            <input required  class="form-control" name="email" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Address:</label>
                        <div class="col">
                            <input required  class="form-control" name="address" type="text" value="">
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
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col"><button id="yes-company-delete" type="button" class="btn btn-info btn" data-dismiss="modal">Yes</button></div>
                    <div class="col"><button id="no-company-delete" type="button" class="btn btn-info btn" data-dismiss="modal">No</button></div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="content-inner chart-cont">

    <div class="row ">
        <div class="col">
            <div class="row">
                <div class="col-4"><h2 class="mb-5">Leading Companies: </h2></div>
                <div class="col-8"><button id="add-company" class="btn btn-info btn  ">Add</button>
                </div>
            </div>
            <table style="width: 100% " id="datatable2" class="table table-hover mt-5 table-striped">
                <thead>
                <tr class="bg-info text-white">
                    <th class="text-left">#</th>
                    <th class="text-left">Name</th>
                    <th class="text-left" style="">Business</th>
                    <th class="text-left" style="">Contact</th>
                    <th class="text-left" style="">Email</th>
                    <th class="text-left" style="">Address</th>
                    <th class="text-left" style="">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="table-primary">
                    <td class="text-left">136</td>
                    <td class="text-left">Al bouraq</td>
                    <td class="text-left">Mobile Store</td>
                    <td class="text-left"><select class="form-control">
                            <option>Phone: 0112564</option>
                            <option>Mobile: 094563254</option>
                        </select></td>
                    <td class="text-left"><select class="form-control">
                            <option>Email 1:test@test.com</option>
                            <option>Email 2:test@test.com</option>
                        </select></td>
                    <td class="text-left">
                        <select class="form-control">
                            <option>Damascus: Shalaan</option>
                            <option>Damascus: Mazzeh</option>
                        </select></td>
                    </td>
                    <td class="">
                        <button class="btn btn-danger btn edit-company"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                        <button class="btn btn-danger btn delete-company">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>
                    </td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'?>
