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
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/nouislider.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/bootstrap-material-datetimepicker.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	  
	<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
	<script>
		//form-1
		function chk()
		{
			var username = "<?php echo $username ?>";
			var login_id = "<?php echo $login_id ?>";
			var case_name = document.getElementById('case_name').value;
			var evidence_link = document.getElementById('evidence_link').value;
			var description = document.getElementById('description').value;
			
			var dataString = 'username=' + username + '&login_id=' + login_id + '&case_name=' + case_name + '&evidence_link=' + evidence_link + '&description=' + description;
	
			$.ajax({
				type:"post",
				url: "hi8.php",
				data:dataString,
				cache: false,
				success:function(html){
					$('#msg').html(html);
				}
			});
			document.getElementById('myForm').reset();
			return false;
		} 
	</script>
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

              <ul class="nav navbar-nav search-nav">
                <li>
                  
                </li>
              </ul>

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
                 
				 <li class=" ripple">
                      <a href="notice_board.php">
                         <span class="fa fa-calendar-o"></span>Notice Board
                      </a>
                    </li>
					
					<li class="active ripple">
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
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Create Case</h3>
                      
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-8">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Primary Element</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:15px;">
                          <div class="col-md-12">
						  <p class="cusP" id="msg"></p>
                           <form id="myForm">
                            <div class="form-group"><label class="col-sm-2 control-label text-right">Case Name</label>
                              <div class="col-sm-10"><input required id="case_name" type="text" class="form-control android"></div>
                            </div>
							
							<div class="form-group"><label class="col-sm-2 control-label text-right">Evidence</label>
                              <div class="col-sm-10"><input required id="evidence_link" type="text" class="form-control" placeholder="https://drive.google.com/drive/folders/"></div>
                            </div>
                          
							<div class="form-group"><label class="col-sm-2 control-label text-right">Description</label>
                              <div class="col-sm-10"><textarea required id="description" placeholder="write a short description.." class="form-control android"></textarea></div>
                            </div>
							
							<div class="form-group"><label class="col-sm-9 control-label text-right"></label>
                              <div class="col-sm-3" style="margin-top:15px;">
							  <button class="btn ripple btn-gradient btn-info" type="submit" value="submit" onclick="return chk()">
                                    <div>
                                      <span>Create</span>
                                    </div>
                              </button>
							  </div>
                            </div>
							</form>
                          </div>
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
					
					<li class=" ripple">
                      <a href="notice_board.php">
                         <span class="fa fa-calendar-o"></span>Notice Board
                      </a>
                    </li>
					
					<li class="active ripple">
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
<script src="asset/js/plugins/jquery.knob.js"></script>
<script src="asset/js/plugins/ion.rangeSlider.min.js"></script>
<script src="asset/js/plugins/bootstrap-material-datetimepicker.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>
<script src="asset/js/plugins/jquery.mask.min.js"></script>
<script src="asset/js/plugins/select2.full.min.js"></script>
<script src="asset/js/plugins/nouislider.min.js"></script>
<script src="asset/js/plugins/jquery.validate.min.js"></script>



<!-- custom -->
<script src="asset/js/main.js"></script>


