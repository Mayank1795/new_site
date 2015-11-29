<?php

require('includes/config.php'); 
require('functions.php');

if(!$user->is_logged_in()){ header('Location: index.php'); } 

$username = $_SESSION['username'];

$details = get_campaign_details($username);

$campaignID = get_campaign_id($username);

$campaignID= $campaignID[0]['campaignID'];

if(isset($_GET['id']))
	$id=$_GET['id'];
require('fpdf/fpdf.php');

function get_pdf_from_id($id)

{ 
global $db;
global $pdf;
$query = $db->query("SELECT * FROM donor WHERE donor_id = '$id'");
$query = $query->fetchAll(PDO::FETCH_ASSOC);
                        
foreach ($query as $row){ 


$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(120,10,'CONTRIBUTION CARD');
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,10,'Comittee Use Only',1,1,'C',0);

$pdf->Ln(20);
$pdf->Cell(60,10,'Contribution Type: ');
$pdf->Cell(50,10,$row['contribution_type']);

$pdf->Ln(9);
$pdf->Cell(60,10,'Amount $');
$pdf->Cell(50,10,$row['amount']);
$pdf->Ln(9);
$pdf->Cell(60,10,'Contributor Name');
$pdf->Cell(50,10,$row['donor_name']);
$pdf->Ln(9);
$pdf->Cell(60,10,'Home Address');
$pdf->Cell(120,10,$row['address']);
$pdf->Ln(9);
$pdf->Cell(60,10,'City/State/Zip');
$pdf->Cell(50,10,$row['city'].'/'.$row['state'].'/'.$row['zip']);
$pdf->Ln(9);
$pdf->Cell(60,10,'Optional: Tel.');
$pdf->Cell(50,10,$row['telephone']);
$pdf->Cell(30,10,'Email');
$pdf->Cell(50,10,$row['email']);

if($row['contribution_type']=="creditcard")
{                            
$pdf->Ln(9);
$pdf->Cell(60,10,'Account Holder');
$pdf->Cell(50,10,$row['ac_holder']);
$pdf->Cell(60,10,'Card Type');
$pdf->Cell(50,10,$row['card_type']);
$pdf->Ln(9);
$pdf->Cell(60,10,'Account Number');
$pdf->Cell(50,10,$row['ac_number']);
$pdf->Cell(60,10,'Expiration Date');
$pdf->Cell(50,10,$row['expiration_date']);
}
$pdf->Ln(12);

$pdf->SetFont('Arial','',10);
$pdf->Write(5,'To comply with New York zip Campaign Finance Board reporting requirements, provide your employment information. If you are not employed, indicate what best describes your employment status (e.g., homemaker, retired, student, or unemployed). If self-employed, indicate employer as self and provide your occupation and employment address.');
$pdf->Ln(9);
$pdf->SetFont('Arial','',12);

$pdf->Cell(60,10,'Employer');
$pdf->Cell(50,10,$row['employer_type']);
$pdf->Cell(30,10,'Occupation');
$pdf->Cell(50,10,$row['occupation']);
$pdf->Ln(9);
$pdf->Cell(60,10,'Business Address');
$pdf->Cell(50,10,$row['business_address']);
$pdf->Ln(9);
$pdf->Cell(60,10,'City/State/Zip');


$pdf->Ln(12);
$pdf->SetFont('Arial','',10);

$pdf->Write(5,'I understand that State law requires that a contribution be in my name and be from my own funds. I hereby affirm that this contribution is being made from my personal funds, is not being reimbursed in any manner, and is not being made as a loan.');

$pdf->Ln(9);
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,10,'Contributor Signature');

if($row['contribution_type']=="creditcard")
$pdf->Image('fpdf/1514.jpg',70,185,30);

else
$pdf->Image('fpdf/1514.jpg',70,166,30);

$pdf->Cell(50,10,'');
$pdf->Cell(40,10,'Contribution Date');
$pdf->Cell(50,10,$row['date_contribution']);

$pdf->Ln(15);

$pdf->SetFont('Arial','',10);
$pdf->Write(5,'If a contributor has business dealings with the zip as defined in the Campaign Finance Act, such contributor may contribute only up to $250 for zip council, $320 for borough president and $400 for mayor, comptroller or public advocate.');
$pdf->Ln(9);


$pdf->Write(5,'If you are doing business with the zip, please complete the following:');

$pdf->Ln(9);
$pdf->SetFont('Arial','',12);
$pdf->Cell(80,10,'With Which City Agency');
$pdf->Cell(50,10,$row['city_agency']);
$pdf->Ln(9);
$pdf->Cell(80,10,'Doing Business Type (e.g., Contracts)');
$pdf->Cell(50,10,$row['business_type']);
$pdf->Ln(9);
$pdf->Cell(80,10,'Name of Doing Business Entity');
$pdf->Cell(50,10,$row['business_entity']);
$pdf->Ln(9);
$pdf->Cell(80,10,'Your Position (e.g., CEO)');
$pdf->Cell(50,10,$row['position']);

}

}

if($id=='all')

{
$pdf = new FPDF();
 $query = $db->query("SELECT donor_id FROM donor WHERE campaignID = '$campaignID'");
 $query = $query->fetchAll(PDO::FETCH_ASSOC);
 foreach ($query as $row)
 {
 	get_pdf_from_id($row["donor_id"]);
 } 

get_pdf_from_id($id);
$pdf->Output();

}

else
{

$pdf = new FPDF();
get_pdf_from_id($id);
$pdf->Output();

}


?>