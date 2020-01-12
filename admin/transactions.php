<?php require_once '../bootstrap.php';
$credentials = isLoggedIn();
if(($credentials == null && $credentials[0] == null) || $credentials[0] != '' && $credentials[1] == '' || $credentials[2] != 1){
  redirect($credentials[0],$credentials[1],$credentials[2]);
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

        <title>Transactons - <?php echo SITENAME;?> - <?php echo NAMES;?>(Admin)</title>

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
                                        Transactions
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Transactions List</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">
                                IMISANZU YATANZWE
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-purple"><i class="ion-minus-round"></i></a>
                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-purple" class="panel-collapse collapse in">
                            <div class="portlet-body">
                            <div class="table-responsive">
                                <table id="datatable-responsive" class="table table-striped table-hover dt-responsive ">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>AMAZINA</th>
                                            <th>AMAFARANGA</th>
                                            <th>UKWEZI</th>
                                            <th>IGIHE YISHYURIWE</th>
                                            <th>HAKORESHEJWE</th>
                                            <th>TELEFONE</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($transactions as $transaction) {
                                            $i++;
                                            $payment            = $transaction["payment"];
                                            $payment_month         = $transaction["Month"];
                                            $payment_datetime         = $transaction["updated_at"];
                                            $method            = $transaction["payment_method"];
                                            $phone   = $transaction["phone_number"];
                                            $status   = $transaction["status"];
                                            $names  = $transaction["names"];
                                            if($status == 'Success'){
                                                $label = "label-success";
                                                
                                            }else if($status == 'Failed'){
                                                $label = "label-warning";
                                            }else{
                                                $label = "label-purple";
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $names;?></td>
                                                <td><?php echo $payment;?></td>
                                                <td><?php echo $payment_month;?></td>
                                                <td><?php echo $payment_datetime;?></td>
                                                <td><?php echo $method;?></td>
                                                <td><?php echo $phone;?></td>
                                                <td><span class="label <?php echo $label;?>"><?php echo $transaction['status'];?></span></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
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