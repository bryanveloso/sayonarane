<?php
# header( "HTTP/1.1 301 Moved Permanently" );
# header( "Status: 301 Moved Permanently" );
# header( "Location: http://sayonarane.net/layouts/konchan/" );
# exit(0); // This is Optional but suggested, to avoid any accidental output
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>さようなら ね・・・ { SAYONARANE.net ・・・ index ・・・ v.2 KONchan  ☆ paraDISE }</title>
  <link rel="stylesheet" href="/layouts/konchan/master.css" type="text/css" media="screen" charset="utf-8">

    <link rel="openid.server" href="http://sayonarane.net/id.php">
    <link rel="openid.delegate" href="http://sayonarane.net/id.php">
	
</head>
<body>

<div id="container">
	
	<?php include "/home/revyver/webapps/sayonarane/header.php" ?>

	<div id="content">
		<div id="main">
		<h4>credits</h4>
		thanks to...
		<p><a href="http://clavis-sama.com/">clavis-sama</a> for the randomizer script (used in header)<br>
		<a href="http://www.tutorialtastic.co.uk/">tutorialtastic</a> for the contact form script<br>
		<a href="http://istockphoto.com/">istock</a> for the polaroid picture base (in header)</a><br>
		<a href="http://bryanveloso.com/">my fiancé</a> for help with CSS and PHP<br>
		and <a href="http://wiki.theppn.org/Hello!_Project/">Hello! Project</a> for Konno Asami &hearts;</p>
		
		</div>

		<div id="footer">
		<?php include "/home/revyver/webapps/sayonarane/footer.php" ?>
	  </div>

		<div id="sidebar">
		<?php include "/home/revyver/webapps/sayonarane/sidebar.php" ?>
	  </div>

	</div>
</div>	

</body>
</html>