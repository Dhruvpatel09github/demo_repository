<?php 
include('config.php');
 
$state_id = $_POST['state_id'];
$query= "select * from city where state_id='".$state_id."' order by city_name ASC";
$result= mysqli_query($conn,$query);
 
while ($row= mysqli_fetch_array($result)) {
    ?>
    <option value='<?php echo $row['city_name'] ?>'><?php echo $row['city_name']; ?></option>;
<?php } ?>