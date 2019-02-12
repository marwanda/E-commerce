<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Bootstrap Responsive Template</title>
    <link rel="shortcut icon" href="../../assets/img/favicon.ico">

    <!-- Global Stylesheets -->
    <link href="../../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">


</head>

<body id="page-top">


<div  class="container-fluid bg-light-gray " style="margin-top: 100px;
">
    <div class="row">

        <div class="col personal-info " align="center">

            <h4 class="mt-5 mb-5">Click send to send a verification code to <strong>0922335443</strong>,
                <br>
                <div class=" mt-3 ">
                    <a href="" id="send-verification-code" >Send </a>or <a id="goback" onclick="goBack();" href="" > Go Back</a>
                </div>

                <br>

                please insert your verification code to continue registration.</h4>

            <form   class="form-horizontal col-8 "  >
                <div class="form-group ">
                    <label class="col-lg-8 control-label text-left ">Verification code</label>
                    <div class="col-lg-8">
                        <input required class="form-control" name="verification-code" type="text" value="">
                    </div>
                </div>
                    <label class="col-md-8 control-label text-left "></label>
                    <div class="col-md-8">
                        <input id="submit-verification-code" type="" class=" form-group btn btn-general btn-white" value="Submit">

                    </div>
                <div class="row">
                    <div  class="col-8 alert alert-info alert-dismissable bg-danger border-danger  " style=" color: #FFFFFF;margin: auto; opacity: 0.7">
                        <a class="panel-close close" data-dismiss="alert">×</a>
                        <strong>Wrong code!</strong>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>

</div>
<script src="../../assets/js/jquery/jquery.min.js"></script>

<script src="../../assets/js/bootstrap/bootstrap.min.js"></script>
<script>
    function goBack() {
        window.history.back();
    }
    $('#goback').click(function (e) {
        e.preventDefault();
    })
</script>

</body>

</html>