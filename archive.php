<?php

  // parseArchive
  // return parsed data if success, null if failed
  function parseArchive($requestBody) {
    $archive=[];

    $archive['AccessionNumber'] = $requestBody['AccessionNumber'];
    $archive['StudyInstanceUID'] = $requestBody['StudyInstanceUID'];
    $archive['PatientID'] = $requestBody['PatientID'];
    $archive['PatientName'] = $requestBody['PatientName'];
    $archive['PatientBirthDate'] = $requestBody['PatientBirthDate'];
    $archive['PatientSex'] = $requestBody['PatientSex'];
    $archive['StudyDate'] = $requestBody['StudyDate'];
    $archive['StudyTime'] = $requestBody['StudyTime'];
    $archive['AcquisitionDateTime'] = $requestBody['AcquisitionDateTime'];
    
    if (!isset($requestBody['PdfFile']) || !isset($requestBody['DicomFile'])) {
      echo ("pdfFile or dicomFile not found");  
      return null;
    }

    // parse base64 encoded file in $requestBody['pdfFile'] and $requestBody['dicomFile']
    try {
      $archive['PdfFile'] = base64_decode($requestBody['PdfFile']);
      $archive['DicomFile'] = base64_decode($requestBody['DicomFile']);
    } catch (Exception $e) {
      echo ($e->getMessage());
      return null;
    }

    return $archive;  
  }

  // storeArchive
  function storeArchive($archive) {
    // ... store archive to the database
    // ...

    // ... update worklist table
    // ... mark worklist with AccessionNumber as COMPLETED

    // ... save file to the storage
    file_put_contents('archive/'.$archive['AccessionNumber'].'.dcm', $archive['DicomFile']);
    file_put_contents('archive/'.$archive['AccessionNumber'].'.pdf', $archive['PdfFile']);    
  }


  /* 

    {
      "AccessionNumber": "123456",
      "StudyInstanceUID": "1.2.840.113564.1234.1954.123456.123456",
      "PatientID": "AC98765",
      "PatientName": "Dian Utami",
      "PatientBirthDate": "1995-04-20",
      "PatientSex": "F",
      "StudyDate": "2024-06-25",
      "StudyTime": "12:30:00",
      "AcquisitionDateTime": "2024-06-25 12:30:00",
      "pdfFile": "...base64encodedfile...",
      "dicomFile": "...base64encodedfile..."
    }

  */


?>


