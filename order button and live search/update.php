


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-center text-primary">update your information
           
    </h3>
  </div>

  <div class="card-body">

     <?php
                    if(isset($_SESSION['success']) && $_SESSION['success'] !='') 
                    {
                        echo '<h2 class="bg-white text-success"> '.$_SESSION['success'].' </h2>';
                        unset($_SESSION['success']);
                    }
                    
                   
                    if(isset($_SESSION['error']) && $_SESSION['error'] !='') 
                    {
                        echo '<h2 class="bg-white text-danger"> '.$_SESSION['error'].' </h2>';
                        unset($_SESSION['error']);
                    }
               
    ?>
       

    <div class="table-responsive">
      <?php  
      include('config.php');
      if (isset($_POST['update_btn'])) {
       $student_id = $_POST['update_id'];
      $query = "SELECT * FROM reg WHERE stu_id = $student_id ";
      $data =mysqli_query($conn, $query);

      $total = mysqli_num_rows($data);
    
          
while($result = mysqli_fetch_assoc($data)) 
              {
                ?>
                <div class="col-md-6 offset-md-3">

              <form  method="post" action="update_user.php">
              <div class="mb-3 mt-3">
                <label  class="form-label">first name:</label>
                <input type="text" class="form-control" name="fname"  value="<?php echo $result['fname']; ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label">last name:</label>
                <input type="text" name="lname" class="form-control" value="<?php echo $result['lname']; ?>">
            </div>

            <div class="mb-3">
                <label  class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $result['email']; ?>">
            </div>

            <div class="mb-3">
                <label  class="form-label">mobile number:</label>
                <input type="text" class="form-control" name="mobile_number" class="txtField" maxlength="10" value="<?php echo $result['mobile_number']; ?>">

            <div class="mb-3">
                <label  class="form-label">city:</label>
                <input type="text"class="form-control" name="city" class="txtField" value="<?php echo $result['city']; ?>">
            </div>
              
             
            <div class=" d-grid gap-5 col-3 mx-auto">
               <input type="hidden" name="student_id" value="<?php echo $result['stu_id'];?>">
               <input type="submit" class="btn btn-primary" name="submit" value="Submit">
              </div> 
             
                </form>
                </div>
            
                <?php  
                 }
                
            }
        
           
        
            ?>
            </form>
            </td>
          </tr>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <!-- <script src="js/main.js"></script>

<script src="js/sweetalert.js"></script>
//<?php
//if(isset($_SESSION['status']) && $_SESSION['status'] !='')
//{
 // ?>
  <script>
    swal({
          title: "<?php echo $_SESSION['status'];?>",
          text: "Thank you! ",
          icon: "<?php echo $_SESSION['status_code'];?>",
          button: "Okay!",
|
       });
    
  </script> -->

