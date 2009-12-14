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
			<h1>Welcome!</h1>
		  <p>Welcome to <b>Heart Station</b>, a TCG dedicated to all things J-Music!</p>
			
			<p>This TCG is just in it's beginning stages, but you can help it along! We're in need of screen captures of PV's to make decks out of. Visit the <a href="donate.php">donate</a> page for more information!</p>
			
			<p>The <a href="forums/">forums</a> are currently up and running. Updates on the status of the TCG will be posted their for now. Please join if you're interested in the future of this TCG! ^^</p>
			
			<p>See <a href="cards.php">the cards</a> section for an example of our card template.</p>
		
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
