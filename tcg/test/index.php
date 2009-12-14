<?php
	include "myTCGpost/config.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>... sayonara ne ... nee nana? ...</title>
	<!-- Date: 2006-08-31 -->

<!--	<script type="text/javascript" src="http://sayonarane.net/prototype.lite.js"></script>
	<script type="text/javascript" src="http://sayonarane.net/moo.fx.js"></script>
	<script type="text/javascript" src="http://sayonarane.net/moo.fx.pack.js"></script>
	<script type="text/javascript">
		// Initialise the effects
		var bloom, log;
		
		window.onload = function() {
			bloom = new fx.Combo('bloom', {height: true, opacity: true, duration: 0});
			log = new fx.Combo('log', {height: true, opacity: true, duration: 0});
			
			// Hide them to begin with
			bloom.hide();
			log.hide();
		}
	</script>-->
	
	<script language="JavaScript">  
	<!--  
	function expandIt(getIt){  
	 getIt.style.display=(getIt.style.display=="none")?"":"none";  
	 }  
	//-->  
	</script>

	<style type="text/css"> 
	
	body {
	background-color: #f0f1d1;
	background-image: url(http://sayonarane.net/layouts/nana/bg01.jpg);
	background-repeat: repeat-y;
	background-position: top left;
	font: 10px Verdana;
	color: #9e8b7a;
	margin: 0px;
	margin-top: 0px;
	margin-left: 0px;
	}
	
	#header {
	background-image: url(http://sayonarane.net/layouts/nana/header01.jpg);
	background-repeat: no-repeat;
	background-position: top left;
	height: 500px;
	}
	
	#content {
 	padding-top: 396px;
	padding-left: 10px;
	padding-right: 10px;
	text-align: justify;
	width: 580px;
	}
	
	#sidebar { 
	position: absolute;
	padding-left: 10px;
	padding-right: 10px;
	text-align: justify;
	top: 325px;
	left: 600px;
	width: 130px;	
	}
	
	h2 {
	letter-spacing: .4em;
	font-size:  14px;
	color:  #a87190;
	font-variant: small-caps;
	margin-top: 1px;
	margin-bottom: 1px;	
	}
	
	h3 {
	font: 10px Verdana;
	font-variant: small-caps;
	letter-spacing: .5em;
	margin-top: 1px;
	margin-bottom: 5px;	
	}
	
	h4 {
	font: 12px Verdana;
	color:  #a87190;
	font-variant: small-caps;
	letter-spacing: .5em;
	border-bottom: 1px dashed;
	margin-top: 5px;
	margin-bottom: 0px;	
	}
	
	#content img.plain {
	padding: 0px;
	background-color: transparent;	
	}
	
	#content img {
	padding: 3px;
	background-color: #9e8b7a;
	}
	
	#content div.group {
	padding: 3px 3px 1px;
	background-color: #9e8b7a;
	margin-top: 10px;
	margin-bottom: 10px;
	width: 381px;
	}
	
	#content div.group img {
	padding: 0;
	background-color: transparent;	
	}
	
	#content div.group2 {
	padding: 3px 3px 1px;
	background-color: #9e8b7a;
	margin-top: 10px;
	margin-bottom: 10px;
	width: 366px;
	}
	
	#content div.group2 img {
	padding: 0;
	background-color: transparent;	
	}
	
	b {
	color: #a87190;
	}
	i {
	color: #a87190;
	}
	u {
	color: #957793;
	}

	a:link {
	color:  #95b3a6;
	text-decoration: none;
	}
	a:active {
	color:  #a7beb4;
	text-decoration: none;
	}
	a:visited {
	color:  #95b3a6;
	text-decoration: none;
	}
	a:hover {
	color:  #a7beb4;
	border-bottom: 1px dashed #a7beb4;
	cursor: help;
	}
	
	table { margin-bottom: 10px; }
	
	ul { list-style: none; margin-top: 2px; padding: 0; }
	ul li { margin-bottom: 3px; }
	
	</style>
	
	<!--[if lt IE 7]>
	<style type="text/css">
	
	#content img {
	padding: 0px;
	border: 3px solid #9e8b7a;
	background-color: #9e8b7a;
	}
	
	#content div.group {
	padding: 3px 3px 1px;
	background-color: #9e8b7a;
	margin-top: 10px;
	margin-bottom: 10px;
	width: 422px;
	}
	
	#content div.group img {
	padding: 0px;
	border: 0px;
	background-color: transparent;	
	}
	
	#content img.plain {
	padding: 0px;
	border: 0px;
	background-color: transparent;
	}
	
	#sidebar { 
	position: absolute;
	padding-left: 10px;
	padding-right: 1px;
	text-align: justify;
	top: 325px;
	left: 600px;
	width: 130px;
	}
	
	ul { list-style: none; margin-top: 2px; margin-left: 0px; padding: 0; }
	ul li { margin-bottom: 3px; }
	
	</style>
	<![endif]-->
	
