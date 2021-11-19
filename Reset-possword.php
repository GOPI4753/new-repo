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
	<div class="h3 font-weight-bold text-center mb-3" style="color: black;">Reset Password</div>
<?php
if(isset($_SESSION['status'])){

}

?>
<div class="alert alert-success">
	<h5><?= $_SESSION['status']; ?></h5>
</div>
<?php
unset($_SESSION['status']);
}
?>


	<form action="password-reset-code.php" method="post">
	
        <div class="field space form-group d-flex align-items-center">
            <input autocomplete="off" type="text" class="form-control"  name = "email" placeholder="Enter Email Address"  required>
           
        </div>

        <div class="btn btn-primary mb-3 ">			
         <input type="submit" name="password_rest_link"  value="Send Password Reset Link" >
		</div>        
        <span id="alert" style="color: red;"></span>

 </form>
</body>
</html>
