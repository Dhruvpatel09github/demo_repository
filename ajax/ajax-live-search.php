<?php

$search_value = $_POST["search"];
$order = "asc";  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
$conn = mysqli_connect("localhost","root","","student") or die("Connection Failed");

$sql = "SELECT * FROM reg WHERE fname LIKE '%{''.$search_value.''}''%' OR lname LIKE '%{$search_value}%'OR email LIKE '%{$search_value}%' OR city LIKE '%{$search_value}%'OR mobile_number LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table class="table table-bordered">
              <tr>
              <th><a class="column_sort text-dark" id="stu_id" data-order="'.$order.'" href="#">ID</a></th>  
              <th><a class="column_sort text-dark" id="fname" data-order="'.$order.'" href="#">fname</a></th>  
              <th><a class="column_sort text-dark" id="lname" data-order="'.$order.'" href="#">lname</a></th>  
              <th><a class="column_sort text-dark" id="mobile_number" data-order="'.$order.'" href="#">mobile</a></th>  
              <th><a class="column_sort text-dark" id="email" data-order="'.$order.'" href="#">email</a></th>  
              <th><a class="column_sort text-dark" id="city" data-order="'.$order.'" href="#">city</a></th>  
              <th>update</a></th>  
              <th>delete</a></th>  
              </tr>';

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td align='center'>{$row["stu_id"]}</td><td>{$row["fname"]}</td><td> {$row["lname"]}</td><td>{$row["mobile_number"]}</td><td>{$row["email"]}</td><td>{$row["city"]}</td><td align='center'><button class='edit-btn' data-eid='{$row["stu_id"]}'>Edit</button></td><td align='center'><button Class='delete-btn' data-id='{$row["stu_id"]}'>Delete</button></td></tr>";
              }
    $output .= "</table>";

    mysqli_close($conn);

 
      echo $output;
    
    

   
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
