<?php 

require('config.php');
require('functions.php');

extract($_POST[]);

$result ="";

$require = "";
$not_require ="";

$new_state = $_POST['state1'];
$field_number = $_POST['catno'];

$result = update_state($new_state, $field_number);

echo json_encode(
 array('data'=>$result)
); 
?>