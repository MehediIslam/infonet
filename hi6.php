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
$username = $_POST['username'];
$dbcase_id = $_POST['dbcase_id'];
$up_case_name = $_POST['up_case_name'];
$up_evidence = $_POST['up_evidence'];
$up_description = $_POST['up_description'];
$date_time = date("d-M-Y")." ".date("h:i:s");

//cross-checking empty fields..
if($up_case_name != "" && $up_evidence != "" && $up_description != "")
{
	//update case
	$sql = "UPDATE `cases` SET `case_name`='$up_case_name',`evidence_link`='$up_evidence',`description`='$up_description',`last_update`='$username updates primary element at $date_time' WHERE `case_id` = '$dbcase_id'";	
	$result=$conn->query($sql);
	mysqli_close($conn);
	print "<script type=\"text/javascript\"> alert('Your data updated successfully !!'); </script>";
}

else
{
	print "<script type=\"text/javascript\"> alert('Empty fields are not allowed !!'); </script>";
}

?>


