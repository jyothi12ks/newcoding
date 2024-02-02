<?php
include 'connection.php';
if (isset($_POST['register'])) {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
    
    $sql = "SELECT * FROM details Where email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>=1)
      echo "<script>alert('already user exist')
      document.location.href = 'reg.php';</script>";
    else
    {
	  $sql = mysqli_query($conn,"INSERT INTO details(name,phone,email,password) values('$name','$phone','$email','$pwd')");
      if($sql == true)
      {
	    echo "<script>alert('Registration successful')
        document.location.href = 'login.php';</script>";
      }
      else
      {
	    echo "Error: " .$sql . "<br>" . $conn->error;
      }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="reg.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<div class="container">
		<form action="" method="post">
			<h1>Registration</h1>
			<div class="ibox">
				<div class="ifield">
					<input type="text" name="name" placeholder="Name" required>
					<i class='bx bxs-user'></i>
				</div>
				<div class="ifield">
					<input type="tel" name="phone" placeholder="Phone" max="10" required>
					<i class='bx bxs-phone'></i>
				</div>
				<div class="ifield">
					<input type="email" name="email" placeholder="Email" required>
					<i class='bx bxs-envelope'></i>
				</div>
				<div class="ifield">
					<input type="pwd" name="pwd" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password should be of 8 char, containing atleast one upper letter, lower letter and a number">
					<i class='bx bxs-lock-alt'></i>
				</div>
			</div>
			<input type="submit" name="register" value="REGISTER" class="btn"><br><br>
			<label>Already have an account?<a href="login.php">Login</a></label>
		</form>
	</div>
</body>
</html>