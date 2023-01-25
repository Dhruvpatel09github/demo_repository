<?php 
include('config.php');
 
$country_id = $_POST['country_id'];
$query= "select * from state_tb where country='".$country_id."' order by sname ASC";
$result= mysqli_query($conn,$query);
 
while ($row= mysqli_fetch_array($result)) {
    ?>
    <option value='<?php echo $row['sid'] ?>'><?php echo $row['sname']; ?></option>;
<?php } ?>