<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>QuyIT</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link href="css/calculator.css" rel="stylesheet">
	<link href="css/dictionary.css" rel="stylesheet">
	<link href="css/customerlist.css" rel="stylesheet">
	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Trade+Winds" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
		<header>
			<nav class="navbar navbar-fixed-top navbar-light bg-faded">
				<a class="navbar-brand logo" href="index.php"><h3 class="textLogo">CodeGym</h3></a>
				<nav class="nav">
					<a class="nav-link active" href="calculator.php">Calculator</a>
					<div class="input-group-btn">
							<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Database
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="customerlist.php">Product Manager</a>
								<a class="dropdown-item" href="data/andor.php">use WHERE</a>
								<a class="dropdown-item" href="connectMysql.php">Connect data</a>
								<a class="dropdown-item" href="showdata.php">Show Product</a>
								<div role="separator" class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a>
							</div>
						</div>
					<a class="nav-link" href="dictionary.php">Dictionary</a>

						<div class="input-group-btn">
							<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Categories
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="customerlist.php">Customer List</a>
								<a class="dropdown-item" href="registerUser.php">Register</a>
								<a class="dropdown-item" href="connectMysql.php">Connect data</a>
								<a class="dropdown-item" href="showdata.php">Show Product</a>
								<div role="separator" class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a>
							</div>
						</div>
					
					<a class="nav-link" href="index.php">Login</a>
				</nav>

			</nav>

		</header>

