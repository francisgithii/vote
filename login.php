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
<title>Login</title>


<link rel="stylesheet" href="franc.css" style="text/css">

</head>
<body>

<table  id="table" align="center">
<tr><td id="content">


	<table >
		<tr><td colspan="4" id="title">TSA Elections 2022<br><font size="2"><i>"your trusted enumerator" </i></font></td></tr>
		
		<tr><td colspan="4" id="qstn"><br><BR><BR>


<?php

session_start();
session_destroy();

session_start();



$votername1='';
$votername2='';
$regno='';


$password='';
$regnumber='';
$message="";
if (isset($_POST['submit1'])){
$regnumber=htmlspecialchars(strtoupper(rtrim($_POST['regnumber'])));
$password=htmlspecialchars(strtoupper(rtrim($_POST['password'])));

$username="root";
$pass_word="";
$database="myleader";
$server="127.0.0.1";


$franc_handle=mysql_connect($server,$username,$pass_word);
$db_found=mysql_select_db($database,$franc_handle);

if ($db_found)
{
$SQL="SELECT * FROM register WHERE Registration_Number='$regnumber' AND Password='$password' ";
$result=mysql_query($SQL);
$rows=mysql_num_rows($result);
//if there is such a combination of regnumber and password $rows will be 
//greater than zero,if so redirect the page
//mysql_num_rows 
			if ($rows > 0) {
			
								if ($password=="*BLOCKED VOTER*"){
								
								$message="Blocked Voter"."<br>";
								}
								else{
								
								$_SESSION['gatepass_chairman']='1';
								$_SESSION['gatepass_secretary']='1';
								$_SESSION['gatepass_vice_chairman']='1';
								$_SESSION['gatepass_x']='1';
								$_SESSION['gatepass_y']='1';
								$_SESSION['gatepass_z']='1';
								$_SESSION['gatepass_const']='1';
								
								$_SESSION['votername']=$regnumber;
								header ("Location: chairman.php");
								
								
								
								$SQL="UPDATE register SET Password='*BLOCKED VOTER*' WHERE Registration_Number='$regnumber'";
									  
									  
									  
									  $result=mysql_query($SQL);
									  mysql_close($franc_handle);
									  
								
								
								
								}
			}
						else if(($password && $regnumber)=='')
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
<h1 align="center">LOG IN</H1>
<form name="form1" method="POST" action="login.php">


Registration Number :<input type="text" name="regnumber" placeholder='e.g EC/07/11' maxlength="11" value="<?php print $regnumber;?>" onkeyup="validateInp
(this);"><BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Password :<input type="password" name="password" value="<?php print $password;?>" onkeyup="validateInp
(this);"><BR><BR>
<?php print "<font color='red'>".$message."</font>"."<Br>"."<br>";?>
<input type="submit" name="submit1" id="submit" value="Submit">


</form>




</td></tr></table>
</body>