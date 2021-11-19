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

	<div class="container-fluid img-bg" >
<div class="content">
	<div class="h3 font-weight-bold text-center mb-3" style="color: white;">Reset Password</div>

	<form action="#">
	 <div class="field space form-group d-flex align-items-center">
            <div class="icon"><span class="fas fa-key"></span></div> <input autocomplete="off" type="password" class="form-control" placeholder="Password" id="password" onblur="validatePassword(this.id)" required>
            <div class="icon btn"><span class="fas fa-eye-slash"></span></div>
        </div>
        <div class="field space form-group d-flex align-items-center">
            <div class="icon"><span class="fas fa-key"></span></div> <input autocomplete="off" type="password" class="form-control" id = "confirmpassword" placeholder="Conform Password"  onblur="validatePassword(this.id)" required>
            <div class="icon btn"><span class="fas fa-eye-slash"></span></div>
        </div>

        <div class="btn btn-primary mb-3 ">			
         <input type="submit" name="UpdatePassword"  value="UpdatePassword" onclick="fncheck()">
		</div>        
        <span id="alert" style="color: red;"></span>

 </form>
</div></div>


<script>

	
    function fncheck(){
    	var password = document.getElementById("password");
    	var cpassword = document.getElementById("confirmpassword");
        if(cpassword.value.length>0){
            if(cpassword.value != password.value){
             alert("confirm password does not match password entered.");
            }
        }
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

				
		//var data = element.value.split('');
		//element.Isvalid=false;

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
		

	

//<p> <?php  

// if(isset($_SESSION['passmsg'])){
  //   echo $_SESSION['passmsg'];
// }else{
//	echo $_SESSION['passmsg'] = "";
// }


//?> </p>

<?php

include 'includes/connection.php';
 

if(isset($_POST['UpdatePassword'])){

	
        if(isset($_GET['token'])){

	$token = $_GET['token'];

	$newpassword = mysqli_real_escape_string($conn, $POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $POST['cpassword']);

	$pass = password_hash($newpassword, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	
	if($newpassword === $cpassword){

	$updatequery = " update user set user_password='$pass' where token = '$token' ";
	
		$iquery = mysqli_query($conn,$updatequery);
	

	if($iquery){
	
	    $_SESSION['MSG'] = "Your password has been updated";
	    header('location:index.php');
	}
	else{
		
	    $_SESSION['passmsg'] = "Your password is not updated";
	    header('location:reset_password.php');
	
	}


	} 
	else {
		
		$_SESSION['passmsg'] = "password is not matching" ;
	        
	}

   }

	else{
		
		echo "No token found";
	
	}

}

?>



		</script>

</body>
</html>
