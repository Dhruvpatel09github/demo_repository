

<?php
include 'config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
	$searchQuery = " and (stu_id like '%".$searchValue."%' or 
        fname like '%".$searchValue."%' or 
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
    $updateButton = "<button class='btn updateUser' data-id='".$row['stu_id']."' >Update</button>";

    // Delete Button
    $deleteButton = "<button class='btn deleteUser' data-id='".$row['stu_id']."'>Delete</button>";
    
    $action = $updateButton." ".$deleteButton;

    $data[] = array(
    		"stu_id"=>$row['stu_id'],
    		"fname"=>$row['fname'],
    		"lname"=>$row['lname'],
    		"mobile"=>$row['mobile_number'],
            "email"=>$row['email'],
    		"city"=>$row['city'],
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
