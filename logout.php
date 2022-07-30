<?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'student_data');
$query = "delete from active";
mysqli_query($conn,$query);
header('location:login.php');
?>