<?php
define('TITLE','Assigned Work Order');
define('PAGE','work');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}
?>
<!-- Start 2nd column -->
<div class="col-sm-6 mt-5 mx-auto shadow-lg shadow-border-box p-4">
	<h3 class="text-center"><i class="fas fa-calendar-week"></i>&nbsp; Assigned Work Details</h3>
	<?php
		if (isset($_REQUEST['view'])) {
			$sql = "SELECT * FROM assingwork WHERE request_id = {$_REQUEST['id']}";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();?>
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
		<div class="text-center mb-3 mr-3">
			<form action="" class="mb-4 d-print-none d-inline">
				<input class="btn btn-primary" type="submit" value="Print" onClick="window.print()"></form>
			<form action="work.php" class="mb-4 d-print-none d-inline">
				<input class="btn btn-secondary" type="submit" value="Close">
			</form>
		</div>
	<?php } ?>
</div>
<!-- Ens 2nd column -->
<?php
include('includes/footer.php');
?>