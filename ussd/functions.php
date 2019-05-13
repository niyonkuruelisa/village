<?php
	function getUser($userId, $identifierType='id'){
		//returns user data
		global $conn;

		$q = $conn->query("SELECT * FROM users WHERE `$identifierType` = \"$userId\" ");
		if($q){
			return $q->fetch_assoc();
		}else{
			return false;
		}
	}

	function userCars($userId){
		//returns user data
		global $conn;
		$sql = "SELECT *, C.plate, C.make FROM usercars JOIN cars AS C ON C.id = usercars.car  WHERE user = \"$userId\" AND usercars.archived = 'no' ";
		$q = $conn->query($sql) or trigger_error($conn->error);
		if($q){
			return $q->fetch_all(MYSQLI_ASSOC);
		}else{
			return false;
		}
	}

	function carData($carId){
		//returns car data
		global $conn;
		$sql = "SELECT * FROM cars WHERE id = \"$carId\"";
		$q = $conn->query($sql) or trigger_error($conn->error);
		if($q){
			$data = $q->fetch_assoc();
			$data['owner'] = array();
			$owners = carStakeholders($carId,'owner');
			if($owners){
				$data['owner'] = $owners[0];
			}
			return $data;
		}else{
			return false;
		}
	}

	function carStakeholders($carId, $stake='owner'){
		//returns car owners
		global $conn;
		$sql = "SELECT C.*, U.name, U.phone, U.email FROM usercars AS C JOIN users AS U ON C.car = U.id  WHERE C.car = \"$carId\" AND C.archived = 'no' ";
		$q = $conn->query($sql) or trigger_error($conn->error);
		if($q){
			$data = $q->fetch_all(MYSQLI_ASSOC);
			return $data;
		}else{
			return false;
		}
	}

	function plateId($plate){
		//finds ID of the plate
		global $conn;
		$sql = "SELECT * FROM cars WHERE plate = \"$plate\" AND archived = 'no' ";
		$q = $conn->query($sql) or trigger_error($conn->error);
		if($q && $q->num_rows){
			$data = $q->fetch_assoc();
			return $data['id'];
		}else{
			return false;
		}
	}

	function insuranceStatus($carId){
		//returns user data
		global $conn;
		$sql = "SELECT * FROM insurance AS I WHERE I.car = \"$carId\" AND I.archived = 'no' ORDER BY endDate DESC LIMIT 1";
		$q = $conn->query($sql) or trigger_error($conn->error);
		if($q){
			$data = $q->fetch_assoc();
			return $data;
		}else{
			return false;
		}
	}

	function keeptempdata($session_id, $data, $type){
		global $conn;
		$data = json_encode($data);
		$data = mysqli_real_escape_string($conn, $data);
		$sql = "INSERT INTO ussdtempdata(session_id, data, type) VALUES(\"$session_id\", \"$data\", \"$type\")";
		$query = mysqli_query($conn, $sql) or die("END Error: Can't log data: ".mysqli_error($conn));
		if($query)
			return true;
		else return false;
	}

	function customerCarId($userId, $carPlate)
	{
		global $conn;
		$userId = $conn->real_escape_string($userId);
		$carPlate = $conn->real_escape_string($carPlate);
		$sql = "SELECT C.id FROM usercars AS U JOIN cars as C ON C.id = U.car WHERE U.user = \"$userId\" AND C.plate =  \"$carPlate\" LIMIT  1";
		$q = $conn->query($sql) or trigger_error($conn->error);
		if($q){
			return $q->fetch_assoc()['id'];
		}else{
			return false;
		}
	}

	function validatePlate($cplate){
		//validating format of plate
		$ret = 0;
		if(preg_match("^RA[A-Z]\d{3}\w^", $cplate)){
			$ret = 1;
		}else{
			$ret = 0;
		}
		return $ret;
	}

	function getString($key, $language='')
	{
		global $lang;

		if(!$language)
			$language = $lang;

		//returns string of key in specified language
		$corpus = file_get_contents('lang.json');
		$dictionary = json_decode($corpus, 1);
		if(!empty($dictionary[$key])){
			//here the key exists in dictionary
			$langs = $dictionary[$key];

			//check if the language is specified
			if(!empty($langs[$language])){
				$ret = $langs[$language];
			}else{
				// return available version
				if($language == 'en')
					$ret = $langs['kin'];
				else
					$ret = $langs['en'];
			}
		}else{
			$ret = '';
		}

		return $ret;
	}

	function goback(){
		//returns goback text
		global $lang;
		$text = "\n0. ".getString('go_back', $lang??"en");
		return $text;
	}

	function getFooter(){
		//returns footer text
		global $lang;
		$text = "\n0. ".getString('go_back', $lang??"en")."\n#. ".getString('go_home');
		return $text;
	}

	function getLang($phone){
		//returns user language
		global $conn;

		//check if user language
		$sql = "SELECT * FROM ussduser WHERE phone = \"$phone\" LIMIT 1";
		$q = $conn->query($sql);
		if($q && $q->num_rows){
			$data = $q->fetch_assoc();
			return $data['lang'];
		}else{
			//here enter the user
			registerUSSDUser($phone);
			return getLang($phone);
		}
	}

	function updateLanguage($phone, $lang){
		//returns user language
		global $conn;

		//check if user language
		$q = $conn->query("UPDATE ussduser SET lang  = \"$lang\" WHERE phone = \"$phone\"");
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function registerUSSDUser($phone){
		//temp data about ussd user
		global $conn;
		$q = $conn->query("INSERT INTO ussduser(phone) VALUES(\"$phone\") ");
		if($q){
			return $conn->insert_id;
		}else{
			return false;
		}
	}

	function gettempdata($session_id, $type){
		//return tempdta
		global $conn;
		$query = mysqli_query($conn, "SELECT data FROM ussdtempdata WHERE session_id = \"$session_id\" AND type= \"$type\" ORDER BY time DESC LIMIT 1 ") or die("END Error: can't get temp data ".mysqli_error($conn));
		if(mysqli_num_rows($query)>0){
			$data = mysqli_fetch_assoc($query);
			return $data['data'];
		}else return false;
	}
	
	function sendsms($phone, $message, $subject=""){
		$recipients     = $phone;
		$data = array(
			"sender"        =>'New life',
			"recipients"    =>$recipients,
			"message"       =>$message,
		);
		$url = "https://www.intouchsms.co.rw/api/sendsms/.json";
		$data = http_build_query ($data);
		$username="cmuhirwa";
		$password="clement123";
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
		$result = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
				
		if($httpcode == 200)
		{
			return "Yes";
		}
		else
		{
			return "No";
		}
	}

	function groupname($groupid){
		//Function to check if group with $groupid exists
		global $conn;
		$query = mysqli_query($conn, "SELECT groupName FROM groups WHERE id = \"$groupid\"") or die("CON cn lookup group ".mysqli_error($conn));
		if(mysqli_num_rows($query)){
			$data = mysqli_fetch_assoc($query);
			return $data['groupName'];
		}else return false;
	}
	function groupinfo($groupid){
		global $conn;
		//Return info for display in about group's section
		$query = mysqli_query($conn, "SELECT targetAmount, COALESCE(adminName, adminPhone) as admin, createdDate FROM groups WHERE id =\"$groupid\" LIMIT 1") or die("CON Error".mysqli_error($conn));
		return mysqli_fetch_assoc($query);
	}
	function usergroups($userdata, $type='memberPhone'){
		//FUnction to check the groups a user with $userdata of column $type belongs in
		global $conn;
		$sql = "SELECT * FROM members WHERE $type = \"$userdata\"";
		$query = mysqli_query($conn, $sql) or die("END Error Checking groups u belong in\n".mysqli_error($conn));


		//Looping through all groups and putting them in $groups array
		$groups = array();
		while ($temp = mysqli_fetch_assoc($query)) {
			$groups[$temp['groupId']] = $temp['groupName'];
		}

		return $groups;
	}
	function is_group($groupid){
		//Function to check if group with $groupid exists
		global $conn;
		$query = mysqli_query($conn, "SELECT groupName FROM groups WHERE id = \"$groupid\"") or die("CON cn lookup group ".mysqli_error($conn));
		if(mysqli_num_rows($query)){
			$data = mysqli_fetch_assoc($query);
			return $data['groupName'];
		}else return false;
	}


	function api($data){
		//Function to query the API with action and specify $data as required per $action
		//FOr example if action is contribute, then $data will be memberId, groupId, amount, pushnumber, senderBank as keys of arrays and values
		$url = 'https://uplus.rw/api/';

		//Add all data
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
		);

		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);

		if ($result === FALSE) 
		{ 
			return "Network error";
		}
		else
		{
			return $result;         
		}
	}

	function withdraw($data){
		$result = api($data);
		return $result;
	}

	function senderbank($phoneNumber){
		$phoneNumber  = preg_replace( '/[^0-9]/', '', $phoneNumber );
		$phoneNumber  = substr($phoneNumber, -8);
		if($phoneNumber[0] == 8)
			return 1;
	}

	function groupmembers($groupid){
		//Return names, ids of group members
		global $conn;
		$query = mysqli_query($conn, "SELECT memberId as id, COALESCE(memberName, memberPhone) as name FROM members WHERE groupId = \"$groupid\"") or die("CON Error getting group members ".mysqli_error($conn));

		$groups = array();
		while ($temp = mysqli_fetch_assoc($query)) {
			$groups[$temp['id']] = $temp['name'];
		}
		return $groups;
	}

	function paymtn($amount, $phoneNumber){
		$curl = curl_init();
		global $con;

		$phone = $phoneNumber;
		$time = time();
		$hash = hash('sha256', ($time.''.$phone.''.$amount));

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uplus.rw/bridge/",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "action=deposit&amount=$amount&phonenumber=$phone&clienttime=$time&appToken=f4ca826242d0750e39a0&hash=$hash",
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  //echo "cURL Error #:" . $err;
		} else {
		  //var_dump($response);
		}
	}

?>