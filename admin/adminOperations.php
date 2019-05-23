<?php
//------------------------Fetching Admin Informations ------------------------------
if($credentials == null && $credentials[0] == null){

    redirect($credentials[0],$credentials[1],$credentials[2]);
    
}else{

    //responses
    $responsePosts = '';
    $responsePoster = '';
    //cfetching System users
    $systemUsers = $db->GetRows("SELECT `system_users`.* FROM `system_users`");
    //fetching user informations
    $email  = $credentials[0];
    $info   = $db->GetRow("SELECT `system_users`.* FROM `system_users`  WHERE `system_users`.`email` = ?  ORDER BY updated_at DESC",["$email"]);

    define("ID",$info["user_id"]);
    define("EMAIL",$info["email"]); 
    define("NAMES",$info["names"]);
    define("PHONE",$info["phone"]);
    define("GENDER",$info["gender"]);
    define("USER_TYPE",$info["user_type"]);
    define("VERIFIED",$info["verified"]);
    define("VERIFICATION_CODE",$info["verification_code"]);
    define("STATUS",$info["status"]);
    define("IS_ONLINE",$info["isOnline"]);
    define("REG_DATE",$info["regDate"]);

    $agents = $db->GetRows("SELECT `agents`.* FROM `agents`");
    $totalAgents = count($agents);
    
    $clients = $db->GetRows("SELECT `clients`.* FROM `clients`");
    $totalClients = count($clients);

    $transactions = $db->GetRows("SELECT `transactions`.*,`clients`.`village`,`clients`.`names` FROM `transactions` 
    JOIN `clients` ON `transactions`.`client_id` = `clients`.`id`  ORDER BY `transactions`.`updated_at` DESC");

    $pendingTransaction = $db->GetSum("SELECT `transactions`.*,`clients`.`village`,`clients`.`names` FROM `transactions` 
    JOIN `clients` ON `transactions`.`client_id` = `clients`.`id` 
    WHERE `transactions`.`status` = ?",["Pending"]);
}