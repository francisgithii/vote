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
//print "make a page to prevent resubmission";
session_start();
if (!(isset($_SESSION['gatepass_chairman']) && $_SESSION['gatepass_chairman'] != '')) {
	header ("Location: login.php");
}


if ((isset($_SESSION['y'])))



{
	if ($_SESSION['y']='1')
	{
	print "you have already voted"."<br>"."<Br>"."<Br>"."<Br>";
	print "<a href='z.php'>"."Vote for Assistant Sec Gen"."</a>";
	}
	
	
}
else
{
  if (isset($_GET['submit1']) && isset($_GET['q']))
  {
  
  //print $_SESSION['votername'];
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
								if 	($_SESSION['votername'] !==''){
									  $_SESSION['y']='1';
									  
									 $SQL="UPDATE answers SET $selected_radio=$selected_radio+1 WHERE QID='$qnum'";
									  $result=mysql_query($SQL);
									  mysql_close($franc_handle);
									  
									  header ('location:z.php');
									} 
									
									
								else{
								print "<a href='login.php'>"."Log Out"."</a>"."<br>"."<br>"."<br>";
								
								}
								
								
								
									
					  }
					  
					  else
					  {
					  print "Error:contact adminstrator";
					  }
  
  
  
  
  }
	else
	{
	
	print "You did not select an option!"."<br>"."<br>"."<br>";
	print "<a href='y.php'>"."Vote for Asst Project Coordinator"."</a>";
	
	}


}





?>
</td></tr></table>
</body>
</html>