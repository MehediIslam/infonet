<html>
<head>
<script>
function script(){
	window.close();
}
</script>
</head>
<body onload="script();">

</body>
</html>

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
$username = $_GET['username'];
$id = $_GET['id'];
$case_id = $_GET['case_id'];
$main_id = $_GET['main_id'];
$date_time = date("Y-m-d")." ".date("h:i:s");



//remove suspect from case
$sql = "DELETE FROM `case_suspect` WHERE `id` = '$id'";	
$result=$conn->query($sql);

$sql2 = "UPDATE `cases` SET `last_update`= '$username removed $main_id from this case at $date_time' WHERE `case_id` = '$case_id'";	
$result2=$conn->query($sql2);

mysqli_close($conn);
?>











