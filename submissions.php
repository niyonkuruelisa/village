<?php require_once 'bootstrap.php';

if(isset($_GET['action']) && $_GET['action'] == "loginSystemUser" && isset($_GET["email"]) && isset($_GET["password"])){
    SignUserIn($_GET["email"],$_GET["password"],$_GET['NID']);
}
//Signing User Out
if(isset($_POST["action"]) && $_POST["action"] == "SignOut"){
    session_destroy();
    echo "true";
}

if(isset($_GET['action']) && $_GET['action'] == "SaveChairman" && isset($_GET['ChairmanNID']) && isset($_GET['ChairmanNames']) && isset($_GET['ChairmanType']) && isset($_GET['ChairmanVillage']) && isset($_GET['ChairmanSector']) && isset($_GET['ChairmanCell']) ){
    $ChairmanNID = $_GET["ChairmanNID"];
    $ChairmanNames = $_GET["ChairmanNames"];
    $ChairmanUsername = $_GET["ChairmanUsername"];
    $ChairmanType = $_GET["ChairmanType"];
    $ChairmanDistrict = $_GET["ChairmanDistrict"];
    $ChairmanVillage = $_GET["ChairmanVillage"];
    $ChairmanSector = $_GET["ChairmanSector"];
    $ChairmanCell = $_GET["ChairmanCell"];
    savChairman($ChairmanNID,$ChairmanNames,$ChairmanUsername,$ChairmanType,$ChairmanDistrict,$ChairmanVillage,$ChairmanSector,$ChairmanCell);
}
if(isset($_GET['action']) && $_GET['action'] == "SaveAgent" && isset($_GET['AgentNID']) && isset($_GET['AgentNames']) && isset($_GET['AgentType']) && isset($_GET['AgentVillage']) && isset($_GET['AgentSector']) && isset($_GET['AgentCell']) ){
    $AgentNID = $_GET["AgentNID"];
    $AgentNames = $_GET["AgentNames"];
    $AgentUsername = $_GET["AgentUsername"];
    $AgentType = $_GET["AgentType"];
    $AgentDistrict = $_GET["AgentDistrict"];
    $AgentVillage = $_GET["AgentVillage"];
    $AgentSector = $_GET["AgentSector"];
    $AgentCell = $_GET["AgentCell"];
    saveAgent($AgentNID,$AgentNames,$AgentUsername,$AgentType,$AgentDistrict,$AgentVillage,$AgentSector,$AgentCell);
}
//login client
if(isset($_GET["action"]) && $_GET["action"] == "clientLogin" && isset($_GET["nid"])){
    NIDAuth($_GET["nid"]);
}
//activate new agent
if(isset($_GET['action']) && $_GET['action'] == "activateUser" && isset($_GET['ActivateEmail']) && isset($_GET['ActivateCode']) && isset($_GET['ActivatePassword'])){
    activate_agent($_GET['ActivateCode'],$_GET['ActivateEmail'],$_GET['ActivatePassword']);
}
//save a client

