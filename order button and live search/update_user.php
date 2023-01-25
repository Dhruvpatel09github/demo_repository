<?php 

include('config.php');

if($_POST['submit'])
{

	function validate($data)
	{
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	} 

		 $fname = validate($_POST['fname']);
		 $lname = validate($_POST['lname']);
		 $email = validate($_POST['email']);
		 $number = validate($_POST['mobile_number']);
		 $city = validate($_POST['city']);
		

		 $informer_id = validate($_POST['student_id']);


							 	$sql = "UPDATE reg SET fname = '$fname' , lname= '$lname' , email=  '$email' , mobile_number = '$number' , city = '$city'  WHERE stu_id = '$informer_id' ";
							 	
									$result = mysqli_query($conn, $sql);

									
									  if($result)
				                         {
                                            echo "<script>
                                            alert('your data is updated');
                                            window.location.href=' pagination.php';
                                            </script>";
                                            // header('Location: pagination.php');
				                                    exit();
				                         }

				                         else
				                         {
                                            echo "<script>
                                            alert('your data is not updated');
                                            window.location.href='pagination.php';
                                            </script>";
				                            exit();
				                         }


									
                                   
				
}
		
// Close connection
mysqli_close($conn);
?>