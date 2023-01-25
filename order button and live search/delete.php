<?php
session_start();
include("config.php");


if (isset($_POST['delete_btn'])) {

	$id = $_POST['delete_id'];
	$query = "DELETE FROM reg WHERE stu_id ='$id' ";
	$data = mysqli_query($conn,$query);

	if($data)
	{
        echo "<script>
        alert('your data is deleted');
        window.location.href=' pagination.php';
        </script>";
        
    }
    else
     {
        echo "<script>
        alert('your data is not deleted');
        window.location.href=' pagination.php';
        </script>";
     }
}



function delete() {  
    echo "<script>
        alert('delete successfully');
        window.location.href=' pagination.php';
        </script>"; 
 }  
  ?>
  