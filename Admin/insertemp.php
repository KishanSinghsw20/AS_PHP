<?php
define('TITLE', 'Add Developer');
define('PAGE', 'developer');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}
if (isset($_REQUEST['empAdd'])) {
	if (($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
		$msg = '<div class="alert alert-warning mt-5 text-center col-sm-12 text-bold">Fill All Fields</div>';
	}else{
		$eName = $_REQUEST['empName'];
		$eCity = $_REQUEST['empCity'];
		$eMobile = $_REQUEST['empMobile'];
		$eEmail = $_REQUEST['empEmail'];
		$sql = "INSERT INTO developer (empName, empCity, empMobile, empEmail) VALUES ('$eName', '$eCity', '$eMobile', '$eEmail')";
		if ($conn->query($sql) == TRUE) {
			$msg = '<div class="alert alert-success mt-5 text-center col-sm-12 text-bold">Developer Added Successfully</div>';
		}else{
			$msg = '<div class="alert alert-danger mt-5 text-center col-sm-12 text-bold">Unable to Add Developer</div>';
		}
	}
}
?>

<!-- start 2nd column -->
<div class="col-sm-6 mt-5 mx-5 jumbotron">
	<h3 class="text-center"><i class="fas fa-user-edit"></i>&nbsp; Add New Developer</h3>
	<form action="" method="POST">
		<div class="form-group">
			<label for="empName">Name</label>
			<input type="text" class="form-control" id="empName" name="empName">
		</div>
		<div class="form-group">
			<label for="empCity">City</label>
			<input type="text" class="form-control" id="empCity" name="empCity">
		</div>
		<div class="form-group">
			<label for="empMobile">Mobile</label>
			<input type="text" class="form-control" id="empMobile" name="empMobile" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group">
			<label for="empEmail">Email</label>
			<input type="text" class="form-control" id="empEmail" name="empEmail">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-info mr-2" id="empAdd" name="empAdd">Add</button>
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