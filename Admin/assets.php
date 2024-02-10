<?php
define('TITLE','Assets');
define('PAGE','assets');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}

?>
<!-- Start 2nd Column -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
	<p class="bg-dark text-white p-2">Products Details</p>
	<?php 
		$sql = "SELECT * FROM assets";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo '<table class="table table-striped table-bordered text-center">';
			echo '<thead>';
					echo '<tr>';
						echo '<th scope="col">Product Id</th>';
						echo '<th scope="col">Name</th>';
						echo '<th scope="col">DOP</th>';
						echo '<th scope="col">Available</th>';
						echo '<th scope="col">Total</th>';
						echo '<th scope="col">Original Cost Each</th>';
						echo '<th scope="col">Selling Cost Each</th>';
						echo '<th scope="col">Action</th>';
					echo '<tr>';
				echo '</thead>';
					echo '<tbody>';
					  while ($row = $result->fetch_assoc()){
						echo '<tr>';
							echo '<td>'.$row['pid'].'</td>';
							echo '<td>'.$row['pname'].'</td>';
							echo '<td>'.$row['pdop'].'</td>';
							echo '<td>'.$row['pava'].'</td>';
							echo '<td>'.$row['ptotal'].'</td>';
							echo '<td>'.$row['poriginalcost'].'</td>';
							echo '<td>'.$row['psellingcost'].'</td>';
							echo '<td>';
								echo '<form action="editproduct.php" method="post" class="mr-2 d-inline">';
									echo'<input type="hidden" name="id" value='.$row["pid"].'><button class="btn btn-info " name="view" value="View" type="submit"><i class="fas fa-edit"></i></button>';
								echo '</form>';
								echo '<form action="" method="post" class="mr-2 d-inline">';
									echo'<input type="hidden" name="id" value='.$row["pid"].'><button class="btn btn-secondary" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>';
								echo '</form>';
								echo '<form action="sellproduct.php" method="post" class="d-inline">';
									echo'<input type="hidden" name="id" value='.$row["pid"].'><button class="btn btn-success" name="issue" value="Issue"><i class="fas fa-hands-helping"></i></button>';
								echo '</form>';
							echo '</td>';
						echo '</tr>';
					}
					echo '</tbody>';
			echo '</table>';
		}else{
			echo "<div class='alert alert-warning col-sm-6 mt-2' role='alert'> No Records Found ! </div>";
		}
		if (isset($_REQUEST['delete'])) {
			$sql = "DELETE FROM assets WHERE pid = {$_REQUEST['id']}";
			if ($conn->query($sql) == TRUE) {
				echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
			}else{
				echo "<div class='alert alert-warning col-sm-6 mt-2' role='alert'> Unable to Delete Data </div>";
			}
		}
	?>
		
</div>
<div class="pull-left ml-auto mr-2"><a href="addproduct.php" class="btn btn-info"><i class="fas fa-plus fa-2x"></i></a></div>
<!-- End 2nd column -->

<?php
include('includes/footer.php');
?>