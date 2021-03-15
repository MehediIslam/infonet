<?php
//error_reporting(0);
//normal procedure
$servername = "localhost";
$username = "root";
$password = "";
$dbname="infonet";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>

<?php 
//oop procedure
class Db_Connect {

    public function __construct() 
	{
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'infonet';
        $conn = mysqli_connect($hostname, $username, $password);
        mysqli_select_db($conn, $dbname) or die(mysqli_error($conn));
    }
}
?>


