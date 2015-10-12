<?php 
require('functions.php');

// Define variables and initialize with empty values
$amount = $name= $homeAddress= $city = "";
$telephone = $email = $Employer = $Occupation ="";
$businessAdd =$date = $Agency = $businessType = "";
$businessName = $position = "";
$accountHolder =  $cardType = $accountNo =$ExpirationD = "";

$radioErr=  $radiobuttonValue= ""; 
$amountErr = $nameErr= $homeAddressErr= $cityErr = "";
$telephoneErr = $emailErr = $EmployerErr = $OccupationErr ="";
$businessAddErr =$dateErr = $AgencyErr = $businessTypeErr = "";
$businessNameErr = $positionErr = "";
$accountHolderErr =  $cardTypeErr = $accountNoErr =$ExpirationDErr = "";


if (isset($_POST['submit'])) {
        $amount = $_POST["Input_amount"]; 
        $name= $_POST["Input_name"];
        $homeAddress= mysql_real_escape_string($_POST["Input_homeAddress"]);
        $city = mysql_real_escape_string($_POST["Input_city"]);
        $telephone = mysql_real_escape_string($_POST["Input_telephone"]);
        $email = mysql_real_escape_string($_POST["Input_email"]);
        $Employer = $_POST["Input_Employer"];
        $Occupation =$_POST["Input_Occupation"];
        $businessAdd = mysql_real_escape_string($_POST["Input_businessAdd"]);
        $date = $_POST["Input_date"];
        $cityAgency = $_POST["Input_Agency"];
        $businessType = $_POST["Input_businessType"];
        $businessName =  $_POST["Input_businessName"];
        $position = $_POST["Input_position"];
        $accountHolder = mysql_real_escape_string($_POST["Input_accountHolder"]);
        $cardTypeErr = mysql_real_escape_string($_POST["Input_cardType"]);
        $accountNo = mysql_real_escape_string($_POST["Input_accountNo"]);
        $ExpirationD = $_POST["Input_ExpirationD"];
       

    // Validate Contributor name
    if(!$name){
        $nameErr = 'Please enter your name.';
    }else{
        $name = filterName($name);
        if($name == FALSE){
            $nameErr = 'Please enter a valid name.';
        }
    }

    
    // Validate Contrubution type address
    if(!isset($_POST["inlineRadioOptions"])){
        $radioErr = 'Please select the contribution type.';     
    }else{
      $radiobuttonValue = $_POST["inlineRadioOptions"];        
    }

    // Validate amount
    if(!$amount){
        $amountErr = 'Please enter the amount.';     
    }else{
        $amount = filterNumeric($amount);
        if($amount == FALSE){
            $amountErr = 'Please enter a valid email address.';
        }
    }

    //Validate Home Address
    if (!$homeAddress) {
        $homeAddressErr = 'Please enter your home address.';
    } else{
        $homeAddress = filterString($homeAddress);
        if ($homeAddress == FALSE) {
            $homeAddressErr = 'Enter a valid address';
        }
    }

    //Validate city/zip
    if (!$city) {
        $cityErr = 'Please enter your city or zip code.';
    } else{
        $cityErr = filterString($cityErr);
        if ($city == FALSE) {
            $cityErr = 'Please enter a valid zip code or city name.';
        }

    }

    //Validate telephone
    if (!$telephone) {
        $telephoneErr = 'Please enter your telephone number.';
    } else {
        $telephone = filterNumeric($telephone);
        if ($telephone == FALSE) {
            $telephoneErr = 'Please enter a valid telephone no.';
        }
    }

     // Validate email address
    if(!$email){
        $emailErr = 'Please enter your email address.';     
    }else{
        $email = filterEmail($email);
        if($email == FALSE){
            $emailErr = 'Please enter a valid email address.';
        }
    }

    //Valdiate Employee

    if (!$Employer) {
        $EmployerErr = 'Please enter your employment status';
    } else {
        $Employer = filterString($Employer);
        if ($Employer == FALSE) {
            $EmployerErr = 'Please enter a valid employment status';
        }
    }

    //Vadlidate Occupation

    if (!$Occupation) {
        $OccupationErr = 'Please enter your occupation.';
    } else {
        $Occupation = filterString($Occupation);
        if ($Occupation == FALSE) {
            $OccupationErr = 'Please enter a valid occupation.';
        }
    }

    //Valdiate business address

    if (!$businessAdd) {
        $businessAddErr = 'Please enter your business address.';
    } else{
        $businessAdd = filterString($businessAdd);
        if ($businessAdd == FALSE) {
            $businessAddErr = 'Please enter a valid address';
        }
    }

    //Validate doing business is to be written.
    

}   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="DonorForm">

    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>

    
    <title>Application</title>
    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap-switch.css" />

    <link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker/css/datepicker.css" />

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
<body>
<section id="container" >
<!--header start-->
<header class="header static-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.html" class="logo">
        <!--<img src="images/logo.png" alt="">-->
    </a>
