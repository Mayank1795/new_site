<?php 
require('config.php');
require('functions.php');

// Define variables and initialize with empty values
$amount = $name= $homeAddress= $zip = "";
$telephone = $email = $Employer = $Occupation ="";
$businessAdd =$date_contribution = $Agency = $businessType = "";
$businessName = $position = $committe="" ;
$accountHolder =  $cardType = $accountNo =$ExpirationD = "";

$radioErr= ""; 
$amountErr = $nameErr= $homeAddressErr= $zipErr = "";
$telephoneErr = $emailErr = $EmployerErr = $OccupationErr ="";
$businessAddErr =$dateErr = $AgencyErr = $businessTypeErr = "";
$businessNameErr = $positionErr = $committeErr ="";
$accountHolderErr =  $cardTypeErr = $accountNoErr =$ExpirationDErr = "";
$amountErr1 = $amountErr2="";


if (isset($_POST['submit'])) {
        $amount = $_POST["Input_amount"]; 
        $name= $_POST["Input_name"];
        $homeAddress= mysql_real_escape_string($_POST["Input_homeAddress"]);
        $zip = mysql_real_escape_string($_POST["Input_zip"]);
        $city = mysql_real_escape_string($_POST['Input_city']);
        $state = mysql_real_escape_string($_POST['Input_state']);
        $telephone = mysql_real_escape_string($_POST["Input_telephone"]);
        $email = mysql_real_escape_string($_POST["Input_email"]);
        $Employer = $_POST["Input_Employer"];
        $Occupation =$_POST["Input_Occupation"];
        $businessAdd = mysql_real_escape_string($_POST["Input_businessAdd"]);
        $date_contribution = $_POST["Input_date"];
        $zipAgency = $_POST["Input_Agency"];
        $businessType = $_POST["Input_businessType"];
        $businessName =  $_POST["Input_businessName"];
        $position = $_POST["Input_position"];
        $accountHolder = mysql_real_escape_string($_POST["Input_accountHolder"]);
        $cardType = mysql_real_escape_string($_POST["Input_cardType"]);
        $accountNo = mysql_real_escape_string($_POST["Input_accountNo"]);
        $ExpirationD = $_POST["Input_ExpirationD"];
        $committe = $_POST["Input_committe"];
        if (!isset($_POST['inlineRadioOptions'])) {
            $radioErr = 'Please select the contribution type.';
        } else{
        $contribution_type = $_POST['inlineRadioOptions'];

       if (isset($_POST['inlineRadioOptions'])) {
        if ($_POST['inlineRadioOptions'] == 'cash') {
        if ($amount > 100) {
            $amountErr1 = 'Total cash contribution is greater than $100.  This may be an invalid contribution';
        } 
        if ($amount > 150) {
            $amountErr2 = 'Total contribution exceeds the contribution limit of ‘[Office Limit]’.  This may be an invalid contribution';
        }
        
    }
       }
   }
    
    if (empty($name)) {
       $nameErr = 'Please enter your name.';
    } 
    
    if (empty($committe)) {
        $committeErr = 'Please Enter Committe Name.';
    }

    if (!isset($_POST["inlineRadioOptions"])) {
        $radioErr = 'Please select the contribution type.'; 
    }
    
    if (empty($amount)) {
       $amountErr = 'Please enter the amount.'; 
    }
       
    if (empty($homeAddress)) {
      $homeAddressErr = 'Please enter your home address.';
    } 

    if (empty($zip)) {
       $zipErr = 'Please enter your zip code.';
    }  
  
    if (empty($email)) {
        $emailErr = 'Please enter your email address.';  
    } 
    
    if (empty($Employer)) {
     $EmployerErr = 'Please enter your employment status';
    } 

    if (empty($accountNo) ){
        $accountNoErr = 'Please enter your account number';
    }

    if (empty($accountHolder)) {
        $accountHolderErr = 'Please enter your account holder name';
    }
    
    if (empty($cardType)) {
        $cardTypeErr = 'Please enter your card type';
    }

    if (empty($ExpirationD)) {
        $ExpirationDErr = "Please enter your card's expiration date";
    }
   

    
    $campaignId = get_campaign_id($committe);

    $date_contribution = date('Y-m-d', strtotime($date_contribution));


    if (isset($_POST['inlineRadioOptions']) and $_POST["inlineRadioOptions"]=='creditcard') {
        
    if (!empty($ExpirationD) && !empty($cardType) && !empty($accountHolder)
        && !empty($accountNo) && !empty($Employer) && !empty($email)
        && !empty($zip) && !empty($homeAddress) && !empty($amount)
        && !empty($committe) && !empty($name)) {
        
          $query = $db->query("INSERT INTO donor (campaignID, contribution_type, amount, 
          donor_name, address, zip, city, state, telephone, email, employer_type,
          occupation, business_address, date_contribution, city_agency, business_type,
          business_entity, position, ac_holder, card_type, ac_number, expiration_date) VALUES 
         ('$campaignId', '$contribution_type', '$amount', '$name', '$homeAddress', '$zip', '$city', '$state',
         '$telephone', '$email', '$Employer', '$Occupation', '$businessAdd', '$date_contribution',
         '$Agency', '$businessType', '$businessName', '$position', '$accountHolder', '$cardType', '$accountNo', 
         '$ExpirationD')");

    }
    } else {
        
        if ($Employer!="" and $email!=""
    and $zip!="" and $homeAddress!="" and $amount!=""
        and $committe!="" and $name!="") {

          $query = $db->query("INSERT INTO donor (campaignID, contribution_type, amount, 
          donor_name, address, zip, city, state, telephone, email, employer_type,
          occupation, business_address, date_contribution, city_agency, business_type,
          business_entity, position) VALUES 
         ('$campaignId', '$contribution_type', '$amount', '$name', '$homeAddress', '$zip', '$city', '$state',
         '$telephone', '$email', '$Employer', '$Occupation', '$businessAdd', '$date_contribution',
         '$Agency', '$businessType', '$businessName', '$position')");
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
    <meta name="author" content="DonorForm">

    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>

    
    <title>Application</title>
    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap-switch.css" />
    <link rel="stylesheet" href="css/typeahead.css" />

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
                                    <label for="Input_committe"  class="col-lg-2 col-sm-2 control-label"><b>Enter Committe Name</b></label>
                                    <div class="col-lg-4 <?php if($committeErr) echo "has-warning";?>" id="inputCommitte">
                                    <input type="text" class="typeahead" placeholder="Enter a Committe Name" name="Input_committe" value="<?php echo $committe; ?>"  class="form-control">                                    
                                    
                                     <p class="help-block"><?php if($committeErr) echo $committeErr ;?></p>
                                     </div>
                                </div>

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
                                     <p class="help-block" style="color:#8A6D3B;"><?php if($amountErr1) echo $amountErr1 ;?></p>
                                     <p class="help-block" style="color:#8A6D3B;"><?php if($amountErr2) echo $amountErr2 ;?></p>
                                     </div>
                              </div>
                                                                   
                             <div class="form-group">
                                    <label for="inputName" class="col-lg-2 col-sm-2 control-label"><b>Contributor Name</b></label>
                                    <div class="col-lg-4 <?php if($nameErr) echo "has-warning";?>">
                                        <input type="text"name="Input_name" value="<?php echo $name; ?>"  class="form-control" id="inputName">
                                        <p class="help-block"><?php if($nameErr) echo $nameErr ;?></p>
                                    </div>
                                </div>
                          
                            <div class="form-group">
                                <label for="inputAddress" class="col-lg-2 col-sm-2 control-label"><b>Home Address</b></label>
                                <div class="col-lg-4 <?php if($homeAddressErr) echo "has-warning";?> ">
                                    <textarea class="form-control" name="Input_homeAddress" value="<?php echo $homeAddress; ?>" id="inputAddress" rows="4"></textarea>
                                    <p class="help-block"><?php if($homeAddressErr) echo $homeAddressErr ;?></p>
                                </div>
                            </div>
                           
                            <div class="form-group"> 
                                <label for="inputZip" class="col-lg-2 col-sm-2 control-label">
                                    <b>Zip Code</b>
                                </label>
                                <div class="col-lg-2 <?php if($zipErr) echo "has-warning";?>">
                                    <input id="inputZip" class="form-control postcode" name="Input_zip" value="<?php echo $zip; ?>">
                                     <p class="help-block"><?php if($zipErr) echo $zipErr ;?></p>
                                </div>   
                                <label for="inputCity" class="col-lg-1 col-sm-1 control-label">
                                    <b>City</b>
                                </label>
                                <div class="col-lg-2">
                                    <input id="inputCity" class="city form-control" name="Input_city" value="" class="form-control">
                                </div>

                                <label for="inputState" class="col-lg-1 col-sm-1 control-label">
                                    <b>State</b>
                                </label>
                                <div class="col-lg-2">
                                    <input id="inputState" class="state form-control" name="Input_state" value="" class="form-control">
                                </div>                                
                            </div>
                            
                            <div class="form-group">
                                <label for="inputTel" class="col-lg-2 col-sm-2 control-label"><b>Telephone</b></label> 
                                <div class="col-lg-3">
                                    <input id="inputTel" name="Input_telephone" value="<?php echo $telephone; ?>" class="form-control">
                                </div>
                                <label for="inputEmail" class="col-lg-2 col-sm-2 control-label"><b>Email</b></label>
                                <div class="col-lg-4">
                                    <input id="inputEmail" name="Input_email" value="<?php echo $email; ?>"  class="form-control">
                                </div>
                            </div>

                            
                            <div class="form-group" id="one" style='display:none'>
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

                             <div class="form-group" id="two" style='display:none'>
                                <label for="inputAN" class="col-lg-2 col-sm-2 control-label"><b>Account No.</b></label> 
                                <div class="col-lg-3 <?php if($accountNoErr) echo "has-warning";?>">
                                    <input id="inputAN" name="Input_accountNo" value="<?php echo $accountNo; ?>" class="form-control">
                                    <p class="help-block"><?php if($accountNoErr) echo $accountNoErr ;?></p>
                                </div>
                                <label for="inputEx" class="col-lg-2 col-sm-2 control-label"><b>Expiration Date</b></label>
                                <div class="col-md-4 <?php if($ExpirationDErr) echo "has-warning";?>" >
                                    <input placeholder="" data-mask="99/9999" class="form-control"  value="" id="inputEx" name="Input_ExpirationD">
                                    <span class="help-inline">month/year</span>
                                    <p class="help-block"><?php if($ExpirationDErr) echo $ExpirationDErr ;?></p>
                                </div>                                
                            </div>

                            <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1">
                            <p class="checks">To comply with New York zip Campaign Finance Board reporting requirements, provide your employment information. If you are not employed, indicate what best describes your employment status (e.g., “homemaker”, “retired”, “student,” or “unemployed”). If self-employed, indicate employer as “self” and provide your occupation and employment address.</p>
                            </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmployer" class="col-lg-2 col-sm-2 control-label"><b>Employer</b></label> 
                                <div class="col-lg-3 <?php if($EmployerErr) echo "has-warning";?>">
                                    <input id="inputEmployer" name="Input_Employer" value="<?php echo $Employer; ?>"  class="form-control">
                                    <p class="help-block"><?php if($EmployerErr) echo $EmployerErr ;?></p>
                                </div>
                                <label for="inputEx" class="col-lg-2 col-sm-2 control-label"><b>Occupation</b></label>
                                <div class="col-lg-4">
                                    <input id="inputEx" name="Input_Occupation" value="<?php echo $Occupation; ?>" class="form-control">
                                </div>  
                            </div>

                            <div class="form-group">
                                <label for="inputBAddress" class="col-lg-2 col-sm-2 control-label"><b>Business Address</b></label>
                                <div class="col-lg-4">
                                    <textarea class="form-control" name="Input_businessAdd" value="<?php echo $businessAdd; ?>"  id="inputBAddress" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group" id="hide-me">
                            <div class="col-lg-10 col-lg-offset-1"> 
                            <p class="checks">I understand that State law requires that a contribution be in my name and be from my own funds. I hereby affirm that this contribution is being made from my personal funds, is not being reimbursed in any manner, and is not being made as a loan.
                            </p></div></div>

                            <div class="form-group" style='display:none' id="show-me">
                            <div class="col-lg-10 col-lg-offset-1" > 
                            <p class="checks">I understand that State law requires that a contribution be in my name and ve from my own funds. I hereby affirm this contribution made from my personal funds, is not being reimbursed in any manner and is not being as a loan, in addiion, in the case of a credit card contribution, I also hereby affirm tha this contribution is being made from my personal credit card account, billed to and paid by me for my personal use, and has no corporate or business affiliation.
                            </p></div></div>

                        <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label"><b>Date of Contribution</b></label>
                                <div class="col-md-3 col-xs-11">
                                     <input class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="<?php echo date('m/d/Y')?>" name="Input_date" />
                                </div>
                            </div>

                            <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1"> 
                            <p class="checks">If a contributor has business dealings with the zip as defined in the Campaign Finance Act, such contributor may contribute only up to $250 for zip council, $320 for borough president and $400 for mayor, comptroller or public advocate.
                            </p><p class="checks">If you are “doing business” with the zip, please complete the following:</p>
                            </div></div>

                        <div class="form-group">
                            
                            <label for="inputAgency" class="col-lg-3 col-sm-3 control-label"><b>With Which zip Agency</b></label>
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

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>


<script src="js/bootstrap-switch.js"></script>
<script  type="text/javascript" src="js/typeahead.min.js"></script>
<script type="text/javascript" src="js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

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
            $('#one').show();
            $('#two').show();
            $('#hide-me').hide();
       }

       else {
            $('#show-me').hide();
            $('#one').hide();
            $('#two').hide();
            $('#hide-me').show();   
       }
   });
});

 $(document).ready(function() {
    $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'watch-me') {
            $('#one').show();
            $('#two').show();
       }

       else {
            $('#one').hide();
            $('#two').hide();
       }
   });
});

</script>
<script type="text/javascript">
        jQuery(document).ready(function(){
        jQuery('.postcode').blur(function(){ //.postcode class of zipcode text field
        var s = jQuery(this).val();
        console.log(s);
        jQuery.ajax({
        type: 'POST',
        url:'postcode.php',
        dataType: 'json', //is used for return multiple values
        data: { 's' : s },
        success: function(data){
        try {
        jQuery('.state').val(data.state); //region-class of state text field
        jQuery('.city').val(data.dist);//city-class of city text filed
        } catch (e) {
        alert(e.Message);
        }
        },
        error:function (xhr, status, err){
        alert( 'status=' + xhr.responseText + ', error=' + err );
        }
        });
        });
        });
</script>

<script type="text/javascript">
    var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

<?php $result = get_contributor_name(); ?>
                                                                                    
                                            
var states = [<?php foreach ($result as $res){ 
                echo " '$res[name_candidate]',";
            }
            ?>
];

$('#inputCommitte .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
});


</script>

</body>
</html>