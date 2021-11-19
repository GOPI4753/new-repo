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
	<link rel='stylesheet' type='text/css' media='screen' href='css/animate.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/second-footer.css'>
	<script src="js/wow.min.js"></script>
	<script>
              new WOW().init();
</script>
	<style>
		.img-bg{
			
			background-image: url('images/review.jpg');
			height: 100vh;
			background-size: cover;
			background-position:center ;
			}
            #footer{
        margin-top: 20px;
    }
			
		
	</style>
</head>



<body>
	
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
			<li>
				<a  href="#">Feedback</a>
			</li>
		 </ul>

</nav>

<div class="container-fluid img-bg" >
<div class="content">
	<div class="h3 font-weight-bold text-center mb-3" style="color: white;">Recover Your Account</div>
	<form action="#">

<div class="field space form-group d-flex align-items-center">
            <div class="icon"><span class="far fa-envelope"></span></div> <input autocomplete="off" type="email" class="form-control" placeholder="Email" id="email" name="email" onblur="validateEmail(this.id)" required>
 </div>

 <div class="btn btn-primary mb-3 ">			
         <input type="submit" name="SendEmail" value="SendEmail" onclick="SendEmail()">
		</div>        
        <span id="alert" style="color: red;"></span>
 </form>

 <script type="text/javascript">
 	
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


 function SendEmail()
{

	<?php

		echo "Recover your Account";

    include 'includes/connection.php';
      session_start();
      error_reporting(0);

   if(isset($_POST['SendEmail'])){

	$email=mysqli_real_escape_string($conn,$_POST['email']);

	$emailquery = "SELECT * from user where user_email='$email' ";										
	$query = mysqli_query($conn,$emailquery);
	$emailcount = mysqli_num_rows($query);

	if($emailcount){

		$userdata = mysqli_fetch_array($query);
		
		$username = $userdata['user_name'];
		$Id = $userdata['Id'];
	
	
	
	$subject = "Password Reset";
	$body = "Hi, $username.click here too reset your password http://localhost/project-for-review/ResetPassword.php?Id=$Id";
	$sender_email = "From: kumarsagarmath61@gmail.com";


	if(mail($email,$subject,$body,$sender_email)) { 

		$_SESSION['msg'] = "check your mail to reset your password $email";
		header('location:index.php');
	} 

	else {
	   echo "Email sending Failed...";
	}




	}
	else
	{
		echo "No email found";
	}


 }

 else{
		echo "alert('woops somthing went wrong!.')";
	} 

?>

}

	
 </script>

</body>
</html>