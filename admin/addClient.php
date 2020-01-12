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
                                        <a href="<?php echo URLROOT;?>agent/">Ahabanza</a>
                                    </li>
                                    <li class="active">
                                        Abaturage Bose
                                    </li>
                                </ol>
                            </div>
                        <h4 class="page-title">Kwandika Umuturage Mushya</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-md-12 ">
                    
                        <div class="col-md-6 ">                                  
                            <div class="form-group m-b-20">
                                <label for="AgentNID">Indangamuntu ID</label>
                                <input type="text" class="form-control" id="nid" name="AgentNID" placeholder="National ID" >
                            </div>
                            <div class="form-group m-b-20">
                                <label for="AgentNames">Amazina Yose</label>
                                <input type="text" class="form-control" id="names" name="AgentNames" placeholder="Enter Full Names" >
                            </div>
                            <div class="form-group m-b-20">
                                <label for="AgentUsername">Amazina ya Se</label>
                                <input type="text" class="form-control" id="father_names" name="AgentUsername" placeholder="Enter Username" >
                            </div>
                            <div class="form-group m-b-20">
                                <label for="AgentUsername">Amazina ya Nyina</label>
                                <input type="text" class="form-control" id="mother_names" name="AgentUsername" placeholder="Enter Username" >
                            </div>
                            <div class="form-group m-b-20">
                                <label for="AgentUsername">Igihe Yavukiye</label>
                                <input type="date" class="form-control" id="birth_date" name="AgentUsername" placeholder="Enter Username" >
                            </div>
                            <div class="form-group m-b-20">
                                <label for="AgentUsername">Telefone</label>
                                <input type="text" class="form-control" id="telephone" name="AgentUsername" placeholder="Enter Username" >
                            </div>
                            <div class="form-group m-b-20">
                                <label for="AgentUsername">Nimero y'Uumuhanda</label>
                                <input type="text" class="form-control" id="zip_code" name="AgentUsername" placeholder="Enter Username" >
                            </div>
                            <div class="form-group m-b-20">
                                <label for="AgentUsername">Nimero y'Inzu</label>
                                <input type="text" class="form-control" id="house_code" name="AgentUsername" placeholder="Enter Username" >
                            </div>
                            <div class="form-group m-b-20">
                                <label for="sex">Hitamo Igitsina</label>
                                <select id="sex" class="form-control">
                                    <option selected="" value="GABO">GABO</option>
                                    <option value="GORE">GORE</option>
                                </select>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-6 ">

                        <div class="form-group m-b-20">
                            <label for="job_type">Hitamo Akazi</label>
                            <select id="job_type" class="form-control">
                                <option selected="" value="PRIVATE">PRIVATE</option>
                                <option value="PUBLIC">PUBLIC</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="education_type">Hitamo Amashuri</label>
                            <select id="education_type" class="form-control">
                                <option selected="" value="HIGHT SCHOOL">HIGHT SCHOOL</option>
                                <option value="BATCHELOR">BATCHELOR</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="relationship">Hitamo Status</label>
                            <select id="relationship" class="form-control">
                                <option selected="" value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widow">Widow</option>
                                <option value="Widower">Widower</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="position">Hitamo Icyiciro Cy'Ubudehe</label>
                            <select id="position" class="form-control">
                                <option selected="" value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        
                        <div class="form-group m-b-20">
                            <label for="assurance">Hitamo Assurance</label>
                            <select id="assurance" class="form-control">
                                <option selected="" value="MITUEL">MITUEL</option>
                                <option value="RSSB">RSSB</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="district">Hitamo Akarere</label>
                            <select id="district" class="form-control">
                                <option selected="" value="KICUKIRO">KICUKIRO</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="village">Hitamo Umurenge</label>
                            <select id="village" class="form-control">
                                <option selected="" value="NIBOYE">NIBOYE</option>
                                <option value="KANOMBE">KANOMBE</option>
                                <option value="GATENGA">GATENGA</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="sector">Hitamo Akagali</label>
                            <select id="sector" class="form-control">
                                <option selected="" value="GATARE">GATARE</option>
                                <option value="NYAKABANDA">NYAKABANDA</option>
                                <option value="LEADER">NIBOYE</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="cell">Hitamo Umudugudu</label>
                            <select id="cell" class="form-control">
                                <option selected="" value="BYIMANA">BYIMANA</option>
                                <option value="RUGUNGA">RUGUNGA</option>
                                <option value="KAMAHORO">KAMAHORO</option>
                            </select>
                        </div>
                        
                        </div>
                        
                    </div> <!-- end col -->
                    
                    <button type="button" class="btn btn-purple waves-effect waves-light" id="SaveClient" disabled="disabled">Bika Ibyanditswe</button>
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