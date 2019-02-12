<?php include '../layout/header.php'?>
<div id="our-team-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Member</h4>
            </div>
            <div class="modal-body">
                <form action=""  method="post" class="form-horizontal  col " >
                    <div class="form-group">
                        <label class="col control-label text-left ">Full Name:</label>
                        <div class="col">
                            <input required  class="form-control" name="member-name" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Mobile:</label>
                        <div class="col">
                            <input required  class="form-control" name="mobile" type="tel" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Email:</label>
                        <div class="col">
                            <input required  class="form-control" name="email" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Job title:</label>
                        <div class="col">
                            <input required  class="form-control" name="job-title" type="text" value="">
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






<div class="content-inner chart-cont">

    <div class="row ">
        <div class="col">
            <div class="row">
                <div class="col-4"><h2 class="mb-5">Our Team: </h2></div>
                <div class="col-8"><button id="add-category" class="btn btn-info btn  ">Add</i></button>
                </div>
            </div>


            <table style="width: 100% " id="datatable" class="table table-hover mt-5 table-striped">
                <thead>
                <tr class="bg-info text-white">
                    <th class="text-left">#</th>
                    <th class="text-left">Full Name</th>
                    <th class="text-left" style="">Job Title</th>
                    <th class="text-left" style="">Mobile</th>
                    <th class="text-left" style="">Email</th>
                    <th class="text-left" style="">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="table-primary">
                    <td class="text-left">136</td>
                    <td class="text-left">Accountant</td>
                    <td class="text-left">Mhd Rami</td>
                    <td class="text-left">966589658</td>
                    <td class="text-left">rami-ac@gmail.com</td>
                    <td class="">
                        <button class="btn btn-danger btn edit-member"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                        <button class="btn btn-danger btn delete-member">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>
                    </td>

                </tr>



                </tbody>
            </table></div>


    </div>
</div>

<?php include '../layout'?>

