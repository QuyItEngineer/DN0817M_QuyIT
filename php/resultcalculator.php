<?php include 'header.php'; ?>

<div class="caculator">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="resultcalculator.php" method="GET">
				<legend>Product Discount Calculator</legend>
				<fieldset class="form-group">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<label for="formGroupExampleInput">Product Description:</label>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<?php 
								if ($_SERVER["REQUEST_METHOD"]=="GET") {
									$nameProduct = $_GET["nameProduct"];
								}
							 ?>
							 <p>
							 	<?php 
							 		echo $nameProduct;
							 	 ?>
							 </p>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<label for="formGroupExampleInput">Price:</label>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<?php 
								if ($_SERVER["REQUEST_METHOD"]=="GET") {
									$price = $_GET["price"];
								}
							 ?>
							 <p>
							 	<?php 
							 		echo $price;
							 	 ?>
							 </p>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<label for="formGroupExampleInput">Discount Percent:</label>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<?php 
								if ($_SERVER["REQUEST_METHOD"]=="GET") {
									$percent = $_GET["percent"];
								}
							 ?>
							 <p>
							 	<?php 
							 		echo $percent."%";
							 	 ?>
							 </p>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<label for="formGroupExampleInput">Discount Amount:</label>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<?php 
							
								if (($price==NULL)&&($percent==NULL)) {
									$amount=NULL;
								}
								else $amount = $price*$percent* 0.1;
							 ?>
							 <p>
							 	<?php 
							 		if (is_null($amount)) {
							 			echo "NULL";
							 		}
							 		else {
							 			echo "$".$amount;
							 		}
							 	 ?>
							 </p>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<label for="formGroupExampleInput">Discount Percent:</label>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<?php 
							if (($price==NULL)&&($amount==NULL)) {
									$amounted=NULL;
								}
								else $amounted = $price - $amount;
							 ?>
							 <p>
							 	<?php 
							 		if (is_null($amounted)) {
							 			echo "NULL";
							 		}
							 		else {
							 			echo "$".$amounted;
							 		}
							 	 ?>
							 </p>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>






<?php include 'footer.php'; ?>