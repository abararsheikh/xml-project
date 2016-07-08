<?php
$url = "http://xmlfltdata.ifids.com/ifids/EDIAirportXMLData.asp?apt=YKF&pwd=mk37";
// Start the process:
$curl = curl_init($url);
// Assign the returned data to a variable:
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// Set the timeout:
//curl_setopt($curl, CURLOPT_TIMEOUT, 5);
$getData = curl_exec($curl);

header("Content-type: text/xml");
echo $getData;

