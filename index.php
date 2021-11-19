<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Review Writing</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<script src='main.js'></script>
	<link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
	<link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
	

	<link rel='stylesheet' type='text/css' media='screen' href='css/animate.css'>
	<link rel='stylesheet' type='text/css' media='screen' href='css/second-footer.css'>

	<script src="js/wow.min.js"></script>
<script>
              new WOW().init();

   function validateEmail(id){
		var element = document.getElementById(id);
		var regExp = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
		if(!regExp.test(element.value)){
			alert("Enter valid Email. ");
			element.style.border = "2px solid red";
			//elment.focus();
			return false;
		}
		element.style.border = "2px solid green";
	}

	function validatePassword(id){

		var element = document.getElementById(id);
		var regExp = /^[a-zA-Z0-9#%@!$&^*]{6,10}$/;

		var data = element.value.split('');
		element.Isvalid=false;


		if(!regExp.test(element.value)){
			alert("Enter valid Password. ");
			element.style.border = "2px solid red";
			//elment.focus();
			return false;

		
		  
		  }

						

		else if(regExp.test(element.value)){
		

		//check for lowercase
		var lc=false;
		for (var c in data)
		{
			if(data[c] >='a'  && data[c] <='z')
			{
				lc=true;  break;
			}
		}
		if(!lc) 
		alert("In Password, 1 letter must be small");
		//return false;

			

		//check for uppercase
		var uc=false;
		for (var c in data)
		{
			if(data[c] >='A'  && data[c] <='Z')
			{
				uc=true; break;
			}

		}
		if(!uc) 
		alert("In Password, 1 letter must be capital");
		//return false;

		//check for numeric
		var num =false;
		for (var c in data)
		{
			if(data[c] >='0'  && data[c] <='9')
			{
				num=true; break;
			}
		}
		if(!num) 
		alert("In Password, 1 letter must be number");
		//return false;

	    }

		element.Isvalid = true;
		element.style.border = "2px solid green";

	}
		
		


</script>
	<style>
		.bg-img{
			
			background-image: url('images/login.jpg');
			height: 100vh;
			background-size: cover;
			background-position:center ;
			}
			
		
	</style>
</head>
<?php
include 'includes/connection.php';
session_start();
error_reporting(0);
if(isset($_POST['submit'])){
	$user_email = $_POST['user_email'];
	$user_password =md5($_POST['user_password']);
	$sqli = "SELECT * FROM user WHERE user_email = '$user_email' AND user_password = '$user_password' ";
	$result = mysqli_query($conn,$sqli);
	if($result->num_rows > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user_name'] = $row['user_name'];

		$sqlc = "SELECT user_name FROM user WHERE user_email = '$user_email' AND user_password = '$user_password' AND company_name IS NOT NULL AND business_name IS NULL";
		//$queryc = mysqli_query($conn,$sqlc);
		//$countc = mysqli_num_rows($queryc);

		$sqlb = "SELECT user_name FROM user WHERE user_email = '$user_email' AND user_password = '$user_password' AND business_name IS NOT NULL AND company_name IS NULL";
		//$queryb = mysqli_query($conn,$sqlb);
		//$countb = mysqli_num_rows($queryb);

		
		if($sqlb != NULL)
		{
			header("Location:Business.php");
		}

		elseif($sqlc != NULL)
		{
		  header("Location:Company.php");

		 //echo "No of Company users:", $countc; && $sqlc == NULL

	
		}

	}
	else{
		echo "<script> alert('woop! Email or password is wrong.')</script>";
	}
}
?>
<body>
<ul class="navbar">
        
		<li class="navbar-item login">
			<button class="login-btn">Login</button>
		</li>
	</ul>
	
	<!-- some contents -->
	
	
	<!-- popup-form -->
	<div class="popup-container hide"></div>
	
	<form class="popup-form hide" action="#" method="POST">
		<h1>Login Here</h1>
		<input class="input-field" type="email" name="email" placeholder="Email" required />
		<input class="input-field" type="password" name="password" placeholder="Password" required />
		<input class="input-field submit-btn" type="submit" name="submit" value="Login">
	
		<!-- close btn -->
		<div class="close-btn">&times;</div>
	</form>
	<script >
		var loginBtn, popupForm, closeBtn, popupContainer;
	
	loginBtn = document.querySelector('.login-btn');
	popupForm = document.querySelector('.popup-form');
	closeBtn = popupForm.querySelector('.close-btn');
	popupContainer = document.querySelector('.popup-container');
	
	// event handler to show hidden form
	loginBtn.addEventListener('click', () => {
		// remove hide class
		popupForm.classList.remove('hide');
		popupContainer.classList.remove('hide');
	});
	
	// event handler to hide form
	closeBtn.addEventListener('click', () => {
		// add hide class
		popupForm.classList.add('hide');
		popupContainer.classList.add('hide');
	});
	
	// handles event when clicked outside the form
	popupContainer.addEventListener('click', () => {
		// add hide class to both
		popupForm.classList.add('hide');
		popupContainer.classList.add('hide');
	});
	</script>
	<nav>

		<input type="checkbox" id="check">
		<label for="check" class="checkbtn">
			<i class="fas fa-bars"></i>
		</label>
		<label for="logo" class="logo">DesignX</label>
         <ul>
			 <li>
				 <a class="active" href="index.php">Home</a>
			 </li>
			 <li>
				<a  href="about.php">About</a>
			</li>
			<li>
				<a   href="#">Services</a>
			</li>
			<li>
				<a  href="contact.php">Contact</a>
			</li>
			
		 </ul>
	</nav>
	<div class="bg-img" >

</div>
<div class="container-fluid" style="padding: 25px; background-color: #f0f0f0;">
	
		<div class="row">
			<div class="col-md-4 wow rotateIn " style="float: left;">
				<img src="images/business.jpg" class="img-responsive img-thumbnail ">
			</div>
			<div class="col-md-8 wow slideInLeft">
				<h2 style="color: #222b3a;" style="font-family: poppins;">Automobile</h2>
				<p style="font-family: poppins;">Ford
					Even after being around for such a long time, the EcoSport still is the most handsome looking brute in the sub-four meter SUV segment. Its bold grille, large aggressive headlamps, well-designed fog lamp housing, wraparound C-pillar, muscular creases, and haunches- all lend it a very American muscle-esque persona - Bilal Ahmed</p> 
					<p>
					The Swift has seen more wholesome usage and has played the role of a weekend-getaway car, an airport-run car. In fact, the rear seats were put to more use in the last two months than the six before. Journalistic curiosity had me work the car into the conversation to get a sense of what my rear passengers felt about it, and the points were quite mixed. Those familiar with the Swifts of old were amazed by the legroom at the back. The latest Swift really feels like a family car, that’s for sure - Shapur Kotwal 	
					</p>
				<p><a href="business-review.php"><button type="button" class="btn btn-danger">Read More</button></a></p>
			</div>
		</div>
	</div>

<div class="container-fluid" style="padding: 25px; background-color: #f0f0f0;">
<div class="row">
	<div class="col-md-8 wow slideInLeft">
		<h2 style="color: #000;">Deloitte</h2>
		<p style="font-family: poppins; text-align: justify;">Job Security - FTE's can happily stay till they retire - 10/10, Work Culture - TSS has great work culture, especially in my team 10/10, Management - Leadership is concerned and takes every impact we create into consideration.
			Company policies - you can happily retire here, no bothering issues.
			The compensation is nice (depending on your negotiation skill) and other benefits Smartphone program, we care program etc. Flexibility at work timings. US based clients (which most probably you won't see/meet until you are a "seasoned" senior consultant). Academy and other learning subscription free - Goutham Ch, Compliance Analyst in Hyderabad, Current Employee - ITS Division
			</p>
		<p><a href="company-review.php"><button type="button" class="btn btn-danger">Read More</button></a></p>
	</div>
	<div class="col-md-4 wow zoomIn" style="margin-top: 15px;">
		<img src="images/img-company.jpg" class="img-responsive img-thumbnail">
	</div>
</div>
</div>
<style type="text/css">
    #footer{
        margin-top: 0px;
    }
</style>

<footer id="footer" class="container-fluid">
    
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Our Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact us</a></li>
                        
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <p>Provide review for company and employies</p>
                        
                </div>
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <p>Rompio infotech<br>
#2nd Floor, Lorven Arcade Building,
Sapthagiri Colony, Indra Reddy
Allwyn Colony,
Hafeezpet,
Miyapur,
Hyderabad, Telangana-500049
</p>
                </div>
                <div class="col-lg-3 col-md-6 footer-info">
                    
                    <div class="social-links mt-3"> <a href="#" class="twitter"><i class="fab fa-twitter"></i></a> <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a> <a href="#" class="instagram"><i class="fab fa-instagram"></i></a> <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright"> © Copyright <strong><span>Rompioinfotech</span></strong>. All Rights Reserved </div>
        <div class="credits"> Designed by <a href="#">rompioinfotech.com</a> </div>
    </div>
</footer>

</body>
</html>