<?php

$student_id = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$mobile = $_POST["number"];
$email = $_POST["email"];
$city = $_POST["city"];

$conn = mysqli_connect("localhost","root","","student") or die("Connection Failed");

$sql = "UPDATE reg SET fname = '{$firstName}',lname = '{$lastName}',mobile_number = '{$mobile}', email = '{$email}',city = '{$city}' WHERE stu_id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
