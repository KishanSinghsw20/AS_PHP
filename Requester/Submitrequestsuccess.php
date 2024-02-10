<?php
define('TITLE', 'Success');
define('PAGE', 'SubmitRequest');
include('includes/header.php');
include('../dbconnection.php');
session_start();
	if($_SESSION['is_login']){
		$rEmail = $_SESSION['$rEmail'];
	}else{
		echo "<script> location.href='RequesterLogin.php'</script>";
	}
	$sql = "SELECT * FROM submitrequest WHERE request_id = {$_SESSION['myid']}";
	$result = $conn->query($sql);
	if($result->num_rows == 1){
		$row = $result->fetch_assoc();
		echo "<div class='ml-5 mx-auto mt-5 shadow-lg shadow-border-box p-2'>
				<table class='table table-striped table-bordered text-center'>
					<h3 class='text-center mt-3'><i class='fas fa-receipt'></i>&nbsp; Request Recipt</h3>
					<tbody>
						<tr>
							<th>Request Id</th>
								<td>".$row['request_id']."</td>
						</tr>
						<tr>
							<th>Name</th>
								<td>".$row['requester_name']."</td>
						</tr>
						<tr>
							<th>Email Id</th>
								<td>".$row['requester_email']."</td>
						</tr>
						<tr>
							<th>Request Info</th>
								<td>".$row['request_info']."</td>
						</tr>
						<tr>
							<th>Request Description</th>
								<td>".$row['request_desc']."</td>
						</tr>
					</tbody>
				</table>
				<div class='text-center'>
				<form class='d-print-none'>
				<input class='btn btn-primary mr-2' type='submit' value='Print' onClick='window.print()'>
				<a href='SubmitRequest.php' class='btn btn-secondary d-print-none'>Close</a>
				</form>
				</div>
			</div>";
	}else{
		echo "Failed";
	}
?>

<?php 
include('includes/footer.php');
?>