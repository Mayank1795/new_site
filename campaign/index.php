<?php require('includes/config.php'); 

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: dashboard.php'); } 

//if form has been submitted process it
if(isset($_POST['submit'])){

    //very basic validation
    if(strlen($_POST['username']) < 3){
        $error[] = 'Username is too short.';
    } else {
        $stmt = $db->prepare('SELECT username FROM campaigns WHERE username = :username');
        $stmt->execute(array(':username' => $_POST['username']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row['username'])){
            $error[] = 'Username provided is already in use.';
        }
            
    }

    if(strlen($_POST['password']) < 5){
        $error[] = 'Password is too short.';
    }

    if(strlen($_POST['passwordConfirm']) < 5){
        $error[] = 'Confirm password is too short.';
    }

    if($_POST['password'] != $_POST['passwordConfirm']){
        $error[] = 'Passwords do not match.';
    }

    //email validation
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error[] = 'Please enter a valid email address';
    } else {
        $stmt = $db->prepare('SELECT email FROM campaigns WHERE email = :email');
        $stmt->execute(array(':email' => $_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row['email'])){
            $error[] = 'Email provided is already in use.';
        }
            
    }


    //if no errors have been created carry on
    if(!isset($error)){

        //hash the password
        $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

        //create the activasion code
        $activasion = md5(uniqid(rand(),true));

        try {

            //insert into database with a prepared statement
            $stmt = $db->prepare('INSERT INTO campaigns (name_person,name_candidate, election_year, election_type, office_sought, username,password,email,active) VALUES (:name_person, :name_candidate, :election_year, :election_type, :office_sought, :username, :password, :email, :active)');
            $stmt->execute(array(
                ':name_person' => $_POST['name_person'],
                ':name_candidate' => $_POST['name_candidate'],
                ':election_year' => $_POST['election_year'],
                ':election_type' => $_POST['election_type'],
                ':office_sought' => $_POST['office_sought'],
                ':username' => $_POST['username'],
                ':password' => $hashedpassword,
                ':email' => $_POST['email'],
                ':active' => $activasion
            ));
            $id = $db->lastInsertId('campaignID');

            //send email
            $to = $_POST['email'];
            $subject = "Registration Confirmation";
            $body = "Thank you for registering at demo site.\n\n To activate your account, please click on this link:\n\n ".DIR."activate.php?x=$id&y=$activasion\n\n Regards Site Admin \n\n";
            $additionalheaders = "From: <".SITEEMAIL.">\r\n";
            $additionalheaders .= "Reply-To: ".SITEEMAIL."";
            mail($to, $subject, $body, $additionalheaders);

            //redirect to index page
            header('Location: index.php?action=joined');
            exit;

        //else catch the exception and show the error.
        } catch(PDOException $e) {
            $error[] = $e->getMessage();
        }

    }

}

?>

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

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Campaign | Registration</h2>
        <div class="login-wrap">
            <p>Enter your campaign details below</p>

            <?php
                                    //check for any errors
                                    if(isset($error)){
                                        foreach($error as $error){
                                            echo '<div><span class="label label-danger">'.$error.'</div></span>';
                                        }
                                    }

                                    //if action is joined show sucess
                                    if(isset($_GET['action']) && $_GET['action'] == 'joined'){
                                        echo '<div><span class="label label-success">'.'Registration successful, please check your email to activate your account'.'</div></span>';
                                        }
                                    

            ?>
            <input type="text" class="form-control" name="name_person" placeholder="Name of the person registering" autofocus required>
            <input type="text" class="form-control" name="name_candidate" placeholder="Name of Candidate" autofocus required>
            <input type="number" class="form-control" name="election_year" placeholder="Election Year" autofocus required>
            
                          
            <label for="election_type">Election Type</label>
            <select class="form-control m-bot15" name="election_type" autofocus required>
                                <option>Regular</option>
                                <option>Special</option>
                                <option>Runoff</option>
                                <option>Rerun</option>
                                <option>Transition and Inauguration Entities (TIE)</option>
                            </select>

            <label for="election_type">Office Sought</label>
            <select class="form-control m-bot15" name="office_sought" autofocus required>
                                <option>City Council</option>
                                <option>Borough President</option>
                                <option>Public Advocate</option>
                                <option>Comptroller</option>
                                <option>Mayor</option>
                            </select>
            

            <p> Enter your account details below</p>
            <input type="text" class="form-control" name="username" placeholder="User Name" autofocus required>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <input type="password" class="form-control" name="passwordConfirm" placeholder="Re-type Password" required>
            
            <button class="btn btn-lg btn-login btn-block" name="submit" type="submit">Submit</button>

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
    <script src="../js/jquery.js"></script>
    <script src="../bs3/js/bootstrap.min.js"></script>

  </body>
</html>