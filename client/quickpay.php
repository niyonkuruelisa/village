<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Sumon Rahman">
	<meta name="description" content="">
	<meta name="keywords" content="Ishyura byihuse">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Title -->
	<title>Kwishyura | <?php echo SITENAME;?></title>
	<?php

		// Chekcing the specified NID or other identifier
		$account = $_GET['account'];

		// Specify the desired bootstrap version
		$bootstrapVersion = 4;
		require_once '../FrontCSS.php';
	?>
	<link rel="<?php ?>stylesheet" href="<?php echo URLROOT;?>front/css/bootstrap.4.min.css">
	<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body data-spy="scroll" data-target=".mainmenu-area">
	<!-- Preloader-content -->
	<!-- <div class="preloader">
		<span><i class="lnr lnr-sun"></i></span>
	</div> -->
	<!-- MainMenu-Area -->
	<!-- MainMenu-Area-End -->
	<!-- Home-Area -->
	<header class="home-area overlay" id="quick-pay">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-hidden-xs"></div>
				<div class="col-xs-12 col-md-6" id="kwishyura">
					<h1 class="wow fadeInUp" data-wow-delay="0.4s">Ishyura aka kanya</h1>
					<!-- <div class="space-20"></div> -->
					<div class="desc wow fadeInUp" data-wow-delay="0.6s">
						<p>Andika umubare ushaka gutanga n'ukwezi ubundi witange.</p>
					</div>
					<div class="space-20"></div>
				
					<div class="subscribe-form text-center" >
						<h3 class="blue-color">Ishyura Byihuse</h3>
						<ul class="dark-color list-unstyled" style="">

							<?php
							?>
							<li style="">Irangamuntu yawe: <?=$account?></li>
						</ul>
						<div class="space-20"></div>
						<div id="responses" class="dark-color"></div>

						
						<form id="quick-pay-form">
							<div class="">
								<input type="number" step="1" class="control form-control" id="pledge-amount" placeholder="Shyiramo amafranga uratanga" required="required" id="mc-email" max="2000000" min="200"><br/>
							</div>
							<div class="mt-md-2">
								<div class="form-group">
									<label for="pledgeMonth">Hitamo ukwezi</label>
									<select id="pledgeMonth" class="control form-control" placeholder="Hello">
										<option selected>Hitamo ukwezi</option>
										<?php
											// Load months data
											$months = $db->getRows("SELECT * FROM month_names");
											foreach ($months as $key => $value) {
												?>
													<option value="<?=$value['id']?>"><?=$value['id'].". ".$value['kin']?></option>
												<?php
											}
										?>
									</select>
								</div>								
							</div>
							<div class="mb-2">
								<input type="number" step="1" class="control mt-4" id="phone-number" placeholder="Shyiramo number ivanwaho amafranga" required="required" id="mc-charge-phone"><br/>
								<label for="mc-charge-phone" class="dark-color"><small><span>*</span> Simbuka aha niba ushaka gukoresha numero yanditse kuri konti yawe</small></label>
							</div>
							<div>
								<input type="hidden" id="quick-pay-nid" value="<?=$account?>">
								<button style="position: relative;" class="bttn-white active" id="quick-pay-submisst" type="submit"><span class="lnr lnr-location"></span>Emeza</button>
							</div>							
							<label class="mt10" for="mc-email"></label>
						</form>
					</div>
				</div>
				<div class="col-md-3 col-hidden-xs"></div>

				<div class="col-md-12 col-hidden-sm">
					<div class="space-60"></div>
				</div>
			</div>
		</div>
	</header>

	<!-- Footer-Area -->
	<footer class="footer-area" id="contact_page">
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="page-title text-center">
							<h5 class="title">Uko watubona</h5>
							<h3 class="dark-color">Aha Hari Uburyo Watubona mo</h3>
							<div class="space-60"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="footer-box">
							<div class="box-icon">
								<span class="lnr lnr-map-marker"></span>
							</div>
							<p>Rwanda <br /> Kigali</p>
						</div>
						<div class="space-30 hidden visible-xs"></div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="footer-box">
							<div class="box-icon">
								<span class="lnr lnr-phone-handset"></span>
							</div>
							<p>+250 788474011 <br /> +250 786055826</p>
						</div>
						<div class="space-30 hidden visible-xs"></div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="footer-box">
							<div class="box-icon">
								<span class="lnr lnr-envelope"></span>
							</div>
							<p>evillage250@gmail.com 
							<!-- <br /> backpiper.com@gmail.com -->
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer-Bootom -->
		<?php require_once '../public/partials/_footer.php';?>
		<!-- Footer-Bootom-End -->
	</footer>
	<!-- Footer-Area-End -->
	<?php require_once '../frontJS.php';?>
</body>
</html>
