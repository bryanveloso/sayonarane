<?php
# header( "HTTP/1.1 301 Moved Permanently" );
# header( "Status: 301 Moved Permanently" );
# header( "Location: http://sayonarane.net/station/" );
# exit(0); // This is Optional but suggested, to avoid any accidental output
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Heart Station &hearts; a jpop tcg</title>
    <link rel="stylesheet" href="/station/css/basics.css" type="text/css" media="screen" charset="utf-8">
</head>

<body>

<div id="container">
		<div id="header">
		  <!--<h1></h1>-->
		  <p>Heart Station &hearts; a jpop tcg</p>
		</div>
		
		<div id="content">
		  <div id="main">
			<h1>Member Admin: Delete</h1>

<P>

<?
include("dbinfo.php");
mysql_connect($hostname,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");
$id=$_GET['id'];
$query="SELECT * FROM " . $tablename . " WHERE id='$id'";
$result=mysql_query($query);
$num=mysql_numrows($result); 
mysql_close();

$i=0;
while ($i < $num) {
$name=mysql_result($result,$i,"name");
$email=mysql_result($result,$i,"email");
$site=mysql_result($result,$i,"site");
$collecting=mysql_result($result,$i,"collecting");
$birthday=mysql_result($result,$i,"birthday");
$level=mysql_result($result,$i,"level");
$prejoin=mysql_result($result,$i,"prejoin");
$isnew=mysql_result($result,$i,"isnew");
?>

<form action="deleted.php" method="post">
<input type="hidden" name="del_id" value="<? echo "$id"; ?>">
Name:<br>
<input type="text" name="del_name" value="<? echo "$name" ?>"><br>
Email:<br>
<input type="text" name="del_email" value="<? echo "$email" ?>"><br>
Site:<br>
<input type="text" name="del_site" value="<? echo "$site" ?>"><br>
Collecting:<br>
<input type="text" name="del_collecting" value="<? echo "$collecting" ?>"><br>
Birthday:<br>
<input type="text" name="del_birthday" value="<? echo "$birthday" ?>"><br>
Level:<br>
<input type="text" name="del_level" value="<? echo "$level" ?>"><br>
Prejoin:<br>
<input type="text" name="del_prejoin" value="<? echo "$prejoin" ?>"><br>
New?:<br>
<input type="text" name="del_isnew" value="<? echo "$isnew" ?>"><br>
<input type="Submit" value="DELETE">
</form>

<?
++$i;
} 
?>

</P>

</div>

<div id="footer">
<?php include "../../footer.php" ?>
</div>
<div id="sidebar">
<?php include "../../sidebar.php" ?>
</div>
</div>
</div>

</body>
</html>