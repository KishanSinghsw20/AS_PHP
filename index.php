<!DOCTYPE html>
<html lang="en">     
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--- Bootstrap CSS--->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!--- Font Awesome CSS--->
	<link rel="stylesheet" href="css/all.min.css"> 


	<!-- Google Font--->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">

	<!--- Custom CSS--->
	<link rel="stylesheet" href="css/custom.css">

	<title>Achiever Solution</title>

<!-- style -->

<style type="text/css">
.card{
	display: grid;
	font-family: roboto;
	border-radius: 18px;
	background: white;
	box-shadow: 5px 5px 15px rgba(0,0,0,0.9);
	text-align: center;
	transition: 0.5s ease;
	cursor: pointer;
}
.card:hover{
	transform: scale(1.2);
	box-shadow: 5px 5px 15px rgba(0,0,0,0.6);
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 15px;
  border: none;
  outline: none;
  background-color: #33CAFF;
  color: white;
  cursor: pointer;
  width: 50px;
  padding: 15px;
  border-radius: 44px;
  transition: .4s ease all;
}

#myBtn:hover {
  background-color: #33C1FF;
}

</style>

<!-- style end -->

</head>
<body>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
	<!---Start Navigation--->
	<nav class="navbar navbar-expand-sm p-2 navbar-dark bg-secondary fixed-top">
		<a href="index.php" class="navbar-brand">Achiever's Solution</a>
		<button type="button" class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#myMenu">
			<span class="navbar-toggler-icon my-toggler"></span>
		</button>
		<div class="collapse navbar-collapse" id="myMenu">
			<ul class="navbar-nav custom-nav">
				<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="#Service" class="nav-link">Services</a></li>
				<li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
				<li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
				<li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
			</ul>
		</div>
	</nav>
	<header class="jumbotron back-image" style="background-image:url(images/banner1.jpg);">
		<div class="myclass mainHeading">
			<h1 class="text-uppercase text-light font-weight-bold">Welcome To Achiever's Solution</h1>
			<p class="text-uppercase text-light font-italic">We Provide You A Best Service Of Our Company</p>
			<a href="Requester/RequesterLogin.php" class="btn btn-primary mr-4">Log In</a>
			<a href="#registration" class="btn btn-success mr-4">Sign Up</a>	
		</div>	
	</header>
	<!-- End Navigation-->
	<!---Start Introduction Section Container--->
	<div class="container">
		<div class="jumbotron">
			<h3 class="text-center">Achiever's Solution Services</h3>
				<p>ACHIEVER'S SOLUTION PRIVATE LIMITED is an Indian Company which is established on dated 15 May 2018. We are an online Website making company. We are inviting people for online Website Developing in India. We have 7 days delivery facility with COD. We are trying to reach a Website to customer directly.</p>
		</div>
	</div>
	<!---End Introduction Section Container--->

	<!---Start Services Section Container--->
	<div class="container text-center border-bottom" style="justify-content: space-around;" id="Service">
		<h2 class="text-uppercase">Our Services</h2>
			<div class="row mt-4">
				<div class="col-lg-4 col-sm-4 mb-4">
				<a href="#" class="card-body"><i class="fas fa-tv fa-8x text-success"></i></a>
				<h4 class="card-title mt-4">Web Templates</h4>
				</div>
				<div class=" col-lg-4 col-sm-4 mb-4">
				<a href="#" class="card-body"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
				<h4 class="card-title mt-4">Website Maintenance</h4>
				</div>
				<div class=" col-lg-4 col-sm-4 mb-4">
				<a href="#" class="card-body"><i class="fas fa-cogs fa-8x text-info"></i></a>
				<h4 class="card-title mt-4">Web Working</h4>
				</div>
			</div>
	</div>
	<!---End Services Section Container--->

	<!---Start Registration Form--->
	<?php include('UserRegistration.php')?>
	<!---End Registration Form--->

	<!---Start Happy Customer--->
	<div class="jumbotron bg-warning">
		<div class="container">
			<h2 class="text-center text-white">Happy Customers</h2>
				<div class="row mt-5">
					<!--Start 1st Column-->
					<div class="col-lg-3 col-sm-3">
						<div class="card shadow-lg mb-2">
							<div class="card-body text-center">
								<img src="images/4.jpg" alt="avt1" class="img-fluid" style="border-radius:100px;">
									<h4 class="card-title">Sweta Singh</h4>
										<p class="card-text">CEO, Web Developer</p>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-facebook-f"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-twitter"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-instagram"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-linkedin"></i></a>
							</div>
						</div>
					</div>
					<!--End 1st Column-->
					<!--Start 2nd Column-->
					<div class="col-lg-3 col-sm-3">
						<div class="card shadow-lg mb-2">
							<div class="card-body text-center">
								<img src="images/2.jpg" alt="avt1" class="img-fluid" style="border-radius:100px;">
									<h4 class="card-title">Kishan Singh</h4>
										<p class="card-text">CEO, Web Learner</p>
										<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-facebook-f"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-twitter"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-instagram"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-linkedin"></i></a>
							</div>
						</div>
					</div>
					<!--End 2nd Column-->
					<!--Start 3rd Column-->
					<div class="col-lg-3 col-sm-3">
						<div class="card shadow-lg mb-2">
							<div class="card-body text-center">
								<img src="images/1.jpg" alt="avt1" class="img-fluid" style="border-radius:100px;">
									<h4 class="card-title">Prekshika Singh</h4>
										<p class="card-text">CEO, Web Editor</p>
										<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-facebook-f"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-twitter"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-instagram"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-linkedin"></i></a>

							</div>
						</div>
					</div>
					<!--End 3rd Column-->
					<!--Start 4th Column-->
					<div class="col-lg-3 col-sm-3">
						<div class="card shadow-lg mb-2">
							<div class="card-body text-center">
								<img src="images/3.jpg" alt="avt1" class="img-fluid" style="border-radius:100px;">
									<h4 class="card-title">Baibhav Singh</h4>
										<p class="card-text">CEO, Web Addictor</p>
										<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-facebook-f"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-twitter"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-instagram"></i></a>
									<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-linkedin"></i></a>
							</div>
						</div>
					</div>
					<!--End 4th Column-->
				</div>
		</div>
	</div>
	<!---End Happy Customer--->

	<!--Start Contact Us--->
	<div class="container" id="contact">
		<h2 class="text-center mb-4">Contact Us</h2>
			<div class="row">
				<!---Start 1st Column--->
				<?php include('ContactForm.php')?>
				<!---End 1st Column--->
				<!---Start 2nd Column--->
				<div class="col-md-4 text-center">
					<strong>Headquarter:</strong><br>
					Achiever's Solution Pvt. Ltd.<br>
					B-2-B DASS GARDEN BAPROLA, New Delhi-110043<br>
					Phone: +91 88105 92193<br>
					<a href="#" target="_blank">WWW.AS.COM</a><br>
					<br> <br>
					<strong>Branch:</strong><br>
					Achiever's Solution Pvt. Ltd.<br>
					Dharamtala Market, Kolkata-700039<br>
					Phone: +91 93397 22188<br>
					<a href="#" target="_blank">WWW.AS.COM</a><br>
				</div>
				<!---End 2nd Column--->
			</div>
	</div>
	<!--End Contact Us--->


	<!---Start Footer--->
	<footer class="container-fluid bg-dark mt-5 text-white">
		<div class="container">
			<div class="row py-3">
				<!---Start 1st column---> 
				<div class="col-md-6">
					<span class="pr-2">Follow Us:</span>
					<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-facebook-f"></i></a>
					<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-twitter"></i></a>
					<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-youtube"></i></a>
					<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-google-plus-g"></i></a>
					<a href="#" target="_blank" class="pr-2 fi-color" ><i class="fas fa-rss"></i></a>
				</div>
				<!---End 1st column--->
				<!---Start 2nd column--->
				<div class="col-md-6 text-right">
					<small>&copy;2020 copyright | Designed by Web Addictor</small> 
					<small class="ml-2"><a href="Admin/login.php">Admin-Login</a></small>
				</div>
				<!---End 2nd column---> 
			</div>
		</div>
	</footer>
	<!---End Footer--->

	<!---JavaScript--->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="js/all.min.js"></script>
	<!---End JavaScript--->
	<!-- Scroll UP javascript -->
	<script>
	//Get the button
	var mybutton = document.getElementById("myBtn");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	    mybutton.style.display = "block";
	  } else {
	    mybutton.style.display = "none";
	  }
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
	  document.body.scrollTop = 0;
	  document.documentElement.scrollTop = 0;
	}
	</script>
<!-- End of javscript for scrol up -->
</body>
</html>