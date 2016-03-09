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

$file_path = $argv[1];
$file_name = explode ('.', $file_path)[0];
// Get CSV to assoc array.
if (($handle = fopen($file_path, 'r')) !== FALSE) {
  $csv = array();
  $first_row = TRUE;
  while ($data = fgetcsv($handle, 0, ',')) {
    if ($first_row) {
      $first_row=FALSE;
      $headers = $data;
    }
    else {
      $csv[] = array_combine($headers, $data);
    }
  }
}

// Create new array.
foreach ($csv as $row) {
  // check data in row.

  if (empty($row['Ref']) || empty($row['Est. hours']) || $row['']!='') {
    continue;
  }

  $to_csv = array (
    'title'=>$row['Feature'] . ' [' . $row['Est. hours'] . 'h]',
    'description' => $row['Description & Assumptions'],
    'assignee_username' => '',
    'label1' => $row['Issue Type'],
  );

  $result = add_to_csv($file_name . '_prepared.csv', $to_csv );
  if(!$result){
    echo 'The Issue ' . $to_csv['title'] . ' hasn\'t added to csv';
  }

}
echo "Done!\n";

function add_to_csv($file_path, $fields){
  if (file_exists($file_path)) {
    $csvfile = fopen($file_path, 'a');
    $result = fputcsv($csvfile, $fields);
    fclose($csvfile);
  }
  else {
    $csvfile = fopen($file_path, 'w');
    // Put header from keys.
    fputcsv($csvfile, array_keys($fields));
    // Add first line.
    $result = fputcsv($csvfile, $fields);
    fclose($csvfile);
  }
  return $result;
}


