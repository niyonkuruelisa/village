<?php
    // This file handles callback from MTN about the payment status
    require_once 'bootstrap.php';

    $hash = $_POST['hash'];
    $status = $_POST['status'];

    $query = $db->InsertData("UPDATE transactions SET status = ? WHERE token = ?",
            ["$status","$hash"]);
    if($query){
            echo "true";
        }else{
            echo "false";
        }
?>