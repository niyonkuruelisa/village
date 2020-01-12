	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,600,700%7CSource+Sans+Pro:400,600,700' rel='stylesheet'>
	<link href="<?php echo URLROOT;?>front/goole-font-css.css" rel='stylesheet'>

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="<?php echo URLROOT;?>front/images/apple-touch-icon.png">
	<link rel="shortcut icon" type="<?php echo URLROOT;?>front/images/favicon.ico" href="<?php echo URLROOT;?>front/images/favicon.ico" />
	
	<!-- Plugin-CSS -->
	<?php
		if(!empty($bootstrapVersion) && $bootstrapVersion == 4){
			// die();	
			$bootstrapSrc = 'front/css/bootstrap.4.min.css';
		}else{
			//defaults to version 3
			$bootstrapSrc = 'front/css/bootstrap.min.css';
		}
	?>
	<link rel="<?php ?>stylesheet" href="<?php echo URLROOT.$bootstrapSrc;?>">
	
	<link rel="stylesheet" href="<?php echo URLROOT;?>front/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo URLROOT;?>front/css/linearicons.css">
	<link rel="stylesheet" href="<?php echo URLROOT;?>front/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo URLROOT;?>front/css/animate.css">
	
	<!-- Main-Stylesheets -->
	<link rel="stylesheet" href="<?php echo URLROOT;?>front/css/normalize.css">
	<link rel="stylesheet" href="<?php echo URLROOT;?>front/style.css">
	<link rel="stylesheet" href="<?php echo URLROOT;?>front/css/responsive.css">
	<script src="<?php echo URLROOT;?>front/js/vendor/modernizr-2.8.3.min.js"></script>
	<input type="hidden" id="sitename" value="<?php echo URLROOT;?>">


		