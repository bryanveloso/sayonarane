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
    <link rel="stylesheet" href="css/basics.css" type="text/css" media="screen" charset="utf-8">
</head>

<body>

<div id="container">
		<div id="header">
		  <p>V A L K Y R I E : a ragnarok online tcg</p>
		</div>
		
		<div id="content">
		  <div id="main">
			<h1>Cards » Puzzle Decks » Life</h1>
			A puzzle featuring Lif, the homonculus. Named after the meaning of her name in Old Norse.
			
			<p><div class="cardinfo"><img src="cards/puzzle00.gif" align="left" class="filler"><b>artist:</b> Lee Myoungjin<br>
			<b>masterable:</b> yes<br>
			<b># of cards:</b> 20<br>
			<b>worth:</b> 1</div></p>
			
		  <center><div class="puzdeck">
		  <p><img src="cards/life01.gif"><img src="cards/life02.gif"><img src="cards/life03.gif"><img src="cards/life04.gif"><br>
			<img src="cards/life05.gif"><img src="cards/life06.gif"><img src="cards/life07.gif"><img src="cards/life08.gif"><br>
			<img src="cards/life09.gif"><img src="cards/life10.gif"><img src="cards/life11.gif"><img src="cards/life12.gif"><br>
			<img src="cards/life13.gif"><img src="cards/life14.gif"><img src="cards/life15.gif"><img src="cards/life16.gif"><br>
			<img src="cards/life17.gif"><img src="cards/life18.gif"><img src="cards/life19.gif"><img src="cards/life20.gif"></p>
		  </div></center>
			
		  </div>
			<div id="info">
			<?php include "info.php" ?>
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