<?php
define('TITLE','Dashboard');
define('PAGE','dashboard');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}
$sql = "SELECT max(request_id) FROM submitrequest";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$submitrequest = $row[0];

$sql = "SELECT max(request_id) FROM assingwork";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$assingwork = $row[0];

$sql = "SELECT * FROM developer";
$result = $conn->query($sql);
$totaldev = $result->num_rows;
?>



<!---Start dashboard 2nd column--->

<div class="col-sm-9 col-md-10">
	<div class="row text-center mx-5 mt-4">
		<div class="col-sm-4">
			<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
				<div class="card-header">Request Recieved</div>
				<div class="card-body">
				<div class="card-title"><?php echo $submitrequest; ?></div>
				<a href="request.php" class="btn text-white">View</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
				<div class="card-header">Assigned Work</div>
				<div class="card-body">
				<div class="card-title"><?php echo $assingwork; ?></div>
				<a href="work.php" class="btn text-white">View</a>
			</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
				<div class="card-header">No of Developers</div>
				<div class="card-body">
				<div class="card-title"><?php echo $totaldev; ?></div>
				<a href="developer.php" class="btn text-white">View</a>
				</div>
			</div>
		</div>
	</div>	
	<div class="mx-5 mt-4 text-center">
		<p class="bg-dark text-white p-2">List of Requester</p>
		<?php 
			$sql = "SELECT * FROM requesterlogin";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo'
					<table class="table table-striped table-bordered text-center">
						<thead>
							<tr>
								<th scope="col">Requester ID</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
							</tr>
						</thead>
						<tbody>';
						while($row = $result->fetch_assoc()){
						echo'<tr>';
							echo'<td>'.$row['r_login_id'].'</td>';
							echo'<td>'.$row['r_name'].'</td>';
							echo'<td>'.$row['r_email'].'</td>';
						echo'</tr>';
						}
						echo'</tbody>	
					</table>';
			}else{
				echo'<div class="alert alert-warning mt-2 text-center ml-5 " role="alert">No Reults Found</div>';
			}
		?>
	</div>
</div>

<!-- end 2nd column -->
<?php
include('includes/footer.php');
?>