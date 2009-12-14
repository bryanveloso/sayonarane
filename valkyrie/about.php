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
			<h1>About</h1>
		  <p>Welcome to <em>Valkyrie</em>, a Ragnarok Online TCG!</p>
			
			<h3>About Trading Card Games</h3>
			<p>A TCG is an online <b>Trading Card Game</b>. Online TCG's are all about collecting. Cards are divided into decks, and your objective is to collect the decks that you like!</p>
			
			<p>When you collect all cards in a deck, you are considered a <i>master</i> of that deck and you receive rewards for completing it! TCG's also have <i>levels</i>, which are based on the number of cards you have. When you reach a certain number of cards, you can level up and receive rewards for that, too!</p>
			
			<h3>About Valkyrie</h3>
			<p>Valkyrie is a TCG about <a href="http://en.wikipedia.org/wiki/Ragnarok_Online">Ragnarok Online</a> (RO), a wonderful and popular <a href="http://en.wikipedia.org/wiki/Massively_multiplayer_online_role-playing_game">MMORPG</a> by Gravity.</p>
			
			<p>Although some of <a href="http://en.wikipedia.org/wiki/Ragnarok_Online_2:_The_Gate_of_the_World">RO2</a> will be covered by decks and games, the main focus of Valkyrie will be the original game. Members will not be required to join any servers to play this TCG, but since this is one of the <b>only</b> subjects in a TCG that would allow for cool features to be done through an online game, I thought it would be a waste not to take advantage of that fact! So there will be some extra activities and challenges done through RO itself. ^^</p>
			
			<p>Valkyrie's extra activities will be done through <a href="http://projectrenova.com/">Renova</a>, a private server, because it is the one I own, and so I can create games and scripts specifically for this TCG, as well as ensure nobody is cheating. I apologize to those who this is inconvenient for, but the more I thought about it the more I realized using a specific server would create less limits.</p>
			
			<h3>Classes</h3>
			<p>Valkyrie incorporates job classes into the game. When you join, you choose a class (which you can change anytime, but at a price). As you gain regular levels, your job class also levels up (think of it like base level and job level in RO). When you reach certain milestones, you get rewards!</p>
			
			<p>But leveling isn't the only purpose of having a class system. ;] The class you pick will have unique skills specific to them only, which will provide different advantages and disadvantages to the way you play the game, just like it works in RO! The skills you can use will aid you with different ways of earning cards (and other things) in the TCG, so be sure to find out more about the what each class has to offer, <a href="classes.php">here</a>, before joining!</p>
		
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
