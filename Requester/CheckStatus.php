<?php 
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
include('includes/header.php');
include('../dbconnection.php');
session_start();
	if($_SESSION['is_login']){
		$rEmail = $_SESSION['$rEmail'];
	}else{
		echo "<script> location.href='RequesterLogin.php'</script>";
	}
?>

<!-- Start 2nd column -->

<div class="col-sm-6 mt-5 mx-3">
	<form action="" method="POST" class="form-inline d-print-none">
		<div class="form-group mr-3">
			<label for="checkid" class="mr-3">Enter Request ID: </label>
			<input type="text" class="form-control" name="checkid" id="checkid" onkeypress="javascript:return isInputNumber(event)"/>
		</div>
		<button type="submit" class="btn btn-primary">Search</button>
	</form>
	<?php 
		if (isset($_REQUEST['checkid'])) {
			if ($_REQUEST['checkid'] == "") {
				$msg = '<div class="alert alert-warning mt-4 col-sm-6 ml-5 text-center" role="alert">Fill to Find the Work</div>';
			}else{
				$sql = "SELECT * FROM assingwork WHERE request_id = {$_REQUEST['checkid']}";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			if (($row['request_id'] == $_REQUEST['checkid'])) {
	?>
	<div class="mt-4 shadow-lg shadow-border-box p-2">
	<h3 class="text-center mt-2"><i class="fas fa-tasks"></i>&nbsp; Assigned Work Details</h3>
		<table class="table table-bordered mt-3">
			<tbody>
				<tr>
					<td>Request ID</td>
					<td><?php if (isset($row['request_id'])) {echo $row['request_id'];} ?></td>
				</tr>
				<tr>
					<td>Request Info</td>
					<td><?php if (isset($row['request_info'])) {echo $row['request_info'];} ?></td>
				</tr>
				<tr>
					<td>Request Description</td>
					<td><?php if (isset($row['request_desc'])) {echo $row['request_desc'];} ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php if (isset($row['requester_name'])) {echo $row['requester_name'];} ?></td>
				</tr>
				<tr>
					<td>Address 1</td>
					<td><?php if (isset($row['requester_add1'])) {echo $row['requester_add1'];} ?></td>
				</tr>
				<tr>
					<td>Address 2</td>
					<td><?php if (isset($row['requester_add2'])) {echo $row['requester_add2'];} ?></td>
				</tr>
				<tr>
					<td>City</td>
					<td><?php if (isset($row['requester_city'])) {echo $row['requester_city'];} ?></td>
				</tr>
				<tr>
					<td>State</td>
					<td><?php if (isset($row['requester_state'])) {echo $row['requester_state'];} ?></td>
				</tr>
				<tr>
					<td>Zip</td>
					<td><?php if (isset($row['requester_zip'])) {echo $row['requester_zip'];} ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php if (isset($row['requester_email'])) {echo $row['requester_email'];} ?></td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td><?php if (isset($row['requester_mobile'])) {echo $row['requester_mobile'];} ?></td>
				</tr>
				<tr>
					<td>Assigned Date</td>
					<td><?php if (isset($row['assign_date'])) {echo $row['assign_date'];} ?></td>
				</tr>
				<tr>
					<td>Developer Name</td>
					<td><?php if (isset($row['assign_deve'])) {echo $row['assign_deve'];} ?></td>
				</tr>
				<tr>
					<td>Customer Sign</td>
					<td></td>
				</tr>
				<tr>
					<td>Developer Sign</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div class="text-center">
			<form action="" class="mb-3 d-print-none">
				<input class="btn btn-primary" type="submit" value="Print" onClick="window.print()">
				<input class="btn btn-secondary" type="submit" value="Close">
			</form>
		</div>
	<?php }else{
		echo '<div class="alert alert-info mt-4 col-sm-6 ml-5 text-center">Your Request is Still Pending</div>';
			}
			
	} 
}
?>
<?php if(isset($msg)){echo $msg;} ?>
</div>
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