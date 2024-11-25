<?php

  // retrieve worklist from the database
  function getWorklist() {

    // todo: query DB here and return the worklist


    // return sample worklist
    $worklist = [
      [
        "AccessionNumber"  => "234567",
        "PatientID" => "AC98765",
        "Forename" => "Dian",
        "Surname" => "Utami",
        "Gender" => "F",
        "Weight" => "75",
        "DateOfBirth" => "1995-04-20",
        "scheduledAET" => "CARDIO1",
        "examRoom" => "Room 202",
        "ReferringPhysician" => "dr. John Doe",
      ],
      [
        "AccessionNumber"  => "23768",
        "PatientID" => "123456",
        "Forename" => "Ali",
        "Surname" => "Armandi",
        "Gender" => "M",
        "Weight" => "65",
        "DateOfBirth" => "2001-11-15",
        "scheduledAET" => "CARDIO1",
        "examRoom" => "Room 202",
        "ReferringPhysician" => "dr. Abdullah Suherman",
      ],
      [
        "AccessionNumber"  => "23909",
        "PatientID" => "45677",
        "Forename" => "Sandra",
        "Surname" => "Omaswati",
        "Gender" => "F",
        "Weight" => "56",
        "DateOfBirth" => "2004-06-25",
        "scheduledAET" => "CARDIO1",
        "examRoom" => "Room 202",
        "ReferringPhysician" => "dr. Abdullah Suherman",
      ],
      [
        "AccessionNumber"  => "234519",
        "PatientID" => "99871",
        "Forename" => "Amelia",
        "Surname" => "Suryani",
        "Gender" => "F",
        "Weight" => "66",
        "DateOfBirth" => "2002-02-05",
        "scheduledAET" => "CARDIO1",
        "examRoom" => "Room 202",
        "ReferringPhysician" => "dr. Abdullah Suherman",
      ],      
    ];
    return $worklist;
  }

?>