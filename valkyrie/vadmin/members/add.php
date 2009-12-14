<?php
# header( "HTTP/1.1 301 Moved Permanently" );
# header( "Status: 301 Moved Permanently" );
# header( "Location: http://sayonarane.net/valkyrie/" );
# exit(0); // This is Optional but suggested, to avoid any accidental output
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>V A L K Y R I E : a ragnarok online tcg</title>
    <link rel="stylesheet" href="../../css/basics.css" type="text/css" media="screen" charset="utf-8">
</head>

<body>

<div id="container">
		<div id="header">
		  <h1></h1>
		  <p>V A L K Y R I E : a ragnarok online tcg</p>
		</div>
		
		<div id="content">
		  <div id="main">
			<h1>Member Admin: Add</h1>
			
		  <form action="added.php" method="post">
			Name:<br>
			<input type="text" name="name"><br>
			Email:<br>
			<input type="text" name="email"><br>
			Site:<br>
			<input type="text" name="site"><br>
			Collecting:<br>
			<input type="text" name="collecting"><br>
			Birthday:<br>
			<input type="text" name="birthday"><br>
			Level: <select name="level">
				<option value="one" selected="selected">one</option>
				<option value="two">two</option>
				<option value="three">three</option>
				<option value="four">four</option>
				<option value="five">five</option>
				<option value="six">six</option>
				<option value="inactive">inactive</option>
				<option value="hiatus">hiatus</option>
				</select><br>
			<input type="hidden" name="prejoin" value="true">
			<input type="hidden" name="isnew" value="true">
			<input type="Submit">
			</form>
		
		
		  </div>
			<div id="footer">
			<?php include "../../footer.php" ?>
		  </div>
			<div id="info">
			<?php include "../../info.php" ?>
		  </div>
		  <div id="sidebar">
			<?php include "../../sidebar.php" ?>
		  </div>
		</div>
</div>

</body>
</html>
