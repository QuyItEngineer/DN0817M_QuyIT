<?php include 'header.php'; ?>

<div class="caculator">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="resultcalculator.php" method="GET">
				<legend>Product Discount Calculator</legend>
				<fieldset class="form-group">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 inputCalculator">
							<label for="formGroupExampleInput">Product Description:</label>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<input type="text" class="form-control" name="nameProduct" id="" placeholder="">
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 inputCalculator">
							<label for="formGroupExampleInput">List Price:</label>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<input type="text" class="form-control" name="price" id="" placeholder="">
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 inputCalculator">
							<label for="formGroupExampleInput">Discount Percent:</label>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<input type="text" class="form-control" name="percent" id="" placeholder="">
						</div>
					</div>
				</fieldset>
				<button type="submit" class="btn btn-outline-danger btn-lg" id="buttonCalculator" aria-pressed="true">Calculate Discount</button>
			</form>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>