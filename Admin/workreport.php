<?php
define('TITLE','Work Report');
define('PAGE','workreport');
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
	 	$sql = "SELECT * FROM assingwork WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
	 	$result = $conn->query($sql);
	 	if($result->num_rows > 0){
	 		echo '<p class="bg-dark text-white p-2 mt-4">Details</p>';
	 		 	echo '<table class="table table-striped table-bordered text-center">';
	 		 		echo '<thead>';
	 		 			echo '<tr>';
	 		 				echo '<th scope="col">Req Id</th>';
	 		 				echo '<th scope="col">Request Info</th>';
	 		 				echo '<th scope="col">Name</th>';
	 		 				echo '<th scope="col">Address</th>';
	 		 				echo '<th scope="col">City</th>';
	 		 				echo '<th scope="col">Mobile</th>';
	 		 				echo '<th scope="col">Developer</th>';
	 		 				echo '<th scope="col">Assigned Date</th>';
	 		 			echo '</tr>';
	 		 		echo '</thead>';
	 		 		echo '<tbody>';
	 		 			while ($row = $result->fetch_assoc()) {
	 		 				echo '<tr>';
	 		 					echo '<td>'.$row['request_id'].'</td>';
	 		 					echo '<td>'.$row['request_info'].'</td>';
	 		 					echo '<td>'.$row['requester_name'].'</td>';
	 		 					echo '<td>'.$row['requester_add2'].'</td>';
	 		 					echo '<td>'.$row['requester_city'].'</td>';
	 		 					echo '<td>'.$row['requester_mobile'].'</td>';
	 		 					echo '<td>'.$row['assign_deve'].'</td>';
	 		 					echo '<td>'.$row['assign_date'].'</td>';
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