<?php
include 'includes/connection.php';
if(isset($_POST['password_rest_link']))
{
$email = mysqli_real_escape_string($conn,$_POST['email']);
}


?>