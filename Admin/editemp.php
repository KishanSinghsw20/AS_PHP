<?php
define('TITLE', 'Edit Developer');
define('PAGE', 'developer');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}
if (isset($_REQUEST['empUpdate'])) {
	if (($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
		$msg = '<div class="alert alert-warning mt-5 text-center col-sm-12 text-bold">Fill All Fields</div>';
	}else{
		$eId = $_REQUEST['empId'];
		$eName = $_REQUEST['empName'];
		$eCity = $_REQUEST['empCity'];
		$eMobile = $_REQUEST['empMobile'];
		$eEmail = $_REQUEST['empEmail'];
		$sql = "UPDATE developer SET empName = '$eName', empCity = '$eCity', empMobile = '$eMobile', empEmail = '$eEmail' WHERE empid = '$eId'";
		if ($conn->query($sql) == TRUE) {
			$msg = '<div class="alert alert-success mt-5 text-center col-sm-12 text-bold">Developer Updated Successfully</div>';
		}else{
			$msg = '<div class="alert alert-danger mt-5 text-center col-sm-12 text-bold">Unable to Add Developer</div>';
		}
	}
}
?>
<!-- start 2nd column -->
<div class="col-sm-6 mt-5 mx-5 jumbotron">
	<h3 class="text-center"><i class="fas fa-user-cog"></i>&nbsp; Edit Developer</h3>
	<?php 
		if (isset($_REQUEST['view'])) {
			$sql = "SELECT * FROM developer WHERE empid = {$_REQUEST['id']}";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}
	?>
	<form action="" method="POST">
		<div class="form-group">
			<label for="empId">Emp Id</label>
			<input type="text" class="form-control" id="empId" name="empId" value="<?php if(isset($row['empid'])) {echo $row['empid']; } ?>" readonly>
		</div>
		<div class="form-group">
			<label for="empName">Name</label>
			<input type="text" class="form-control" id="empName" name="empName" value="<?php if(isset($row['empName'])) {echo $row['empName']; } ?>">
		</div>
		<div class="form-group">
			<label for="empCity">City</label>
			<input type="text" class="form-control" id="empCity" name="empCity" value="<?php if(isset($row['empCity'])) {echo $row['empCity']; } ?>">
		</div>
		<div class="form-group">
			<label for="empMobile">Mobile</label>
			<input type="text" class="form-control" id="empMobile" name="empMobile" value="<?php if(isset($row['empMobile'])) {echo $row['empMobile']; } ?>" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group">
			<label for="empEmail">Email</label>
			<input type="text" class="form-control" id="empEmail" name="empEmail" value="<?php if(isset($row['empEmail'])) {echo $row['empEmail']; } ?>">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-info mr-2" id="empUpdate" name="empUpdate">Update</button>
			<a href="developer.php"  class="btn btn-secondary">Close</a>
		</div>
		<?php if(isset($msg)) {echo $msg;} ?>
	</form>
</div>
<!-- End 2nd column -->
<!-- Only Nmber for Input Fields -->
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isInputNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>

<?php
include('includes/footer.php');
?>