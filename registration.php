<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="http://bucketadmin.themebucket.net/images/favicon.png">

    <title>Registration | Campaign</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

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

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Campaign | Registration</h2>
        <div class="login-wrap">
            <p>Enter your campaign details below</p>
            <input type="text" class="form-control" placeholder="Name of the person registering" autofocus>
            <input type="text" class="form-control" placeholder="Name of Candidate" autofocus>
            <input type="text" class="form-control" placeholder="Election Year" autofocus>
            
                          
            <label for="election_type">Election Type</label>
            <select class="form-control m-bot15" autofocus>
                                <option>Regular</option>
                                <option>Special</option>
                                <option>Runoff</option>
                                <option>Rerun</option>
                                <option>Transition and Inauguration Entities (TIE)</option>
                            </select>

            <label for="election_type">Office Sought</label>
            <select class="form-control m-bot15" autofocus>
                                <option>City Council</option>
                                <option>Borough President</option>
                                <option>Public Advocate</option>
                                <option>Comptroller</option>
                                <option>Mayor</option>
                            </select>
            

            <p> Enter your account details below</p>
            <input type="text" class="form-control" placeholder="User Name" autofocus>
            <input type="password" class="form-control" placeholder="Password">
            <input type="password" class="form-control" placeholder="Re-type Password">
            
            <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>

            <div class="registration">
                Already Registered.
                <a class="" href="login.php">
                    Login
                </a>
            </div>

        </div>

      </form>

    </div>


    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="js/jquery.js"></script>
    <script src="bs3/js/bootstrap.min.js"></script>

  </body>
</html>