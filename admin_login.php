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
		<tr><td colspan="4" id="title">TSA Elections 2016<br><font size="2"><i>"your trusted enumerator" </i></font></td></tr>
		
		<tr><td colspan="4" id="qstn"><br><BR><BR>


<?php

session_start();
session_destroy();







$message="";
if (isset($_POST['submit1'])){
$admin=htmlspecialchars(rtrim($_POST['admin']));
$password=htmlspecialchars(md5(rtrim($_POST['password'])));

$username="root";
$pass_word="";
$database="myleader";
$server="127.0.0.1";


$franc_handle=mysql_connect($server,$username,$pass_word);
$db_found=mysql_select_db($database,$franc_handle);

if ($db_found)
{
print $SQL="SELECT * FROM admins WHERE username='$admin' AND password='$password' ";
$result=mysql_query($SQL);
if ($result){
$rows=mysql_num_rows($result);

			if ($rows > 0) {
				session_start();
				$_SESSION['gatepass_submit']='1';
				
				
				header ("location:show_password.php");
			
				
			}
			else if(($password && $admin)=='')
		{
		$message="invalid entry"."<br>";
		}
			else {
				
				$message="Unregistered member/Wrong password"."<BR>";
			}	
			
	

}
mysql_close($franc_handle);
}
}
?>
<h2 align="center">LOG IN</H2><h6>administrator use only!</h6>
<form name="form1" method="POST" action="admin_login.php">


administrator :<input type="text" name="admin" value="" ><BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Password :<input type="password" name="password" value="" ><BR><BR>
<?php print "<font color='red'>".$message."</font>"."<Br>"."<br>";?>
<input type="submit" name="submit1" id="submit" value="Submit">
</form>




</td></tr></table>
</body>