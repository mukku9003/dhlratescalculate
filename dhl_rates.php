<html lang="en">
  	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">

		<title>DHL Rates Upload</title>
  	</head>
<?php

require_once 'common/config.php';
require_once 'common/header.php';

?>


	<div class="container-fluid pt-5">
		<form id="form" action="csv_read.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8">
				<div class="input-group mb-3">
					  <span class="input-group-text" id="inputGroupFileAddon01">Select DHL Rate File</span>
					  <div class="form-file">
					    <input type="file" class="form-file-input" id="inputGroupFile01" name="dhlratesfile" aria-describedby="inputGroupFileAddon01">
					    <label class="form-file-label" for="inputGroupFile01">
					      <span class="form-file-text">Choose file...</span>
					      <span class="form-file-button">Browse</span>
					    </label>
					  </div>
						<button style="margin-left: 2%;" type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
		</form>
		<?php 
require_once 'common/footer.php';
?>
   </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
  </body>
</html>