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
	<title>Heart Station &hearts; a jmusic tcg</title>
    <link rel="stylesheet" href="css/basics.css" type="text/css" media="screen" charset="utf-8">
</head>

<body>

<div id="container">
		<div id="header">
		  <!--<h1></h1>-->
		  <p>Heart Station &hearts; a jmusic tcg</p>
		</div>
		
		<div id="content">
		  <div id="main">
			<h1>Credits</h1>
		  <p>A TCG can't be created all by yourself, so this is a place to thank and credit every resource that has helped!</p>
			
			<p><a href="http://tcgobsessed.pathofstardust.net/" target="_new">TCG Obsessed</a> : for the wonderful card template!<br>
			<a href="http://clavis-sama.com/" target="_new">In The Cards</a> : for the awesome member list manager!</p>
		
		  </div>
		
			<div id="footer">
			<?php include "footer.php" ?>
		  </div>
		  <div id="sidebar">
			<?php include "sidebar.php" ?>
		  </div>
		</div>
</div>

</body>
</html>
