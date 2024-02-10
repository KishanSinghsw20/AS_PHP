<?php
define('TITLE', 'Requester Profile');
define('PAGE', 'RequesterProfile');
include('includes/header.php');
include('../dbconnection.php');
session_start();
	if($_SESSION['is_login']){
		$rEmail = $_SESSION['$rEmail'];
	}else{
		echo "<script> location.href='RequesterLogin.php'</script>";
	}
	$sql = "SELECT r_name, r_email FROM requesterlogin WHERE r_email = '$rEmail' ";
	$result = $conn->query($sql);
	if($result->num_rows == 1){
		$row = $result->fetch_assoc();
		$rName = $row['r_name'];
	}

	if(isset($_REQUEST['nameupdate'])){
		if ($_REQUEST['rName'] == ""){
			$passmsg = '<div class="alert alert-warning mt-2 text-center ml-5" role="alert">Fill All Fields</div>';
		} else{
			$rName = $_REQUEST['rName'];
			$sql = "UPDATE requesterlogin SET r_name = '$rName' WHERE r_email = '$rEmail'";
			if($conn->query($sql) == TRUE){
				$passmsg = '<div class="alert alert-success mt-2 text-center ml-5 " role="alert">Updated Successfully</div>';
			}else{
				$passmsg = '<div class="alert alert-danger mt-2 text-center ml-5 " role="alert">Unable to Update</div>';
			}
		}
	}
?>
<!-- Start Profie Area 2nd Column -->
	<div class="col-sm-6 mt-5 mx-auto">
					
		<form action="" method="POST" class="mx-5 shadow-lg shadow-border-box p-4">
			<h3 class="text-center"><i class="fas fa-user-circle"></i> <label for="email" class="font-weight-bold pl-1">Profile View </label></h3>
			<div class="form-group mt-3">
			    <i class="far fa-address-book"></i> <label for="email" class="font-weight-bold pl-1">Email</label>
				<input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly>
			</div>
			<div class="form-group">
				<i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-1">Name</label>
				<input type="text" class="form-control" name="rName" id="rName" value="<?php echo $rName ?>">
			</div>
				<button type="submit" class="btn btn-info" name="nameupdate">Update</button>
					<?php if(isset($passmsg)) {echo $passmsg;}?>
				</form>
			</div>

<!-- End Profie Area -->

<?php 
include('includes/footer.php');
?>