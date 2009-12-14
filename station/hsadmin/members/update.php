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
			
			<h1>Member Admin: Update</h1>
			
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
			$isnew=mysql_result($result,$i,"isnew");
			?>

			<form action="updated.php" method="post">
			<input type="hidden" name="ud_id" value="<? echo "$id"; ?>">

			<table>

			<tr>
			<td>Name:</td>
			<td><input type="text" name="ud_name" value="<? echo "$name"; ?>" size=30></td>
			</tr>

			<tr>
			<td>Email:</td>
			<td><input type="text" name="ud_email" value="<? echo "$email"; ?>" size=30></td>
			</tr>

			<tr>
			<td>Site:</td>
			<td><input type="text" name="ud_site" value="<? echo "$site"; ?>" size=50></td>
			</tr>

			<tr>
			<td>Collecting:</td>
			<td><input type="text" name="ud_collecting" value="<? echo "$collecting"; ?>" size=30></td>
			</tr>

			<tr>
			<td>Birthday:</td>
			<td><input type="text" name="ud_birthday" value="<? echo "$birthday"; ?>" size=30></td>
			</tr>

			<tr>
			<td>
			Level:</td>
			<td><select name="ud_level">
				<option value="<? echo "$level"; ?>" selected="selected"><? echo "$level"; ?></option>
				<option value="one" selected="selected">one</option>
				<option value="two">two</option>
				<option value="three">three</option>
				<option value="four">four</option>
				<option value="five">five</option>
				<option value="six">six</option>
				<option value="inactive">inactive</option>
				<option value="hiatus">hiatus</option>
				</select></td>
			</tr>

			<tr>
			<td>
			New?:</td>
			<td><select name="ud_isnew">
				<option value="<? echo "$isnew"; ?>" selected="selected"><? echo "$isnew"; ?></option>
				<option value="no">no</option>
				<option value="yes">yes</option>
				</select></td>
			</tr>

			</table>

			<input type="Submit" value="Update">
			</form>

			<?
			++$i;
			}
			?>
		
		
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