</head>
<body>
	
<div id="header">

	<div id="content">
		<center><a href="#mastered">mastered</a> ; <a href="#collecting">collecting</a> ; <a href="#trading">trading</a> ; <a href="#wishlist">wishlist</a> ; <a href="#log">trade log</a><br><br>
		<img src="badge_one01.png" class="plain"></center><br>
		<h4><?= $tcg_name ?>;</h4>
		<b>website:</b> <a href="http://uponadream.thetcgs.org/">once upon a dream</a> <b>name:</b> <?= $tcg_member_name ?> <b>level:</b> <?= $tcg_level ?> <b>card count:</b> <?= $tcg_cards_owned ?> <b>card worth:</b> <?= $tcg_cards_worth; ?><br>
		if you sign up, please put "iceymoon" as your referral. ^_^
		
		<h4 id="mastered">mastered;</h4>
		click on the master badge to see the deck!
		
		<!--<center> <a href="javascript:expandIt(document.getElementById('alice'))"></a>-->
		<p>none yet!</p>
		<!--</center>-->

		<h4 id="collecting">collecting;</h4>
			
		<p><b>the little mermaid</b> <u>unfortunate souls</u>: 003/015</p>
		
		<p><div class="group"><img src="filler00.gif"> <img src="filler00.gif"> <img src="filler00.gif"> <img src="filler00.gif"> <img src="filler00.gif"><br>
		<img src="unfortunatesouls06.gif"> <img src="filler00.gif"> <img src="filler00.gif"> <img src="filler00.gif"> <img src="unfortunatesouls10.gif"><br>
		<img src="filler00.gif"> <img src="filler00.gif"> <img src="filler00.gif"> <img src="filler00.gif"> <img src="unfortunatesouls15.gif"></div></p>
		
		<h4>keeping;</h4>
		
		<?= tcg_print_cards( $catCards = 3, $CardTpl = 1, $orderField = 1, $order = "ASC" ) ?>
		<?= tcg_print_cards( $catCards = 7, $CardTpl = 1, $orderField = 1, $order = "ASC" ) ?>
		
		<h4 id="trading">might trade;</h4>
		might trade for higher priorities (at my discretion).
		
		<?= tcg_print_cards( $catCards = 4, $CardTpl = 1, $orderField = 1, $order = "ASC" ) ?>
		
		<h4>trading;</h4>
		will trade for anything on my wishlist.
		
		<?= tcg_print_cards( $catCards = 5, $CardTpl = 1, $orderField = 1, $order = "ASC" ) ?>

		<h4>pending;</h4>
		hover to see why it's pending.

		<p>none right now.</p>

		<h4>my extras;</h4>
		will trade double for <u>anything</u>, but please let me choose from your trading section instead of offering me something random.
		
		<p><b>doubles:</b><p>
			
		<p>none right now.</p>
		
		<p><b>money:</b></p>
		
		<p>nonw right now.</p>

		<h4 id="wishlist">my wishlist;</h4><br>

		<p><b>aladdin</b> friend like me [med]<br>
		<b>aladdin</b> a whole new world [high]<br>
		<b>alice in wonderland</b> a world of my own [low]<br>
		<b>alice in wonderland</b> golden afternoon [low]<br>
		<b>anastasia</b> once upon a december [high]<br>
		<b>aristocats, the</b> scales &amp; arpeggios [low]<br>
		<b>beauty and the beast</b> that belle [low]<br>
		<b>beauty and the beast</b> beauty and the beast [high]<br>
		<b>cinderella</b> sweet nightingale [low]<br>
		<b>emperor's new groove, the</b> perfect world [low]<br>
		<b>hercules</b> i won't say (i'm in love) [med]<br>
		<b>hunchback of notre dame, the</b> esmeralda's dance [high]<br>
		<b>hunchback of notre dame, the</b> god help the outcasts [low]<br>
		<b>lion king, the</b> the circle of life [med]<br>
		<b>little mermaid, the</b> part of your world [high]<br>
		<b>little mermaid, the</b> poor unfortunate souls [high] **<br>
		<b>mulan</b> honor to us all [med]<br>
		<b>peter pan</b> you can fly! [low]<br>
		<b>pocahontas</b> colors of the wind [high]<br>
		<b>sleeping beauty</b> once upon a dream [med]<br>
		=-=-=-=-=-=-=-=-=-=-=-=<br>
		<i><b>aladdin</b> princess jasmine [low]<br>
		<b>beauty and the beast</b> belle [low]<br></i>
		=-=-=-=-=-=-=-=-=-=-=-=<br>
		<b>layouts</b> [high]<br>
		<b>events</b> [med]</p>

		<p><strike>strike</strike> = mastered<br>
		<i>italics</i> = might collect (unsure)</p>

		<p>[high/med/low] = priority level<br>
		* = currently soon<br>
		** = primary</p>

		<h4 id="log">trade/acquire log <a href="javascript:expandIt(document.getElementById('showlog'))">(click here)</a>;</h4>

		<div id="showlog" style="display:none">
		<p><?= $tcg_full_log ?></p>
		</div>
		<p>click above to see trade log.</p>
		
	</div>
	
	<div id="sidebar">
		<h2>me;</h2>
		<a href="http://sayonarane.net/atashi/">a t a s h i<br>
		<a href="http://moon_of_ice.livejournal.com/profile/" target="_new">l i v e j o u r n a l</a><br>
		<a href="http://sayonarane.net/fan/">f a n l i s t, e t c.</a><br>
		b l o g ?<br>
		
		<h2>tcg's;</h2>
		<ul>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif05.png" align="top"> <a href="http://sayonarane.net/tcg/bookworm/">b o o k w o r m!</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif04.png" align="top"> <a href="http://sayonarane.net/tcg/genki/">g e n k i b e a m !</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif04.png" align="top"> <a href="http://sayonarane.net/tcg/afternoon/">g o l d e n<br>a f t e r n o o n</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif05.png" align="top"> <a href="http://sayonarane.net/tcg/masami/">m a s a m i</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif04.png" align="top"> <a href="http://sayonarane.net/tcg/moonlight/">m o o n l i g h t<br>l e g e n d</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif04.png" align="top"> <a href="http://sayonarane.net/tcg/upon/">o n c e u p o n<br>a d r e a m</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif04.png" align="top"> <a href="http://sayonarane.net/tcg/academy/">t r a d i n g<br>a c a d e m y</a></li>
		</ul>
		<p><span style="font-size: 8px"><b>&hearts;</b></span> <a href="http://sayonarane.net/tcg/trade/">t r a d e ?</a></p>
		<h3><b>inactive;</b></h3>
		<ul>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif02.png" align="top"> <a href="http://sayonarane.net/tcg/caelestis/">c a e l e s t i s</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif02.png" align="top"> <a href="http://sayonarane.net/tcg/dramatic/">d r a m a t i c</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif02.png" align="top"> <a href="http://sayonarane.net/tcg/dumbledore/">d u m b l e d o r e' s<br>a r m y</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif02.png" align="top"> <a href="http://sayonarane.net/tcg/dreams/">i n d r e a m s</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif02.png" align="top"> <a href="http://sayonarane.net/tcg/odulation/">o d u l a t i o n !</a></li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif02.png" align="top"> <a href="http://sayonarane.net/tcg/once/">o n c e</a></li>
		</ul>
		<h3><b>lotus key;</b></h3>
		<ul>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif04.png" align="top"> = active tcg</li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif05.png" align="top"> = less active tcg</li>
		<li><img src="http://sayonarane.net/layouts/nana/lotus_gif02.png" align="top"> = dead / closed tcg</li>
		</ul>
		<h2>site;</h2>
		<a href="http://sayonarane.net/home/">u p d a t e s</a><br>
		<a href="http://sayonarane.net/sayonara/">s a y o n a r a ?<br>
		<a href="http://sayonarane.net/resources/">r e s o u r c e s<br>
		<a href="http://sayonarane.net/link/">l i n k  i n &amp; o u t</a>
		</div>
</div>	

</body>
</html>