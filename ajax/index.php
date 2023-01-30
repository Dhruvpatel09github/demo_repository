<?php  
 //index.php  
 $connect = mysqli_connect('localhost', 'root', '', 'student');  
 $query = "SELECT * FROM reg ORDER BY stu_id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax CRUD opration</title>
  <link rel="stylesheet" href="css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

 <!-- Bootstrap Font Icon CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-info">
  <table id="main"  cellspacing="0">
    <tr>
      <td id="header">
        <h1>User Information</h1>
        <div id="search-bar">
          
          <input class="h-25" type="text" id="search" autocomplete="off" placeholder="search">
        </div>
      </td>
    </tr>
    <tr>
      <td id="table-form">
        <!-- <form id="addForm">
          First Name : <input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Last Name : <input type="text" id="lname">
          <input type="submit" id="save-button" value="Save">
        </form> -->
        <!-- <div class="d-flex justify-content-center">
          <button type="button" class="btn btn-primary mx-4 my-2 " id="incerasing">Ascending order</button>
          <button type="button" class="btn btn-primary mx-4 my-2" id="decresing">Decending order</button>
        </div> -->
       
        </td>
    </tr>
    <tr>
      <td id="table-data">
      <table class="table table-bordered ">  
                          <tr>  
                               <th><a class="column_sort text-dark" id="stu_id" data-order="desc" href="#">ID</a></th>  
                               <th><a class="column_sort text-dark" id="fname" data-order="desc" href="#">fname</a></th>  
                               <th><a class="column_sort text-dark" id="lname" data-order="desc" href="#">lname</a></th>  
                               <th><a class="column_sort text-dark" id="mobile_number" data-order="desc" href="#">mobile</a></th>  
                               <th><a class="column_sort text-dark" id="city" data-order="desc" href="#">email</a></th>
                               <th><a class="column_sort text-dark" id="city" data-order="desc" href="#">city</a></th>  
                               <th>update</a></th>  
                               <th>delete</a></th>  
                          </tr> 
                          
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr >  
                               <td><?php echo $row["stu_id"]; ?></td>
                               <td><?php echo $row["fname"]; ?></td>  
                               <td><?php echo $row["lname"]; ?></td>  
                               <td><?php echo $row["mobile_number"];?></td>  
                               <td><?php echo $row["email"]; ?></td>  
                               <td><?php echo $row["city"]; ?></td>  
                               <td align='center'><button id="edit-btn" class='edit-btn' data-eid=<?php echo $row["stu_id"]?>>Edit</button></td>
                               <td align='center'><button id="delete-btn" class='delete-btn' data-id=<?php echo $row["stu_id"]?>>Delete</button></td>  
                               
                          </tr>  
                       <?php   
                          }  
                          ?>  
                     </table>  
      </td>
    </tr>
  </table>
  <div id="error-message"></div>
  <div id="success-message"></div>
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <table cellpadding="10px" width="100%">
      </table>
      <div id="close-btn">X</div>
    </div>
  </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    //  // Load Table Records
    //  function loadTable(){
    //   $.ajax({
    //     url : "ajax-load.php",
    //     type : "POST",
    //     success : function(data){
    //       $("#table-data").html(data);
    //     }
    //   });
    // }
    // loadTable(); // Load Table Records on Page Load


     //sorting
    $(document).on('click', '.column_sort', function load(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           //glyphicon glyphicon-arrow-up  
           //glyphicon glyphicon-arrow-down  
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="bi bi-arrow-up"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="bi bi-arrow-down" ></span>';  
           }  
           $.ajax({  
                url:"sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#table-data').html(data);  
                     $('#'+column_name+'').append(arrow);  
                     
                }  
           });  

    });

// Load Table Records on Page Load

    // Insert New Records
    // $("#save-button").on("click",function(e){
    //   e.preventDefault();
    //   var fname = $("#fname").val();
    //   var lname = $("#lname").val();
    //   if(fname == "" || lname == ""){ // OR statement
    //     $("#error-message").html("All fields are required.").slideDown();
    //     $("#success-message").slideUp();
    //   }else{
    //     $.ajax({
    //       url: "ajax-insert.php",
    //       type : "POST",
    //       data : {fname:fname, lname: lname},
    //       success : function(data){
    //         if(data == 1){
    //           loadTable();
    //           $("#addForm").trigger("reset");
    //           $("#success-message").html("Data Inserted Successfully.").slideDown();
    //           $("#error-message").slideUp();
    //         }else{
    //           $("#error-message").html("Can't Save Record.").slideDown();
    //           $("#success-message").slideUp();
    //         }

    //       }
    //     });
    //   }

    // });

    //Delete Records
    $(document).on("click",".delete-btn", function(){  
      if(confirm("Do you really want to delete this record ?")){
        var studentId = $(this).data("id");
        var element = this;  // select deleteing field

        $.ajax({
          url: "ajax-delete.php",
          type : "POST",
          data : {stu_id : studentId},
          success : function(data){
              if(data == 1){
                alert("Data Deleted Successfully");
              // location.reload(true);
                $(element).closest("tr").fadeOut();
                
              }else{
                $("#error-message").html("Can't Delete Record.").slideDown();
                $("#success-message").slideUp();
              }
          }
        });
      }
    });

     
    //Show Modal Box  
    $(document).on("click",".edit-btn", function(){
      $("#modal").show();
      var studentId = $(this).data("eid");

      $.ajax({
        url: "load-update-form.php",
        type: "POST",
        data: {stu_id: studentId },
        success: function(data) {
          $("#modal-form table").html(data);
        }
      })
    });

    //Hide Modal Box
    $("#close-btn").on("click",function(){
      $("#modal").hide();
    });

    //Save Update Form
      $(document).on("click","#edit-submit", function(){
        var stuId = $("#edit-id").val();
        var fname = $("#edit-fname").val();
        var lname = $("#edit-lname").val();
        var number = $("#edit-number").val();
        var email = $("#edit-email").val();
        var city = $("#edit-city").val();

        $.ajax({
          url: "ajax-update-form.php",
          type : "POST",
          data : {id: stuId, first_name: fname, last_name: lname, number: number, email: email, city: city},
          success: function(data) {
            if(data == 1){
              $("#modal").hide();
              alert("your data updated successfully");
              location.reload(true);
            }
            else{
              alert("**update unsuccessfully**");
            }
          }
        })
      });

    // Live Search
     $("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "ajax-live-search.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
         
          // if(!data)
          // {
          //   $("#table-data").load();
          // }
          // else
          // {
          $("#table-data").html(data);
          // }
         }
       });

     });

    // //increment
    // $("#incerasing").on("click", function(){
    
    // $.ajax({
    //   url: "incresing.php",
    //   type : "POST",
    //   success : function(data){
    //     $("#table-data").html(data);
    //   }
    // });

// });




//  //decrement
//  $("#decresing").on("click", function(){

// $.ajax({
//   url: "decreasing.php",
//   type : "POST",
//   success : function(data){
//     $("#table-data").html(data);
//   }
// });

// });
});
</script>
</body>
</html>
