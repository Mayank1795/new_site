<?php require('includes/config.php'); 
require('functions.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); } 

$username = $_SESSION['username'];



$campaignID = get_campaign_id($username);

$campaignID= $campaignID[0]['campaignID'];


if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $email = mysql_real_escape_string($_POST['email']);

    if(isset($_POST['notification']))
    {
        $notification=1;
    }
    else
        $notification=0;


    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error[] = 'Please enter a valid email address';
    }



    if(!isset($error)){

        

        $db->query("UPDATE campaigns SET notify ='$notification', notify_email='$email' WHERE campaignID='$campaignID'");

        
    }
}

$details = get_campaign_details($username);

$notify = $details[0]['notify'];

$notify_email = $details[0]['notify_email'];







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>

    
    <title>Campaign | Notification</title>
   <!--Core CSS -->
    <link href="../bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-reset.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="../css/bootstrap-switch.css" />


 

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />

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
                        <span class="photo"><img alt="avatar" src="#"></span>
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
                        <span class="photo"><img alt="avatar" src="#"></span>
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
                        <span class="photo"><img alt="avatar" src="#"></span>
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
                        <span class="photo"><img alt="avatar" src="#"></span>
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
                    <a href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a  href="cards.php">
                        <i class="fa fa-laptop"></i>
                        <span>Contribution Cards</span>
                    </a>
                    
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Contribution Data</span>
                    </a>
                    
                </li>
                <li>
                    <a class="active" href="notification.php">
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
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        Notification
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body toggle-heading">
                        <?php
                        if(isset($error)){
                                        foreach($error as $error){
                                            echo '<div><span class="label label-danger">'.$error.'</div></span>';
                                        }
                                    }
                        ?>
                        <form action='' method="post" name="submit">
                            <div>
                        
                            <label class=" control-label col-md-2" >Notification</label>
                            <input type="checkbox" name="notification" value="1" <?php if($notify ==1)echo 'checked';?> >
                        </div>
                            
                            <br>

                            <div class="input-group col-md-4">
                                <span class="input-group-addon btn-white"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control" name="email" placeholder="Email" value= <?php echo '"'.$notify_email.'"';?>>


                            
                            
                        </div>
                        <br>
                        <div class="form-group">

                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </div>
                    </form>
                    </div>
                </section>
            </div>
        </div>

                   
               


</section>
</section>
<!-- Placed js at the end of the document so the pages load faster -->

<script src="../js/jquery.js"></script>
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../bs3/js/bootstrap.min.js"></script>
<script src="../js/jquery-ui-1.9.2.custom.min.js"></script>


<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="../js/jquery.nicescroll.js"></script>


<script src="../js/bootstrap-switch.js"></script>
<script  type="text/javascript" src="../js/typeahead.min.js"></script>





<script src="../js/select2/select2.js"></script>


<!--common script init for all pages-->
<script src="../js/scripts.js"></script>

<script src="../js/advanced-form.js"></script>
<!--script for this page-->
</body>
</html>

