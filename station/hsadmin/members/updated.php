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
			<h1>Member Admin: Updated</h1>

<P>

<?
include("dbinfo.php");
mysql_connect($hostname,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$ud_id=mysql_real_escape_string($_POST['ud_id']);
$ud_name=mysql_real_escape_string($_POST['ud_name']);
$ud_email=mysql_real_escape_string($_POST['ud_email']);
$ud_site=mysql_real_escape_string($_POST['ud_site']);
$ud_collecting=mysql_real_escape_string($_POST['ud_collecting']);
$ud_birthday=mysql_real_escape_string($_POST['ud_birthday']);
$ud_level=mysql_real_escape_string($_POST['ud_level']);
$ud_prejoin=mysql_real_escape_string($_POST['ud_prejoin']);
$ud_isnew=mysql_real_escape_string($_POST['ud_isnew']);

$query="UPDATE " . $tablename . " SET name='$ud_name', email='$ud_email', site='$ud_site', collecting='$ud_collecting', birthday='$ud_birthday', level='$ud_level', prejoin='$ud_prejoin', isnew='$ud_isnew' WHERE id='$ud_id'";
mysql_query($query);
echo "Record Updated<br>\n";
mysql_close();
?>
<a href=index.php>Back to managing members</a>

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