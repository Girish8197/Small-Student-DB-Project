<html>
<head>
<title>Register</title>
<link rel = "stylesheet" href = "style3.css">
<link rel = "stylesheet" href = "style2.css">

<style type = "text/css">

.box{
	width:500px;
	padding:30px;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
	background: rgba(0,0,0,0.0);
	text-align:center;
	position:absolute;
}

.box1 input[type = "text"]{
border:0;
background:none;
text-align:center;
padding:14px 15px;
border:3px solid #0367fd;
width:220px;
outline:none;
color:yellow;
border-radius:24px;
font-weight:bold;
}

.box1 input[type = "text"]:focus{
width:230px;
border-color:#ffc400ec;
}

.box input[type = "reset"],.box input[type = "submit"]{
border:0;
background:none;
margin:10px auto;
text-align: center;
border:3px solid #ffc400ec;
padding:14px 35px;
outline:none;
color:white;
border-radius:24px;
transition:0.25px;
cursor:pointer;
}

.box input[type = "reset"]:hover,.box input[type = "submit"]:hover{
background:#ffc400ec;
padding:14px 45px;
}

</style>

</head>
<body>
<form class = "box" action = "student.php" method = "POST">
<h1>Register</h1>
<center>
<table class = "box1">
<tr>
<td style = "color:white;">USN : </td>
<td><input type = "text" placeholder = "Enter USN" name = "usn" required></td>
</tr>
<tr>
<td style = "color:white;">NAME : </td>
<td><input type = "text" placeholder = "Enter NAME" name = "name" required></td>
</tr>
<tr>
<td style = "color:white;">PHONE NO : </td>
<td><input type = "text" placeholder = "Enter PHONE NO" name = "phno" required></td>
</tr>
<tr>
<td style = "color:white;">G-MAIL : </td>
<td><input type = "text" placeholder = "Enter G-MAIL" name = "gmail" required></td>
</tr>
<tr>
<td style = "color:white;">ADDRESS : </td>
<td><input type = "text" placeholder = "Enter ADDRESS" name = "address" required></td>
</tr>
<tr>
<td style = "color:white;">BRANCH : </td>
<td><input type = "text" placeholder = "Enter BRANCH" name = "branch" required></td>
</tr>
<tr>
<td style = "color:white;">SEM : </td>
<td><input type = "text" placeholder = "Enter SEM" name = "sem" required></td>
</tr>
</table>
<br>
<input type = "reset" value = "Reset" />
<input type = "submit" value = "Submit" />
</center>
</form>
<table class = "header" border = "0" cellpadding = "5" cellspacing = "5">
        <tr>
            <td align = "left">
                <table class = "inner" width = "547" border = "0" cellpadding = "1" cellspacing = "1" align = "center">
                    <tr>
                        <td width = "96"><font face="Verdana, Geneva, sans-serif" color = "white" onmouseover = "style = 'color:blue;'" onmouseout = "style = 'color:white;'" onclick = "window.location = 'Main_form.php'"><h3>Home</h3></font></td>
                        <td width = "96"><font face="Verdana, Geneva, sans-serif" color = "white" onmouseover = "style = 'color:blue;'" onmouseout = "style = 'color:white;'" onclick = "window.location = 'student.php'"><h3>Register</h3></font></td>
                        <td width = "96"><font face="Verdana, Geneva, sans-serif" color = "white" onmouseover = "style = 'color:blue;'" onmouseout = "style = 'color:white;'" onclick = "window.location = 'search.php'"><h3>Search</h3></font></td>
                        <td width = "96"><font face="Verdana, Geneva, sans-serif" color = "white" onmouseover = "style = 'color:blue;'" onmouseout = "style = 'color:white;'" onclick = "window.location = 'logout.php'"><h3>Logout</h3></font></td>
                    </tr>
                </table>
            </td>
        </tr>
</table>
</body>
</html>

<?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'student_data');

if(!empty($_POST['usn']) && !empty($_POST['name']) && !empty($_POST['phno']) && !empty($_POST['gmail']) && !empty($_POST['address']) && !empty($_POST['branch']) && !empty($_POST['sem'])){
	$query = "select * from active";
	$result = $conn->query($query);
	while($row = $result-> fetch_assoc()){
		$username = $row['username'];
	}
	$usn = $_POST['usn'];
	$name = $_POST['name'];
	$phno = $_POST['phno'];
	$gmail = $_POST['gmail'];
	$address = $_POST['address'];
	$branch = $_POST['branch'];
	$sem = $_POST['sem'];
	
		$query = "select * from student where username = '$username' and usn = '$usn'";

		$result = mysqli_query($conn,$query);
		$num = mysqli_num_rows($result);

		if($num == 1){
			echo "<script type = 'text/javascript'>";
			echo "alert('Student $usn already registered')";
			echo "</script>";
		}else{
			$query = "insert into student values('$username','$usn','$name','$phno','$gmail','$address','$branch','$sem')";
			mysqli_query($conn,$query);
			echo "<script type = 'text/javascript'>";
			echo "alert('Registered Successful')";
			echo "</script>";
		}
	
}
?>