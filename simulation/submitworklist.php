<?php
// File: submit.php

// Set path to JSON file
$jsonFile = '../worklist.json';

// Collect form data
$data = [
    "AccessionNumber" => $_POST["AccessionNumber"] ?? "",
    "PatientID" => $_POST["PatientID"] ?? "",
    "Forename" => $_POST["Forename"] ?? "",
    "Surname" => $_POST["Surname"] ?? "",
    "Gender" => $_POST["Gender"] ?? "",
    "Weight" => $_POST["Weight"] ?? "",
    "DateOfBirth" => $_POST["DateOfBirth"] ?? "",
    "scheduledAET" => $_POST["scheduledAET"] ?? "",
    "examRoom" => $_POST["examRoom"] ?? "",
    "ReferringPhysician" => $_POST["ReferringPhysician"] ?? ""
];

// Load existing data or start fresh
if (file_exists($jsonFile)) {
    $jsonData = json_decode(file_get_contents($jsonFile), true);
    if (!is_array($jsonData)) {
        $jsonData = [];
    }
} else {
    $jsonData = [];
}

// Append new entry
$jsonData[] = $data;

// Save back to file
file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT));

// Redirect or confirm
echo "<h2>Entry Saved Successfully!</h2>";
echo "<p><a href='inputworklist.php'>Go back to the form</a></p>";
