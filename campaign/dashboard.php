<?php require('includes/config.php'); 
require('functions.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); } 

$username = $_SESSION['username'];

$details = get_campaign_details($username);




//define page title



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>

    
    <title>Campaign | Dashboard</title>
    <!--Core CSS -->
    <link href="../bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="../css/bootstrap-reset.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="../css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="../js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet"/>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                <i class="fa fa-tasks"></i>
                <span class="badge bg-success">8</span>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
                <li>
                    <p class="">You have 8 pending tasks</p>
                </li>
                <li>
                    <a href="index.html#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target Sell</h5>
                                <p>25% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="index.html#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Product Delivery</h5>
                                <p>45% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="78">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="index.html#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Payment collection</h5>
                                <p>87% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="60">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="index.html#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target Sell</h5>
                                <p>33% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="90">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>

                <li class="external">
                    <a href="index.html#">See All Tasks</a>
                </li>
            </ul>
        </li>
        <!-- settings end -->
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important">4</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have 4 Mails</p>
                </li>
                <li>
                    <a href="index.html#">
                        <span class="photo"><img alt="avatar" src="images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="index.html#">
                        <span class="photo"><img alt="avatar" src="images/avatar-mini-2.jpg"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                <span class="time">2 min ago</span>
                                </span>
                                <span class="message">
                                    Nice admin template
                                </span>
                    </a>
                </li>
                <li>
                    <a href="index.html#">
                        <span class="photo"><img alt="avatar" src="images/avatar-mini-3.jpg"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                                <span class="time">2 days ago</span>
                                </span>
                                <span class="message">
                                    This is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="index.html#">
                        <span class="photo"><img alt="avatar" src="images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                <span class="time">2 hour ago</span>
                                </span>
                                <span class="message">
                                    Hi there, its a test
                                </span>
                    </a>
                </li>
                <li>
                    <a href="index.html#">See all messages</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">3</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="index.html#"> Server #1 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="index.html#"> Server #2 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-success clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="index.html#"> Server #3 overloaded.</a>
                        </div>
                    </div>
                </li>

            </ul>
        </li>
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                
                <span class="username"><?php echo $details[0]['name_person']; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="index.html#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="index.html#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="cards.php">
                        <i class="fa fa-laptop"></i>
                        <span>Contribution Cards</span>
                    </a>
                    
                </li>
                <li class="sub-menu">
                    <a href="cards_data.php">
                        <i class="fa fa-book"></i>
                        <span>Contribution Data</span>
                    </a>
                    
                </li>
                <li>
                    <a href="notification.php">
                        <i class="fa fa-bullhorn"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Comments</span>
                    </a>
                    
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Transaction ID</span>
                    </a>
                    
                </li>
                
                    
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
<section class="wrapper">

<div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!--widget start-->
                        <aside class="profile-nav alt">
                            <section class="panel">
                                <div class="user-heading alt gray-bg">
                                    
                                    <h1>Name of the person registered: <?php echo $details[0]['name_person']; ?> </h1>
                                    <p>Candidate Name: <?php echo $details[0]['name_candidate']; ?> </p>
                                </div>

                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="javascript:;"> <i class="fa fa-calendar-o"></i> Election Year <span class="badge label-success pull-right r-activity"><?php echo $details[0]['election_year']; ?></span></a></li>
                                    <li><a href="javascript:;"> <i class="fa fa-tasks"></i> Election Type <span class="badge label-success pull-right r-activity"><?php echo $details[0]['election_type']; ?></span></a></li>
                                    <li><a href="javascript:;"> <i class="fa fa-home"></i> Office Sought <span class="badge label-success pull-right r-activity"><?php echo $details[0]['office_sought']; ?></span></a></li>
                                    <li><a href="javascript:;"> <i class="fa fa-user"></i> Username <span class="badge label-success pull-right r-activity"><?php echo $details[0]['username']; ?></span></a></li>
                                    <li><a href="javascript:;"> <i class="fa fa-envelope-o"></i> Email <span class="badge label-success pull-right r-activity"><?php echo $details[0]['email']; ?></span></a></li>
                                </ul>

                            </section>
                        </aside>
                        <!--widget end-->

                    </div>
                </div>


</section>
</section>
<!-- Placed js at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="../bs3/js/bootstrap.min.js"></script>
<script src="../js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="../js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="../js/skycons/skycons.js"></script>
<script src="../js/jquery.scrollTo/jquery.scrollTo.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="../js/calendar/clndr.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="../js/calendar/moment-2.2.1.js"></script>
<script src="../js/evnt.calendar.init.js"></script>
<script src="../js/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../js/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>
<script src="../js/gauge/gauge.js"></script>
<!--clock init-->
<script src="../js/css3clock/js/css3clock.js"></script>
<!--Easy Pie Chart-->
<script src="../js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="../js/sparkline/jquery.sparkline.js"></script>
<!--Morris Chart-->
<script src="../js/morris-chart/morris.js"></script>
<script src="../js/morris-chart/raphael-min.js"></script>
<!--jQuery Flot Chart-->
<script src="../js/flot-chart/jquery.flot.js"></script>
<script src="../js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="../js/flot-chart/jquery.flot.resize.js"></script>
<script src="../js/flot-chart/jquery.flot.pie.resize.js"></script>
<script src="../js/flot-chart/jquery.flot.animator.min.js"></script>
<script src="../js/flot-chart/jquery.flot.growraf.js"></script>
<script src="../js/dashboard.js"></script>
<script src="../js/jquery.customSelect.min.js" ></script>
<!--common script init for all pages-->
<script src="../js/scripts.js"></script>
<!--script for this page-->
</body>
</html>

