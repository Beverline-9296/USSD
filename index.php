<?php
// Reads the variables sent via POST at gateway
$sessionId   = $_POST["sessionId"]   ?? null;
$serviceCode = $_POST["serviceCode"] ?? null;
$phoneNumber = $_POST["phoneNumber"] ?? null;
$text        = $_POST["text"]        ?? "";

if ($text == "") {
    // This is the first request
    $response  = "CON What would you want to check \n";
    $response .= "1. My account No \n";
    $response .= "2. My phone Number";
} else if ($text == "1") {
    // Business logic for the first level of response
    $response  = "CON Choose account information you want to view \n";
    $response .= "1. Account Number \n";
    $response .= "2. Account balance";
} else if ($text == "2") {
    // Business logic for the first level of response (terminal)
    $response = "END Your phone number is " . $phoneNumber;
} else if ($text == "1*1") {
    // Second level response when the user selects 1 in the first instance
    $accountNumber = "ACC1001";
    $response      = "END Your Account number is " . $accountNumber;
} else if ($text == "1*2") {
    // Second level response when the user selects 2 in the first instance
    $balance  = "Ksh. 10,000";
    $response = "END Your balance is " . $balance;
}

// Echo the response to the API
header('Content-type: text/plain');
echo $response;
?>
