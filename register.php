<html>
<head>
<script type = "text/javascript" >
function validateInp ( elem ) {
var validChars = /[A-Za-z 0-9/]/ ;
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
<title>Register</title>


<link rel="stylesheet" href="franc.css" style="text/css">

</head>
<body>

<table  id="table" align="center">
<tr><td id="content">


	<table >
		<tr><td colspan="4" id="title">TSA Elections 2016<br><font size="2"><i>"your trusted enumerator" </i></font></td></tr>
		
		<tr><td colspan="4" id="qstn"><br><BR><BR>
<?php
//register
$firstname="";
$secondname="";
$regnumber="";
$message="";
$randnumber="JBUL7234";
$password=str_shuffle($randnumber);

if (isset($_POST['submit1'])){

$firstname=htmlspecialchars(ucwords(strtolower(rtrim($_POST['firstname']))));
//$secondname=htmlspecialchars(ucwords(strtolower(rtrim($_POST['secondname']))));
$regnumber=htmlspecialchars(strtoupper(rtrim($_POST['regnumber'])));


$database="myleader";
$pass_word="";
$username="root";
$server="127.0.0.1";


$franc_handle=mysql_connect($server,$username,$pass_word);
$db_found=mysql_select_db($database,$franc_handle);


if ($db_found)
{
		$firstname= mysql_real_escape_string($firstname, $franc_handle);
		$regnumber= mysql_real_escape_string($regnumber, $franc_handle);
		//$secondname= mysql_real_escape_string($secondname, $franc_handle);
		$password= mysql_real_escape_string($password, $franc_handle);
$SQL="SELECT * FROM register WHERE Registration_Number='$regnumber'";
$result=mysql_query($SQL);
$rows=mysql_num_rows($result);

		if ($rows>0)
		{
		$message="<font color='#FF0000'>Already registered voter</font>"."-"."<a href='login.php'>"."login here"."</a>"."<br>"."<br>"."<br>";

		}
		else if(($firstname && $regnumber)=='')
		{
		
		$message="invalid entry"."<br>"."<br>";
		}
		else
		{
		$SQL="INSERT INTO register (First_Name,Registration_Number,Password) values('$firstname','$regnumber','$password')";
		mysql_query($SQL);
		$message="<font color='#008000'>Voter added to database</font><br><a href='show_password.php'>show password</a>"."<br>"."<br>"."<br>";
		}
}
else
{


}

}

?>
<h1 align="center" >REGISTER</h1>
<form name="form1" method="POST" action="register.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


Name :<input type="text" name="firstname" value="<?php print $firstname; ?>" onkeyup="validateInp
(this);"><BR><BR>




Registration Number :<input type="text" name="regnumber" maxlength="11" value="<?php print $regnumber; ?>" onkeyup="validateInp
(this);"><BR><BR>
<?php print $message;?>
<input type="submit" name="submit1" id="submit" value="Submit">
</form>


</td></tr></table>

</body>


