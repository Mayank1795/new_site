<?php
require('includes/config.php'); 

require('functions.php');

if(!$user->is_logged_in()){ header('Location: index.php'); } 

$username = $_SESSION['username'];

$details = get_campaign_details($username);

$campaignID = get_campaign_id($username);

$campaignID= $campaignID[0]['campaignID'];

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Contribution Type', 'Amount', 'Address', 'Zip','City', 'State', 'Telephone', 'Email','Employer type','Occupation',
						'Business Address', 'Date of Contribution', 'City Agency', 'Business Type', 'Business Entity', 'Position',
                         'Account Holder','Card Type','Account Number','Expiration Date'));

// fetch the data
$query = $db->query("SELECT contribution_type, amount, 
          donor_name, address, zip, city, state, telephone, email, employer_type,
          occupation, business_address, date_contribution, city_agency, business_type,
          business_entity, position, ac_holder, card_type, ac_number, expiration_date FROM donor WHERE campaignID = '$campaignID'");
$query = $query->fetchAll(PDO::FETCH_ASSOC);
                        
foreach ($query as $row)
fputcsv($output, $row);

?>
