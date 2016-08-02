<?php
error_reporting(E_ALL); 
ini_set( 'display_errors','1'); 
$con= mysqli_connect('egon.cs.umn.edu','S16CS4131U81','uchearsenal15','S16CS4131U81','3307');
// Check connection
if (mysqli_connect_errno())
  {
  echo 'Failed to connect to MySQL:' . mysqli_connect_error();
  }
echo sha1('JS123');
echo sha1('JJ456');

$str1 = "JS123";
$str2 = "JJ456";
$str3 = "UC789";

mysqli_query($con,"INSERT INTO tbl_accounts (acc_name, acc_login, acc_password) VALUES ('Jim Smith', 'Smitty', '". sha1($str1)."');");
mysqli_query($con,"INSERT INTO tbl_accounts (acc_name, acc_login, acc_password) VALUES ('Jane Jones', 'JJones', '". sha1($str2)."');");
mysqli_query($con,"INSERT INTO tbl_accounts (acc_name, acc_login, acc_password) VALUES ('Uche Ofuonye', 'ofuon001', '". sha1($str3)."');");

mysqli_close($con);


echo '<h1> Successfully Inserted Values into the Table </h1>'
?> 
