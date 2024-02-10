<?php 
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php');
include('../dbconnection.php');
session_start();
	if($_SESSION['is_login']){
		$rEmail = $_SESSION['$rEmail'];
	}else{
		echo "<script> location.href='RequesterLogin.php'</script>";
	}

	if(isset($_REQUEST['submitrequest'])){
		//Checking for empty fields
		if (($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")) {
			$msg = '<div class="alert alert-warning mt-2 text-center ml-5 col-sm-11 text-bold" role="alert">All Fields are Required</div>';
		}else{
			$rinfo = $_REQUEST['requestinfo'];
			$rdesc = $_REQUEST['requestdesc'];
			$rname = $_REQUEST['requestername'];
			$radd1 = $_REQUEST['requesteradd1'];
			$radd2 = $_REQUEST['requesteradd2'];
			$rcity = $_REQUEST['requestercity'];
			$rstate = $_REQUEST['requesterstate'];
			$rzip = $_REQUEST['requesterzip'];
			$remail = $_REQUEST['requesteremail'];
			$rmobile = $_REQUEST['requestermobile'];
			$rdate = $_REQUEST['requestdate'];
			$sql = "INSERT INTO submitrequest(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date)VALUES('$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
			if($conn->query($sql) == TRUE){
				$genid = mysqli_insert_id($conn);
				$msg = '<div class="alert alert-success mt-2 text-center ml-5 col-sm-11 text-bold" role="alert">Request Submitted Successfully</div>';
				$_SESSION['myid'] = $genid;
				echo "<script> location.href='submitrequestsuccess.php'</script>";
			}else{
				$msg = '<div class="alert alert-danger mt-2 text-center ml-5 col-sm-11 text-bold" role="alert">Unable to Submit Your Request</div>';
			}
		}
	}
?>
<!--Start Service Request 2nd column-->
	<div class="col-sm-9 col-md-10 mt-5">
		<form class="mx-5 shadow-lg shadow-border-box p-2" action="" method="POST">
			<h3 class="text-center"><i class="fas fa-calendar-day"></i><label for="" class="font-weight-bold pl-2">&nbsp; Submit Request</label></h3>
			<div class="form-group">
				<label for="inputRequestInfo">Request Info</label>
				 <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo" >
			</div>
			<div class="form-group">
				<label for="inputRequestDescription">Description</label>
				 <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc" >
			</div>
			<div class="form-group">
				<label for="inputName">Name</label>
				 <input type="text" class="form-control" id="inputName" placeholder="Name" name="requestername" >
			</div>	
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputAddress">Address Line 1</label>
				     <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="requesteradd1" >
				</div>
				<div class="form-group col-md-6">
					<label for="inputAddress2">Address Line 2</label>
				     <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="requesteradd2" >
				</div>	
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputCity">City</label>
				     <input type="text" class="form-control" id="inputCity" name="requestercity" >
				</div>
				<div class="form-group col-md-4">
					<label for="inputState">State</label>
				     <input type="text" class="form-control" id="inputState" name="requesterstate" >
				</div>
				<div class="form-group col-md-2">
					<label for="inputZip">Zip</label>
				     <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="javascript:return isInputNumber(event)" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail">Email</label>
				     <input type="email" class="form-control" id="inputEmail" name="requesteremail" >
				</div>
				<div class="form-group col-md-3">
					<label for="inputMobile">Mobile</label>
				     <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="javascript:return isInputNumber(event)" />
				</div>
				<div class="form-group col-md-3">
					<label for="inputDate">Date</label>
				     <input type="date" class="form-control" id="inputDate" name="requestdate">
				</div>
			</div>
			<button type="submit" class="btn btn-info" name="submitrequest">Submit</button>
			<button type="reset" class="btn btn-secondary">Reset</button>
			<?php if(isset($msg)){echo $msg;} ?>
		</form>
	</div>
<!--End Service Request 2nd column-->

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