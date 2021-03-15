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
$current_pass = $_POST['current'];
$new_pass = $_POST['new'];
$renew_pass = $_POST['renew'];

//retriving current password for checking..
$select = "SELECT `password` FROM `login` WHERE `login_id` = $login_id";
$result=$conn->query($select);
while($row = $result->fetch_assoc())
{
  $oldpass = $row['password'];
}


//cross-checking current pass..
if($current_pass != "" && $new_pass != "" && $renew_pass != "")
{
	if($current_pass === $oldpass)
	{
		if($new_pass != $renew_pass)
		{
			print "<script type=\"text/javascript\"> alert('Type the new passwords correctly !!'); </script>";
		}
		
		else{
			//update password
			$sql = "UPDATE `login` SET `password` = '$renew_pass' WHERE `login_id` = $login_id";	
			$result=$conn->query($sql);
			print "<script type=\"text/javascript\"> alert('Your password updated successfully !!'); </script>";
		}
	}
	
	else
	{
		print "<script type=\"text/javascript\"> alert('Current password not matched !!'); </script>";
	}
}

else{
	print "<script type=\"text/javascript\"> alert('Please fill up all fields !!'); </script>";
}

?>


