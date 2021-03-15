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
$case_id = $_POST['case_id'];
$login_id = $_POST['login_id'];
$real_name = $_POST['real_name'];
$asl = $_POST['asl'];
$main_id = $_POST['main_id'];
$altid = $_POST['altid'];
$evidence = $_POST['evidence'];
$description = $_POST['description'];
$username = $_POST['username'];
$date_time = date("Y-m-d")." ".date("h:i:s");

//checking suspect's main_id for inserting..
if($main_id != "")
{
	$select1 = "SELECT `main_id` FROM `suspect` WHERE `main_id` = '$main_id'";
	$result2=$conn->query($select1);
	while($row1 = $result2->fetch_assoc())
	{
	  $checker = $row1['main_id'];
	}

	if($main_id === $checker)
	{
		print "<script type=\"text/javascript\"> alert('$checker is already existed in Database. Pls, add to the CASE from [Existing Suspect]'); </script>";
	}

	else
	{
		//insert suspect to corresponded case and database
		$sql = "INSERT INTO `suspect`(`name`, `asl`, `main_id`, `alternate_id`, `evidence`, `description`, `login_id`, `date`) VALUES ('$real_name','$asl','$main_id','$altid','$evidence','$description','$login_id','$date_time')";	
		if (mysqli_query($conn, $sql)) 
		{		
			//returning last suspect id
			$last_suspect_id = mysqli_insert_id($conn);
			
			//insert suspect to the case...			
			$sql2 = "INSERT INTO `case_suspect`(`case_id`, `suspect_id`) VALUES ('$case_id','$last_suspect_id')";
			$result=$conn->query($sql2);
			print "<script type=\"text/javascript\"> alert('$main_id has been added successfully !!'); </script>";
			
			//update notification
			$sql3 = "UPDATE `cases` SET `last_update`= '$username added $main_id as case suspect at $date_time' WHERE `case_id` = '$case_id'";	
			$result4=$conn->query($sql3);
			mysqli_close($conn); 
		}

		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	
}

else{
	print "<script type=\"text/javascript\"> alert('Ops!! Main ID is required'); </script>";
}

?>