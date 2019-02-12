$(document).ready(function () {
 /** orders **/
    $('.reject').change(function () {
        $('#confirm-modal-resolve').modal({ show: true})
    })

    $('.resolve').change(function () {
        $('#confirm-modal').modal({ show: true})
    })
    $('.fail').change(function () {
        $('#confirm-modal').modal({ show: true})
    })

    $('#yes').click(function () {
        $('#confirm-text').val('');
    })

    $('#no').click(function () {

      let x=  $('.pending').parent().addClass('active');
        x.siblings().removeClass('active');


    })

    $('#yes-resolve').click(function () {
        $('#confirm-text-resolve').val('');
    })

    $('#no-resolve').click(function () {

        let x=  $('.pending').parent().addClass('active');
        x.siblings().removeClass('active');


    })


    /** products **/



    $('.edit-product').click(function () {
window.location.href="http://localhost/E-commerce/admin/product-form.php";
    })

    $('.delete-product').click(function () {
        $('#confirm-modal-delete').modal({ show: true})
    })


    $('.active-product').change(function () {
        $('#confirm-modal-product-status').modal({ show: true})

    })

    $('.inactive-product').change(function () {
        $('#confirm-modal-product-status').modal({ show: true})
    })

    $('#yes-delete-product').click(function () {

    })

    $('#no-delete-product').click(function () {

        //remove tr


    })

    $('#yes-status-product').click(function () {

    })

    $('#no-status-product').click(function () {

        //let the previous status come back from localstorage

    })

    /** projects**/
    //when download delete


    /** news**/


    $('.edit-news').click(function () {
        window.location.href="http://localhost/E-commerce/admin/news-form.php";
    })

    $('.delete-news').click(function () {
        $('#confirm-modal-delete').modal({ show: true})
    })


    /** users**/

    $('.active-user').change(function () {
        $('#confirm-modal-user-status').modal({ show: true})

    })

    $('.inactive-user').change(function () {
        $('#confirm-modal-user-status').modal({ show: true})
    })

    $('.block-user').change(function () {
        $('#confirm-modal-user-status').modal({ show: true})
    })
    $('.vip-user').change(function () {
        $('#confirm-modal-user-status').modal({ show: true})
    })

    $('#yes-status-user').click(function () {
    })
    $('#no-status-user').click(function () {
        //let the previous status come back
    })


    /** admins**/


    $('.active-admin').change(function () {
        $('#confirm-modal-admin-status').modal({ show: true})
    })
    $('.block-admin').change(function () {
        $('#confirm-modal-admin-status').modal({ show: true})
    })
    $('#yes-status-admin').click(function () {
    })
    $('#no-status-admin').click(function () {
        //let the previous status come back
    })


    /** categories**/
    $('#add-category').click(function () {

        $('#category-modal').modal({ show: true})
    })


    $('.active-category').change(function () {
        $('#confirm-modal-cat-status').modal({ show: true})

    })

    $('.inactive-category').change(function () {
        $('#confirm-modal-cat-status').modal({ show: true})
    })

    $('#yes-status-cat').click(function () {

    })

    $('#no-status-cat').click(function () {

        //remove tr


    })



    /** subcategories**/

    $('#add-subcategory').click(function () {

        $('#subcategory-modal').modal({ show: true})
    })



    $('.active-subcategory').change(function () {
        $('#confirm-modal-cat-status').modal({ show: true})

    })

    $('.inactive-subcategory').change(function () {
        $('#confirm-modal-sub-status').modal({ show: true})
    })

    $('#yes-status-sub').click(function () {

    })

    $('#no-status-sub').click(function () {

        //remove tr


    })

    /** our team **/





    $('#add-member').click(function () {

        $('#our-team-modal').modal({ show: true})

    })

    $('#edit-member').click(function () {

        $('#our-team-modal').modal({ show: true})

    })

    $('#delete-member').click(function () {

        $('#confirm-modal').modal({ show: true})


    })

    $('#yes-member-delete').click(function () {

    })

    $('#no-member-delete').click(function () {

        //remove tr


    })

    /** leading companies **/





    $('#add-company').click(function () {

        $('#leading-companies-modal').modal({ show: true})

    })

    $('#edit-company').click(function () {

        $('#leading-companies-modal').modal({ show: true})

    })

    $('#delete-company').click(function () {

        $('#confirm-modal').modal({ show: true})


    })

    $('#yes-company-delete').click(function () {

    })

    $('#no-company-delete').click(function () {

        //remove tr


    })













    $('#datatable').DataTable();
    $('#datatable2').DataTable();



})