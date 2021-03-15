<?php ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
?>


<?php
require 'varify.php';
$obj_login = new Login();

if (isset($_POST['login'])) 
{
    $message = $obj_login->user_login_check($_POST);
}

if (isset($_SESSION['login_id'])) 
{
    $user_id = $_SESSION['login_id'];

    if ($user_id == NULL) 
	{
        if ($_SESSION['user_type'] == 'SA') 
		{
            header('Location: notice_board.php');
        } 
		
		else if ($_SESSION['user_type'] == 'A') 
		{
            header('Location: notice_board.php');
        } 
		
		else if ($_SESSION['user_type'] == 'M') 
		{
            header('Location: notice_board.php');
        }
		
		else if ($_SESSION['user_type'] == 'G') 
		{
            header('Location: notice_board.php');
        } 
		else
		{
			header('Location: login.php');
		}
    }
}
ob_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INFONET</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/icheck/skins/flat/aero.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	
	<style>  
	.form-signin-wrapper {
    background: white !important;
	}
	
	.form-signin .panel {
    background: #f57479;
    box-shadow: none;
	padding: 0px;
	}
	
	.container {
    margin-top: 50px;
	}
	
	.form-signin .atomic-mass {

    margin-top: -28px;
    line-height: 1.2;
	}
	</style>
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">

      <div class="container">

        <form class="form-signin" action="login.php" method="post" enctype="multipart/form-data">
          <div class="panel periodic-login">
              <span class="atomic-number"></span>
              <div class="panel-body text-center">
                  <h1 class="atomic-symbol">iN</h1>
				  <p class="atomic-mass">version 1.02</p>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" name="username" required>
                    <span class="bar"></span>
                    <label>Username</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" class="form-text" name="password" required>
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
            <!--      <label class="pull-left">
                  <input type="checkbox" class="icheck pull-left" name="checkbox1"/> Remember me
                  </label> -->
                  <input type="submit" class="btn col-md-12" name="login" value="SignIn"/>
              </div>
               <!-- <div class="text-center" style="padding:5px;">
                    <a href="forgotpass.html">Forgot Password </a>
                    <a href="reg.html">| Signup</a>
                </div> -->
          </div>
        </form>

      </div>

      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="asset/js/jquery.min.js"></script>
      <script src="asset/js/jquery.ui.min.js"></script>
      <script src="asset/js/bootstrap.min.js"></script>

      <script src="asset/js/plugins/moment.min.js"></script>
      <script src="asset/js/plugins/icheck.min.js"></script>

      <!-- custom -->
      <script src="asset/js/main.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html>