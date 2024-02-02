<?php 
session_start();
include 'connection.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$query = mysqli_query($conn,"SELECT * FROM details where email = '$email'");
$row = mysqli_fetch_assoc($query);
$name = $row['name'];
$phone = $row['phone'];
?>

<?php 
if (isset($_POST['update'])) {
   echo "<script>document.location.href = 'update.php';</script>";
}
?>

<?php 
if (isset($_POST['delete'])) {
$sql = "DELETE FROM details WHERE email = '$email'";
$result = mysqli_query($conn,$sql);
if($result == true)
{
	echo '<script type="text/javascript">

    window.onload = function () { alert("Delete successful"); }
    </script>';
   header("refresh:0.25; url=home.php");
}else{
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
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="container">
		<form action="" method="post">
			<h1>welcome Back</h1>
			<div class="ibox">
				<div class="ifield">
					<label>Name <?php echo $name; ?></label>
				</div>
				<div class="ifield">
					<label>Phone <?php echo $phone; ?></label>
				</div>
				<div class="ifield">
					<label>Email <?php echo $email; ?></label>
				</div>
			</div>
			<input type="submit" name="update" value="Update" class="btn">
			<input type="submit" name="delete" value="Delete" class="btn">
		</form>
	</div>
</body>
</html>