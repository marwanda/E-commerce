<div id="confirm-modal-delete" class="modal fade" role="dialog">
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
                    <div class="col"><button id="yes-delete-product" type="button" class="btn btn-info btn" data-dismiss="modal">Yes</button></div>
                    <div class="col"><button id="no-delete-product" type="button" class="btn btn-info btn" data-dismiss="modal">No</button></div>
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
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col"><button id="yes-status-product" type="button" class="btn btn-info btn" data-dismiss="modal">Yes</button></div>
                    <div class="col"><button id="no-status-product" type="button" class="btn btn-info btn" data-dismiss="modal">No</button></div>
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
            <tr  >
                <th class="" style="">#</th>
                <th class="">Name</th>
                <th class="">Thumbnail</th>
                <th class="">Price</th>
                <th class="">Quantity</th>
                <th class="">Date</th>
                <th class="" >Colors</th>
                <th class="" >Category</th>
                <th class="" >Subcategory</th>
                <th class="" style="">Status</th>
                <th class="" style="">Actions</th>
            </tr>
            </thead>
            <tbody class="table-primary" >
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                        Laptop
                </td>
                <td class="" >
                        Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                     <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                     <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:01 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20</td>
                <td class="">30</td>
                <td class="">12/8/2015 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">z-Link</td>
                <td class=""><img ></td>
                <td class="">2034</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">h-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:01 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20</td>
                <td class="">30</td>
                <td class="">12/8/2015 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">z-Link</td>
                <td class=""><img ></td>
                <td class="">2034</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">h-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:01 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20</td>
                <td class="">30</td>
                <td class="">12/8/2015 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">z-Link</td>
                <td class=""><img ></td>
                <td class="">2034</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">h-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:01 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20</td>
                <td class="">30</td>
                <td class="">12/8/2015 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">z-Link</td>
                <td class=""><img ></td>
                <td class="">2034</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">h-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:01 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20</td>
                <td class="">30</td>
                <td class="">12/8/2015 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">z-Link</td>
                <td class=""><img ></td>
                <td class="">2034</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">h-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:01 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20</td>
                <td class="">30</td>
                <td class="">12/8/2015 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">D-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">z-Link</td>
                <td class=""><img ></td>
                <td class="">2034</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>
            <tr >
                <td class="">136</td>
                <td class="">h-Link</td>
                <td class=""><img ></td>
                <td class="">20000</td>
                <td class="">30</td>
                <td class="">12/8/2019 2:07 PM</td>
                <td class="">Blue,White,Black</td>
                <td class="">
                    Laptop
                </td>
                <td class="" >
                    Asus
                </td>
                <td class="">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active ">
                            <input checked  type="radio" name="options" class="active-product" autocomplete="off" > Active
                        </label>
                        <label class="btn btn-info btn">
                            <input type="radio" name="options" class="inactive-product" autocomplete="off"> Inactive
                        </label>
                    </div>
                </td>
                <td class="">

                    <button class="btn btn-danger btn edit-product"><i class="fa fa-pencil-square-o  " aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn delete-product">  <i class="fa fa-trash-o  " aria-hidden="true"></i></button>

                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>



