<?php

$conn = mysqli_connect("localhost","root","","student") or die("Connection Failed");

$sql = "SELECT * FROM reg ORDER BY stu_id DESC";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td align='center'>{$row["stu_id"]}</td>
                <td>{$row["fname"]} </td>
                <td>{$row["lname"]}</td>
                <td>{$row["mobile_number"]}</td>
                <td>{$row["email"]}</td>
                <td>{$row["city"]}</td>
                <td align='center'><button class='edit-btn' data-eid='{$row["stu_id"]}'>Edit</button></td>
                <td align='center'><button Class='delete-btn' data-id='{$row["stu_id"]}'>Delete</button></td></tr>";
              }
    

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
?>
