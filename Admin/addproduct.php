<?php
define('TITLE','Add New Product');
define('PAGE','assets');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}
if (isset($_REQUEST['padd'])) {
		    if (($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")) {
		    	$msg = '<div class="alert alert-warning mt-5 text-center col-sm-12 text-bold">Fill All Fields</div>';
		    }else{
		    	$pname = $_REQUEST['pname'];
		    	$pdop = $_REQUEST['pdop'];
		    	$pava = $_REQUEST['pava'];
		    	$ptotal = $_REQUEST['ptotal'];
		    	$poriginalcost = $_REQUEST['poriginalcost'];
		    	$psellingcost = $_REQUEST['psellingcost'];

		    	$sql = "INSERT INTO assets (pname, pdop, pava, ptotal, poriginalcost, psellingcost) VALUES ('$pname', '$pdop', '$pava', '$ptotal', '$poriginalcost', '$psellingcost')";
		    	if ($conn->query($sql) == TRUE) {
		    		$msg = '<div class="alert alert-success mt-5 text-center col-sm-12 text-bold">Add Product Successfully</div>';
		    	}else{
		    		$msg = '<div class="alert alert-danger mt-5 text-center col-sm-12 text-bold">Unable to Add Product</div>';
		    	}
		    }
		}
?>
<!-- start of 2nd column -->
<div class="col-sm-5 mx-auto mt-4 jumbotron">
	<h3 class="text-center mb-4"><i class="fas fa-calendar-day"></i>&nbsp; Add New Product</h3>
	<form action="" method="POST">
		<div class="form-group">
			<label for="pname">Product Name</label>
			<input type="text" class="form-control" id="pname" name="pname">
		</div>
		<div class="form-group">
			<label for="pdop">Date of Purchase</label>
			<input type="date" class="form-control" id="pdop" name="pdop">
		</div>
		<div class="form-group">
			<label for="pava">Available</label>
			<input type="text" class="form-control" id="pava" name="pava"onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group">
			<label for="ptotal">Total</label>
			<input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group">
			<label for="poriginalcost">Original Cost Each</label>
			<input type="text" class="form-control" id="poriginalcost" name="poriginalcost" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group">
			<label for="psellingcost">Selling Cost Each</label>
			<input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="text-center">
	    	<button type="submit" class="btn btn-success mr-2" name="padd" id="padd">Add</button>
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