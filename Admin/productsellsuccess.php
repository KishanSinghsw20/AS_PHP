<?php
define('TITLE','Success');
define('PAGE','assets');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}

$sql = "SELECT * FROM customer WHERE custid = {$_SESSION['myid']}";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
	$row = $result->fetch_assoc();
	echo "<div class='mx-auto ml-5 mt-5 shadow-lg shadow-border-box p-2'>
			<h3 class='text-center'><i class='fas fa-rupee-sign'></i>&nbsp; Customer Bill</h3>
			<table class='table table-striped table-bordered text-center'> 
				<tr>
							<th>Customer Id</th>
								<td>".$row['custid']."</td>
						</tr>
						<tr>
							<th>Customer Name</th>
								<td>".$row['custname']."</td>
						</tr>
						<tr>
							<th>Address</th>
								<td>".$row['custadd']."</td>
						</tr>
						<tr>
							<th>Product</th>
								<td>".$row['cpname']."</td>
						</tr>
						<tr>
							<th>Quantity</th>
								<td>".$row['cpquantity']."</td>
						</tr>
						<tr>
							<th>Price Each</th>
								<td>".$row['cpeach']."</td>
						</tr>
						<tr>
							<th>Total Cost</th>
								<td>".$row['cptotal']."</td>
						</tr>
						<tr>
							<th>Date</th>
								<td>".$row['cpdate']."</td>
						</tr>
					</tbody>
				</table>
				<div class='text-center'>
				<form class='d-print-none'>
				<input class='btn btn-primary mr-2' type='submit' value='Print' onClick='window.print()'>
				<a href='assets.php' class='btn btn-secondary d-print-none'>Close</a>
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