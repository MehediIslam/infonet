<?php
error_reporting(0);
ob_start();
date_default_timezone_set("Asia/Dhaka");
session_start();
require 'Super_Admin.php';
$obj_sup = new Super_Admin();
if (isset($_GET['status'])) {
    if (isset($_GET['logout']) == 'true') {
	    $obj_sup->logout();
    }
}
$login_id = $_SESSION['login_id'];
if ($login_id == NULL && $_SESSION['user_type'] != 'SA') {
    header('Location: login.php');
}
else if ($login_id == NULL && $_SESSION['user_type'] != 'A') {
    header('Location: login.php');
}
else if ($login_id == NULL && $_SESSION['user_type'] != 'M') {
    header('Location: login.php');
}
else if ($login_id == NULL && $_SESSION['user_type'] != 'G') {
    header('Location: login.php');
}
?>

<?php 
$suspect_id = $_POST['suspect_id'];
$case_id = $_POST['case_id'];
$username = $_POST['username'];
$date_time = date("d-M-Y")." ".date("h:i:s");


//fetching selected suspect's information
$select = "SELECT * from suspect where suspect_id = $suspect_id";
$result=$conn->query($select);
while($row = $result->fetch_assoc())
{
  $main_id = $row['main_id'];
}

//checking selected suspect for existing
$select1 = "SELECT `suspect_id` FROM `case_suspect` WHERE `case_id` = '$case_id' AND `suspect_id`= '$suspect_id'";
$result2=$conn->query($select1);

while($row1 = $result2->fetch_assoc())
{
  $checker = $row1['suspect_id'];
}

if($checker != "")
{
	//echo $main_id." is already existed !!";
	print "<script type=\"text/javascript\"> alert('$main_id is already existed in the Case !!'); </script>";
}

else
{
	//insert suspect_id to corresponded case_id
	$sql = "INSERT INTO `case_suspect`(`case_id`, `suspect_id`) VALUES ('$case_id','$suspect_id')";
	$result1=$conn->query($sql);		
		
	print "<script type=\"text/javascript\"> alert('$main_id has been added to the Case !!'); </script>";
	
	//update notification
	$sql2 = "UPDATE `cases` SET `last_update`= '$username added $main_id as case suspect at $date_time' WHERE `case_id` = '$case_id'";	
	$result4=$conn->query($sql2);
	mysqli_close($conn); 
}
	
?>