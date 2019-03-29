<?php require_once 'bootstrap.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo URLROOT?>assets/images/favicon.ico">
        <!-- App title -->
        <title><?php echo SITENAME;?> - Admin Sign Up</title>

        <!-- App css -->
        <?php require_once("CSS.php")?>

    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="index.html" class="text-success">
                                            <span><img src="<?php echo URLROOT?>front/images/about-logo.png" alt="" height="66"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" action="#">
                                    <span id="ActiveResponse"></span>
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" id="ActivateEmail" type="text" required="" placeholder="Izina Ukoresha">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" id="ActivateCode" type="text" required="" placeholder="Andika Code Yibanga wahawe N\'Umuyobozi">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" id="ActivatePassword" required="" placeholder="Andika Umubare Wibanga Uzajya Ukoresha">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" id="ActivateConfirmPassword" required="" placeholder="Subiramo Umubare Wibanga Uzajya Ukoresha">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group text-center m-t-30">
                                            <div class="col-sm-12">
                                                <a href="#" class="text-muted" ><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                            </div>
                                        </div> -->

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light " id="ActivateButton" type="button">Kanda Ufungure Konti Yawe</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Usanzwe Ufite Konti? <a href="<?php echo URLROOT;?>login/" class="text-primary m-l-5"><b>Kanda hano Winjire</b></a></p>
                                </div>
                            </div>

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <?php require_once("JS.php")?>

    </body>
</html>

<?php $db->Disconnect();?>