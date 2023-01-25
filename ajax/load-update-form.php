<?php

$student_id = $_POST["stu_id"];

$conn = mysqli_connect("localhost","root","","student") or die("Connection Failed");

$sql = "SELECT * FROM reg WHERE stu_id = {$student_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){

  while($row = mysqli_fetch_assoc($result)){
    $output .= "
    
       <tr>
      <td width='90px'>First Name</td>
      <td><input type='text' id='edit-fname' value='{$row["fname"]}'>
          <input type='text' id='edit-id' hidden value='{$row["stu_id"]}'>
      </td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><input type='text' id='edit-lname' value='{$row["lname"]}'></td>
    </tr>
    <tr>
      <td>number</td>
      <td><input type='text' id='edit-number' value='{$row["mobile_number"]}'></td>
    </tr><tr>
    <td>email</td>
    <td><input type='text' id='edit-email' value='{$row["email"]}'></td>
  </tr><tr>
  <td>city</td>
  <td><input type='text' id='edit-city' value='{$row["city"]}'></td>
</tr>
    <tr>
      <td></td>
      <td><input type='submit' id='edit-submit' value='save'></td>
    </tr>";

  }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
