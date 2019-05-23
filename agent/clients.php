<?php require_once '../bootstrap.php';
$credentials = isLoggedIn();
if(($credentials == null && $credentials[0] == null) || $credentials[0] != '' && $credentials[1] == '' || $credentials[2] != 2){
  redirect($credentials[0],$credentials[1],$credentials[2]);
}else{
    require 'agentOperations.php';
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

        <title>AgentDashboard - <?php echo SITENAME;?> - <?php echo NAMES;?>(Agent)</title>

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
                                        <a href="<?php echo URLROOT;?>">Ahabanza</a>
                                    </li>
                                    <li class="active">
                                        Abaturage Wandikishije
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">URUTONDE</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                
                    <!-- <div class="col-lg-3 col-md-6">
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
                    </div> -->
                    
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                    <div class="card-box">
                            <h4 class="m-t-0 m-b-30 header-title">Urutonde Rw'Abaturage Wandikishije</h4>

                            <div class="table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-hover dt-responsive ">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>nid</th>
                                        <th>names</th>
                                        <th>sex</th>
                                        <th>father_names</th>
                                        <th>mother_names</th>
                                        <th>birth_date</th>
                                        <th>job_type</th>
                                        <th>education_type</th>
                                        <th>relationship</th>
                                        <th>position</th>
                                        <th>zip_code</th>
                                        <th>house_code</th>
                                        <th>assurance</th>
                                        <th>telephone</th>
                                        <th>district</th>
                                        <th>village</th>
                                        <th>sector</th>
                                        <th>cell</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($clients as $client) {
                                        $i++;
                                        $nid            = $client["nid"];
                                        $names          = $client["names"];
                                        $sex            = $client["sex"];
                                        $father_names   = $client["father_names"];
                                        $mother_names   = $client["mother_names"];
                                        $birth_date     = $client["birth_date"];
                                        $job_type       = $client["job_type"];
                                        $education_type = $client["education_type"];
                                        $relationship   = $client["relationship"];
                                        $position       = $client["position"];
                                        $zip_code       = $client["zip_code"];
                                        $house_code     = $client["house_code"];
                                        $assurance      = $client["assurance"];
                                        $telephone      = $client["telephone"];
                                        $district       = $client["district"];
                                        $village        = $client["village"];
                                        $sector         = $client["sector"];
                                        $cell           = $client["cell"];

                                        if($client['status'] == 'ACTIVE'){
                                            $label = "label-success";
                                        }else{
                                            $label = "label-warning";
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $nid;?></td>
                                            <td><?php echo $names;?></td>
                                            <td><?php echo $sex;?></td>
                                            <td><?php echo $father_names;?></td>
                                            <td><?php echo $mother_names;?></td>
                                            <td><?php echo $birth_date;?></td>
                                            <td><?php echo $job_type;?></td>
                                            <td><?php echo $education_type;?></td>
                                            <td><?php echo $relationship;?></td>
                                            <td><?php echo $position;?></td>
                                            <td><?php echo $zip_code;?></td>
                                            <td><?php echo $house_code;?></td>
                                            <td><?php echo $assurance;?></td>
                                            <td><?php echo $telephone;?></td>
                                            <td><?php echo $district;?></td>
                                            <td><?php echo $village;?></td>
                                            <td><?php echo $sector;?></td>
                                            <td><?php echo $cell;?></td>
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