</div>
<!--logo end-->
</div>
</header>
<!--header end--> 
<!--main content start-->

    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>Contribution form</strong>                        
                    </header>
                    <div class="panel-body">
                        <div>
                            <form class="form-horizontal" role="form" action="" method="post">
                              
                                <div class="form-group">
                                <div class="col-lg-12">
                                    <label class="col-lg-2 col-sm-2 control-label"><b>Contribution Type</b></label>
                                    <label class="radio-inline">
                                      <input type="radio" name="inlineRadioOptions" value="check" <?php if(isset($_POST['inlineRadioOptions']) && $_POST['inlineRadioOptions'] == 'check')  echo ' checked="checked"';?> > Check
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="inlineRadioOptions"  value="cash"  <?php if(isset($_POST['inlineRadioOptions']) && $_POST['inlineRadioOptions'] == 'cash')  echo ' checked="checked"';?> > Cash
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="inlineRadioOptions"  value="moneyorder"  <?php if(isset($_POST['inlineRadioOptions']) && $_POST['inlineRadioOptions']== 'moneyorder')  echo ' checked="checked"';?> > Money Order
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="inlineRadioOptions" id="watch-me" value="creditcard"  <?php if(isset($_POST['inlineRadioOptions']) && $_POST['inlineRadioOptions']== 'creditcard')  echo ' checked="checked"';?> > Credit card
                                    </label>
                                    <p class="help-block" style="color:#8A6D3B;"><?php if($radioErr) echo $radioErr ;?></p>
                                </div>

                                  </div>

                              <div class="form-group">

                                     <label for="inputAmount" class="col-lg-2 col-sm-2 control-label"><b>Amount</b></label>  
                                     <div class="col-lg-6">
                                     <div class="input-group col-lg-4">
                                        <div class="input-group-addon">$</div>
                                         <input type="text" name="Input_amount" value="<?php echo $amount; ?>" class="form-control" id="inputAmount"  placeholder="Amount"     
                                        >
                                        <div class="input-group-addon">.00</div>

                                     </div> 
                                     <p class="help-block" style="color:#8A6D3B;"><?php if($amountErr) echo $amountErr ;?></p>
                                     </div>
                              </div>
                                                                   
                             <div class="form-group">
                                    <label for="inputName" class="col-lg-2 col-sm-2 control-label"><b>Contributor Name</b></label>
                                    <div class="col-lg-6 <?php if($nameErr) echo "has-warning";?>">
                                        <input type="text"name="Input_name" value="<?php echo $name; ?>"  class="form-control" id="inputName">
                                        <p class="help-block"><?php if($nameErr) echo $nameErr ;?></p>
                                    </div>
                                </div>
                          
                            <div class="form-group">
                                <label for="inputAddress" class="col-lg-2 col-sm-2 control-label"><b>Home Address</b></label>
                                <div class="col-lg-6 <?php if($homeAddressErr) echo "has-warning";?> ">
                                    <textarea class="form-control" name="Input_homeAddress" value="<?php echo $homeAddress; ?>" id="inputAddress" rows="3"></textarea>
                                    <p class="help-block"><?php if($homeAddressErr) echo $homeAddressErr ;?></p>
                                </div>
                            </div>
                           
                            <div class="form-group"> 
                                <label for="inputZip" class="col-lg-2 col-sm-2 control-label">
                                    <b>City/State/Zip</b>
                                </label>
                                <div class="col-lg-3 <?php if($cityErr) echo "has-warning";?>">
                                    <input id="inputZip" name="Input_city" value="<?php echo $city; ?>" class="form-control">
                                     <p class="help-block"><?php if($cityErr) echo $cityErr ;?></p>
                                </div>                                
                            </div>
                            
                            <div class="form-group">
                                <label for="inputTel" class="col-lg-2 col-sm-2 control-label"><b>Telephone</b></label> 
                                <div class="col-lg-3  <?php if($telephoneErr) echo "has-warning";?>">
                                    <input id="inputTel" name="Input_telephone" value="<?php echo $telephone; ?>" class="form-control">
                                    <p class="help-block"><?php if($telephoneErr) echo $telephoneErr ;?></p>
                                </div>
                                <label for="inputEmail" class="col-lg-2 col-sm-2 control-label"><b>Email</b></label>
                                <div class="col-lg-4 <?php if($emailErr) echo "has-warning";?>">
                                    <input id="inputEmail" name="Input_email" value="<?php echo $email; ?>"  class="form-control">
                                    <p class="help-block"><?php if($emailErr) echo $emailErr ;?></p>
                                </div>
                            </div>

                            <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1">
                            <p>To comply with New York City Campaign Finance Board reporting requirements, provide your employment information. If you are not employed, indicate what best describes your employment status (e.g., “homemaker”, “retired”, “student,” or “unemployed”). If self-employed, indicate employer as “self” and provide your occupation and employment address.</p>
                            </div>
                            </div>

                            <div class="form-group">
                                <label for="inputAH" class="col-lg-2 col-sm-2 control-label"><b>Account Holder</b></label> 
                                <div class="col-lg-3 <?php if($accountHolderErr) echo "has-warning";?>">
                                    <input id="inputAH" name="Input_accountHolder" value="<?php echo $accountHolder; ?>"  class="form-control">
                                     <p class="help-block"><?php if($accountHolderErr) echo $accountHolderErr ;?></p>
                                </div>
                                <label for="inputCard" class="col-lg-2 col-sm-2 control-label"><b>Card Type</b></label>
                                <div class="col-lg-4  <?php if($cardTypeErr) echo "has-warning";?>">
                                    <input id="inputCard" name="Input_cardType" value="<?php echo $cardType; ?>" class="form-control">
                                    <p class="help-block"><?php if($cardTypeErr) echo $cardTypeErr ;?></p>
                                </div>                                
                            </div>

                             <div class="form-group">
                                <label for="inputAN" class="col-lg-2 col-sm-2 control-label"><b>Account No.</b></label> 
                                <div class="col-lg-3 <?php if($accountNoErr) echo "has-warning";?>">
                                    <input id="inputAN" name="Input_accountNo" value="<?php echo $accountNo; ?>" class="form-control">
                                    <p class="help-block"><?php if($accountNoErr) echo $accountNoErr ;?></p>
                                </div>
                                <label for="inputEx" class="col-lg-2 col-sm-2 control-label"><b>Expiration Date</b></label>
                                <div class="col-md-4 <?php if($ExpirationDErr) echo "has-warning";?>" >
                                    <input class="form-control form-control-inline input-medium default-date-picker"  value="" size="16" type="text" id="inputEx" name="Input_ExpirationD">
                                    <p class="help-block"><?php if($ExpirationDErr) echo $ExpirationDErr ;?></p>
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label for="inputEmployer" class="col-lg-2 col-sm-2 control-label"><b>Employer</b></label> 
                                <div class="col-lg-3 <?php if($EmployerErr) echo "has-warning";?>">
                                    <input id="inputEmployer" name="Input_Employer" value="<?php echo $Employer; ?>"  class="form-control">
                                    <p class="help-block"><?php if($EmployerErr) echo $EmployerErr ;?></p>
                                </div>
                                <label for="inputEx" class="col-lg-2 col-sm-2 control-label"><b>Occupation</b></label>
                                <div class="col-lg-4 <?php if($OccupationErr) echo "has-warning";?>">
                                    <input id="inputEx" name="Input_Occupation" value="<?php echo $Occupation; ?>" class="form-control">
                                    <p class="help-block"><?php if($OccupationErr) echo $OccupationErr ;?></p>
                                </div>  
                            </div>

                            <div class="form-group">
                                <label for="inputBAddress" class="col-lg-2 col-sm-2 control-label"><b>Business Address</b></label>
                                <div class="col-lg-6  <?php if($businessAddErr) echo "has-warning";?>">
                                    <textarea class="form-control" name="Input_businessAdd" value="<?php echo $businessAdd; ?>"  id="inputBAddress" rows="3"></textarea>
                                    <p class="help-block"><?php if($businessAddErr) echo $businessAddErr ;?></p>
                                </div>
                            </div>
                            <div class="form-group" id="hide-me">
                            <div class="col-lg-10 col-lg-offset-1"> 
                            <p>I understand that State law requires that a contribution be in my name and be from my own funds. I hereby affirm that this contribution is being made from my personal funds, is not being reimbursed in any manner, and is not being made as a loan.
                            </p></div></div>

                            <div class="form-group" style='display:none' id="show-me">
                            <div class="col-lg-10 col-lg-offset-1" > 
                            <p>I understand that State law requires that a contribution be in my name and ve from my own funds. I hereby affirm this contribution made from my personal funds, is not being reimbursed in any manner and is not being as a loan, in addiion, in the case of a credit card contribution, I also hereby affirm tha this contribution is being made from my personal credit card account, billed to and paid by me for my personal use, and has no corporate or business affiliation.
                            </p></div></div>

                        <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label"><b>Date of Contribution</b></label>
                                <div class="col-md-3 col-xs-11  <?php if($dateErr) echo "has-warning";?>">
                                     <input class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" name="Input_date" />
                                    <p class="help-block"><?php if($dateErr) echo $dateErr ;?></p>
                    
                                </div>
                            </div>

                            <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1"> 
                            <p>If a contributor has business dealings with the City as defined in the Campaign Finance Act, such contributor may contribute only up to $250 for city council, $320 for borough president and $400 for mayor, comptroller or public advocate.
                            </p><p>If you are “doing business” with the City, please complete the following:</p>
                            </div></div>

                        <div class="form-group">
                            
                            <label for="inputAgency" class="col-lg-3 col-sm-3 control-label"><b>With Which City Agency</b></label>
                            <div class="col-lg-4  <?php if($AgencyErr) echo "has-warning";?>">
                                <input type="text" name="Input_Agency" value="<?php echo $Agency; ?>"  class="form-control" id="inputAgency">                
                                <p class="help-block"><?php if($AgencyErr) echo $AgencyErr ;?></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputBT" class="col-lg-3 col-sm-3 control-label"><b>Doing Business Type (e.g., Contracts)</b></label>
                            <div class="col-lg-4  <?php if($businessTypeErr) echo "has-warning";?>">
                                <input type="text" name="Input_businessType" value="<?php echo $businessType; ?>" class="form-control" id="inputBT">                
                                <p class="help-block"><?php if($businessTypeErr) echo $businessTypeErr ;?></p>
                            </div>
                        </div>

                         <div class="form-group">
                           <label for="inputEny" class="col-lg-3 col-sm-3 control-label"><b>Name of Doing Business Entity</b> </label>
                            <div class="col-lg-4  <?php if($businessNameErr) echo "has-warning";?>">
                                <input type="text" name="Input_businessName" value="<?php echo $businessName; ?>" class="form-control" id="inputEny">                
                                <p class="help-block"><?php if($businessNameErr) echo $businessNameErr ;?></p>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="inputPosition" class="col-lg-3 col-sm-3 control-label"><b>Your Position (e.g., CEO)</b></label>
                            <div class="col-lg-4  <?php if($positionErr) echo "has-warning";?>">
                                <input type="text" name="Input_position" value="<?php echo $position; ?>"  class="form-control" id="inputPosition">                
                                <p class="help-block"><?php if($positionErr) echo $positionErr ;?></p>
                            </div>
                        </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-12">
                                    <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                             
                        </div>
                        
                    </div>
                    
                </section>
                
            </div>
            
        </div>
        
    </section>

<!--main content end-->


</section>
<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->

<script src="js/jquery.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>

<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>


<script src="js/bootstrap-switch.js"></script>


<script type="text/javascript" src="js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>



<script src="js/select2/select2.js"></script>


<!--common script init for all pages-->
<script src="js/scripts.js"></script>

<script src="js/advanced-form.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'watch-me') {
            $('#show-me').show();  
            $('#hide-me').hide();
       }

       else {
            $('#show-me').hide();
            $('#hide-me').show();   
       }
   });
});

</script>

</body>
</html>