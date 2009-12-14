<?
include("dbinfo.php");
mysql_connect($hostname,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query="CREATE TABLE " . $tablename . "
(id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
name varchar(50) NOT NULL,
email varchar(100) NOT NULL,
site varchar(100) NOT NULL,
collecting varchar(40) NOT NULL,
birthday varchar(20) NOT NULL,
level varchar(20) NOT NULL,
prejoin varchar(5) NOT NULL,
isnew varchar(5) NOT NULL)";

mysql_query($query);
mysql_close();
echo "Table created";
?>