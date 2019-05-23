<?php
//------------------------Fetching Admin Informations ------------------------------
if($credentials == null && $credentials[0] == null){

    redirect($credentials[0],$credentials[1],$credentials[2]);
    
}else{

    //responses
    $responsePosts = '';
    $responsePoster = '';
    //cfetching System users
    //$systemUsers = $db->GetRows("SELECT `system_users`.* FROM `system_users`");
    //fetching user informations
    $email  = $credentials[0];
    $info   = $db->GetRow("SELECT `clients`.* FROM `clients`  WHERE `clients`.`nid` = ? ",["$email"]);

    define("ID",$info["id"]);
    define("PHONE",$info["telephone"]); 
    define("NAMES",$info["names"]);
    define("NID",$info["nid"]);
    define("AKARERE",$info["district"]);
    define("UMURENGE",$info["village"]);
    define("AKAGALI",$info["sector"]);
    define("UMUDUGUDU",$info["cell"]);
    define("STATUS",$info["status"]);
    define("REG_DATE",$info["created_at"]);
    
    $transactions = $db->GetRows("SELECT `transactions`.* FROM `transactions` WHERE `transactions`.`client_id` = ? ",[ID]);
    
    // $clients = $db->GetRows("SELECT `clients`.* FROM `clients` WHERE `clients`.`created_by` = ? ",[ID]);
    // $totalClients = count($clients);
}