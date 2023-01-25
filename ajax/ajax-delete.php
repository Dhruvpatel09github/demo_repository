<?php

$student_id = $_POST["stu_id"];

$conn = mysqli_connect("localhost","root","","student") or die("Connection Failed");

$sql = "DELETE FROM reg WHERE stu_id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
