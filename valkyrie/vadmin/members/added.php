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