<?php
# header( "HTTP/1.1 301 Moved Permanently" );
# header( "Status: 301 Moved Permanently" );
# header( "Location: http://sayonarane.net/erised/" );
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
		  <h1></h1>
		  <p>V A L K Y R I E : a ragnarok online tcg</p>
		</div>
		
		<div id="content">
		  <div id="main">
			<h1>Games</h1>
		  <p>Earn cards by playing these games! Ready.. set.. GO!!</p>
		
			<center><p><table style="width: 500px;">
			<tr><td colspan="3" class="tablehead">Weekly</td></tr>
			<tr><td class="tablekey2">Game</td><td class="tablekey1">Description</td><td class="tablekey1">Updated</td></tr>
			<tr><td class="deckname"><a href="mana.php">game</a></td><td class="description">description here</td><td class="cardamount">xx/xx</td></tr>
			<tr><td colspan="3" class="tablehead">Biweekly</td></tr>
			<tr><td class="tablekey2">Game</td><td class="tablekey1">Description</td><td class="tablekey1">Updated</td></tr>
			<tr><td class="deckname"><a href="mana.php">game</a></td><td class="description">description here</td><td class="cardamount">xx/xx</td></tr>
			<tr><td colspan="3" class="tablehead">Monthly</td></tr>
			<tr><td class="tablekey2">Game</td><td class="tablekey1">Description</td><td class="tablekey1">Updated</td></tr>
			<tr><td class="deckname"><a href="mana.php">game</a></td><td class="description">description here</td><td class="cardamount">xx/xx</td></tr>
			</table></p></center>
		
		  </div>
			<div id="footer">
			<?php include "footer.php" ?>
		  </div>
			<div id="info">
			<?php include "info.php" ?>
		  </div>
		  <div id="sidebar">
			<?php include "sidebar.php" ?>
		  </div>
		</div>
</div>

</body>
</html>