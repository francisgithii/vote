<?php
 $username="root";
  $pass_word="";
  $database="myleader";
  $server="127.0.0.1";
  $regnumber=$_POST['regnum'];
  
  $franc_handle=mysql_connect($server,$username,$pass_word);
  $db_found=mysql_select_db($database,$franc_handle);
  
  if  ($db_found)
  {
  
  $SQL="UPDATE register SET Password='VOTED' WHERE Registration_Number='$regnum'";
					  $result=mysql_query($SQL);
					  mysql_close($franc_handle);
  
  
  
  }

























?>