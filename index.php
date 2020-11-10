<html lang="en">
  	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="common/bootstrap.min.css" >
		<link rel="stylesheet" href="common/style.css" >

		<title>DHL Rate Calculate </title>
  	</head>
<?php

require_once 'common/config.php';
require_once 'common/header.php';

$clas_styl = "display: none;";
$final_val = 0;
$zone = '';

if(isset($_POST['save'])) {

	$zone = $_POST['zone'];
	$weight = $_POST['weight'];

	// echo $zone;
	// exit;
	if($zone != '' && $weight != ''){
		$zone_data = query("SELECT ess_region, zone FROM `dhl_zones` WHERE country_code = '$zone' ", $conn)->row;
		$zone_colum = 'zone'.$zone_data['zone'];
		$ess_region = strtoupper($zone_data['ess_region']);

		$results = query("SELECT * FROM `dhl_rates` WHERE weight = '$weight' ", $conn)->row;
		$rate_val = $results[$zone_colum];

		$ess_charge = query("SELECT dhl FROM `dhl_ess_charge` WHERE country_region = '$ess_region' AND '$weight' BETWEEN weight_from AND weight_to ", $conn)->row;
		$ess_charge_val = $ess_charge['dhl'] * $weight;

		$amt_without_taxes = $rate_val + $ess_charge_val;

		$fuel_charges =  $amt_without_taxes * 20 / 100;
		$with_fuel = $fuel_charges + $amt_without_taxes;
		$gst_val = $with_fuel * 18 / 100;

		$after_taxes_added = $with_fuel + $gst_val;

		// echo'<pre>';
		// print_r($after_taxes_added);
		// exit;

		$clas_styl = "display: block;";
			// echo'<pre>';
			// print_r($final_val);
			// exit;
	} else {
		echo '<script> alert("Please Select zone and weight both") </script>';

	}

}

?>
	<div class="container-fluid pt-5">
		<form id="form" action="index.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-3">
			</div>

			<div class="col-sm-6">
				<select class="form-select" id="form-select-zone" name="zone" aria-label="Default select example">
				  	<option value="" selected>Select Zone</option>
				  	<?php $results = query("SELECT * FROM `dhl_zones` ORDER BY country_name ASC ",$conn)->rows;
			  		foreach ($results as $zkey => $zvalue) { 
			  			if($zvalue['country_code'] == $zone) { ?>
				  			<option value="<?php echo $zvalue['country_code'] ?>" selected><?php echo $zvalue['country_name'] ?></option>
			  			<?php } else { ?>
				  			<option value="<?php echo $zvalue['country_code'] ?>"><?php echo $zvalue['country_name'] ?></option>
			  			<?php } ?>
			  		<?php } ?>
				</select>
			</div>
		</div>
		<div class="row pt-4">
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6">
				<select class="form-select" id="form-select-weight" name="weight" aria-label="Default select example">
				  	<option  value="" selected>Select Weight</option>
				  	<?php $results = query("SELECT * FROM `dhl_rates` ORDER BY id ASC ",$conn)->rows;
				  	foreach ($results as $rkey => $rvalue) {
				  		if($rvalue['weight'] == $weight) { ?>
					  		<option value="<?php echo $rvalue['weight'] ?>" selected><?php echo $rvalue['weight'] ?></option>
				  		<?php } else { ?>
					  		<option value="<?php echo $rvalue['weight'] ?>"><?php echo $rvalue['weight'] ?></option>
				  		<?php } ?>
				  	<?php } ?>
				</select>
			</div>
		</div>
		<div class="row pt-4" style="<?php echo $clas_styl; ?>">
			<div class="col-sm-9 text-center">
				<label class="aria-label amt-lbl" style="font-family: 'Orbitron', sans-serif;">Total Amount : <?php echo ceil($after_taxes_added) ?></label><br>
				<small>( FUEL SURCHARGE + GST APPLICABLE 18% )</small>
			</div>
		</div>
		<div class="row pt-4">
			<div class="col-sm-9 text-right">
				<button type="submit" name="save" class="btn btn-primary">Search</button>
			</div>
		</div>
			
		</div>
		</form>
   </div>
    <script src="common/bootstrap.bundle.min.js" ></script>
<?php 
require_once 'common/footer.php';
?>
  </body>
</html>

