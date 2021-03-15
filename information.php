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


//fetching user's information who is logged
$select = "SELECT * from login where login_id=$login_id";
$result=$conn->query($select);
while($row = $result->fetch_assoc())
{
  $username = $row['username'];
}
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
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	  
	<style>
	.cus_panel{
    padding-bottom: 0px;
    padding-top: 0px;
	}
	</style>
</head>

<body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="notice_board.php" class="navbar-brand"> 
                 <b>INFONET</b>
                </a>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><?php echo $username?></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                    <ul class="dropdown-menu user-dropdown">
                     <li><a href="policy.php"><span class="fa fa-gavel"></span>  Policy</a></li>
                     <li><a href="logs.php"><span class="fa fa-history"></span>  Logs</a></li> 
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                        <li><a href=""><span class="fa fa-cogs"></span></a></li>
                        <li><a href="update_pass.php"><span class="fa fa-lock"></span></a></li>
                        <li><a href="?status=logout&logout=true"><span class="fa fa-power-off"></span></a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
               
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
					
					<li class="ripple">
                      <a href="notice_board.php">
                         <span class="fa fa-calendar-o"></span>Notice Board
                      </a>
                    </li>
					
					<li class="ripple">
                      <a href="case.php">
                         <span class="fa fa-folder-open"></span>Cases
                      </a>
                    </li>
					
					<li class="ripple">
                      <a class="tree-toggle nav-header"><span class="fa icon-user-follow"></span> Add Suspects 
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="suspect_against_case.php">Against Case</a></li>
                          <li><a href="individual_suspect.php">Individuals</a></li>
                      </ul>
                    </li>
                
                    <li class="active ripple">
                      <a href="information.php">
                         <span class="fa icon-book-open"></span>Information
                      </a>
                    </li>
					
					<li class="ripple">
                      <a href="https://drive.google.com/drive/folders/1REmYdASWDuXjNCQgzvk565tKL2uh0CoY?usp=sharing" target="_blank">
                         <span class="fa fa-database"></span>Evidence Drive
                      </a>
                    </li>
					
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->


            <!-- start: Content -->
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body cus_panel">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Table</h3>
                        <p class="animated fadeInDown">
                          Information of users
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Data Tables</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ToLife ID</th>
                          <th>Name</th>
                          <th>ASL</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
					    <?php
						   $sql1 = "SELECT * FROM `suspect` WHERE 1";
						   $result1=$conn->query($sql1);
						   while($row1=$result1->fetch_assoc())
						   {	   
						?>

                        <tr>
                          <td style="color:#3e83b5e0"><b><?php echo $row1['main_id']; ?></b></td>
                          <td><?php echo $row1['name']; ?></td>
                          <td><?php echo $row1['asl']; ?></td>
                          <td align="right">
						  <?php echo "<a href=\"criminal_profile.php?suspect_id=$row1[suspect_id]\" target='_blank' style='color:inherit; font-weight: normal;'>" ?><span class="label label-primary">Profile</span></a>
						  
						  <?php echo "<a href=\"add_info.php?suspect_id=$row1[suspect_id]\" target='_blank' style='color:inherit; font-weight: normal;'>" ?><span class="label label-primary">Add Info</span> </td></a>
                        </tr>
                       
						<?php }?> 
                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>
          <!-- end: content -->
         
      </div>

      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
					
					<li class="ripple">
                      <a href="notice_board.php">
                         <span class="fa fa-calendar-o"></span>Notice Board
                      </a>
                    </li>
					
					<li class="ripple">
                      <a href="case.php">
                         <span class="fa fa-folder-open"></span>Cases
                      </a>
                    </li>
					
					<li class="ripple">
                      <a class="tree-toggle nav-header"><span class="fa icon-user-follow"></span> Add Suspects 
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="suspect_against_case.php">Against Case</a></li>
                          <li><a href="individual_suspect.php">Individuals</a></li>
                      </ul>
                    </li>
                
                    <li class="active ripple">
                      <a href="information.php">
                         <span class="fa icon-book-open"></span>Information
                      </a>
                    </li>
					
					<li class="ripple">
                      <a href="https://drive.google.com/drive/folders/1REmYdASWDuXjNCQgzvk565tKL2uh0CoY?usp=sharing" target="_blank">
                         <span class="fa fa-database"></span>Evidence Drive
                      </a>
                    </li>
					
                </ul>
            </div>
        </div>       
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>


<!-- custom -->
<script src="asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
<!-- end: Javascript -->
</body>
</html>