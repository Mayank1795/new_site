<?php

//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: index.php'); } 

//process login form if submitted
if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($user->login($username,$password)){ 
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    
    } else {
        $error[] = 'Wrong username or password or your account has not been activated.';
    }

}//end if submit

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="http://bucketadmin.themebucket.net/images/favicon.png">

    <title>Login | Campaign</title>

    <!--Core CSS -->
    <link href="../bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-reset.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

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

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="" method="post" role="form">
        <h2 class="form-signin-heading">Campaign | Sign in</h2>
        <div class="login-wrap">
            <?php


                                //check for any errors
                                if(isset($error)){
                                    foreach($error as $error){
                                        echo '<div><span class="label label-danger">'.$error.'</div></span>';
                                    }
                                }

                                if(isset($_GET['action'])){

                                    //check the action
                                    switch ($_GET['action']) {
                                        case 'active':
                                            echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
                                            break;
                                        case 'reset':
                                            echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
                                            break;
                                        case 'resetAccount':
                                            echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
                                            break;
                                    }

                                }

                                
                ?>

            <div class="user-login-info">
                <input type="text" id="username" name="username" class="form-control" placeholder="User ID" autofocus>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            </div>

                
            <button class="btn btn-lg btn-login btn-block" type="submit" name="submit">Sign in</button>

            <div class="registration">
                Don't have an account yet?
                <a class="" href="index.php">
                    Create an account
                </a>
            </div>

        </div>

          
      </form>

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="../js/jquery.js"></script>
    <script src="../bs3/js/bootstrap.min.js"></script>

  </body>
</html>
