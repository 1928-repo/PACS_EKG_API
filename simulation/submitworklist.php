<?php
// File: submit.php

// Set path to JSON file
$jsonFile = '../worklist.json';

// Collect form data
$data = [
    "NoPemeriksaan" => $_POST["AccessionNumber"] ?? "",
    "NoRekamMedis" => $_POST["PatientID"] ?? "",
    "NamaDepan" => $_POST["Forename"] ?? "",
    "NamaBelakang" => $_POST["Surname"] ?? "",
    "JenisKelamin" => $_POST["Gender"] ?? "",
    "Berat" => $_POST["Weight"] ?? "",
    "TanggalLahir" => $_POST["DateOfBirth"] ?? "",
    "KodeAlat" => $_POST["scheduledAET"] ?? "",
    "NamaRuang" => $_POST["examRoom"] ?? "",
    "NamaDokter" => $_POST["ReferringPhysician"] ?? ""
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
