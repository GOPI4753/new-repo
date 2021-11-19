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
	
	<link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
	<link rel='stylesheet' type='text/css' media='screen' href='css/animate.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/second-footer.css'>
	<script src="js/wow.min.js"></script>
<script>
              new WOW().init();
</script>
	<style>
		.img-bg{
			
			background-image: url('images/registation.jpg');
			height: 100vh;
			background-size: cover;
			background-position:center ;
			}
            #footer{
        margin-top: 20px;
    }
    
		
	</style>
</head>
<?php
      include 'includes/connection.php';
	error_reporting(0);
if(isset($_POST['submit']))
{
$user_name = $_POST['user_name'];	
$user_email = $_POST['user_email'];
$user_phoneno = $_POST['user_phoneno'];
$city=$_POST['city'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);
$company_name =$_POST['company_name'];
$business_name=$_POST['business_name'];
	if($password == $cpassword){
		 $sqli = "SELECT * FROM user WHERE user_email='$user_email'" ;
		 $result = mysqli_query($conn,$sqli);
		  if(!$result->num_rows > 0){
			  $sqli = "INSERT INTO user(user_name,user_email,user_phoneno,city, user_password ,company_name, business_name)
		 VALUES('$user_name','$user_email', '$user_phoneno','$city','$password' , '$company_name','$business_name')";
		 $result = mysqli_query($conn,$sqli);
		if($result){
		   echo "<script> alert('wow! user registration succesfully.')</script>";
			$user_name ="";
			$user_email = "";
			$user_phoneno ="";
			$city="";
			$_POST['password'] = "";
			$_POST['cpassword'] = "";
			$company_name  ="";
			$business_name="";
			
		  }else{
			echo "<script> alert('woops somthing went wrong!.')</script>";
		} 
		  }else{
			   echo "<script> alert('woop! Email already exist.')</script>";
		}  
		  } else{
		echo "<script> alert('password not mached.')</script>";
	}
}

	?>							
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
	<div class="h3 font-weight-bold text-center mb-3" style="color: white;">Registration</div>
	
	<form action="" method="post">
	
		<div class=" field space form-group d-flex align-items-center">
            <div class="icon"><span class="far fa-user"></span></div> <input  type="text" class="form-control" placeholder="Name" name="user_name" value="<?php echo $user_name;?>" id="name" onblur="validateString(this.id)" required>
        </div>
		<div class="field space form-group d-flex align-items-center">
            <div class="icon"><span class="far fa-envelope"></span></div> <input  type="email" class="form-control" placeholder="Email" name="user_email" value="<?php echo $user_email;?>" id="email" onblur="validateEmail(this.id)" required>
        </div>
        <div class="field space form-group d-flex align-items-center">
            <div class="icon"><span class="fas fa-phone"></span></div> <input  type="tel" class="form-control" placeholder="Phone" name="user_phoneno" value="<?php echo $user_phoneno;?>" id="phone" onblur="validateNumber(this.id)" max="10" required>
        </div>
        <div class="field space form-group d-flex align-items-center">
            <div class="icon"><span class="fas fa-map-marker-alt"></span></div> <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $city;?>" id="city" onblur="validateString(this.id)" required>
        </div>
        <div class="field space form-group d-flex align-items-center">
            <div class="icon"><span class="fas fa-key"></span></div> <input  type="password" class="form-control" placeholder="Password"  name="password" value="<?php echo $_POST['password'];?>" id="password" onblur="validatePassword(this.id)" required>
            <div class="icon btn"><span class="fas fa-eye-slash"></span></div>
        </div>
        <div class="field space form-group d-flex align-items-center">
            <div class="icon"><span class="fas fa-key"></span></div> <input  type="password" class="form-control" placeholder="Conform Password" name="cpassword" value="<?php echo $_POST['cpassword'];?>" id = "confirmpassword" onblur="validatePassword(this.id)" required >
            <div class="icon btn"><span class="fas fa-eye-slash"></span></div>
        </div>
        

        <div class="field space form-group d-flex align-items-center">
        	<input type="checkbox" id="chktxt" class="form-control" onchange="fncontrol1(this)"/>

            <div class="icon"><span class="fas fa-warehouse"></span></div> <input  type="text" class="form-control" placeholder="Company Name" name="company_name" value="<?php echo $company_name;?>" id="CompanyName" onblur="validateString(this.id)" required>
            
        </div>

        <div class="field space form-group d-flex align-items-center">
	<input type="checkbox" id="chkddl" class="form-control" onchange="fncontrol2(this)"/>

        <select class="form-control" name="business_name"  value="<?php echo $business_name;?>" id="ddlBusinessType" required>
            <option value="">-- select Business -- </option>
	   <option>Agriculture</option>
	   <option>Automobile</option>
       <option>Trade</option>	    
	   <option>Transport</option>
	   <option>Super Market</option>
            
            
        </select>
        </div>

		<br>
        <center>
									<button type="submit" name="submit" class="btn btn-success" >Register</button>
										
									</center>	
		<br>
		
		<p style="text-align: center;color: aliceblue;" >Already have account ? <a href="index.php"><span style="color:#093;"> Signin</span></a></p>	
        
 </form>
 </div>
</div> 

 
 <footer id="footer" class="container-fluid ">
    
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
                    
                        
                </div>
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    
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

<script>
    //var password = document.getElementById('password');
    //function check(elem){
     //   if(elem.value.lenght>0){
       //     if(elem.value != password.value){
        //     document.getElementById('alert').innerText ="confirm password does not match";
         //   }
        //  }
       //      }
    

    function fncontrol1(chktxt)
	{
		 
		var ddl = document.getElementById("ddlBusinessType");
		ddl.disabled=chktxt.checked;
		
		if(ddl.disabled)
		{
			ddl.disabled = true;
		}
		else
		{	
			ddl.disabled = false;
			ddl.focus();
		}
		
	}

	function fncontrol2(chkddl)
	{
		var txt = document.getElementById("CompanyName"); 
		txt.disabled=chkddl.checked;

		if(txt.disabled)
		{
			txt.disabled = true;	
			
		}
		else
		{
			txt.disabled = false;
			ddl.focus();	
		}
	}
 
	function validateString(id){
		var element = document.getElementById(id);
		var regExp = /^[a-zA-Z " "]+$/;
		if(!regExp.test(element.value)){
			alert("Enter String value.");
			element.style.border = "2px solid red";
			elment.focus();
			return false;
		}
		element.style.border = "2px solid green";
	}

	function validateNumber(id){
		var element = document.getElementById(id);
		var regExp = /^[0-9]{10}$/;
		if(!regExp.test(element.value)){
			alert("Enter number value and should be 10 digit");
			element.style.border = "2px solid red";
			//elment.focus();
			return false;
		}
		element.style.border = "2px solid green";
	}
    
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
    
     </script>
 </body>
 </html>