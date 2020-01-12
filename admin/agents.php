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
                                <p class="text-muted m-t-5 text-uppercase font-600 font-secondary">Total Pending Withdrow</p>
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
                                <p class="text-muted m-t-5 text-uppercase font-600 font-secondary">Total Leaders/Agents</p>
                                <h2 class="m-b-10"><span data-plugin="counterup"><?php echo $totalAgents?></span></h2>
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
                    
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                    <div class="card-box">
                            <h4 class="m-t-0 m-b-30 header-title">List of All Posts</h4>

                            <div class="table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-hover dt-responsive ">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>NID</th>
                                        <th>Names</th>
                                        <th>Username</th>
                                        <th>Position</th>
                                        <th>Code</th>
                                        <th>District</th>
                                        <th>Village</th>
                                        <th>Sector</th>
                                        <th>Cell</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($agents as $agent) {
                                        $i++;
                                        $AgentID        = $agent["id"];
                                        $AgentNID       = $agent["nid"];
                                        $AgentNames     = $agent["names"];
                                        $AgentUsername  = $agent["username"];
                                        $AgentPosition  = $agent["position"];
                                        $AgentType  = $agent["type"];
                                        $AgentDistrict  = $agent["akarere"];
                                        $AgentVillage   = $agent["umurenge"];
                                        $AgentSector    = $agent["akagali"];
                                        $AgentCell      = $agent["umudugudu"];
                                        $AgentCode      = $agent["code"];

                                        if($agent['status'] == 'ACTIVE'){
                                            $label = "label-success";
                                        }else{
                                            $label = "label-warning";
                                        }
                                        if($AgentType == 2){
                                            $AgentType = "UMUSANZU";
                                        }else if($AgentType == 4){
                                            $AgentType = "UMUTEKANO";
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $AgentNID;?></td>
                                            <td><?php echo $AgentNames;?></td>
                                            <td><?php echo $AgentUsername;?></td>
                                            <td><?php echo $AgentType." - ".$AgentPosition;?></td>
                                            <td><?php echo $AgentDistrict;?></td>
                                            <td><?php echo $AgentVillage;?></td>
                                            <td><?php echo $AgentSector;?></td>
                                            <td><?php echo $AgentCell;?></td>
                                            <td><?php echo $AgentCode;?></td>
                                            <td><span class="label <?php echo $label;?>"><?php echo $agent['status'];?></span></td>
                                            <td><button class="btn btn-purple btn-sm" >Edit</button> <button class="btn btn-danger btn-sm">Delete</button></td>
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