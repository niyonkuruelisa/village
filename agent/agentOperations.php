<?php
//------------------------Fetching Admin Informations ------------------------------
if($credetials == null && $credetials[0] == null){

    redirect($credetials[0],$credetials[1],$credetials[2]);
    
}else{

    //responses
    $responsePosts = '';
    $responsePoster = '';
    //cfetching System users
    //$systemUsers = $db->GetRows("SELECT `system_users`.* FROM `system_users`");
    //fetching user informations
    $email  = $credetials[0];
    $info   = $db->GetRow("SELECT `agents`.* FROM `agents`  WHERE `agents`.`username` = ? ",["$email"]);

    define("ID",$info["id"]);
    define("USERNAME",$info["username"]); 
    define("NAMES",$info["names"]);
    define("CODE",$info["code"]);
    define("USER_TYPE",$info["user_type"]);
    define("AKARERE",$info["akarere"]);
    define("UMURENGE",$info["umurenge"]);
    define("UMUDUGUDU",$info["umudugudu"]);
    define("STATUS",$info["status"]);
    define("REG_DATE",$info["created_at"]);
    
    $clients = $db->GetRows("SELECT `clients`.* FROM `clients` WHERE `clients`.`created_by` = ? ",[ID]);
    $totalClients = count($clients);
}