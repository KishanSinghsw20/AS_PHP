<?php
define('TITLE','Sell Product');
define('PAGE','assets');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail = $_SESSION['$aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}
if (isset($_REQUEST['psubmit'])) {
		    if (($_REQUEST['cname'] == "") || ($_REQUEST['cadd'] == "") || ($_REQUEST['pname'] == "") || ($_REQUEST['pquantity'] == "") || ($_REQUEST['psellingcost'] == "") || ($_REQUEST['totalcost'] == "") || ($_REQUEST['selldate'] == "")) {
		    	$msg = '<div class="alert alert-warning mt-5 text-center col-sm-12 text-bold">Fill All Fields</div>';
		    }else{
		    	$pid = $_REQUEST['pid'];
		    	$pava = $_REQUEST['pava'] - $_REQUEST['pquantity'];


		    	$custname = $_REQUEST['cname'];
		    	$custadd = $_REQUEST['cadd'];
		    	$cpname = $_REQUEST['pname'];
		    	$cpquantity = $_REQUEST['pquantity'];
		    	$cpeach = $_REQUEST['psellingcost'];
		    	$cptotal = $_REQUEST['totalcost'];
		    	$cpdate = $_REQUEST['selldate'];

		    	$sql = "INSERT INTO customer (custname, custadd, cpname, cpquantity, cpeach, cptotal, cpdate) VALUES ('$custname', '$custadd', '$cpname', '$cpquantity', '$cpeach', '$cptotal', '$cpdate')";
		    	if ($conn->query($sql) == TRUE) {
		    		$genid = mysqli_insert_id($conn);
		    		session_start();
		    		$_SESSION['myid'] = $genid;
		    		echo "<script> location.href = 'productsellsuccess.php'; </script>";
		    	}
		    	$sqlup = "UPDATE assets SET pava = '$pava' WHERE pid = '$pid'";
		    	$conn->query($sqlup);
		    }
		}
?>
<!-- start of 2nd column -->
<div class="col-sm-5 mx-auto mt-4 jumbotron">
	<h3 class="text-center mb-4"><i class="fas fa-rupee-sign"></i>&nbsp; Customer Bill</h3>
	<?php 
		if (isset($_REQUEST['issue'])) {
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
			<label for="cname">Customer Name</label>
			<input type="text" class="form-control" id="cname" name="cname">
		</div>
		<div class="form-group">
			<label for="cadd">Customer Address</label>
			<input type="text" class="form-control" id="cadd" name="cadd">
		</div>
		<div class="form-group">
			<label for="pname">Product Name</label>
			<input type="text" class="form-control" id="pname" name="pname" value="<?php if(isset($row['pname']))echo $row['pname']; ?>">
		</div>
		<div class="form-group">
			<label for="pava">Available</label>
			<input type="text" class="form-control" id="pava" name="pava" value="<?php if(isset($row['pava']))echo $row['pava']; ?>" onkeypress="javascript:return isInputNumber(event)" readonly/>
		</div>
		<div class="form-group">
			<label for="pquantity">Quantity</label>
			<input type="text" class="form-control" id="pquantity" name="pquantity" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group">
			<label for="psellingcost">Price Each</label>
			<input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php if(isset($row['psellingcost']))echo $row['psellingcost']; ?>" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group">
			<label for="totalcost">Total Price</label>
			<input type="text" class="form-control" id="totalcost" name="totalcost" onkeypress="javascript:return isInputNumber(event)" />
		</div>
		<div class="form-group col-md-6 mr-auto">
			<label for="inputDate">Date</label>
			<input type="date" class="form-control" id="inputDate" name="selldate">
		</div>
		<div class="text-center">
	    	<button type="submit" class="btn btn-success mr-2" name="psubmit" id="psubmit">Submit</button>
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