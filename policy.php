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
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	  	  
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
                <li class="user-name"><span><?php echo $username; ?></span></li>
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
           <!--     <li ><a href="#" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li> -->
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
                
                    <li class="ripple">
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
                 
              </div>
			  
              <div class="col-md-12">
                <div class="col-md-12">
                <div class="panel">
                  <div class="panel-heading"><h3>Our Journey</h3></div>
                  <div class="panel-body">
                    <div class="col-md-12">
                      <ul class="timeline">
                        <li>
                          <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h4 class="timeline-title">Requirements</h4>
                              <p><small class="text-muted"><i class="fa fa-comment-o"></i> you're the right person if you've</small></p>
                            </div>
                            <div class="timeline-body">
                              <p>i. Applicants must have some guts and intelligence</p>
                              <p>ii. Decency and politeness in ToLife & in any situations is mandatory</p>
                            </div>
                          </div>
                        </li>
                        <li class="timeline-inverted">
                          <div class="timeline-badge warning"><i class="fa fa-legal"></i></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h4 class="timeline-title">Rules & Regulations</h4>
                            </div>
                            <div class="timeline-body">
						      <p>i. Must have good collaborations among the members</p>
							  <p>ii. Can't share about <b>INFONET</b> with other than the members</p>
							  <p>iii. Must not mention main ID in ToLife when other ID is spy ID</p>
                              <p>iv. Must try to collect information about any suspicious issues</p>
                              <p>v.	Mutual cooperation and secrecy must be maintained by the members</p>
                              <p>vi. Member must confirm their presence in weekly meeting</p>          
                              <p>vii. Member can take cooperation from other than members for collecting info</p>
                              <p>viii. If any member will leave the group in future, he/she must not disclose about <b>INFONET</b> & members</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="timeline-badge primary"><i class="fa  fa-home"></i></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h4 class="timeline-title">Joining</h4>
							  <p><small class="text-muted"><i class="fa fa-comment-o"></i> if you accept the rules & regulations of INFONET</small></p>
                            </div>
                            <div class="timeline-body">
                              <p>i. Welcome to room: <b>INFONET</b></p>
                              <p>ii. Collect and share your information</p>
                            </div>
                          </div>
                        </li>
                        <li class="timeline-inverted">
						<div class="timeline-badge success"><i class="fa  fa-graduation-cap"></i></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h4 class="timeline-title">App Access</h4>
							  <p><small class="text-muted"><i class="fa fa-comment-o"></i> after two months probation period</small></p>
                            </div>
                            <div class="timeline-body">
                              <p>i. <b>INFONET</b> committee will think to give the application access</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="timeline-badge info"><i class="fa fa-sign-out"></i></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h4 class="timeline-title">Resignation!!</h4>
                            </div>
                            <div class="timeline-body">
                              <p>Your resignation may have left a small empty cubicle in our community but your departure has left a large empty space in our heart.
							  <br>
							  <br>
							  Good Luck.!! <i class="fa fa-smile-o"></i>
							  </p>
                              <hr>
                              <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                Resign  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><?php echo "<a href=\"resign.php?login_id=$login_id\">" ?>Are you sure?</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </li>
                       
            
                      </ul>
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
                
                    <li class="ripple">
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
<script src="asset/js/plugins/jquery.nicescroll.js"></script>


<!-- custom -->
<script src="asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

  });
</script>
<!-- end: Javascript -->
</body>
</html>