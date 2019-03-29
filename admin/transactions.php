<?php require_once '../bootstrap.php';
$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 1){
  redirect($credetials[0],$credetials[1],$credetials[2]);
}else{
    require 'adminOperations.php';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo URLROOT?>front/images/favicon.ico">

        <title>PostsDashboard - <?php echo SITENAME;?> - <?php echo NAMES;?>(Admin)</title>

        <!-- App css -->
        <?php require_once("../CSS.php")?>

    </head>


    <body>

    <!-- Navigation Bar-->
    <?php require_once 'nav.php';?>

    <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                     <li>
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="active">
                                        Posts Dashboard
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Posts Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-box-three">
                            <div class="bg-icon pull-left">
                                <i class="ti-layout-list-post"></i>
                            </div>
                            <div class="text-right">
                                <p class="text-muted m-t-5 text-uppercase font-600 font-secondary">Total Leaders/Agents</p>
                                <h2 class="m-b-10"><span data-plugin="counterup">0</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-box-three">
                            <div class="bg-icon pull-left">
                                <i class="ti-layout-list-post"></i>
                            </div>
                            <div class="text-right">
                                <p class="text-muted m-t-5 text-uppercase font-600 font-secondary">Total Clients</p>
                                <h2 class="m-b-10"><span data-plugin="counterup">0</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-box-three">
                            <div class="bg-icon pull-left">
                                <i class="ti-layout-list-post"></i>
                            </div>
                            <div class="text-right">
                                <p class="text-muted m-t-5 text-uppercase font-600 font-secondary">Total Villages</p>
                                <h2 class="m-b-10"><span data-plugin="counterup">0</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-box-three">
                            <div class="bg-icon pull-left">
                                <i class="ti-layout-list-post"></i>
                            </div>
                            <div class="text-right">
                                <p class="text-muted m-t-5 text-uppercase font-600 font-secondary">Total Pending Withdrow</p>
                                <h2 class="m-b-10"><span data-plugin="counterup">0</span></h2>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end row -->
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0">Total Views</h4>

                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
                                    <li class="list-inline-item">
                                        <h5 class="text-teal"><i class="mdi mdi-crop-square m-r-5"></i>Page Views</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5><i class="mdi mdi-details m-r-5"></i>Visitors</h5>
                                    </li>
                                </ul>
                            </div>
                            <div id="morris-bar-stacked" style="height: 280px;"></div>

                        </div>

                    </div> 
                </div> -->
                <!-- end row -->
                
                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                © 2019 - <?php echo date("Y");?> <?php echo SITENAME;?>.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- jQuery  -->
        <?php require_once("../JS.php")?>
        <script>
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        TableManageButtons.init();
        </script>
    </body>
</html>

<?php $db->Disconnect();?>