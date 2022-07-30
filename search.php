<html>
<head>
<title>Search</title>
<link rel = "stylesheet" href = "style2.css">
<link rel = "stylesheet" href = "style3.css">

<style type = "text/css">
.box{
	width:700px;
	padding:30px;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
	background: rgba(0,0,0,0.0);
	text-align:center;
	position:absolute;
}

.box input[type = "text"]{
border:0;
text-align:center;
padding:14px 15px;
border:3px solid #0367fd;
width:220px;
outline:none;
color:yellow;
border-radius:24px;
font-weight:bold;
}

.box input[type = "text"]:focus{
width:230px;
border-color:#ffc400ec;
}

.box input[type = "submit"],.box input[type="button"]{
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

.box input[type = "submit"]:hover,.box input[type="button"]:hover{
background:#ffc400ec;
padding:14px 45px;
}

table{
	color:white;
	border-color:yellow;
	text-align:center;
}

</style>

</head>
<body>
<table class = "header" cellpadding = "5" cellspacing = "5">
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
<form class = "box" action = "search.php" method = "POST">
<input type = "text" placeholder = "Enter USN" name = "usn">
<input type = "text" placeholder = "Enter Branch" name = "branch" />
<input type = "text" placeholder = "Enter SEM" name = "sem" />
<input type = "submit" value = "Search" name = "submit" />
<input type = "submit" value = "Delete" name = "delete"/>
<?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'student_data');

$query = "select * from active";
$result = $conn->query($query);
while($row = $result-> fetch_assoc()){
	$username = $row['username'];
}

if(isset($_POST['submit'])){
	if(!empty($_POST['usn']) && empty($_POST['branch']) && empty($_POST['sem'])){
		$usn = $_POST['usn'];
		
		$query = "select * from student where username = '$username' and usn = '$usn'";

		$result = $conn->query($query);
		echo "<center>";
		echo "<table border = '2' cellpadding = '1'>";
		echo "<tr><td>USN</td><td>NAME</td><td>PHNO</td><td>GMAIL</td><td>ADDRESS</td><td>BRANCH</td><td>SEM</td>";
		if($result->num_rows > 0){
			while($row = $result-> fetch_assoc()){
				echo "<tr><td>".$row['usn']."</td><td>".$row['name']."</td><td>".$row['phno']."</td><td>".$row['gmail']."</td><td>".$row['address']."</td><td>".$row['branch']."</td><td>".$row['sem']."</td>";
			}
		}else{
			echo "<script type = 'text/javascript'>";
			echo "alert('The data not found')";
			echo "</script>";
		}
		echo "</table>";
		echo "</center>";
}else
	if(empty($_POST['usn']) && !empty($_POST['branch']) && !empty($_POST['sem'])){
		$branch = $_POST['branch'];
		$sem = $_POST['sem'];
		
		$query = "select * from student where username = '$username' and branch = '$branch' and sem = '$sem'";

		$result = $conn->query($query);
		echo "<center>";
		echo "<table border = '2' cellpadding = '1'>";
		echo "<tr><td>USN</td><td>NAME</td><td>PHNO</td><td>GMAIL</td><td>ADDRESS</td><td>BRANCH</td><td>SEM</td>";
		if($result->num_rows > 0){
			while($row = $result-> fetch_assoc()){
				echo "<tr><td>".$row['usn']."</td><td>".$row['name']."</td><td>".$row['phno']."</td><td>".$row['gmail']."</td><td>".$row['address']."</td><td>".$row['branch']."</td><td>".$row['sem']."</td>";
			}
		}else{
			echo "<script type = 'text/javascript'>";
			echo "alert('The data not found')";
			echo "</script>";
		}
		echo "</table>";
		echo "</center>";
	}
else
	if(empty($_POST['usn']) && empty($_POST['branch']) && !empty($_POST['sem'])){
		$sem = $_POST['sem'];
		
		$query = "select * from student where username = '$username' and sem = '$sem'";

		$result = $conn->query($query);
		echo "<center>";
		echo "<table border = '2' cellpadding = '1'>";
		echo "<tr><td>USN</td><td>NAME</td><td>PHNO</td><td>GMAIL</td><td>ADDRESS</td><td>BRANCH</td><td>SEM</td>";
		if($result->num_rows > 0){
			while($row = $result-> fetch_assoc()){
				echo "<tr><td>".$row['usn']."</td><td>".$row['name']."</td><td>".$row['phno']."</td><td>".$row['gmail']."</td><td>".$row['address']."</td><td>".$row['branch']."</td><td>".$row['sem']."</td>";
			}
		}else{
			echo "<script type = 'text/javascript'>";
			echo "alert('The data not found')";
			echo "</script>";
		}
		echo "</table>";
		echo "</center>";
	}
else
	if(empty($_POST['usn']) && !empty($_POST['branch']) && empty($_POST['sem'])){
		$branch = $_POST['branch'];
		
		$query = "select * from student where username = '$username' and branch = '$branch'";

		$result = $conn->query($query);
		echo "<center>";
		echo "<table border = '2' cellpadding = '1'>";
		echo "<tr><td>USN</td><td>NAME</td><td>PHNO</td><td>GMAIL</td><td>ADDRESS</td><td>BRANCH</td><td>SEM</td>";
		if($result->num_rows > 0){
			while($row = $result-> fetch_assoc()){
				echo "<tr><td>".$row['usn']."</td><td>".$row['name']."</td><td>".$row['phno']."</td><td>".$row['gmail']."</td><td>".$row['address']."</td><td>".$row['branch']."</td><td>".$row['sem']."</td>";
			}
		}else{
			echo "<script type = 'text/javascript'>";
			echo "alert('The data not found')";
			echo "</script>";
		}
		echo "</table>";
		echo "</center>";
	}
else{
	echo "<script type = 'text/javascript'>";
	echo "alert('Enter the details')";
	echo "</script>";
}
}
if(isset($_POST['delete'])){
	if(!empty($_POST['usn'])){
		$usn = $_POST['usn'];
		$query = "delete from student where username = '$username' and usn = '$usn'";
		$result = $conn->query($query);
		echo "<script type = 'text/javascript'>";
		echo "alert('Student $usn is Removed')";
		echo "</script>";
	}else
	{
		echo "<script type = 'text/javascript'>";
		echo "alert('Enter the USN')";
		echo "</script>";
	}
}
?>
</form>
</body>
</html>