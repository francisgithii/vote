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
<title>admin_login</title>


<link rel="stylesheet" href="franc.css" style="text/css">

</head>
<body>

<table  id="table" align="center">
<tr><td id="content">


	<table >
		<tr><td colspan="4" id="title">Jumbo<br><font size="2"><i>"your trusted enumerator" </i></font></td></tr>
		
		<tr><td colspan="4" id="qstn"><br><BR><BR>


<?php

session_start();
session_destroy();







$message="";
if (isset($_POST['submit1'])){
$admin=htmlspecialchars(strtoupper(rtrim($_POST['admin'])));
$password=htmlspecialchars(strtoupper(rtrim($_POST['password'])));

$username="root";
$pass_word="";
$database="myleader";
$server="127.0.0.1";


$franc_handle=mysql_connect($server,$username,$pass_word);
$db_found=mysql_select_db($database,$franc_handle);

if ($db_found)
{
$SQL="SELECT * FROM admin WHERE name='$admin' AND password='$password' ";
$result=mysql_query($SQL);
$rows=mysql_num_rows($result);

			if ($rows > 0) {
				session_start();
				$_SESSION['gatepass_reset']='1';
				
				header ("Location: reset.php");
				
			
				
			}
			else if(($password && $admin)=='')
		{
		$message="invalid entry";
		}
			else {
				
				$message="Unregistered member/Wrong password"."<BR>";
			}	
	


mysql_close($franc_handle);
}
}
?>

<h1 align="center">LOG IN</H1><h6>administrator use only!</h6>
<form name="form1" method="POST" action="admin_reset.php">


administrator :<input type="text" name="admin" value="" onkeyup="validateInp
(this);"><BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Password :<input type="password" name="password" value="" onkeyup="validateInp
(this);"><BR><BR>
<?php print "<font color='red'>".$message."</font>"."<Br>"."<br>";?>
<input type="submit" name="submit1" id="submit" value="Submit">
</form>




</td></tr></table>
</body>