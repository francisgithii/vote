<html>
<head>
<title>Chairman-notification</title>


<link rel="stylesheet" href="franc.css" style="text/css">

</head>
<body>

<table  id="table" align="center">
<tr><td id="content">


	<table >
		<tr><td colspan="4" id="title">Online-voting<br><font size="2"><i>"your trusted enumerator" </i></font></td></tr>
		
		<tr><td colspan="4" id="qstn"><br><BR><BR>
<?php
session_start();
if ((isset($_SESSION['x'])))



{
	if ($_SESSION['x']='1')
	{
	print "you have already voted"."<br>"."<Br>"."<Br>"."<Br>";
	print "<a href='y.php'>"."Vote for Assistant Project Coordinator"."</a>";
	}
}
else
{
  if (isset($_GET['submit1']) && isset($_GET['q']))
  {
  $selected_radio=$_GET['q'];
  $qnum=$_GET['h1'];
  
  
  $username="root";
  $pass_word="";
  $database="myleader";
  $server="127.0.0.1";
  
  $franc_handle=mysql_connect($server,$username,$pass_word);
  $db_found=mysql_select_db($database,$franc_handle);
  
					  if ($db_found)
					  {
					  $_SESSION['x']='1';
					 $SQL="UPDATE answers SET $selected_radio=$selected_radio+1 WHERE QID='$qnum'";
					  $result=mysql_query($SQL);
					  mysql_close($franc_handle);
					  
					  header ('location:y.php');
					  
					  
					  }
					  else
					  {
					  print "Error:contact adminstrator";
					  }
  
  
  
  
  }
	else
	{
	
	print "You did not select an option!"."<br>"."<br>"."<br>";
	print "<a href='x.php'>"."Vote for Project Coordinator"."</a>";
	
	}


}





?>
</td></tr></table>
</body>
</html>