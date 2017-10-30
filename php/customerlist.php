<?php include 'header.php';?>





<div class="myform">
	<form method="POST">
		<fieldset class="form-group">
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<input type="date" name="dateFrom" class="form-control" id="formGroupExampleInput" placeholder="dd/mm//yyyy">
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<input type="date" name="dateTo"  class="form-control" id="formGroupExampleInput2" placeholder="dd/mm/yyyy">
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button type="submit" class="btn btn-primary">Search</button>
				</div>
			</div>
			
		</fieldset>
	</form>
</div>
<?php 

$arrayCustomer =[
	"1" => [
		"name" => "Hoang Bui Ngoc Quy",
		"birthday" => "1995/06/19",
		"address" => "Da Nang",
		"image" => "img/test/image01.jpeg"
	],
	"2" => [
		"name" => "Hoang Bui Ngoc Trong",
		"birthday" => "2002/02/01",
		"address" => "Quang Nam",
		"image" => "img/test/image01.jpeg"
	],
	"3" => [
		"name" => "Nguyen Van A",
		"birthday" => "1995/06/18",
		"address" => "Ha Noi",
		"image" => "img/test/image01.jpeg"
	],
	"4" => [
		"name" => "Nguyen Van B",
		"birthday" => "1995/06/17",
		"address" => "Da Nang",
		"image" => "img/test/image01.jpeg"
	],
	"5" => [
		"name" => "Nguyen Van C",
		"birthday" => "1995/06/16",
		"address" => "Da Nang",
		"image" => "img/test/image01.jpeg"
	]
];

function getCustomerList($arrayCustomer)
{
	foreach ($arrayCustomer as $key => $value) {
	    //$date = strtotime($value["birthday"]);
        $showDate = date("d-m-Y", strtotime($value["birthday"]));

		echo "<tr>";
		echo "<td>".$key."</td>";
		echo "<td>".$value["name"]."</td>";
		echo "<td>".$showDate."</td>";
		echo "<td>".$value["address"]."</td>";
		echo "<td><image src='".$value["image"]."'width='100px' height='120px'/></td>";
		echo "</tr>";
	}
}

function searchCustomerList($arrayCustomer, $from,$to)
{



	if ((empty($from))&&(empty($to))) {

		
		getCustomerList($arrayCustomer);

	}
	else {
		$searchedCustomer = [];


		foreach ($arrayCustomer as $value) {
			

			if ((strtotime($value['birthday']) > strtotime($from))&&(strtotime($value['birthday']) < strtotime($to))) {
				$searchedCustomer[] = $value;
			}

			getCustomerList($searchedCustomer);
		}
	}

}

?>
<?php 
$dateFrom = NULL;
$dateTo = NULL;
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$dateFrom = $_POST["dateFrom"];
	$dateTo = $_POST["dateTo"];

	// print_r($_POST['dateFrom']);die;

}
?>

<table class="table ">

	<thead>
		<tr>

			<th>STT</th>
			<th class="name">Tên</th>
			<th class="birthday">Ngày sinh</th>
			<th class="address">Địa chỉ</th>
			<th class="image_customerlist">Ảnh</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		searchCustomerList($arrayCustomer,$dateFrom,$dateTo);
		?>
	</tbody>
</table>


<?php include 'footer.php'; ?>