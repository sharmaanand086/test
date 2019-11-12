<?php

$servername     = 'localhost';
$username = 'root';
$password = 'c2fpwd2019';
$dbname     = 'dbctf';

//Create connection and select DB
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//var_dump($conn);
//get records from database
$query = $conn->query("SELECT * FROM cc_client");
//var_dump($query);
 
   $delimiter = ",";
   $filename = "members_" . date('Y-m-d') . ".csv";
   //echo "abc";
   //create a file pointer
   $f = fopen('php://memory', 'w');
   
   //set column headers
   $fields = array('ID', 'Name', 'Email', 'Phone', 'Password', 'Amount');
   fputcsv($f, $fields, $delimiter);
   
   //output each row of the data, format line as csv and write to file pointer
   while($row = $query->fetch_assoc()){
       $lineData = array($row['userid'], $row['name'],$row['email_id'], $row['mob_no'], $row['password'], $row['amount']);
       ///var_dump($lineData);
       fputcsv($f, $lineData, $delimiter);

   }
   
   //move back to beginning of file
   fseek($f, 0);
   
   //set headers to download file rather than displayed
   header('Content-Type: text/csv');
   header('Content-Disposition: attachment; filename="' . $filename . '";');
   
   //output all remaining data on a file pointer
   fpassthru($f);
//echo$f;
 
?>
