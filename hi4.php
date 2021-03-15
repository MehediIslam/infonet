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
$suspect_id = $_POST['suspect_id'];
$info = $_POST['info'];
$date_time = date("Y-m-d")." ".date("h:i:s");

//checking info fields..
if($info != "")
{
	//insert information against a suspect..
	$sql = "INSERT INTO `information`(`suspect_id`, `information`, `login_id`, `date`) VALUES ('$suspect_id','$info','$login_id','$date_time')";	
	
	$result=$conn->query($sql);
	print "<script type=\"text/javascript\"> alert('Your information has been submitted successfully !!'); </script>";
	
}

else{
	print "<script type=\"text/javascript\"> alert('Ops!! you did not provide any information.'); </script>";
}

?>