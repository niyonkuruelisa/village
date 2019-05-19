<?php
//------------------------Fetching Admin Informations ------------------------------
if($credetials == null && $credetials[0] == null){

    redirect($credetials[0],$credetials[1],$credetials[2]);
    
}else{

    //responses
    //responses
    $responsePosts = '';
    $responsePoster = '';
    //cfetching System users
    //$systemUsers = $db->GetRows("SELECT `system_users`.* FROM `system_users`");
    //fetching user informations
    $email  = $credetials[0];
    $info   = $db->GetRow("SELECT `chairman`.* FROM `chairman`  WHERE `chairman`.`username` = ? ",["$email"]);

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
    
    $agents = $db->GetRows("SELECT `agents`.* FROM `agents` WHERE  `agents`.`umurenge` = ?",[UMURENGE]);
    $totalAgents = count($agents);


    $clients = $db->GetRows("SELECT `clients`.* FROM `clients` WHERE `clients`.`village` = ?",[UMURENGE]);
    $totalClients = count($clients);
    
    $transactions = $db->GetRows("SELECT `transactions`.*,`clients`.`village`,`clients`.`names` FROM `transactions` 
    JOIN `clients` ON `transactions`.`client_id` = `clients`.`id` 
    WHERE `clients`.`village` = ? ORDER BY `transactions`.`updated_at` DESC",[UMURENGE]);

    $pendingTransaction = $db->GetSum("SELECT `transactions`.*,`clients`.`village`,`clients`.`names` FROM `transactions` 
    JOIN `clients` ON `transactions`.`client_id` = `clients`.`id` 
    WHERE `clients`.`village` = ? AND `transactions`.`status` = ?",[UMURENGE,"Pending"]);

    $dueContributions = $db->GetRows("SELECT `clients`.* FROM `clients` JOIN `transactions` ON `clients`.`id` != `transactions`.`client_id` WHERE `clients`.`village` = ?",[UMURENGE]);
    //echo "<script>alert('".count($dueContributions)." ');</script>";
}