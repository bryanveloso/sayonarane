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
			<h1>Cards » Puzzle Decks » Dusk</h1>
			A puzzle featuring a wizard, a monk, a knight and a blacksmith up against the light of <b>dusk</b>.
			
			<p><div class="cardinfo"><img src="cards/puzzle00.gif" align="left" class="filler"><b>artist:</b> ?<br>
			<b>masterable:</b> yes<br>
			<b># of cards:</b> 20<br>
			<b>worth:</b> 1</div></p>
			
		  <center><div class="puzdeck">
		  <p><img src="cards/dusk01.gif"><img src="cards/dusk02.gif"><img src="cards/dusk03.gif"><img src="cards/dusk04.gif"><img src="cards/dusk05.gif"><br>
			<img src="cards/dusk06.gif"><img src="cards/dusk07.gif"><img src="cards/dusk08.gif"><img src="cards/dusk09.gif"><img src="cards/dusk10.gif"><br>
			<img src="cards/dusk11.gif"><img src="cards/dusk12.gif"><img src="cards/dusk13.gif"><img src="cards/dusk14.gif"><img src="cards/dusk15.gif"><br>
			<img src="cards/dusk16.gif"><img src="cards/dusk17.gif"><img src="cards/dusk18.gif"><img src="cards/dusk19.gif"><img src="cards/dusk20.gif"></p>
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