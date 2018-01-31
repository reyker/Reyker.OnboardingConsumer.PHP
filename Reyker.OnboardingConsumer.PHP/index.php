<?php
require_once('OnboardingClientDetails.php');
require_once('Encrypt.php');

//Populate your request object with the data
$submissionData  = new OnboardingClientDetails();

//Create an object of Encrypt Class
//Update your Key and salt in the class
$encryptObj  = new Encrypt();
$encryptedSubmissionData = $encryptObj->encrypt(json_encode($submissionData));

$jsonSubmissionData = json_encode($encryptedSubmissionData);

$url = 'https://reykeronboardingstaging.azurewebsites.net' . '/api/Onboarding/';




// Your ID
$authToken = 'Reyker ReykerInternalTestAccount';


// Setup cURL to do the POST request
$ch = curl_init($url);
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Authorization: '.$authToken,
        'Content-Type: text/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($jsonSubmissionData)
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE)
{
    die(curl_error($ch));

    echo curl_error($ch);
   
}

// Decode the response
$responseData = json_decode($response, TRUE);




?>