<script type="text/javascript">
  $(document).ready(function(){

    $("#signupForm").validate({
      errorElement: "em",
      errorPlacement: function(error, element) {
        $(element.parent("div").addClass("form-animate-error"));
        error.appendTo(element.parent("div"));
      },
      success: function(label) {
        $(label.parent("div").removeClass("form-animate-error"));
      },
      rules: {
        validate_firstname: "required",
        validate_lastname: "required",
        validate_username: {
          required: true,
          minlength: 2
        },
        validate_password: {
          required: true,
          minlength: 5
        },
        validate_confirm_password: {
          required: true,
          minlength: 5,
          equalTo: "#validate_password"
        },
        validate_email: {
          required: true,
          email: true
        },
        validate_agree: "required"
      },
      messages: {
        validate_firstname: "Please enter your firstname",
        validate_lastname: "Please enter your lastname",
        validate_username: {
          required: "Please enter a username",
          minlength: "Your username must consist of at least 2 characters"
        },
        validate_password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        validate_confirm_password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long",
          equalTo: "Please enter the same password as above"
        },
        validate_email: "Please enter a valid email address",
        validate_agree: "Please accept our policy"
      }
    });

    // propose username by combining first- and lastname
    $("#username").focus(function() {
      var firstname = $("#firstname").val();
      var lastname = $("#lastname").val();
      if (firstname && lastname && !this.value) {
        this.value = firstname + "." + lastname;
      }
    });


    $('.mask-date').mask('00/00/0000');
    $('.mask-time').mask('00:00:00');
    $('.mask-date_time').mask('00/00/0000 00:00:00');
    $('.mask-cep').mask('00000-000');
    $('.mask-phone').mask('0000-0000');
    $('.mask-phone_with_ddd').mask('(00) 0000-0000');
    $('.mask-phone_us').mask('(000) 000-0000');
    $('.mask-mixed').mask('AAA 000-S0S');
    $('.mask-cpf').mask('000.000.000-00', {reverse: true});
    $('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
    $('.mask-money2').mask("#.##0,00", {reverse: true});
    $('.mask-ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/, optional: true
        }
      }
    });
    $('.mask-ip_address').mask('099.099.099.099');
    $('.mask-percent').mask('##0,00%', {reverse: true});
    $('.mask-clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.mask-placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.mask-fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/, 
          fallback: '/'
        }, 
        placeholder: "__/__/____"
      }
    });
    $('.mask-selectonfocus').mask("00/00/0000", {selectOnFocus: true});

    var options =  {onKeyPress: function(cep, e, field, options){
      var masks = ['00000-000', '0-00-00-00'];
      mask = (cep.length>7) ? masks[1] : masks[0];
      $('.mask-crazy_cep').mask(mask, options);
    }};

    $('.mask-crazy_cep').mask('00000-000', options);


    var options2 =  { 
      onComplete: function(cep) {
        alert('CEP Completed!:' + cep);
      },
      onKeyPress: function(cep, event, currentField, options){
        console.log('An key was pressed!:', cep, ' event: ', event, 
          'currentField: ', currentField, ' options: ', options);
      },
      onChange: function(cep){
        console.log('cep changed! ', cep);
      },
      onInvalid: function(val, e, f, invalid, options){
        var error = invalid[0];
        console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
      }
    };

    $('.mask-cep_with_callback').mask('00000-000', options2);

    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
    };

    $('.mask-sp_celphones').mask(SPMaskBehavior, spOptions);



    var slider = document.getElementById('noui-slider');
    noUiSlider.create(slider, {
      start: [20, 80],
      connect: true,
      range: {
        'min': 0,
        'max': 100
      }
    });

    var slider = document.getElementById('noui-range');
    noUiSlider.create(slider, {
                        start: [ 20, 80 ], // Handle start position
                        step: 10, // Slider moves in increments of '10'
                        margin: 20, // Handles must be more than '20' apart
                        connect: true, // Display a colored bar between the handles
                        direction: 'rtl', // Put '0' at the bottom of the slider
                        orientation: 'vertical', // Orient the slider vertically
                        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
                        range: { // Slider can select '0' to '100'
                        'min': 0,
                        'max': 100
                      },
                        pips: { // Show a scale with the slider
                          mode: 'steps',
                          density: 2
                        }
                      });



    $(".select2-A").select2({
      placeholder: "Select a state",
      allowClear: true
    });

    $(".select2-B").select2({
      tags: true
    });

    $("#range1").ionRangeSlider({
      type: "double",
      grid: true,
      min: -1000,
      max: 1000,
      from: -500,
      to: 500
    });

    $('.dateAnimate').bootstrapMaterialDatePicker({ weekStart : 0, time: false,animation:true});
    $('.date').bootstrapMaterialDatePicker({ weekStart : 0, time: false});
    $('.time').bootstrapMaterialDatePicker({ date: false,format:'HH:mm',animation:true});
    $('.datetime').bootstrapMaterialDatePicker({ format : 'dddd DD MMMM YYYY - HH:mm',animation:true});
    $('.date-fr').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', lang : 'fr', weekStart : 1, cancelText : 'ANNULER'});
    $('.min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });


    $(".dial").knob({
      height:80
    });

    $('.dial1').trigger(
     'configure',
     {
       "min":10,
       "width":80,
       "max":80,
       "fgColor":"#FF6656",
       "skin":"tron"
     }
     );

    $('.dial2').trigger(
     'configure',
     {

       "width":80,
       "fgColor":"#FF6656",
       "skin":"tron",
       "cursor":true
     }
     );

    $('.dial3').trigger(
     'configure',
     {

       "width":80,
       "fgColor":"#27C24C",
     }
     );
  });
</script>
<!-- end: Javascript -->
</body>
</html>
