<?php  
 //sort.php  
 $connect = mysqli_connect("localhost", "root", "", "student");  
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $query = "SELECT * FROM reg ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($connect, $query);  
 $output .= '  
 <table class="table table-bordered">  
      <tr>  
           <th><a class="column_sort text-dark" id="stu_id" data-order="'.$order.'" href="#">ID</a></th>  
           <th><a class="column_sort text-dark" id="fname" data-order="'.$order.'" href="#">fname</a></th>  
           <th><a class="column_sort text-dark" id="lname" data-order="'.$order.'" href="#">lname</a></th>  
           <th><a class="column_sort text-dark" id="mobile_number" data-order="'.$order.'" href="#">mobile</a></th>  
           <th><a class="column_sort text-dark" id="email" data-order="'.$order.'" href="#">email</a></th>  
           <th><a class="column_sort text-dark" id="city" data-order="'.$order.'" href="#">city</a></th>  
           <th>update</a></th>  
           <th>delete</a></th>  
      </tr>  
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
     $output .= "<tr><td align='center'>{$row["stu_id"]}</td><td>{$row["fname"]}</td><td> {$row["lname"]}</td><td>{$row["mobile_number"]}</td><td>{$row["email"]}</td><td>{$row["city"]}</td><td align='center'><button class='edit-btn'id='edit-btn' data-eid='{$row["stu_id"]}'>Edit</button></td><td align='center'><button Class='delete-btn' id='delete-btn' data-id='{$row["stu_id"]}'>Delete</button></td></tr>";
}
$output .= "</table>";
 echo $output;  
 ?>  