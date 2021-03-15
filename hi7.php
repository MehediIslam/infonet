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
$radio1 = $_POST['radio1'];
$date_time = date("d-M-Y")." ".date("h:i:s");

//updating case status..
$sql = "UPDATE `cases` SET `status`= '$radio1',`last_update`= '$username changes status at $date_time' WHERE `case_id` = '$dbcase_id'";	
$result=$conn->query($sql);
mysqli_close($conn);
//print "<script type=\"text/javascript\"> alert('Case status updated successfully !!'); </script>";

?>