if(isset($_GET['action']) && $_GET['action'] == "saveClient"  && isset($_GET['savedBy']) && isset($_GET['nid'])){
    $savedBy = $_GET["savedBy"];
    $nid = $_GET["nid"];
    $names = $_GET["names"];
    $sex = $_GET["sex"];
    $father_names = $_GET["father_names"];
    $mother_names = $_GET["mother_names"];
    $birth_date = $_GET["birth_date"];
    $job_type = $_GET["job_type"];
    $education_type = $_GET["education_type"];
    $relationship = $_GET["relationship"];
    $position = $_GET["position"];
    $zip_code = $_GET["zip_code"];
    $house_code = $_GET["house_code"];
    $assurance = $_GET["assurance"];
    $telephone = $_GET["telephone"];
    $district = $_GET["district"];
    $village = $_GET["village"];
    $sector = $_GET["sector"];
    $cell = $_GET["cell"];
    saveClient(
        $savedBy,
        $nid,
        $names,
        $sex,
        $father_names,
        $mother_names,
        $birth_date,
        $job_type,
        $education_type,
        $relationship,
        $position,
        $zip_code,
        $house_code,
        $assurance,
        $telephone,
        $district,
        $village,
        $sector,
        $cell);

}
//savePayment
if(isset($_GET['action']) && $_GET['action'] == "savePayment"  && isset($_GET['payment']) && isset($_GET['phone_number']) && isset($_GET['payment_method'])){
    savePayments($_GET['payment'],$_GET['payment_method'],$_GET['phone_number'],$_GET['Month'],$_GET['id']);
}
//-------------------- Functions ----------------------
//savepayments
function savePayments($payment, $payment_method, $phone_number, $Month, $id){
    global $db, $function;
    if($db->InsertData("INSERT INTO `transactions` (
        `id`, 
        `token`, 
        `client_id`, 
        `payment`, 
        `payment_method`, 
        `phone_number`, 
        `Month`, 
        `status`, 
        `created_at`, 
        `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)"
        ,["","$id","$payment", "$payment_method", "$phone_number", "$Month", "PENDING"])){
            $transactionID = $db->getLastId();

            $ret = $function->MTNDeposit($phone_number, $payment);

            $status = $ret->data->status;
            $hash = $ret->data->hash;

            //Let's update the transaction
            $db->UpdateData("UPDATE transactions SET status = ?, token = ?, updated_at = NOW() WHERE id = ? ", [$status, $hash, $transactionID]);

            $response = false;
            if($ret->status){
                $response = true;
            }else{
                $response = false;

            }

            //TODO: Implement messages on the progress and failures
            echo $response;
    }else{
        echo "failed";
    }
}
//authenticate nid
function NIDAuth($NID){
    global $db;
    if($user = $db->GetRow("SELECT * FROM `clients` WHERE (`clients`.`nid` = ?  AND `clients`.`status` = ?) ",["$NID","ACTIVE"])){
        $_SESSION['userEmail'] = $NID;
        $_SESSION['user_password'] = 'true';
        $_SESSION['type'] = 0;
        echo "true";
    }else{
        echo "notExist";
    }
}
//Activate new agent
function saveClient(
    $savedBy,
    $nid,
    $names,
    $sex,
    $father_names,
    $mother_names,
    $birth_date,
    $job_type,
    $education_type,
    $relationship,
    $position,
    $zip_code,
    $house_code,
    $assurance,
    $telephone,
    $district,
    $village,
    $sector,
    $cell){
        global $db;
        if(!$db->Check("SELECT * FROM `clients` WHERE `clients`.`nid` = ?",["$nid"])){
            if($db->InsertData("INSERT INTO `clients` (
                `id`, 
                `created_by`, 
                `nid`, 
                `names`, 
                `sex`, 
                `father_names`, 
                `mother_names`, 
                `birth_date`, 
                `job_type`, 
                `education_type`, 
                `relationship`, 
                `position`, 
                `zip_code`, 
                `house_code`, 
                `assurance`, 
                `telephone`, 
                `district`, 
                `village`, 
                `sector`, 
                `cell`, 
                `status`, 
                `created_at`, 
                `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)",
                ["$savedBy",
                "$nid",
                "$names",
                "$sex",
                "$father_names",
                "$mother_names",
                "$birth_date",
                "$job_type",
                "$education_type",
                "$relationship",
                "$position",
                "$zip_code",
                "$house_code",
                "$assurance",
                "$telephone",
                "$district",
                "$village",
                "$sector",
                "$cell",
                "ACTIVE"
                ])){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "exist";
        }
    }
