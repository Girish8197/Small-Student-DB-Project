<!DOCTTYPE html>
<html>
<head>
<title>Signin</title>
<meta charset="utf-8">
<link rel = "stylesheet" href = "style1.css">


</head>
<body>
<form class = "box" action = "Register.php" method = "POST">
<h1>Sign in</h1>
<input type = "text" placeholder = "Enter Email" name ="username" id="username" required>
<input type = "password" placeholder = "Enter Password" name = "password" id = "password" required>
<input type = "password" placeholder = "Reenter Password" name = "reenterpassword"id = "reenterpassword" required><br>
<input type = "submit" value = "Save" name = "Login">
<p>already have a account?</p>
<a href = "login.php">Login</a>
</form>
</body>
</html>

<?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'student_data');

if(!empty($_POST['username']) && !empty($_POST['password'] && !empty($_POST['reenterpassword']))){
	if(strcmp($_POST['password'],$_POST['reenterpassword']) == 0){
		$gmail = $_POST['username'];
		$pass = $_POST['password'];

		$query = "select * from login where gmail = '$gmail' and password = '$pass'";

		$result = mysqli_query($conn,$query);
		$num = mysqli_num_rows($result);

		if($num == 1){
			echo "<script type = 'text/javascript'>";
			echo "alert('Username already exist')";
			echo "</script>";
		}else{
			$query = "insert into login values('$gmail','$pass')";
			mysqli_query($conn,$query);
			echo "<script type = 'text/javascript'>";
			echo "alert('Registration Successful')";
			echo "</script>";
		}
	}else{
		echo "<script type = 'text/javascript'>";
		echo "alert('Password Mismatch')";
		echo "</script>";
	}
}
?>