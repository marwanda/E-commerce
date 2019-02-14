<div id="category-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <form action=""  method="post" class="form-horizontal  col " >
                    <div class="form-group">
                        <label class="col control-label text-left ">Category Arabic Name:</label>
                        <div class="col">
                            <input required  class="form-control" name="category-name-ar" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Category English Name:</label>
                        <div class="col">
                            <input required  class="form-control" name="category-name-en" type="text" value="">
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
<div id="subcategory-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div align="center" class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Subcategory</h4>
            </div>
            <div class="modal-body">
                <form action=""  method="post" class="form-horizontal  col " >
                    <div class="form-group">
                        <label class="col control-label text-left ">Subcategory Arabic Name:</label>
                        <div class="col">
                            <input required  class="form-control" name="subcategory-name-ar" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col control-label text-left ">Subcategory English Name:</label>
                        <div class="col">
                            <input required  class="form-control" name="subcategory-name-en" type="text" value="">
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
<div id="confirm-modal-cat-status" class="modal fade" role="dialog">
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
                    <div class="col"><button id="yes-status-cat" type="button" class="btn btn-info btn" data-dismiss="modal">Yes</button></div>
                    <div class="col"><button id="no-status-cat" type="button" class="btn btn-info btn" data-dismiss="modal">No</button></div>
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
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col"><button id="yes-status-sub" type="button" class="btn btn-info btn" data-dismiss="modal">Yes</button></div>
                    <div class="col"><button id="no-status-sub" type="button" class="btn btn-info btn" data-dismiss="modal">No</button></div>
                </div>

            </div>
        </div>

    </div>
</div>





    <div class="content-inner chart-cont">

    <div class="row ">
        <div class="col-6">
            <div class="row">
                <div class="col-7"><h2 class="mb-5">Categories Listing</h2></div>
                <div class="col-5"><button id="add-category" class="btn btn-info btn  ">Add</i></button>
                </div>
            </div>

            <table style="width: 100% " id="datatable" class="table table-hover mt-5 table-striped">
                <thead>
                <tr class="bg-info text-white">
                    <th class="text-left">#</th>
                    <th class="text-left">Arabic Name</th>
                    <th class="text-left">English Name</th>
                    <th class="text-left" style="">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr class="table-primary">
                    <td class="text-left">136</td>
                    <td class="text-left">هواتف تقاله</td>
                    <td class="text-left">Mobile</td>
                    <td class="text-left">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-info active ">
                                <input checked  type="radio" name="options" class="active-category" autocomplete="off" > Active
                            </label>
                            <label class="btn btn-info btn">
                                <input type="radio" name="options" class="inactive-category" autocomplete="off"> Inactive
                            </label>
                        </div>
                    </td>
                </tr>
                <tr class="table-primary">
                    <td class="text-left">136</td>
                    <td class="text-left">هواتف تقاله</td>
                    <td class="text-left">Mobile</td>
                    <td class="text-left">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-info active ">
                                <input checked  type="radio" name="options" class="active-category" autocomplete="off" > Active
                            </label>
                            <label class="btn btn-info btn">
                                <input type="radio" name="options" class="inactive-category" autocomplete="off"> Inactive
                            </label>
                        </div>
                    </td>
                </tr>
                <tr class="table-primary">
                    <td class="text-left">136</td>
                    <td class="text-left">هواتف تقاله</td>
                    <td class="text-left">Mobile</td>
                    <td class="text-left">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-info active ">
                                <input checked  type="radio" name="options" class="active-category" autocomplete="off" > Active
                            </label>
                            <label class="btn btn-info btn">
                                <input type="radio" name="options" class="inactive-category" autocomplete="off"> Inactive
                            </label>
                        </div>
                    </td>
                </tr>


                </tbody>
            </table></div>
        <div class="col-6">
            <div class="row">
                <div class="col-7"><h2 class="mb-5">Subcategories Listing</h2></div>
                <div class="col-5"><button id="add-subcategory" class="btn btn-info btn  ">Add</button>
                </div>
            </div>
            <table style="width: 100% " id="datatable2" class="table table-hover mt-5 table-striped">
                <thead>
                <tr class="bg-info text-white">
                    <th class="text-left">#</th>
                    <th class="text-left">Arabic Name</th>
                    <th class="text-left">English Name</th>
                    <th class="text-left" style="">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr class="table-primary">
                    <td class="text-left">136</td>
                    <td class="text-left">سامسونج</td>
                    <td class="text-left">ٍSamsung</td>
                    <td class="text-left">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-info active ">
                                <input checked  type="radio" name="options" class="active-subcategory" autocomplete="off" > Active
                            </label>
                            <label class="btn btn-info btn">
                                <input type="radio" name="options" class="inactive-subcategory" autocomplete="off"> Inactive
                            </label>
                        </div>
                    </td>
                </tr>
                <tr class="table-primary">
                    <td class="text-left">136</td>
                    <td class="text-left">سامسونج</td>
                    <td class="text-left">ٍSamsung</td>
                    <td class="text-left">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-info active ">
                                <input checked  type="radio" name="options" class="active-subcategory" autocomplete="off" > Active
                            </label>
                            <label class="btn btn-info btn">
                                <input type="radio" name="options" class="inactive-subcategory" autocomplete="off"> Inactive
                            </label>
                        </div>
                    </td>
                </tr>
                <tr class="table-primary">
                    <td class="text-left">136</td>
                    <td class="text-left">سامسونج</td>
                    <td class="text-left">ٍSamsung</td>
                    <td class="text-left">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-info active ">
                                <input checked  type="radio" name="options" class="active-subcategory" autocomplete="off" > Active
                            </label>
                            <label class="btn btn-info btn">
                                <input type="radio" name="options" class="inactive-subcategory" autocomplete="off"> Inactive
                            </label>
                        </div>
                    </td>
                </tr>


                </tbody>
            </table>
        </div>

    </div>
</div>

