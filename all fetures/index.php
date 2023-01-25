<!doctype html>
<html>
 
<head>
    <meta charset="utf-8">
    <title>Contact Form</title>
    <!-- below we are including the jQuery and jQuery plugin .js files -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    label.error
{
color:red;
font-family:verdana, Helvetica;
}
    </style>

    <script>
      
        $().ready(function () {

            // validation code

            $("#signupForm").validate({
                // in 'rules' user have to specify all the constraints for respective fields
                rules: {
                    fname: "required",
                    lname: "required",
                    number: {
                        number:true,
                        required: true,
                        minlength: 10 //for length of mobile number
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    
                    country: {
                        required: true
                    },
                    state: {
                        required: true
                    },
                    city: {
                        required: true
                    },
            
                },
                // in 'messages' user have to specify message as per rules
                messages: {
                    fname: " Please enter your firstname",
                    lname: " Please enter your lastname",
                    number: {
                        number:"enter only number ",
                        required: " Please enter a mobile number",
                        minlength: " Your mobile number must consist of at least 10 characters"
                    },
                    email: {
                        required: " Please enter your email address",
                        email:"enter valid email address"
                    },
                 
                    country: {
                       required: " Please select your country"
                    },
                    state:  {
                       required: " Please select your state"
                    },
                    city:  {
                       required: " Please select your country"
                    },
                },
            });
        });
 
    </script>
</head>
 
<body>  
<div class="container mt-3">
    <form id="signupForm" method="post" autocomplete="off">
  
            <h1 class= "text-center">INFORMATION OF STUDENT</h1>

            <div class="form-group mb-3">
              <label for="fname">first name</label>
                <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter first name">
            </div>
                
                <div class="mb-3 form-group"> 
                <label for="lname">last name</label> 
                <input id="lname" class="form-control" name="lname" type="text" placeholder="Enter last name">
                 </div>
       
            <div class="form-group mb-3">
            <label for="number">mobile number</label>
                <input id="number" class="form-control" name="number" type="text" maxlength=10 placeholder="Enter mobile number" >
             </div>
             
             <div class="form-group mb-3">
                <label for="email">email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your email">
            </div>
 
            <div class="form-group mb-3">
                <!-- <label class="form-label">country</label> -->
                <select name="country" id="country" class="form-select" >
                  <option value=""> Select country</option>
                  <?php 
                     include('config.php');
                     $query= "select * from country_tb order by cname ASC";
                     $result= mysqli_query($conn,$query);
                     while ($row= mysqli_fetch_array($result)) { ?>
                  <option value="<?php echo $row['cid']; ?>"><?php echo $row['cname'] ?></option>
                  <?php } ?>
               </select>
                </div>


            <div  class="mb-3">
                <!-- <label for="state" class="form-label">state</label> -->
                <select name="state" class="form-select" id="state" >
                  <option value=""> Select state</option>
               </select>
            </div>


          <div  class="form-group mb-3">
                <!-- <label for="city" class="form-label">city</label> -->
                <select name="city" id="city" ng-model="city" class="form-select" >
                  <option value=""> Select city</option>
                  
                  <!-- <option value="{{city.city_name}}}">select city</option>
                  {{city.city_name}} -->
               </select>
            </div>

             <div class=" d-grid gap-2 col-3 mx-auto">
             <button type="submit" id="submit"  class="btn btn-primary">Submit</button>
                <!-- <input class="submit" type="submit" value="submit"> -->
                     </div>
 
    
    </form>
  </div>

  <!-- this code is for validation od city,state and country-->
    <script type="text/javascript">
//  $(document).ready(function(){
 
 $("#country").change(function(){
  
 var country_id = this.value;
   $.ajax({
   url: "state.php",
   type: "POST",
   data: {
   country_id: country_id
   },
   cache: false,
   success: function(result){     
     $("#state").html(result);
     $('#city').html('<option value="">Select State First</option>'); 
   }
  });
  });   
 
 $("#state").change(function(){
   var state_id = this.value;
   $.ajax({
   url: "city.php",
   type: "POST",
   data: {
   state_id: state_id
   },
   cache: false,
   success: function(result){
     $("#city").html(result);   
   }
   });    
 });

// });

// function change()
//  {
//    window.location.href='jquery_pagination.php';
// }


</script>

<!-- data insert into database code -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email= $_POST['email'];
$number= $_POST['number'];
// $country= $_POST['country'];
// $state= $_POST['state'];
$city= $_POST['city'];

// Create connection
$conn = mysqli_connect("localhost", "root", "", "student");

// when we check connect is ok or not then die function use
// $conn = mysqli_connect("localhost", "root", "", "student") or die("connection failed");

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO reg (fname, lname, email, mobile_number, city) VALUES ('$fname','$lname','$email','$number','$city')";


// if we direct check is any error come
// $query= mysqli_query($conn, $sql) or die("query unsuccessful");

// for data insert
if (mysqli_query($conn, $sql)) {
?>
<script>
  alert("data stored successfully");
  window.location.href='jquery_pagination.php';
</script>

<!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->
<?php
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// create json file of this data
if(file_exists('json/student_data.json')){

  $current_data = file_get_contents('json/student_data.json');
  $array_data = json_decode($current_data, true);
  $new_data = array(
              'fname' => $_POST['fname'],
              'lname' => $_POST['lname'],
              'email' => $_POST['email'],
              'number' => $_POST['number'],
              'city' => $_POST['city']
            );

  $array_data[] = $new_data;
  $json_data = json_encode($array_data,JSON_PRETTY_PRINT); //jeson_preety function show json format in user readble format not in single line

  if(file_put_contents('json/student_data.json', $json_data))
  {
    
  }
  else{
    echo "<h3>not saved data in JSON file.</h3>";
  }
}else{
  echo "<h3>JSON file not exist.</h3>";
}

?>


<?php

mysqli_close($conn);
}
?>
            

</body>
 
</html>