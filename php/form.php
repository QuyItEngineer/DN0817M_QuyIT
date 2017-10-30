<?php 
include 'header.php';
?>
<h2>Hello.</h2>

<?php 
	if ($_SERVER["REQUEST_METHOD"]=="GET") {
		$yourname = $_GET["yourname"];
		if ($yourname === "BINIT") {
			echo "Welcome ". $yourname ." to website of me!...";
		}
		else
			echo 'ERROR. :))';
	}
 ?>

<?php include 'footer.php'; ?>