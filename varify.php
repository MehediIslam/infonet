<?php
ob_start();
session_start();
require 'DBcon.php';
class Login {

    public function user_login_check($data) 
	{
	    $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'infonet';
        $conn = mysqli_connect($hostname, $username, $password, $dbname);

        $userid = $data['username'];
        $password = $data['password'];
        $query = "SELECT * FROM login WHERE username='$userid' and password='$password'";
        
        if (mysqli_query($conn,$query)) 
		{
            $resourse_id = mysqli_query($conn, $query);
            $user_info = mysqli_fetch_assoc($resourse_id);

            if ($user_info) 
			{
                if ($user_info['access_level'] == '1') 
				{
                    $_SESSION['login_id'] = $user_info['login_id'];
                    $_SESSION['user_type'] = $user_info['user_type'];

                    if ($user_info['user_type'] == "SA") 
					{
                        header('Location: notice_board.php');
                    } 
					
					else if ($user_info['user_type'] == "A") 
					{
                        header('Location: notice_board.php');
                    }
					
					else if ($user_info['user_type'] == "M") 
					{
                        header('Location: notice_board.php');
                    }
					
					else if ($user_info['user_type'] == "G") 
					{
                        header('Location: notice_board.php');
                    }	
                }
				
				else if($user_info['login_access'] != '1')
				{	
					print "<script type=\"text/javascript\"> alert('Account is not Activated. Please try later !!'); </script>";					
				}
            }
			
			else{
					print "<script type=\"text/javascript\"> alert('Invalid User ID or Password'); </script>";
            	}
        } 
		
		else 
		{
            die('Query Problem' . mysqli_error());
        }
    }
}
ob_flush();
?>
