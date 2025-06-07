<?php

  // retrieve worklist from the database
  function getWorklist() {

    // todo: query DB here and return the worklist

    // return sample worklist stored in "worklist.json
    $file = 'worklist.json';

    if (!file_exists($file)) {
        return [];
    }

    $json = file_get_contents($file);
    $data = json_decode($json, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        // JSON is invalid
        return [];
    }

    return $data;        
  }

?>