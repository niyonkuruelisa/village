<?php
//------------------------Fetching Admin Informations ------------------------------
if($credetials == null && $credetials[0] == null){

    redirect($credetials[0],$credetials[1],$credetials[2]);
    
}else{

    //responses
    $responsePosts = '';
    $responsePoster = '';
    //cfetching System users
    $systemUsers = $db->GetRows("SELECT `system_users`.* FROM `system_users`");
    //fetching user informations
    $email  = $credetials[0];
    $info   = $db->GetRow("SELECT `system_users`.* FROM `system_users`  WHERE `system_users`.`email` = ?  ORDER BY created_at, updated_at DESC",["$email"]);

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
    $transactions = $db->GetRows("SELECT * FROM `transactions`");
    
}