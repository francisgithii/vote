<html>
<head>
<title>Vice-Chairman-notification</title>


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
if ((isset($_SESSION['vice_chairman'])))



{
	if ($_SESSION['vice_chairman']='1')
	{
	print "you have already voted"."<br>"."<Br>"."<Br>"."<Br>";
	print "<a href='secretary.php'>"."Vote for Teasurer"."</a>"."<Br>"."<Br>"."<Br>";
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
					  $_SESSION['vice_chairman']='1';
					  $SQL="UPDATE answers SET $selected_radio=$selected_radio+1 WHERE QID='$qnum'";
					  $result=mysql_query($SQL);
					  mysql_close($franc_handle);
					  
					  
					 header ('location:secretary.php');
					  
					  
					  
					  }
					  else
					  {
					  print "Error:contact adminstrator";
					  }
  
  
  
  
  }
	else
	{
	
	print "You did not select an option!"."<br>"."<br>"."<br>";
	print "<a href='vice_chairman.php'>"."Vote for Secretary General"."</a>";
	
	}


}





?>
<html>
<head>
<title>Process-vice-chairman</title>
</head>



<body>
<h1 align="center"></h1>
</body>
</html>