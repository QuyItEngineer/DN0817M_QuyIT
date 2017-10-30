<?php include 'header.php'; ?>

<?php 


function translate()
{
	$dictionary = array("hello"=>"xin chào", "how"=>"thế nào", "book"=>"quyển vở", "computer"=>"máy tính");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$searchword = $_POST["find"]; 
		$flag = 0;
		foreach($dictionary as $word => $description) {
			if($word == $searchword){
				echo "Từ: " . $word . ". <br/>Nghĩa của từ: " . $description;
				echo "<br/>";
				$flag = 1;
			}
		} 

		if($flag == 0){
			echo "Không tìm thấy từ cần tra.";
		}
	}
}
?>

<div class="container">
	<div class="myform">
		<form action="" method="POST">
			<legend>QuyIT Dictionary</legend>
			<div class="row centerClass">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<div class="form-group row">
						<input type="text" class="form-control" id="text3" name="find" placeholder="input a vacobulary.">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<div class="form-group row">
						<button type="submit" class="btn btn-secondary" id="search_dictionary">Search</button>
					</div>
				</div>
			</div>

		</form>
		<div class="result_dictionary">
			<?php 
			translate();
			?>
		</div>
	</div>
</div>


<?php include 'footer.php'; ?>