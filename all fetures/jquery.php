<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Show JSON Data in Jquery Datatables</title>  
           <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> 
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h1 class="text-center">Student Information</h3><br />  
                <table id="data-table" class="table table-bordered">  
                     <thead>  
                          <tr>  
                               <th>fName</th>  
                               <th>lName</th>  
                               <th>email</th>  
                               <th>number</th>  
                               <th>city</th>  
                          </tr>  
                     </thead>  
                </table>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#data-table').DataTable({  
           "ajax"     : "student_data.json",  
           "columns"     :     [  
                {     "data"     :     "fname"     },
                {     "data"     :     "lname"     },  
                {     "data"     :     "email"}, 
                {     "data"     :     "number"     }, 
                {     "data"     :     "city"}  
           ]  
      });  
 });  
 </script>  