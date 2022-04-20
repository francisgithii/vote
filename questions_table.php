<?php

// create a table of questions and answers

$database="myleader";
$password="";
$server="127.0.0.1";
$username="root";


$franc_handle=mysql_connect($server,$username,$password);
$db_found=mysql_select_db($database,$franc_handle);

if ($db_found)
{
$SQL="CREATE TABLE questions
(
QID varchar(10),
Question VARCHAR (60),
qA VARCHAR(25),
qB VARCHAR(25),
qC VARCHAR(25)





)";


mysql_query($SQL);


}
else
{
print "database not found";
}

?>