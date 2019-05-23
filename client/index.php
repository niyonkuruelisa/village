<?php

require_once '../bootstrap.php';
$credentials = isLoggedIn();

if(($credentials == null && $credentials[0] == null) || $credentials[0] != '' && $credentials[1] == '' || $credentials[2] != 0){
  redirect($credentials[0], $credentials[1], $credentials[2]);
}else{
	require 'clientOperations.php';
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="<?php echo URLROOT?>front/images/favicon.ico">

		<title>ClientDashboard - <?php echo SITENAME;?> - <?php echo NAMES;?></title>

		<!-- App css -->
		<?php require_once("../CSS.php")?>

	</head>


	<body>

	<!-- Navigation Bar-->
	<?php require_once 'nav.php';?>

	<!-- End Navigation Bar-->


		<div class="wrapper">
			<div class="container">
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<div class="page-title-box">
							<div class="btn-group pull-right">
								<ol class="breadcrumb hide-phone p-0 m-0">
									 <li>
										<a href="<?php echo URLROOT;?>client/">Ahabanza</a>
									</li>
									<li class="active">
										Kwishyura 
									</li>
								</ol>
							</div>
							<h3>Murakaza Neza: <i>(<?php echo NAMES;?>)</i></h3>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<!-- end page title end breadcrumb -->
				<div class="row">
					<div class="col-lg-3">
						<div class="portlet">
							<div class="portlet-heading bg-inverse">
								<h3 class="portlet-title">
									ISHYURA UMUTEKANO
								</h3>
								<div class="portlet-widgets">
									<a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
									<span class="divider"></span>
									<a data-toggle="collapse" data-parent="#accordion1" href="#bg-inverse"><i class="ion-minus-round"></i></a>
									
								</div>
								<div class="clearfix"></div>
							</div>
							<div id="bg-inverse" class="panel-collapse collapse in">
								<div class="portlet-body">
								
									<form class="form-horizontal">
									<span id="responses"></span>
									<input type="hidden" value="<?php echo ID?>" id="id"/>
										<div class="form-group ">
										<h4><label for="Phone">Injiza Numero ukoresha wishyura (MTN)</label></h4>
											<input class="form-control" id="phone_number" type="tel" required="" placeholder="Andika Numero ukoresha wishyura">
										</div>

										<div class="form-group">
											<h4><label for="Phone">Hitamo Uburyo Bwo Kwishyura</label></h4>
											<select id="payment_method" class="form-control select2">
											   
												<optgroup label=" Uburyo Bwo Kwishyura">
													<option value="MTN Mobile Money">MTN Mobile Money</option>
												</optgroup>
												
											</select>
										</div>
										<div class="form-group">
											<h4><label for="Phone">Hitamo Ukwezi Wishyura</label></h4>
											<select id="Month" class="form-control select2">
												<optgroup label=" Uburyo Bwo Kwishyura">
													<option value="Mutarama (Ukwa 1)">Mutarama (Ukwa 1)</option>
													<option value="Gashyantare (Ukwa 2)">Gashyanare (Ukwa 2)</option>
													<option value="Werurwe (Ukwa 3)">Werurwe (Ukwa 3)</option>
													<option value="Mata (Ukwa 4)">Mata (Ukwa 4)</option>
													<option value="Gicurasi (Ukwa 5)">Gicurasi (Ukwa 5)</option>
													<option value="kamena (Ukwa 6)">kamena (Ukwa 6)</option>
													<option value="Nyakanga (Ukwa 7)">Nyakanga (Ukwa 7)</option>
													<option value="Kanama (Ukwa 8)">Kanama (Ukwa 8)</option>
													<option value="Nzeri (Ukwa 9)">Nzeri (Ukwa 9)</option>
													<option value="Ukwakira (Ukwa 10)">Ukwakira (Ukwa 10)</option>
													<option value="Ugushyingo (Ukwa 11)">Ugushyingo (Ukwa 11)</option>
													<option value="Ukuboza (Ukwa 12)">Ukuboza (Ukwa 12)</option>
												</optgroup>
												
											</select>
										</div>
										<div class="form-group ">
										<h4><label for="Phone">Injiza Umubare wa Amafaranga Wishyura</label></h4>
											<input class="form-control" id="payment" type="number" required="" placeholder="Andika Numero ukoresha wishyura">
										</div>
										<div class="form-group ">
											<center><button type="button" class="btn btn btn-purple btn-md" id="savePayment">EMEZA</button></center>
										</div>
									</form>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="portlet">
							<div class="portlet-heading bg-inverse">
								<h3 class="portlet-title">
									AMAFARANGA Y'UMUTEKANO YISHYUWE NA (<?php echo NAMES;?>)
								</h3>
								<div class="portlet-widgets">
									<a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
									<span class="divider"></span>
									<a data-toggle="collapse" data-parent="#accordion1" href="#bg-purple"><i class="ion-minus-round"></i></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div id="bg-purple" class="panel-collapse collapse in">
								<div class="portlet-body">
								<div class="table-responsive">
									<table id="datatable-responsive" class="table table-striped table-hover dt-responsive ">
										<thead>
											<tr>
												<th>Id</th>
												<th>AMAFARANGA</th>
												<th>UKWEZI</th>
												<th>IGIHE YISHYURIWE</th>
												<th>HAKORESHEJWE</th>
												<th>TELEFONE</th>
												<th>STATUS</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 0;
											foreach ($transactions as $transaction) {
												$i++;
												$payment            = $transaction["payment"];
												$payment_month         = $transaction["Month"];
												$payment_datetime         = $transaction["updated_at"];
												$method            = $transaction["payment_method"];
												$phone   = $transaction["phone_number"];
												$status   = $transaction["status"];

												if($status == 'SUCCESSFUL'){
													$label = "label-success"; 
												}else if($status == 'FAILED'){
													$label = "label-danger";
												}else if($status == 'PENDING'){
													$label = "label-warning";
												}else{
													$label = "label-purple";
												}
											?>
												<tr>
													<td><?php echo $i;?></td>
													<td><?php echo $payment;?></td>
													<td><?php echo $payment_month;?></td>
													<td><?php echo $function->formatPrintTimestamp($payment_datetime);?></td>
													<td><?php echo $method;?></td>
													<td><?php echo $phone;?></td>
													<td><span class="label <?php echo $label;?>"><?php echo $transaction['status'];?></span></td>
												</tr>
												<?php
												}
												?>
											</tbody>
									</table>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end row -->
				
				<!-- Footer -->
				<footer class="footer text-right">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								© 2019 - <?php echo date("Y");?> <?php echo SITENAME;?>.
							</div>
						</div>
					</div>
				</footer>
				<!-- End Footer -->

			</div> <!-- end container -->
		</div>
		<!-- end wrapper -->


		<!-- jQuery  -->
		<?php require_once("../JS.php")?>
		<script>
		$(document).ready(function () {
			$('#datatable').dataTable();
			$('#datatable-keytable').DataTable({keys: true});
			$('#datatable-responsive').DataTable();
			$('#datatable-colvid').DataTable({
				"dom": 'C<"clear">lfrtip',
				"colVis": {
					"buttonText": "Change columns"
				}
			});
		});
		</script>
	</body>
</html>

<?php $db->Disconnect();?>