<html>
<head>
<title>Sec Gen</title>

<script type="text/javascript">
function validate()
{
var answer=confirm("Are you sure you want to Log Out");

if (answer==true)
window.location="login.php";
}
</script>
<link rel="stylesheet" href="franc.css" style="text/css">

</head>
<body>

<table  id="table" align="center">
<tr><td id="content">


<table >
			<tr><td colspan="7" id="title">TSA Elections 2016<br><font size="2"><i>"your trusted enumerator" </i></font></td></tr>
		<tr id="linkbar"><td >Chairperson</td><td background="bg1.jpg">Sec General</a></td><td>Treasurer </a></td><td>Project Coordinator </a></td><td>Asst P.Coordinator </a></td><td>Asst Sec Gen </a></td><td>Constitution </a></td></tr>
		<tr><td colspan="7" id="qstn"><br>
<?php

session_start();
if (!(isset($_SESSION['gatepass_vice_chairman']) && $_SESSION['gatepass_vice_chairman'] != '')) {
	header ("Location: login.php");
}


$voter=$_SESSION['votername'];
$qnum='q2';

$selected_radio="";
$qID="";
$question="question not set";
$answerA="unchecked";
$answerB="unchecked";
$answerC="unchecked";


$database="myleader";
$server="127.0.0.1";
$username="root";
$pass_word="";

$franc_handle=mysql_connect($server,$username,$pass_word);
$db_found=mysql_select_db($database,$franc_handle);



if ($db_found)
{
$SQL="SELECT * FROM questions WHERE questions.QID='$qnum'";
$result=mysql_query($SQL);
$db_field=mysql_fetch_assoc($result);

$qID=$db_field['QID'];
$question=$db_field['Question'];
$qA=$db_field['qA'];
$qB=$db_field['qB'];
$qC=$db_field['qC'];

$SQL2="SELECT First_Name FROM register WHERE Registration_Number='$voter'";
$result2=mysql_query($SQL2);

while($db_field=mysql_fetch_assoc($result2))
			{
			
			$firstname=$db_field['First_Name'] . " ";
			
}


mysql_close($franc_handle);
}
else
{

$message="error accessing database";
mysql_close($franc_handle);

}
print "<b>"."Name:"."</b>".$firstname;
print "<b>"."ADMNO: "."</b>".$voter."<br>"."<br>";
?>

<form name="form1" method="GET" action="process_vice_chairman.php">
<?php print "<b>"."<font size='5' color='#FF0000'>".$question."</font>"."</b>"; ?>
<br><br>
<table><tr><td valign='top'>

<img src="profile/CECILIA OGUTA.jpg" width="150" height="170" align="center" class="pic"><br><br>
<input class="radiob" class="radiob" type="radio" name="q" value="A" <?PHP print $answerA?>><?PHP print $qA?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<td valign='top'>
<img src="profile/SHARINE STEPHENE.jpg" width="150" height="170" align="center" class="pic">
<br><br>
<input class="radiob" class="radiob" type="radio" name="q" value="B" <?PHP print $answerB?>><?PHP print $qB?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<!--
<td valign='top'>
<img src="Kiptoch.jpg" width="100" height="100" align="center" class="pic">
<br><br>
<input type="radio" name="q" value="C" <?PHP print $answerC?>><?PHP print $qC?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
-->



</td></tr>
<tr><td colspan='3' valign='top'>
<input type="hidden" name="h1" VALUE = <?PHP print $qID; ?>><Br><BR>
<INPUT TYPE = "Submit" Name = "submit1" id="submit" VALUE = "Vote">
</FORM>

</td></tr></table>

<?php
//view results portion left out
?>

</td></tr>
				</table>
</td></tr></table>
</body>