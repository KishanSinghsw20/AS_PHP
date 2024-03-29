<?php
define('TITLE','Sell Report');
define('PAGE','sellreport');
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
<div class="col-sm-9 col-md-10 mt-5 text-center">
	<form action="" method="POST" class="d-print-none">
		<div class="form-row">
			<div class="form-group col-md-2">
				<input type="date" class="form-control" id="startdate" name="startdate">
			</div><span class="text-bolder" style="font-size: 24px;">&nbsp;  to  &nbsp;</span>
			<div class="form-group col-md-2">
				<input type="date" class="form-control" id="enddate" name="enddate">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="searchsubmit" value=""><i class="fas fa-search"></i></button>
			</div>
		</div>
	</form>
	<?php
	if (isset($_REQUEST['searchsubmit'])) {
	 	$startdate = $_REQUEST['startdate'];
	 	$enddate = $_REQUEST['enddate'];
	 	$sql = "SELECT * FROM customer WHERE cpdate BETWEEN '$startdate' AND '$enddate'";
	 	$result = $conn->query($sql);
	 	if($result->num_rows > 0){
	 		echo '<p class="bg-dark text-white p-2 mt-4">Details</p>';
	 		 	echo '<table class="table table-striped table-bordered text-center">';
	 		 		echo '<thead>';
	 		 			echo '<tr>';
	 		 				echo '<th scope="col">Customer Id</th>';
	 		 				echo '<th scope="col">Customer Name</th>';
	 		 				echo '<th scope="col">Address</th>';
	 		 				echo '<th scope="col">Product Name</th>';
	 		 				echo '<th scope="col">Quantity</th>';
	 		 				echo '<th scope="col">Price Each</th>';
	 		 				echo '<th scope="col">Total</th>';
	 		 				echo '<th scope="col">Date</th>';
	 		 			echo '</tr>';
	 		 		echo '</thead>';
	 		 		echo '<tbody>';
	 		 			while ($row = $result->fetch_assoc()) {
	 		 				echo '<tr>';
	 		 					echo '<td>'.$row['custid'].'</td>';
	 		 					echo '<td>'.$row['custname'].'</td>';
	 		 					echo '<td>'.$row['custadd'].'</td>';
	 		 					echo '<td>'.$row['cpname'].'</td>';
	 		 					echo '<td>'.$row['cpquantity'].'</td>';
	 		 					echo '<td>'.$row['cpeach'].'</td>';
	 		 					echo '<td>'.$row['cptotal'].'</td>';
	 		 					echo '<td>'.$row['cpdate'].'</td>';
	 		 				echo '</tr>';
	 		 			}
	 		 		echo '</tbody>';
	 		 	echo '</table>';
	 		 	echo '<input type="submit" class="btn btn-info d-print-none" value="Print" onClick="window.print()">';
	 	}else{
	 		echo "<div class='alert alert-warning col-sm-6 mt-2' role='alert'> No Records Found ! </div>";
	 	}
	 } 
	?>
</div>
<!-- End 2nd column -->

<?php
include('includes/footer.php');
?>