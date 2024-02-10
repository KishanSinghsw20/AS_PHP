<?php
define('TITLE', 'Add Requester');
define('PAGE', 'requester');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}
if (isset($_REQUEST['r_Add'])) {
	if (($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "") || ($_REQUEST['r_password'] == "")){
		$msg = '<div class="alert alert-warning mt-5 text-center col-sm-12 text-bold">Fill All Fields</div>';
	}else{
		$rname = $_REQUEST['r_name'];
		$remail = $_REQUEST['r_email'];
		$rpass = $_REQUEST['r_password'];
		$sql = "INSERT INTO requesterlogin (r_name, r_email, r_password) VALUES ('$rname', '$remail', '$rpass')";
		if ($conn->query($sql) == TRUE) {
			$msg = '<div class="alert alert-success mt-5 text-center col-sm-12 text-bold">Requester Added Successfully</div>';
		}else{
			$msg = '<div class="alert alert-danger mt-5 text-center col-sm-12 text-bold">Unable to Add Requester</div>';
		}
	}
}
?>

<!-- start 2nd column -->
<div class="col-sm-6 mt-5 mx-5 jumbotron">
	<h3 class="text-center"><i class="fas fa-user"></i>&nbsp; Add New Requester</h3>
	<form action="" method="POST">
		<div class="form-group">
			<label for="r_name">Name</label>
			<input type="text" class="form-control" id="r_name" name="r_name">
		</div>
		<div class="form-group">
			<label for="r_email">Email</label>
			<input type="text" class="form-control" id="r_email" name="r_email">
		</div>
		<div class="form-group">
			<label for="r_password">Password</label>
			<input type="password" class="form-control" id="r_password" name="r_password">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-info mr-2" id="r_Add" name="r_Add">Add</button>
			<a href="requester.php"  class="btn btn-secondary">Close</a>
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