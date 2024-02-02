<?php
session_start();
include 'connection.php';
if(isset($_POST['login']))
{
  $email = $_POST['email'];
  $password = $_POST['pwd'];
  $query = mysqli_query($conn,"select * from details where email = '$email' and password = '$password'");
  if(mysqli_num_rows($query) == 0){
    echo '<script type="text/javascript">

    window.onload = function () { alert("Invalid Credentials"); }
    </script>';
   header("refresh:0.25; url=login.php");
  }
  else
  {
  	$_SESSION['email']=$email;
    $_SESSION['password']=$password;
  	header("location:main.php");
  }
} 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<div class="container">
		<form action="" method="post">
			<h1>Login</h1>
			<div class="ibox">
				<div class="ifield">
					<input type="email" name="email" placeholder="Email" required>
					<i class='bx bxs-envelope'></i>
				</div>
				<div class="ifield">
					<input type="pwd" name="pwd" placeholder="Password" required>
					<i class='bx bxs-lock-alt'></i>
				</div>
			</div>
			<input type="submit" name="login" value="LOGIN" class="btn"><div><ion-icon id="icon" class="input-box" name="eye-off-outline" style="font-size: 30px; color: black; background: #8A8D93; height: 35px;"></ion-icon></div><br><br>
			<label>Don't have an account?<a href="reg.php">Register</a></label>
		</form>
	</div>
</body>
</html>