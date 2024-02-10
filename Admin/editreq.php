<?php
define('TITLE', 'Edit Requester');
define('PAGE', 'requester');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}
if (isset($_REQUEST['r_Update'])) {
	if (($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "")){
		$msg = '<div class="alert alert-warning mt-5 text-center col-sm-12 text-bold">Fill All Fields</div>';
	}else{
		$rid = $_REQUEST['r_login_id'];
		$rname = $_REQUEST['r_name'];
		$remail = $_REQUEST['r_email'];
		$sql = "UPDATE requesterlogin SET r_name = '$rname', r_email = '$remail' WHERE r_login_id = '$rid'";
		if ($conn->query($sql) == TRUE) {
			$msg = '<div class="alert alert-success mt-5 text-center col-sm-12 text-bold">Requester Updated Successfully</div>';
		}else{
			$msg = '<div class="alert alert-danger mt-5 text-center col-sm-12 text-bold">Unable to Add Requester</div>';
		}
	}
}
?>
<!-- start 2nd column -->
<div class="col-sm-6 mt-5 mx-5 jumbotron">
	<h3 class="text-center"><i class="fas fa-user-check"></i>&nbsp; Edit Requester</h3>
	<?php 
		if (isset($_REQUEST['view'])) {
			$sql = "SELECT * FROM requesterlogin WHERE r_login_id = {$_REQUEST['id']}";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}
	?>
	<form action="" method="POST">
		<div class="form-group">
			<label for="r_login_id">Emp Id</label>
			<input type="text" class="form-control" id="r_login_id" name="r_login_id" value="<?php if(isset($row['r_login_id'])) {echo $row['r_login_id']; } ?>" readonly>
		</div>
		<div class="form-group">
			<label for="r_name">Name</label>
			<input type="text" class="form-control" id="r_name" name="r_name" value="<?php if(isset($row['r_name'])) {echo $row['r_name']; } ?>">
		</div>
		<div class="form-group">
			<label for="r_email">Email</label>
			<input type="text" class="form-control" id="r_email" name="r_email" value="<?php if(isset($row['r_email'])) {echo $row['r_email']; } ?>">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-info mr-2" id="r_Update" name="r_Update">Update</button>
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