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

//fetching selected case information
$case_id = $_GET['case_id'];
$select1 = "SELECT * FROM `cases` WHERE `case_id` = $case_id";
$result1=$conn->query($select1);
while($row1 = $result1->fetch_assoc())
{
  $dbcase_id = $row1['case_id'];
  $case_name = $row1['case_name'];
  $evidence = $row1['evidence_link'];
  $description = $row1['description'];
  $start_date = $row1['start_date'];
  $status = $row1['status'];
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
	  
	<style>
	.btn-gradient.btn-info, .label-gradient.label-info, .alert-gradient.alert-info {
		background: linear-gradient(to bottom, #ff5656 50%, #ff6656 50%);
	}	
	</style> 

	<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
	<script>
		//form-1
		function chk()
		{
			var username = "<?php echo $username; ?>";
			var dbcase_id = "<?php echo $dbcase_id; ?>";
			var up_case_name = document.getElementById('up_case_name').value;
			var up_evidence = document.getElementById('up_evidence').value;
			var up_description = document.getElementById('up_description').value;
			
			var dataString = 'username=' + username + '&dbcase_id=' + dbcase_id + '&up_case_name=' + up_case_name + '&up_evidence=' + up_evidence + '&up_description=' + up_description;
			
			$.ajax({
				type:"post",
				url: "hi6.php",
				data:dataString,
				cache: false,
				success:function(html){
					$('#msg').html(html);
				}
			});
			
			//document.getElementById('up_case_name').defaultValue = "";
			//document.getElementById('up_evidence').defaultValue = "";
			//document.getElementById('up_description').defaultValue = "";
			
			$("#up_case_name").val("");
			$("#up_evidence").val("");
			$("#up_description").val("");		
			
			return false;
		}
		
	
		//status update
		function status()
		{
			var username = "<?php echo $username; ?>";
			var dbcase_id = "<?php echo $dbcase_id; ?>";
			var radio1 = $('input[type="radio"]:checked').val();
			var dataString = 'username=' + username + '&dbcase_id=' + dbcase_id + '&radio1=' + radio1;
			
			$.ajax({
				type:"post",
				url: "hi7.php",
				data:dataString,
				cache: false,
				success:function(html){
					$('#status').html(html);
				}
			});
						
			return false;
		}
		
		//remove suspect from the case
		function remove()
		{
			$(this).closest('tr').remove();
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
                        <h3 class="animated fadeInLeft">Edit Case</h3>
                      
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-8">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4><?php echo $case_name; ?></h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:15px;">
                          <div class="col-md-12">
						  <p id="msg"> </p>
                           <form id="form1">
                            <div class="form-group"><label class="col-sm-2 control-label text-right">Case Name</label>
                              <div class="col-sm-10"><input type="text" id="up_case_name" value=<?php echo $case_name; ?> class="form-control android"></div>
                            </div>
							
							<div class="form-group"><label class="col-sm-2 control-label text-right">Evidence</label>
                              <div class="col-sm-10"><input type="text" id="up_evidence" value=<?php echo $evidence; ?> class="form-control" placeholder="https://drive.google.com/drive/folders/"></div>
                            </div>
                          
							<div class="form-group"><label class="col-sm-2 control-label text-right">Description</label>
                              <div class="col-sm-10"><textarea id="up_description" placeholder="write a short description.." class="form-control android"><?php echo $description; ?></textarea></div>
                            </div>
							
							<div class="form-group"><label class="col-sm-9 control-label text-right"></label>
                              <div class="col-sm-3" style="margin-top:15px;">
							  <button class="btn ripple btn-gradient btn-info" type="submit" value="submit" onclick="return chk()">
                                    <div>
                                      <span>Update</span>
                                    </div>
                                  </button>
							  </div>
                            </div>
							</form>
                          </div>
                        </div>
                      </div>
                    </div>
					
					
					
					<form name="Form2" id="color"  action="#">
					<div class="col-md-4 col-sm-12">
				<!--	  <p id="status"> </p>	-->
					  <div class="col-md-6 panel" style="padding:20px;padding-bottom:0px;">
						<div class="form-animate-radio">
						  <label class="radio">
							<input checked type="radio" <?php if($status=="1"){ echo "checked";}?> name="radio1" id="radio1" onclick = "status()" value="1"/>
							<span class="outer">
							  <span class="inner"></span></span> Open
							</label>
						  </div>
					  </div>
					  
					  <div class="col-md-6 panel" style="padding:20px;padding-bottom:0px;">
						<div class="form-animate-radio">
						  <label class="radio">
							<input type="radio"  name="radio1" id="radio1" onclick = "status()" <?php if($status=="0"){ echo "checked";}?> value="0"/>
							<span class="outer">
							  <span class="inner"></span></span> Closed
							</label>
						  </div>
					  </div>
					</form>  
					  
					  
                      <div class="col-md-12 panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Suspected</h4>
                        </div>
						<div class="panel-body" style="padding-top:20px;padding-bottom:3px">                          
                        <div class="col-md-12 responsive-table" >
                            <table class="table table-hover">                           
                             

							<?php
							   $sql1 = "SELECT case_suspect.id,suspect.suspect_id, suspect.main_id FROM `suspect` INNER JOIN case_suspect ON suspect.suspect_id = case_suspect.suspect_id WHERE case_suspect.case_id = $dbcase_id";
							   $result2=$conn->query($sql1);
							   while($row2=$result2->fetch_assoc())
							   {	   
							?>

							 <tr id="myTableRow">                            
                                <td><?php echo $row2['main_id']; ?></td>
                                <td align="right">
								
								<?php echo "<a href=\"remove.php?main_id=$row2[main_id]&case_id=$dbcase_id&username=$username&id=$row2[id]\" target='_blank' style='color:inherit; font-weight: normal;'>" ?>
                                  <span class="label label-danger" type="submit" id="suspect_id" onClick="$(this).closest('tr').remove();">Remove</span>
								 
								  </a>
                                </td>
                              </tr>
							
							<?php }?> 
							
							
                            </table>
                           
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
