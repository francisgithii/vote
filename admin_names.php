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
<title>Register</title>


<link rel="stylesheet" href="franc.css" style="text/css">

</head>
<body>

<table  id="table" align="center">
<tr><td id="content">


	<table >
		<tr><td colspan="4" id="title">Jumbo<br><font size="2"><i>"your trusted enumerator" </i></font></td></tr>
		
		<tr><td colspan="4" id="qstn"><br><BR><BR>
<?php
//register


$name="";
$password="";
$votingday="";
$startingtime="";
$endingtime="";

$message="";
if (isset($_POST['submit1'])){

$name=htmlspecialchars(ucwords(strtolower(rtrim($_POST['name']))));
$password=htmlspecialchars(rtrim($_POST['password']));



$database="myleader";
$pass_word="";
$username="root";
$server="127.0.0.1";


$franc_handle=mysql_connect($server,$username,$pass_word);
$db_found=mysql_select_db($database,$franc_handle);


if ($db_found)
      {
		$name= mysql_real_escape_string($name, $franc_handle);
		$password= mysql_real_escape_string($password, $franc_handle);

		$SQL="INSERT INTO admin (name,votingday,startingtime,endingtime,password) values('$name','$votingday','$startingtime','$endingtime','$password')";
		mysql_query($SQL);
		$message="details added to database"."<br>"."<br>"."<br>";
		}

else
{


}

}

?>
<h1 align="center" >REGISTER</h1>
<form name="form1" method="POST" action="admin_names.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Name :<input type="text" name="name" value="<?php print $name; ?>" onkeyup="validateInp
(this);"><BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

votingday :<input type="text" name="password" value="<?php print $votingday;?>" onkeyup="validateInp
(this);"><BR><BR>

startingtime :<input type="text" name="password" value="<?php print $startingtime;?>" onkeyup="validateInp
(this);"><BR><BR>

endingtime :<input type="text" name="password" value="<?php print $endingtime;?>" onkeyup="validateInp
(this);"><BR><BR>

password :<input type="text" name="password" value="<?php print $password;?>" onkeyup="validateInp
(this);"><BR><BR>



<?php print "<font color='red'>".$message."</font>";?>
<input type="submit" name="submit1" id="submit" value="Submit">
</form>


</td></tr></table>

</body>


