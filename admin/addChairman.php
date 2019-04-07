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

        <title>Chairman New Chairman - <?php echo SITENAME;?> - <?php echo NAMES;?>(Admin)</title>

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
                                        Manage All Chairmen
                                    </li>
                                </ol>
                            </div>
                        <h4 class="page-title">Add New Or Update Existing Chairman</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-md-12 ">
                    
                        <div class="col-md-6 ">
                        
                            <div class="">
                                <div class="">
                                    
                                    <div class="form-group m-b-20">
                                        <label for="ChairmanNID">National ID</label>
                                        <input type="number" class="form-control" id="ChairmanNID" name="ChairmanNID" placeholder="National ID" >
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label for="ChairmanNames">Full Names</label>
                                        <input type="text" class="form-control" id="ChairmanNames" name="ChairmanNames" placeholder="Enter Full Names" >
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label for="ChairmanUsername">Username</label>
                                        <input type="text" class="form-control" id="ChairmanUsername" name="ChairmanUsername" placeholder="Enter Username" >
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label for="ChairmanType">User Type</label>
                                        <select id="ChairmanType" class="form-control">
                                            <option selected="" value="CHAIRMAN">CHAIRMAN</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- end p-20 -->
                        </div> <!-- end col -->
                        <div class="col-md-6 ">
                        <div class="form-group m-b-20">
                            <label for="ChairmanDistrict">Akarere</label>
                            <select id="ChairmanDistrict" class="form-control">
                                <option selected="" value="KICUKIRO">KICUKIRO</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="ChairmanVillage">Umurenge</label>
                            <select id="ChairmanVillage" class="form-control">
                                <option selected="" value="NIBOYE">NIBOYE</option>
                                <option value="KANOMBE">KANOMBE</option>
                                <option value="GATENGA">GATENGA</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="ChairmanSector">Akagali</label>
                            <select id="ChairmanSector" class="form-control">
                                <option selected="" value="GATARE">GATARE</option>
                                <option value="NYAKABANDA">NYAKABANDA</option>
                                <option value="LEADER">NIBOYE</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="ChairmanCell">Umudugudu</label>
                            <select id="ChairmanCell" class="form-control">
                                <option selected="" value="BYIMANA">BYIMANA</option>
                                <option value="RUGUNGA">RUGUNGA</option>
                                <option value="KAMAHORO">KAMAHORO</option>
                            </select>
                        </div>
                        
                        <span id="responses"></span>
                        </div>
                        
                    
                    </div> <!-- end col -->
                    <button type="button" class="btn btn-purple waves-effect waves-light" id="SaveChairman">Save Chairman</button>
                    <button type="refresh" class="btn btn-danger waves-effect waves-light" id="discardSaves" onClick="location.href=location.href">Discard</button>
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

        jQuery(document).ready(function(){

            $('.summernote').summernote({
                height: 240,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                 // set focus to editable area after initializing summernote
            });
            
            // Select2
            $(".select2").select2();

            $(".select2-limiting").select2({
                maximumSelectionLength: 2
            });
        });
        </script>
    </body>
</html>

<?php $db->Disconnect();?>