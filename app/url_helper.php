<?php
	// Simple page redirect
	function redirect($userEmail,$password,$type){
		
		global $db;
		$page         = "";
		$loginPage    = "login/";
		$adminPage    = "admin/";
		$agentPage    = "agent/";
		$clientPage   = "client/";
		$chairmanPage = "chairman/";

		if ($userEmail == '' || $userEmail == null) {
			$page = $loginPage;
		}else{

			if($password == 'true'){

				switch($type){

					case 0:

					if($db->check("SELECT * FROM `clients` WHERE `clients`.`nid` = ?",["$userEmail"]) == true){
						$page = $clientPage;
					}
					break;

					case 1:

					if($db->check("SELECT * FROM `system_users` WHERE `system_users`.`email` = ?",["$userEmail"]) == true){
						$page = $adminPage;
						
					}
					break;

					case 2:
					if($db->check("SELECT * FROM `agents` WHERE `agents`.`username` = ?",["$userEmail"]) == true){
						$page = $agentPage;
					}

					break;

					case 3:
					if($db->check("SELECT * FROM `chairman` WHERE `chairman`.`username` = ?",["$userEmail"]) == true){
						$page = $chairmanPage;
					}
					
					break;

					default:

					$page = $loginPage;
					break;

			}
				
			}else{
	
				$page =$homepage;
			}
		}

		header('Location: ' . URLROOT . $page);
	}