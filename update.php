<?php 
session_start();
include 'connection.php';
$email = $_SESSION['email'];
$query = mysqli_query($conn,"SELECT * FROM details where email = '$email'");
$row = mysqli_fetch_assoc($query);
$name = $row['name'];
$phone = $row['phone'];
$password = $row['password'];

if (isset($_POST['update'])) {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
    
    $sql = "UPDATE details set name = '$name',phone = '$phone',email = '$email',password = '$pwd' where email  = '$email'";
    $result = mysqli_query($conn, $sql);
    if($sql == true)
      {
	    echo "<script>alert('Update successful')
        document.location.href = 'main.php';</script>";
      }
      else
      {
	    echo "Error: " .$sql . "<br>" . $conn->error;
      }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="update.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<div class="container">
		<form method="post">
			<h1>Update Profile</h1>
			<div class="ibox">
				<div class="ifield">
					<input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
					<i class='bx bxs-user'></i>
				</div>
				<div class="ifield">
					<input type="tel" name="phone" placeholder="Phone" max="10" value="<?php echo $phone; ?>">
					<i class='bx bxs-phone'></i>
				</div>
				<div class="ifield">
					<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
					<i class='bx bxs-envelope'></i>
				</div>
				<div class="ifield">
					<input type="pwd" name="pwd" placeholder="Password" value="<?php echo $password; ?>"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password should be of 8 char, containing atleast one upper letter, lower letter and a number">
					<i class='bx bxs-lock-alt'></i>
				</div>
			</div>
			<input type="submit" name="update" value="UPDATE" class="btn"><br><br>
		</form>
	</div>
</body>
</html>