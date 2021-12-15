<?php
ini_set("display_errors",0);
if($_REQUEST['balance'] != "" && $_REQUEST['type'] != "" && $_REQUEST['description'] != ""){
    $curl = curl_init();

$data = array(
    'balance' => $_REQUEST['balance'],
    'type' => $_REQUEST['type'],
    'description' => $_REQUEST['description']
);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/api/budgetings',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
header("Location: http://localhost/budgeting-app/form.php");
curl_close($curl);

}

    



?>