function activate_agent($ActivateCode,$ActivateEmail,$ActivatePassword){

    $hashedPassword  = hash("sha256",$ActivatePassword);
    global $db;
    if($db->Check("SELECT * FROM `agents` WHERE `agents`.`username`  = ?  AND `agents`.`status` != ?",["$ActivateEmail","ACTIVE"])){
        if($db->Check("SELECT * FROM `agents` WHERE `agents`.`username`  = ?  AND `agents`.`code` = ?",["$ActivateEmail","$ActivateCode"])){
            if($db->UpdateData("UPDATE `agents` SET `agents`.`password`  = ?, `agents`.`status` = ? WHERE `agents`.`username`  = ?  AND `agents`.`code` = ?",["$hashedPassword","ACTIVE","$ActivateEmail","$ActivateCode"])){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            
        }
    }else{
        //echo "NotExist";
        if($db->Check("SELECT * FROM `chairman` WHERE `chairman`.`username`  = ?  AND `chairman`.`code` = ?",["$ActivateEmail","$ActivateCode"])){
            if($db->UpdateData("UPDATE `chairman` SET `chairman`.`password`  = ?, `chairman`.`status` = ? WHERE `chairman`.`username`  = ?  AND `chairman`.`code` = ?",["$hashedPassword","ACTIVE","$ActivateEmail","$ActivateCode"])){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "NotExist";
            
        }

    }

}

//save chairman
function savChairman($ChairmanNID,$ChairmanNames,$ChairmanUsername,$ChairmanType,$ChairmanDistrict,$ChairmanVillage,$ChairmanSector,$ChairmanCell){
    global $db,$function;
    $code = $function->randomCode();
    if(count($code) != 6){
        $code = $function->randomCode();
    }
    if(!$db->Check("SELECT * FROM `chairman`  WHERE `chairman`.`nid` = ? AND `chairman`.`names` =? ",["$ChairmanNID","$ChairmanUsername"])){
        if($db->InsertData("INSERT INTO `chairman` (
            `id`, 
            `nid`, 
            `names`, 
            `username`, 
            `user_type`, 
            `akarere`, 
            `umurenge`, 
            `akagali`, 
            `umudugudu`, 
            `status`, 
            `type`, 
            `code`, 
            `created_at`, 
            `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, '0', ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)",
            ["$ChairmanNID","$ChairmanNames","$ChairmanUsername","$ChairmanType","$ChairmanDistrict","$ChairmanVillage","$ChairmanSector","$ChairmanCell","INACTIVE","$code"])){
            echo "true";
        }else{
            echo "false";
        }
    }else{
        echo "existed";
    }
}
//save agent
function saveAgent($AgentNID,$AgentNames,$AgentUsername,$AgentType,$AgentDistrict,$AgentVillage,$AgentSector,$AgentCell){
    global $db,$function;
    $code = $function->randomCode();
    if(count($code) != 6){
        $code = $function->randomCode();
    }
    if(!$db->Check("SELECT * FROM `agents`  WHERE `agents`.`nid` = ? ",["$AgentNID"])){
        if($db->InsertData("INSERT INTO `agents` (
            `id`, 
            `nid`, 
            `names`, 
            `username`, 
            `user_type`, 
            `akarere`, 
            `umurenge`, 
            `akagali`, 
            `umudugudu`, 
            `status`, 
            `type`, 
            `code`, 
            `created_at`, 
            `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, '0', ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)",
            ["$AgentNID","$AgentNames","$AgentUsername","$AgentType","$AgentDistrict","$AgentVillage","$AgentSector","$AgentCell","INACTIVE","$code"])){
            echo "true";
        }else{
            echo "false";
        }
    }else{
        echo "existed";
    }
}
//signing in a System User
function SignUserIn($userEmail,$userPassword,$NID){
    global $db;
    $password = trim($userPassword);
    $email    = $userEmail;
    //enclyption of user password
    $hashPass = hash("sha256",$password);
    //echo $NID;
    if(empty($NID)){
        
        if ($user = $db->GetRow("SELECT * FROM `system_users` WHERE (`system_users`.`email` = ?  AND `system_users`.`password` = ?) ",["$email","$hashPass"])) {

            $_SESSION['userEmail'] = $email;
            $_SESSION['user_password'] = 'true';
            $_SESSION['type'] = $user['user_type'];
            
            if($db->InsertData("UPDATE `system_users` SET `system_users`.`isOnline` = \"1\"   WHERE `system_users`.`email` = ? ",["$email"] )){
                
                switch($user['user_type']){
                    case 1:
                    echo "trueAdmin";
                    break;
                    case 2:
                    echo "trueAgent";
                    break;
                    default:
                    echo "FalseNotExists";
                    break;
        
                }
    
            }else{
                echo "FalseWriting";
            }
        } else if($user = $db->GetRow("SELECT * FROM `agents` WHERE (`agents`.`username` = ?  AND `agents`.`password` = ?) ",["$email","$hashPass"])){
                $_SESSION['userEmail'] = $email;
                $_SESSION['user_password'] = 'true';
                $_SESSION['type'] = $user['type'];
                switch($user['type']){
                    case 1:
                    echo "trueAdmin";
                    break;
                    case 2:
                    echo "trueAgent";
                    break;
                    case 3:
                    echo "trueChairman";
                    break;
                    default:
                    echo "FalseNotExists";
                    break;

                }   
    
        }else{

            if($user = $db->GetRow("SELECT * FROM `chairman` WHERE (`chairman`.`username` = ?  AND `chairman`.`password` = ?) ",["$email","$hashPass"])){
                $_SESSION['userEmail'] = $email;
                $_SESSION['user_password'] = 'true';
                $_SESSION['type'] = $user['type'];
                switch($user['type']){
                    case 1:
                    echo "trueAdmin";
                    break;
                    case 2:
                    echo "trueAgent";
                    break;
                    case 3:
                    echo "trueChairman";
                    break;
                    default:
                    echo "FalseNotExists";
                    break;

                }
            }else{
                echo "FalseNotExists";
            }
        }
    }

}