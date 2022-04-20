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
$SQL="CREATE TABLE admin
(
ID int(10) auto_increment,


username VARCHAR(25),
password VARCHAR(25),

unique id(id)




)";
mysql_query($SQL);
print "admin TABLE CREATED";

mysql_close($franc_handle);

}
else
{
print "database not found";
}

?>