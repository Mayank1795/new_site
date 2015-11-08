<?php 
require('config.php');
require('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="DonorForm">

    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9">
    <meta http-equiv="X-UA-Compatible" content="IE=9">

    
    <title>Application</title>
    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap-switch.css" />
    <link rel="stylesheet" href="css/typeahead.css" />



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
                        <strong>Settings</strong>                        
                    </header>
                    <div class="panel-body">
                        <div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Field name</th>
                                            <th>Requierment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $res=$db->query("SELECT * FROM settings");
                                        $i=1;
                                        while($row=$res->fetch())
                                        {   
                                            ?>
                                            <tr>
                                            <td><?php echo $i;?></td>    
                                            <td><?php echo $row['field_name']; ?></td>
                                            <form action='' method="post">
                                                
                                                <?php if ($row['state']=='1') {
                                                 
                                                 echo '<td><input class="cat" checked type="checkbox" name="my-checkbox" id="cat'.$i.'"></td>'; 
                                                } else {
                                                    echo '<td><input class="cat" type="checkbox" name="my-checkbox" id="cat'.$i.'"></td>'; 
                                                    };?>                                               
                                            </form>
                                            <tr>

                                            <?php $i++;} ?>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.table-responsive -->
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





<script src="js/select2/select2.js"></script>


<!--common script init for all pages-->
<script src="js/scripts.js"></script>

<script src="js/advanced-form.js"></script>

<script type="text/javascript">
// Ajax for requirement settings
$(document).ready(function(){
    $("[name='my-checkbox']").bootstrapSwitch();
    
    $('.cat').change(function(){
    
        var get_id = $(this).attr('id');
    
         $('#'+get_id).change(function() {
        
        var state1 = $('#'+get_id).parent().prop('className');
        // console.log(state1);
        // console.log(state1.length)
        get_id = get_id.replace(/[^\d.]/g,'');
        // console.log(get_id);
        var cat_num = get_id;
        jQuery.ajax({
            type: 'POST',
            url:'settings.php',
            dataType: 'json', 
            data:{'state1':state1, 'catno':cat_num},
            success: function(data){
                try {
                    console.log(data);
                } catch(e) {
                    alert(e.Message);
                }
            }

            });
    });
    });
});
    
</script>
</body>
</html>