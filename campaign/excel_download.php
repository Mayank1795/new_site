                        

<?php
require('includes/config.php'); 

require('functions.php');

if(!$user->is_logged_in()){ header('Location: index.php'); } 

$username = $_SESSION['username'];

$details = get_campaign_details($username);

$campaignID = get_campaign_id($username);

$campaignID= $campaignID[0]['campaignID'];
$xls_filename = 'export_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name


 
// Header info settings
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");

echo '<table border="1">';

 
$query = $db->query("SELECT contribution_type, amount, 
          donor_name, address, zip, city, state, telephone, email, employer_type,
          occupation, business_address, date_contribution, city_agency, business_type,
          business_entity, position, ac_holder, card_type, ac_number, expiration_date FROM donor WHERE campaignID = '$campaignID'");
$query = $query->fetchAll(PDO::FETCH_ASSOC);
$no = 1;
echo '<tr>
      <th>Contribution Type</th>
      <th>Amount</th>
      <th>Address</th>
      <th>Zip</th>
      <th>City</th>
      <th>State</th>
      <th>Telephone</th>
      <th>Email</th>
      <th>Employer Type</th>
      <th>Occupation</th>
      <th>Business Address</th>
      <th>Date of Contribution</th>
      <th>City Agency</th>
      <th>Business Type</th>
      <th>Business Entity</th>
      <th>Position</th>
      <th>Account Holder</th>
      <th>Card Type</th>
      <th>Account Number</th>
      <th>Expiration Date</th>
      </tr>';

foreach ($query as $row){ 

echo '
        <tr>
                <td>'.$no.'</td>
                <td>'.$row['contribution_type'].'</td>
                <td>'.$row['amount'].'</td>
                <td>'.$row['donor_name'].'</td>
                <td>'.$row['address'].'</td>
                <td>'.$row['zip'].'</td>
                <td>'.$row['city'].'</td>
                <td>'.$row['state'].'</td>
                <td>'.$row['telephone'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['employer_type'].'</td>
                <td>'.$row['occupation'].'</td>
                <td>'.$row['business_address'].'</td>
                <td>'.$row['date_contribution'].'</td>
                <td>'.$row['city_agency'].'</td>
                <td>'.$row['business_type'].'</td>
                <td>'.$row['business_entity'].'</td>
                <td>'.$row['position'].'</td>
                <td>'.$row['ac_holder'].'</td>
                <td>'.$row['card_type'].'</td>
                <td>'.$row['ac_number'].'</td>
                <td>'.$row['expiration_date'].'</td>

        </tr>
        ';
        $no++;
        }
      
echo '</table>';
 

?>
