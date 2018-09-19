<?php
require_once('OnboardingClientDetails.php');
require_once('Encrypt.php');
require_once('Decrypt.php');
//Populate your request object with the data
$submissionData  = new OnboardingClientDetails();

//Create an object of Encrypt Class
//Update your Key and salt in the class
$encryptObj  = new Encrypt();

$encodedJson = json_encode($submissionData);

$encryptedSubmissionData = $encryptObj->encryptData($encodedJson);


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
    echo curl_error($ch);
    die(curl_error($ch));



}
else
{
    // Decode the response
    $encryptedResponseData = json_decode($response, TRUE);
    echo ($encryptedResponseData);

    // Decrypt the data
    $decryptObj  = new Decrypt();
    $decryptedSubmissionData = $decryptObj->decryptData($encryptedResponseData);

    //decryted json
    echo ($decryptedSubmissionData);
}





?>