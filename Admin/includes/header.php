<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<!--- Bootstrap CSS--->
	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<!--- Font Awesome CSS--->
	<link rel="stylesheet" href="../css/all.min.css">

	<!--- Custom CSS--->
	<link rel="stylesheet" href="../css/custom.css"> 

	<title><?php echo TITLE ?></title>
</head>
<body>
	<!--Start Top Nav -->
	<nav class="navbar navbar-dark bg-secondary p-0 fixed-top flex-md-nowrap">
		<a href="dashboard.php" class="navbar-brand col-sm-3 col-md-2">Achiever Solution</a>
	</nav>
	<!-- End Top Nav -->

	<!-- Start Container -->
	<div class="container-fluid" style="margin-top: 40px;">
		<!-- Start Row -->
		<div class="row">
			<!--Start Side Bar 1st column-->
			<nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
				<div class="sidebar-sticky">
					<ul class="nav flex-column font-weight-bold pl-1">
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'dashboard'){echo 'active';}?>" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard </a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'work'){echo 'active';}?>" href="work.php"><i class="fab fa-accessible-icon"></i>&nbsp; Work Order</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'request'){echo 'active';}?>" href="request.php"><i class="fas fa-calendar-minus"></i>&nbsp; Requests</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'assets'){echo 'active';}?>" href="assets.php"><i class="fas fa-clipboard-check"></i>&nbsp; Assets</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'developer'){echo 'active';}?>" href="developer.php"><i class="fas fa-diagnoses"></i>&nbsp; Developer</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'requester'){echo 'active';}?>" href="requester.php"><i class="fas fa-users"></i>&nbsp; Requester</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'sellreport'){echo 'active';}?>" href="soldproductreport.php"><i class="fas fa-chart-bar"></i>&nbsp; Sell Report</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'workreport'){echo 'active';}?>" href="workreport.php"><i class="fas fa-chart-area"></i>&nbsp; Work Report</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'changepass'){echo 'active';}?>" href="changepass.php"><i class="fas fa-key"></i>&nbsp; Change Password</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a>
						</li>
					</ul>
				</div>
			</nav>
			<!--End Side Bar 1st column-->