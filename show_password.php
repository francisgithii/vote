<html>
<head>
<script type = "text/javascript" >
function validateInp ( elem ) {
var validChars = /[A-Za-z0-9/]/ ;
var strIn = elem. value;
var strOut = '' ;
for (var i = 0; i <
strIn. length ; i ++ ) {
strOut += (validChars. test
( strIn. charAt (i))) ? strIn. charAt ( i) : '';
}
elem. value = strOut ;
}
</script >
<title>Show Password</title>


<link rel="stylesheet" href="franc.css" style="text/css">

</head>
<body>

<table  id="table" align="center">
<tr><td id="content">


	<table >
		<tr><td colspan="4" id="title">TSA Elections 2016<br><font size="2"><i>"your trusted enumerator" </i></font></td></tr>
		
		<tr><td colspan="4" id="qstn"><br><BR><BR>
<?php
//voters register so as to login
session_start();
if (!(isset($_SESSION['gatepass_submit']) && $_SESSION['gatepass_submit'] != '')) {
	header ("Location: admin_login.php");
}



$regnumber="";
$message="";
if (isset($_POST['submit1'])){
$regnumber=htmlspecialchars(strtoupper(rtrim($_POST['regnumber'])));

$username="root";
$password="";
$database="myleader";
$server="127.0.0.1";


$franc_handle=mysql_connect($server,$username,$password);
$db_found=mysql_select_db($database,$franc_handle);
//poison registration beyond 10pm
								$hour=date("h ",strtotime("+3 hours"));
/*
								if($hour>=22){
									  
													 $SQL="UPDATE register SET Password='*BLOCKED VOTER*'";
													  mysql_query($SQL);
													 
										}
		
*/
if ($db_found)
{
$SQL="SELECT * FROM register WHERE Registration_Number='$regnumber'";
$result=mysql_query($SQL);
$rows=mysql_num_rows($result);
	if ($rows>0)
	{
		while($db_field=mysql_fetch_assoc($result))
			{
			
			print $db_field['First_Name'] . "<br>";
			
			print $db_field['Registration_Number'] . "<BR>";
			print $db_field['Password'] . "<BR>";
			}
	
	
	}
	else
	{
	$message="Member not registered "." - "."<a href='register.php'>"."register here"."</a>"."<br>";
	}
}
}
?>
<h1 align="center">MEMBER DETAILS</h1>
<form name="form1" method="POST" action="show_password.php">

Registration Number :<input type="text" name="regnumber" maxlength="11" value="<?php print $regnumber;?>" onkeyup="validateInp
(this);"><BR><BR>
<?php print $message."<br>";?>
<input type="submit" name="submit1" id="submit" value="submit"><br><br>

<a href='admin_login.php'>Log Out</a>
</form>


</td></tr></table>
</body>