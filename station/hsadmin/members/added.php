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
			<h1>Member Admin: Added</h1>
<?
include("dbinfo.php");
mysql_connect($hostname,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$name=mysql_real_escape_string($_POST['name']);
$email=mysql_real_escape_string($_POST['email']);
$site=mysql_real_escape_string($_POST['site']);
$collecting=mysql_real_escape_string($_POST['collecting']);
$birthday=mysql_real_escape_string($_POST['birthday']);
$level=mysql_real_escape_string($_POST['level']);
$prejoin=mysql_real_escape_string($_POST['prejoin']);
$isnew=mysql_real_escape_string($_POST['isnew']);

$query = "INSERT INTO " . $tablename . " VALUES
('','$name','$email','$site','$collecting','$birthday','$level',
'$prejoin','$isnew')";
mysql_query($query);
echo "Record Added!<br>\n";
mysql_close();
?>
<a href="index.php">Back to managing members</a>

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