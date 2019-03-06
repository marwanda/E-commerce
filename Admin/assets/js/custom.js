var siteURL = '/E-commerce-new/Admin/';
var siteFilesURL = siteURL + 'files/'

$(document).ready(function () {

    /** orders **/


    $('.reject').change(function () {
        $('#confirm-modal-reject-order').modal({show: true})
        localStorage.setItem('order_status', '1');
        localStorage.setItem('order_id', $(this).data('id'));
    })
    // $('#yes-reject-order').click(function () {
    //
    //     $order_id = localStorage.getItem('order_id');
    //     $status = localStorage.getItem('order_status');
    //     $note = $('#reject-text').val();
    //     $selector = '#order-' + $order_id;
    //
    //
    //
    //     $.ajax({
    //         method: "POST",
    //         url: "requests/products_management.php",
    //         data: {
    //             order_id: $order_id,
    //             action: 'change-status',
    //             status: $status,
    //             note: $note,
    //         }
    //     }).done(function (msg) {
    //
    //         if (msg == 1) {
    //             $('#order-' + $product_id).fadeOut(500, function () {
    //
    //                 $(this).remove();
    //
    //             })
    //             alert(lang.successfully_done)
    //             $('#reject-text').val('');
    //         } else {
    //             alert(msg)
    //             $('#reject-text').val('');
    //         }
    //
    //     })
    //
    //
    // })
    //
    // $('#no-reject-order').click(function () {
    //
    //     // let x = $('.pending').parent().addClass('active');
    //     // x.siblings().removeClass('active');
    // })


    $('.fail').change(function () {
        $('#confirm-modal-status-order').modal({show: true})
        localStorage.setItem('order_status', '4');
        localStorage.setItem('order_id', $(this).data('id'));
        localStorage.setItem('user_id_order', $(this).data('userid'));
    })

    $('.resolve').change(function () {
        $('#confirm-modal-status-order').modal({show: true})
        localStorage.setItem('order_status', '3');
        localStorage.setItem('order_id', $(this).data('id'));
        localStorage.setItem('user_id_order', $(this).data('userid'));
    })


    $('.yes-status-order').click(function () {


        $order_id = localStorage.getItem('order_id');
        $status = localStorage.getItem('order_status');
        $selector = '#order-' + $order_id;
        $note = $('#reject-text').val();
        $user_id = localStorage.getItem('user_id_order');
        $.ajax({
            method: "POST",
            url: "requests/orders-management.php",
            data: {
                order_id: $order_id,
                action: 'change-status',
                status: $status,
                note: $note,
                user_id: $user_id,
            }
        }).done(function (msg) {

            if (msg == 1) {
                $('#order-' + $order_id).fadeOut(500, function () {

                    $(this).remove();

                })
                $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
            } else {
                // alert(msg)
                $.notify(lang.general_error, {position: "left bottom", className: "error"});
            }

        })
    })

    $('.no-status-order').click(function () {
        // let x = $('.pending').parent().addClass('active');
        // x.siblings().removeClass('active');

    })

    $('.check-cart').click(function () {

        $('#cart-modal').modal({show: true})

        $order_id = $(this).data('id');

        $.ajax({
            method: "POST",
            url: "requests/orders-management.php",
            data: {
                order_id: $order_id,
                action: 'get-cart',

            }
        }).done(function (msg) {
            if (msg == -1) {
                $.notify(lang.general_error, {position: "left bottom", className: "error"});
            } else {
                $('#cart-table').empty();
                $total = 0;
                jQuery(JSON.parse(msg)).each(function (i, item) {
                    $total = $total + parseInt(item.sub_total);
                    $('#cart-table').append('<tr class="table-primary"><td class="text-left">' + item.product_id + '</td><td class="table-width-3">' + item.name + '</td> <td class="table-width-3">' + item.quantity + '</td> <td class="table-width-3">' + item.sub_total + '</td></tr>');

                })
                $('#cart-total').text('Total: ' + $total + ' ' + lang.sp);
            }


        });
    });

    $('.check-note').click(function () {
        $('#note-modal').modal({show: true})
        $('#note-text').val($(this).data('note'))
    })


    /** products **/



    $('.edit-product').click(function () {
        $p_id = $(this).data('id')
        window.location.href = siteURL + 'product-form/' + $p_id;
    })

    $('.delete-product').click(function () {
        $('#confirm-modal-delete').modal({show: true})

        localStorage.setItem('product_id', $(this).data('id'))

    })


    $('.active-product').change(function () {


        $('#confirm-modal-product-status').modal({show: true})
        localStorage.setItem('product_status', '1');
        localStorage.setItem('product_id', $(this).data('id'));


    })
    $('.inactive-product').change(function () {

        $('#confirm-modal-product-status').modal({show: true})
        localStorage.setItem('product_status', '2');
        localStorage.setItem('product_id', $(this).data('id'));


    })

    $('#yes-delete-product').click(function () {
        $product_id = localStorage.getItem('product_id');
        $selector = '#product-' + $product_id;

        $.ajax({
            method: "POST",
            url: "requests/products_management.php",
            data: {
                product_id: $product_id,
                action: 'delete',
            }
        }).done(function (msg) {

            if (msg == 1) {
                $('#product-' + $product_id).fadeOut(500, function () {

                    $(this).remove();

                })
                $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
            } else if(msg==-1) {
                $.notify(lang.general_error, {position: "left bottom", className: "error"});
            }else
                $.notify(lang.canNotDeleteProduct+' '+msg, {position: "left bottom", className: "error"});

        })

    })

    $('#no-delete-product').click(function () {

        // $('#confirm-modal-product-status').hide();
        //remove tr

    })

    $('#yes-status-product').click(function () {
        $.ajax({
            method: "POST",
            url: "requests/products_management.php",
            data: {
                product_id: localStorage.getItem('product_id'),
                action: 'change-status',
                status: localStorage.getItem('product_status'),
            }
        }).done(function (msg) {

            if (msg == 1)
                $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
            else
                $.notify(lang.general_error, {position: "left bottom", className: "error"});


        })
    })

    $('#no-status-product').click(function () {

        $('#confirm-modal-product-status').hide()
        //let the previous status come back from localstorage

    })

    /** projects**/
    //when download delete


    /** news**/


    $('.edit-news').click(function () {
        window.location.href = "http://localhost/E-commerce/admin/news-form.php";
    })

    $('.delete-news').click(function () {
        $('#confirm-modal-delete').modal({show: true})
    })

    /** admins**/

    $('.active-admin').change(function () {
        $('#confirm-modal-user-status').modal({show: true})
        localStorage.setItem('user_status', '5');
        localStorage.setItem('user_id', $(this).data('id'));
    })
    $('.block-admin').change(function () {
        $('#confirm-modal-user-status').modal({show: true})
        localStorage.setItem('user_status', '7');
        localStorage.setItem('user_id', $(this).data('id'));
    })


    /** users**/


    $('.active-user').change(function () {
        $('#confirm-modal-user-status').modal({show: true})
        localStorage.setItem('user_status', '2');
        localStorage.setItem('user_id', $(this).data('id'));
    })

    $('.block-user').change(function () {
        $('#confirm-modal-user-status').modal({show: true})
        localStorage.setItem('user_status', '4');
        localStorage.setItem('user_id', $(this).data('id'));
    })
    $('.vip-user').change(function () {
        $('#confirm-modal-user-status').modal({show: true})
        localStorage.setItem('user_status', '3');
        localStorage.setItem('user_id', $(this).data('id'));
    })

    $('#yes-status-user').click(function () {

        $.ajax({
            method: "POST",
            url: "requests/users-management.php",
            data: {
                user_id: localStorage.getItem('user_id'),
                action: 'change-status',
                user_status: localStorage.getItem('user_status'),
            }
        }).done(function (msg) {
// alert(msg)
            if (msg == 1)

                $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
            else
                $.notify(lang.general_error, {position: "left bottom", className: "error"});
        })

    })
    $('#no-status-user').click(function () {

        //let the previous status come back

    })


    /** categories**/
    $('#add-category').click(function () {

        $('#category-modal').modal({show: true})
    })


    $('.active-category').change(function () {
        $('#confirm-modal-cat-status').modal({show: true})
        localStorage.setItem('cat_status', '1');
        localStorage.setItem('cat_id', $(this).data('id'));


    })

    $('.inactive-category').change(function () {
        $('#confirm-modal-cat-status').modal({show: true})
        localStorage.setItem('cat_status', '2');
        localStorage.setItem('cat_id', $(this).data('id'));

    })

    $('#yes-status-cat').click(function () {
        $.ajax({
            method: "POST",
            url: "requests/category-management.php",
            data: {
                cat_id: localStorage.getItem('cat_id'),
                action: 'change-status',
                status: localStorage.getItem('cat_status'),
            }
        }).done(function (msg) {

            if (msg == 1)
                $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
            else
                $.notify(lang.general_error, {position: "left bottom", className: "error"});


        })

    })

    $('#no-status-cat').click(function () {

        //remove tr


    })

    $('.delete-category').click(function () {

        $('#confirm-modal-delete-cat').modal({show: true})

        localStorage.setItem('cat_id', $(this).data('id'))

    })

    $('#yes-delete-category').click(function () {
        $cat_id = localStorage.getItem('cat_id');
        $selector = '#category-' + $cat_id;

        $.ajax({
            method: "POST",
            url: "requests/category-management.php",
            data: {
                cat_id: $cat_id,
                action: 'delete',
            }
        }).done(function (msg) {

            if (msg == 1) {
                $('#category-' + $cat_id).fadeOut(500, function () {

                    $(this).remove();

                })
                $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
            } else {
                $.notify(lang.general_error, {position: "left bottom", className: "error"});
            }

        })

    })

    $('#no-delete-category').click(function () {

        // $('#confirm-modal-product-status').hide();
        //remove tr


    })


    /** subcategories**/

    $('#add-subcategory').click(function () {

        $('#subcategory-modal').modal({show: true})
        $('#category-select').selectpicker('refresh');
    })


    $('.active-subcategory').change(function () {
        $('#confirm-modal-sub-status').modal({show: true})
        localStorage.setItem('sub_status', '1');
        localStorage.setItem('sub_id', $(this).data('id'));

    })

    $('.inactive-subcategory').change(function () {
        $('#confirm-modal-sub-status').modal({show: true})
        localStorage.setItem('sub_status', '2');
        localStorage.setItem('sub_id', $(this).data('id'));
    })

    $('#yes-status-sub').click(function () {
        $.ajax({
            method: "POST",
            url: "requests/subcategory-management.php",
            data: {
                sub_id: localStorage.getItem('sub_id'),
                action: 'change-status',
                status: localStorage.getItem('sub_status'),
            }
        }).done(function (msg) {

            if (msg == 1)
                $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
            else
                $.notify(lang.general_error, {position: "left bottom", className: "error"});

        })
    })

    $('#no-status-sub').click(function () {


    })
    $('.delete-subcategory').click(function () {

        $('#confirm-modal-delete-sub').modal({show: true})

        localStorage.setItem('sub_id', $(this).data('id'))

    })

    $('#yes-delete-subcategory').click(function () {
        $sub_id = localStorage.getItem('sub_id');
        $selector = '#subcategory-' + $sub_id;

        $.ajax({
            method: "POST",
            url: "requests/subcategory-management.php",
            data: {
                sub_id: $sub_id,
                action: 'delete',
            }
        }).done(function (msg) {

            if (msg == 1) {
                $('#subcategory-' + $sub_id).fadeOut(500, function () {

                    $(this).remove();

                })
                $.notify(lang.successfully_done, {position: "left bottom", className: "success"});

            } else {
                $.notify(lang.general_error, {position: "left bottom", className: "error"});
            }

        })

    })

    $('#no-delete-subcategory').click(function () {


    })

    /** our team **/





    $('#add-member').click(function () {

        $('#our-team-modal').modal({show: true})

    })

    $('#edit-member').click(function () {

        $('#our-team-modal').modal({show: true})

    })

    $('#delete-member').click(function () {

        $('#confirm-modal').modal({show: true})


    })

    $('#yes-member-delete').click(function () {

    })

    $('#no-member-delete').click(function () {

        //remove tr


    })

    /** leading companies **/





    $('#add-company').click(function () {

        $('#leading-companies-modal').modal({show: true})

    })

    $('#edit-company').click(function () {

        $('#leading-companies-modal').modal({show: true})

    })

    $('#delete-company').click(function () {

        $('#confirm-modal').modal({show: true})


    })

    $('#yes-company-delete').click(function () {

    })

    $('#no-company-delete').click(function () {

        //remove tr


    })


    $('#datatable').DataTable();
    $('#datatable2').DataTable();


    // product form

    $('#submit-product').click(function (e) {

        if ($('#category-select').val() == -1) {
            e.preventDefault();

            document.getElementsByClassName("btn dropdown-toggle btn-light")[0].style.borderColor = "red";

            $('#subcategory-select').css('border-color', 'red');

        }

        if ($('#subcategory-select').val() == -1) {
            e.preventDefault();
            document.getElementsByClassName("btn dropdown-toggle btn-light")[1].style.borderColor = "red";


        }


    })

    $('#submit-subcategory').click(function (e) {

        if ($('#category-select').val() == -1) {
            e.preventDefault();

            document.getElementsByClassName("btn dropdown-toggle btn-light")[0].style.borderColor = "red";
        }


    })


//category and subcategory


    if ($('#category-select').val !== -1) {
        $("#subcategory-select").prop("disabled", false);
        $('#subcategory-select').selectpicker('refresh');
    }

    var select_clicked_cat = false;
    var select_clicked_sub = false;

    $(document).on('shown.bs.select', '#category-select', function () {


        document.getElementsByClassName("btn dropdown-toggle btn-light")[0].style.borderColor = "";
        $cat_id = $('#cat-id').val();
        $selected = '';
        $path = '';
        if ($cat_id !== '') {
            $selected = 'selected';
            $path = '../';
            $('#category-select').find('option').eq(0).replaceWith('<option  value="-1">' + lang.pleaseChoose + '</option>');
            $('#category-select').selectpicker('refresh');
        }

        if (select_clicked_cat == false) {

            $.ajax({
                method: "POST",
                url: $path + "requests/categories.php",
                data: {}
            }).done(function (msg) {
                if (msg == -1)
                    $.notify(lang.general_error, {position: "left bottom", className: "error"});
                else {

                    jQuery(JSON.parse(msg)).each(function (i, item) {

                        $('#category-select').append('<option value="' + item.id + '">' + item.name + '</option>');
                        $('#category-select').selectpicker('refresh');

                    });
                }

            });

            select_clicked_cat = true;
        }

    })


    $(document).on('changed.bs.select', '#category-select', function () {
        select_clicked_sub = false;

        if ($(this).val() != -1) {
            $("#subcategory-select").prop("disabled", false);
            $('#subcategory-select').selectpicker('refresh');
        } else {
            $("#subcategory-select").prop('disabled', true);
            $('#subcategory-select').selectpicker('refresh');
        }
        $('#subcategory-select').empty();
        $('#subcategory-select').append('<option  value="-1">' + lang.pleaseChoose + '</option>');
        $('#subcategory-select').selectpicker('refresh');

    })


    $(document).on('shown.bs.select', '#subcategory-select', function () {


        document.getElementsByClassName("btn dropdown-toggle btn-light")[1].style.borderColor = "";
        $sub_id = $('#sub-id').val();
        $selected = '';
        $path = '';
        if ($sub_id !== '') {
            $selected = 'selected';
            $path = '../';
            $('#subcategory-select').find('option').eq(0).replaceWith('<option value="-1">' + lang.pleaseChoose + '</option>');
            // replaceWith('<option selected  value="-1">' + lang.pleaseChoose + '</option>');

            // $('#subcategory-select').empty();
            $('#subcategory-select').selectpicker('refresh');
            //
        }
        if (select_clicked_sub == false) {
            $.ajax({
                method: "POST",
                url: $path + "requests/subcategories.php",
                data: {cat_id: $('#category-select').val()}
            }).done(function (msg) {

                if (msg == -1) {
                    $.notify(lang.general_error, {position: "left bottom", className: "error"});

                } else {
                    jQuery(JSON.parse(msg)).each(function (i, item) {
                        $('#subcategory-select').append('<option value="' + item.id + '">' + item.name + '</option>');
                        $('#subcategory-select').selectpicker('refresh');

                    });
                }


            })
            select_clicked_sub = true;
        }
    })


    //register for admin

    var $submit_admin = false;

    $(document).on('submit', '#submit-admin', function (e) {

        if (!$submit_admin) {
            {
                if ($('#password').val() !== $('#re-password').val()) {
                    $.notify(lang.passwordsNotMatched, {position: "left bottom", className: "warn"});
                } else {
                    $submit_admin = true;
                    $('#submit-admin').submit();
                }
            }
            e.preventDefault()
        }
        // else
        //     $('#register-form-user').submit();


    });


    var $submit_change_password = false;

    $(document).on('submit', '#change-password-form', function (e) {

        if (!$submit_change_password) {
            {
                if ($('#new-password').val() !== $('#re-password').val()) {
                    alert(lang.passwordsNotMatched);
                } else {
                    $submit_change_password = true;
                    $('#change-password-form').submit();
                }
            }
            e.preventDefault()
        }
        // else
        //     $('#register-form-user').submit();


    });


})

$(document).ready(function () {

    if ($('#error-msg').val() !== '') {
        $.notify($('#error-msg').val(), {position: "left bottom", className: $('#error-msg').data('type')});


    }
})
