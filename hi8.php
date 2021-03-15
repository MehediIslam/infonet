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

$login_id = $_POST['login_id'];
$username = $_POST['username'];
$case_name = $_POST['case_name'];
$evidence_link = $_POST['evidence_link'];
$description = $_POST['description'];
$date_time = date("Y-m-d")." ".date("h:i:s");

if($case_name != "" && $evidence_link != "" && $description != "")
{
	$sql = "INSERT INTO `cases`(`case_name`, `evidence_link`, `description`, `start_date`, `status`, `login_id`,`last_update`) VALUES ('$case_name','$evidence_link','$description','$date_time','1','$login_id','$username added the case: $case_name')";
	$result=$conn->query($sql);		
	mysqli_close($conn);
	print "<script type=\"text/javascript\"> alert('The case has been created successfully !!'); </script>";
}

else{
	print "<script type=\"text/javascript\"> alert('All fields are required !!'); </script>";
}
?>