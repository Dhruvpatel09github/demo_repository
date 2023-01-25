<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagination</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
</head>
<body class="bg-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 bg-light rounded my-2 py-2">
                <h2 class="text-center text-dark pt-2"> STUDENT INFORMATION</h2>
                <table id="table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                        <th>id</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>update</th>
                        <th>delete</th>

                       
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                        $conn = new mysqli("localhost","root","","student");
                        $sql = "SELECT * FROM reg";
                        $res = $conn->query($sql);
                        while($row = $res-> fetch_assoc()){
                        ?>
                        <tr>
                            <td><?= $row['stu_id']?></td>
                            <td><?= $row['fname']?></td>
                            <td><?= $row['lname']?></td>
                            <td><?= $row['mobile_number']?></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['city']?></td>
                            <td>
                      <form  method="post" action="update.php" >
                        <input type="hidden" name="update_id" value="<?php echo $row['stu_id']; ?>">
                      <button type="submit" name="update_btn" class="btn btn-success " >UPDATE</button>
                      </form>
                     </td>
							<td>
                      <form  method="POST" action="delete.php" >
                        <input type="hidden" name="delete_id" value="<?php echo $row['stu_id']; ?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger" onclick="return checkdelete()">DELETE</button>
                      </form>
                     </td>

                        </tr>
                        <?php
                        }
                        ?>
                    </tbody> 
                </table>
            </div>
        </div>
    </div>

  </div>
</div>
    <script>
        //datatable code
     $(document).ready(function(){
       $('#table').DataTable({
        
    //    bLengthChange: true, //total data show at a time
    // "lengthMenu": [ [10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, "All"] ],
    // "iDisplayLength": 10,
    // bInfo: false,
    // responsive: true,
    // "bAutoWidth" : false // showing all data in database 
       });  

//        $('#example').on( 'page.dt', function () {
// var info = table.page.info();
// $('#pageInfo').html( 'Showing page: '+info.page+' of '+info.pages );
// } );
      });

        function checkdelete()
        {
            return confirm('Are you sure delete this record');
        }
        </script>
</body>
</html>