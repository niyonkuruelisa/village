<?php
include_once '../app/config.php';
include_once 'db.php';
include_once '../app/Database.php';
include_once 'functions.php';
include_once '../app/web_functions.php';
//include_once '../../scripts/class.payment.php';
// header("Content-Type: text/plain");

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
//For browser-based testing
if(isset($_GET['ses'])){
	session_destroy();
	session_start();
	session_regenerate_id();
}

//Initialising
$response = "";
$tdata = array();

$req = array_merge($_POST, $_GET); //Keeping get and post for testing and productin handling concurently
$sessionId   = $req["sessionId"]??session_id();
$serviceCode = $req["serviceCode"]??"*801#";
$phoneNumber = $req["phoneNumber"];
$text        = $req["text"]??null;

//IN USSD phone number is always sent
//CLEAN and sanitize PHONE
$phoneNumber  = preg_replace( '/[^0-9]/', '', $phoneNumber );
$phoneNumber  = substr($phoneNumber, -10);

// Get the userID of this phone number
$clientId = $Web->getPhoneClientId($phoneNumber);

// Set a session with userID
$_SESSION['userId'] = $clientId;

//get user language
$lang = getLang($phoneNumber);

$requests = array();
if($text != ''){
	$requests = explode("*", $text);
}

//handling back action
$nc = 0; //temp counter
foreach ($requests as $key => $req) {
	if($req == '0'){
		//here back ation was issued
		//check if there is previous action
		if(isset($requests[$nc-1])){
			unset($requests[$nc]);
			unset($requests[$nc-1]);			
		}
	}
	$nc++;
}

//updating requests after removing back movements
$requests = array_values($requests);
$nrequests = count($requests); //Number of requests

$temp = array('');
$ntemp = array_search("#", $requests);
$ntemp = is_int($ntemp)?$ntemp:0;
$backString = goback(); //string for go back indication
$footer = getFooter(); //string for footer


// // Check if the set home session is set so we can take user to homepage of his language
// if(!empty($_SESSION['takehome']) && $_SESSION['takehome'] == true){
// 	// Destroy the session to avoid coming back here over and over
// 	unset($_SESSION['takehome']);
// 	$text = "1";



// 	$nrequests = 1; //Number of requests
	
// }

//If last request is hash, then user should go back to home
if(isset($requests[$nrequests-1]) && ($requests[$nrequests-1] == "#") || (!empty($_SESSION['takehome']) && $_SESSION['takehome'] == true)){
	$text="";

	// remove any takehome session
	unset($_SESSION['takehome']);
}

if($nrequests == 0 || $text == ''){
	$response = "CON Murakaza neza\nHitamo ururimi\n1. Ikinyarwanda\n2. English";
}else if ($nrequests >= 1) {
	//language choice
	$frequest = $requests[0];
	if(is_numeric($frequest) && $frequest>0 && $frequest<3){
		if($frequest == 1){
			$clang = 'kin';
		}else{
			$clang = 'en';
		}

		//check if we need to update language
		if($lang != $clang){			
			updateLanguage($phoneNumber, $clang);
			$lang = $clang; //update language to chose language
			$backString = goback(); //string for go back indication
			$footer = getFooter(); //string for footer
		}

		if($nrequests == 1){
			$response = "CON ".getString('enter_choice_1', $lang).$backString;
		}else{
			//further requests were issued
			$cplate = $srequest = strtoupper($requests[1]); //second request
			if($nrequests == 2){
				//process the first menu
				$val = $srequest;
				if($val == 1){
					//Contribute cash
					$response.= "CON ".getString('enter_amount')."\n";					
				}else if($val == 2){
					$response.= "END Biracyari gutegurwa\n";
					//My account
				}else if($val ==3){
					// Change the current NID
					$response .= "CON ".getString("enter_nid_tochange")."";
				}else{
					$response.= "END Your choice is invalid\n"; 
				}
			}else{
				$trequest = $requests[2]; //third request

				//get the second request
				$srequest = strtoupper($requests[1]);

				if($srequest == 1){
					//aMOUNT
					$amount = $requests[2];

					// die();
					if($nrequests == 3){
						//List months to contribute for
						$response.= "CON ".getString('choose_payment_month')."\n#. Exit";
					}else if ($nrequests == 4) {
						// Enter phone number
						$response.= "CON ".getString('enter_phone_number_final')." \n#. Exit";
					}else if ($nrequests == 5) {
						$request_5 = $requests[4];

						//month
						$month = $requests[3];

						//amont
						$amount = $requests[2];

						//here we have captured the phone number
						if($request_5 == 1){
							//payment phone number will be current phone
							$paymentPhone = $phoneNumber;
						}else{
							$paymentPhone = $request_5;
						}

						if($paymentPhone){
							//record transaction
							$sql = "INSERT INTO transactions(phone_number, Month, payment, status) VALUES(\"$phoneNumber\", \"$month\", \"$amount\", 'PENDING')";
							
							$query = $con->query($sql);

							paymtn($amount, $paymentPhone);
							$response.= "END ".getString('enter_confirm_mtn_trans')."\n";
						}else{
							//invalid choice
							$response.= "END Telephone mwashyizemo yanditse nabi";
						}
					}
					 
				}else if($trequest == '2'){
					$response.= "END Your phone number is: $phoneNumber\nLanguage is $lang\nThank you";
				}else if($requests[1] == '3'){
					$NID = $requests[2];

					// Try to get the ID client
					$clientId = $Web->getNIDClientId($NID);
					if($clientId){
						// Id is accoiated with the user
						$response.= "CON Irangamuntu washyizemo ni: $NID\n1.Komeza";

						// Here take to previous session
						$_SESSION['userId'] = $clientId;
						$_SESSION['takehome'] = true; //Indicate the take back

					}else{
						$response.= "CON Irangamuntu washyizemo ntiyanditse mu banyamuryango\nIyandikishe ku muryango cyangwa ushyiremo irangamuntu yanditse";
					}

					
				}else{
					$response.= "END Incorrect choice"; 
				}
			}
		}

	}else{
		$response .= "END Invalid choice";
	}		
}
echo $response;
?>
