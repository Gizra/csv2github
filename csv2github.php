#!/usr/bin/php
<?php


  if (empty($argv[1])) {
    echo "The CSV path file need to be passed as argument";
    return;
  }

  if (!file_exists($argv[1])) {
    echo 'Given file does not exist.';
    return;
  }

  // Get CSV to assoc array.
  if (($handle = fopen($argv[1], 'r')) !== FALSE) {
    $csv = array();
    $first_row = TRUE;
    while ($data = fgetcsv($handle, 0, ',')) {
      if ($first_row) {
        $first_row=FALSE;
        $headers = $data;
        var_dump($headers);
      }
      else {
        $csv[] = array_combine($headers, $data);
      }
    }
    var_dump($csv);
  }

  // Create new array.


