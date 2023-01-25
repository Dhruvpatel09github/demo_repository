<?php
include 'config.php';

$request = 1;
if(isset($_POST['request'])){
    $request = $_POST['request'];
}

// DataTable data
if($request == 1){
    ## Read value
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

    $searchValue = mysqli_escape_string($con,$_POST['search']['value']); // Search value

    ## Search 
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery = " and (fname like '%".$searchValue."%' or 
            lname like '%".$searchValue."%'or 
            mobile_number like '%".$searchValue."%'or
            email like '%".$searchValue."%' or 
            city like'%".$searchValue."%' ) ";
    }

    ## Total number of records without filtering
    $sel = mysqli_query($con,"select count(*) as allcount from reg");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sel = mysqli_query($con,"select count(*) as allcount from reg WHERE 1 ".$searchQuery);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $empQuery = "select * from reg WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
    $empRecords = mysqli_query($con, $empQuery);
    $data = array();

    while ($row = mysqli_fetch_assoc($empRecords)) {

        // Update Button
        $updateButton = "<button class='btn btn-sm btn-info updateUser' data-id='".$row['stu_id']."' data-toggle='modal' data-target='#updateModal' >Update</button>";

        // Delete Button
        $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$row['stu_id']."'>Delete</button>";
        
        $action = $updateButton." ".$deleteButton;

        $data[] = array(
                "id" => $row['stu_id'],
                "fname" => $row['fname'],
                "lname" => $row['lname'],
                "number" => $row['mobile_number'],
                "email" => $row['email'],
                "city" => $row['city'],
                "action" => $action
            );
    }

    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
    exit;
}

// // Fetch user details
// if($request == 2){
//     $id = 0;

//     if(isset($_POST['stu_id'])){
//         $id = mysqli_escape_string($con,$_POST['stu_id']);
//     }

//     $record = mysqli_query($con,"SELECT * FROM reg WHERE stu_id=".$id);

//     $response = array();

//     if(mysqli_num_rows($record) > 0){
//         $row = mysqli_fetch_assoc($record);
//         $response = array(
//             "id" => $row['stu_id'],
//                 "fname" => $row['fname'],
//                 "lname" => $row['lname'],
//                 "number" => $row['mobile_number'],
//                 "email" => $row['email'],
//                 "city" => $row['city'],
//         );

//         echo json_encode( array("status" => 1,"data" => $response) );
//         exit;
//     }else{
//         echo json_encode( array("status" => 0) );
//         exit;
//     }
// }

// // Update user
// if($request == 3){
//     $id = 0;

//     if(isset($_POST['stu_id'])){
//         $id = mysqli_escape_string($con,$_POST['stu_id']);
//     }

//     // Check id
//     $record = mysqli_query($con,"SELECT stu_id FROM reg WHERE stu_id=".$id);
//     if(mysqli_num_rows($record) > 0){

//         $id = mysqli_escape_string($con,trim($_POST['stu_id']));
//         $fname = mysqli_escape_string($con,trim($_POST['fname']));
//         $lname = mysqli_escape_string($con,trim($_POST['lname']));
//         $number = mysqli_escape_string($con,trim($_POST['mobile_number']));
//         $email = mysqli_escape_string($con,trim($_POST['email']));
//         $city = mysqli_escape_string($con,trim($_POST['city']));

//         if( $id != '' && $fname != '' && $lname != '' && $number != '' && $email != '' && $city != '' ){

//             mysqli_query($con,"UPDATE reg SET fname='".$fname."',lname='".$lname."', mobile_number='".$number."',email='".$email."',city='".$city."' WHERE stu_id=".$id);

//             echo json_encode( array("status" => 1,"message" => "Record updated.") );
//             exit;
//         }else{
//             echo json_encode( array("status" => 0,"message" => "Please fill all fields.") );
//             exit;
//         }
        
//     }else{
//         echo json_encode( array("status" => 0,"message" => "Invalid ID.") );
//         exit;
//     }
// }

// // Delete User
// if($request == 4){
//     $id = 0;

//     if(isset($_POST['stu_id'])){
//         $id = mysqli_escape_string($con,$_POST['stu_id']);
//     }

//     // Check id
//     $record = mysqli_query($con,"SELECT stu_id FROM reg WHERE stu_id=".$id);
//     if(mysqli_num_rows($record) > 0){

//         mysqli_query($con,"DELETE FROM reg WHERE stu_id=".$id);

//         echo 1;
//         exit;
//     }else{
//         echo 0;
//         exit;
//     }
// }