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
		  <p>V A L K Y R I E : a ragnarok online tcg</p>
		</div>
		
		<div id="content">
		  <div id="main">
				<h1>the cards</h1>
				Now here's what everyone <i>really</i> cares about: the cards!

			  <center><p><table style="width: 500px;">
				<tr><td colspan="4" class="tablehead">Classes</td></tr>
				<tr><td class="tablekey1">Description</td><td class="tablekey2">Deck Name</td><td class="tablekey2">Amount</td><td class="tablekey1">Worth</td></tr>
				<tr><td class="description">High Priestess <i>(female)</i></td><td class="deckname"><a href="mana.php">mana</a></td><td class="cardamount">15</td><td class="worth">1</td></tr>
				<tr><td colspan="4" class="tablehead">Puzzle Decks</td></tr>
				<tr><td class="tablekey1">Description</td><td class="tablekey2">Deck Name</td><td class="tablekey2">Amount</td><td class="tablekey1">Worth</td></tr>
				<tr><td class="description">A groom carries his bride.</td><td class="deckname"><a href="bride.php">bride</a></td><td class="cardamount">20</td><td class="worth">1</td></tr>
				<tr><td class="description">Lif with leaves, floating above Lighthalzen.</td><td class="deckname"><a href="life.php">life</a></td><td class="cardamount">20</td><td class="worth">1</td></tr>
				<tr><td class="description">Loli Ruri floats above Nifflheim.</td><td class="deckname"><a href="loli.php">loli</a></td><td class="cardamount">20</td><td class="worth">1</td></tr>
				<tr><td class="description">A party posing in the light of dusk.</td><td class="deckname"><a href="dusk.php">dusk</a></td><td class="cardamount">20</td><td class="worth">1</td></tr>
				<tr><td class="description">A party framed by the sky.</td><td class="deckname"><a href="sky.php">sky</a></td><td class="cardamount">20</td><td class="worth">1</td></tr>
				<tr><td class="description">Valkyrie's prejoin deck.</td><td class="deckname"><a href="prejoin.php">prejoin</a></td><td class="cardamount">20</td><td class="worth">1</td></tr>
				<tr><td colspan="4" class="tablehead">Member Decks</td></tr>
				<tr><td class="tablekey1">Description</td><td class="tablekey2">Deck Name</td><td class="tablekey2">Amount</td><td class="tablekey1">Worth</td></tr>
				<tr><td class="description">OotP: Luna Lovegood's funny quotes</td><td class="deckname"><a href="">nargles</a></td><td class="cardamount">00</td><td class="worth">1</td></tr>
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
