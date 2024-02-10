<?php
define('TITLE','Edit Product');
define('PAGE','assets');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}
if (isset($_REQUEST['pedit'])) {
		    if (($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")) {
		    	$msg = '<div class="alert alert-warning mt-5 text-center col-sm-12 text-bold">Fill All Fields</div>';
		    }else{
		    	$pid = $_REQUEST['pid'];
		    	$pname = $_REQUEST['pname'];
		    	$pdop = $_REQUEST['pdop'];
		    	$pava = $_REQUEST['pava'];
		    	$ptotal = $_REQUEST['ptotal'];
		    	$poriginalcost = $_REQUEST['poriginalcost'];
		    	$psellingcost = $_REQUEST['psellingcost'];

		    	$sql = "UPDATE assets SET pname = '$pname', pdop = '$pdop', pava = '$pava', ptotal = '$ptotal', poriginalcost = '$poriginalcost', psellingcost = '$psellingcost' WHERE pid = '$pid'";
		    	if ($conn->query($sql) == TRUE) {
		    		$msg = '<div class="alert alert-success mt-5 text-center col-sm-12 text-bold">Product Updated Successfully</div>';
		    	}else{
		    		$msg = '<div class="alert alert-danger mt-5 text-center col-sm-12 text-bold">Unable to Update Product</div>';
		    	}
		    }
		}
?>
<!-- start of 2nd column -->
<div class="col-sm-5 mx-auto mt-4 jumbotron">
	<h3 class="text-center mb-4"><i class="fas fa-calendar-plus"></i>&nbsp; Edit Product Details</h3>
	<?php 
		if (isset($_REQUEST['view'])) {
			$sql = "SELECT * FROM assets WHERE pid = {$_REQUEST['id']}";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}
	?>
	<form action="" method="POST">
		<div class="form-group">
			<label for="pid">Product Id</label>
			<input type="text" class="form-control" id="pid" name="pid" value="<?php if(isset($row['pid']))echo $row['pid']; ?>" readonly/>
		</div>
		<div class="form-group">
			<label for="pname">Product Name</label>
			<input type="text" class="form-control" id="pname" name="pname" value="<?php if(isset($row['pname']))echo $row['pname']; ?>">
		</div>
		<div class="form-group">
			<label for="pdop">Date of Purchase</label>
			<input type="date" class="form-control" id="pdop" name="pdop" value="<?php if(isset($row['pdop']))echo $row['pdop']; ?>">
		</div>
		<div class="form-group">
			<label for="pava">Available</label>
			<input type="text" class="form-control" id="pava" name="pava" value="<?php if(isset($row['pava']))echo $row['pava']; ?>" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group">
			<label for="ptotal">Total</label>
			<input type="text" class="form-control" id="ptotal" name="ptotal" value="<?php if(isset($row['ptotal']))echo $row['ptotal']; ?>" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group">
			<label for="poriginalcost">Original Cost Each</label>
			<input type="text" class="form-control" id="poriginalcost" name="poriginalcost" value="<?php if(isset($row['poriginalcost']))echo $row['poriginalcost']; ?>" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group">
			<label for="psellingcost">Selling Cost Each</label>
			<input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php if(isset($row['psellingcost']))echo $row['psellingcost']; ?>" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="text-center">
	    	<button type="submit" class="btn btn-success mr-2" name="pedit" id="pedit">Update</button>
	    	<a href="assets.php" class="btn btn-dark">Close</a>
	    </button>
	    </div>
	</form>
	<?php if(isset($msg)){echo $msg;} ?>	
</div>
<!-- end of 2nd column -->
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