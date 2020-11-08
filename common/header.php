<?php 

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo basename($_SERVER['PHP_SELF']);
// exit;
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!doctype html>
<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>

    
  	<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  	<div class="container-fluid">
			<a class="navbar-brand" href="index.php">DHL Rate Calculate </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto mb-2 mb-lg-0">
					<?php if($current_page == 'index.php'){ ?>
						<li class="nav-item">
						  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
						  <a class="nav-link" href="index.php">Home</a>
						</li>
					<?php } ?>

					<?php if($current_page == 'zone_upload.php'){ ?>
						<li class="nav-item">
						  <a class="nav-link active" aria-current="page" href="zone_upload.php">Zone Upload</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
						  <a class="nav-link" href="zone_upload.php">Zone Upload</a>
						</li>
					<?php } ?>

					<?php if($current_page == 'dhl_rates.php'){ ?>
						<li class="nav-item">
						  <a class="nav-link active" aria-current="page" href="dhl_rates.php">DHL Rate Upload</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
						  <a class="nav-link" href="dhl_rates.php">DHL Rate Upload</a>
						</li>
					<?php } ?>

					<?php if($current_page == 'ess_charges.php'){ ?>
						<li class="nav-item">
						  <a class="nav-link active" aria-current="page" href="ess_charges.php">DHL Ess Charges Upload</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
						  <a class="nav-link" href="ess_charges.php">DHL Ess Charges Upload</a>
						</li>
					<?php } ?>


				</ul>
			  	
			</div>
		 </div>
	</nav>
	  