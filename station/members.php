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
			<h1>Members</h1>
		  <?
			include("/home/237/domains/sayonarane.net/html/station/hsadmin/members/dbinfo.php");
			mysql_connect($hostname,$user,$password);
			@mysql_select_db($database) or die( "Unable to select database");
			$query="SELECT * FROM " . $tablename . " ORDER BY level ASC, name ASC";
			$result=mysql_query($query);
			$num=mysql_numrows($result);
			mysql_close();
			?>
			
			<p><a href="http://english-79889225060.spampoison.com"><img src="http://pics3.inxhost.com/images/sticker.gif" border="0" width="80" height="15"/></a></p>
			<p>Here you can find the full list of current members!</p>
			
			<!-- to make more levels, copy and paste from here -->

			<h3>First Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="first") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>

			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Secret Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="secret") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>

			</table>
			</center>
			</p>

			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Deep Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="deep") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Simple Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="simple") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Sakura Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="sakura") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Ultra Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="ultra") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Colors Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="colors") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Passion Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="passion") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Kuma Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="kuma") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Life Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="life") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Beautiful Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="beautiful") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Kiss&amp;Cry Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="kisscry") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Gold Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="gold") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Love Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			
			
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="love") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>
			
			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
			
			<h3>Heart Station</h3>

			<p>
			<center>
			<table class="members">
			<tr>
			<td class="membername">Name</td>
			<td class="memberhead">@</td>
			<td class="memberhead">www</td>
			<td class="membername">Deck</td>
			<td class="memberhead">Sign</td>
			</tr>

			<?
			$i=0;
			while ($i < $num) {
			$name=mysql_result($result,$i,"name");
			$email=mysql_result($result,$i,"email");
			$site=mysql_result($result,$i,"site");
			$collecting=mysql_result($result,$i,"collecting");
			$birthday=mysql_result($result,$i,"birthday");
			$level=mysql_result($result,$i,"level");
			$prejoin=mysql_result($result,$i,"prejoin");
			$isnew=mysql_result($result,$i,"isnew");
			$id=mysql_result($result,$i,"id");

			if ($level=="heart") { ?>
			<tr>
			<td class="membernametr"><? if ($prejoin=="true") { ?><img src="/station/layout/prejoin.gif"><? } ?> <? if ($isnew=="true") { ?><img src="/station/layout/new.gif"><? } ?> <?echo "$name"; ?></td>
			<td class="membertr"><a href="mailto:<? echo "$email"; ?>">@</a></td>
			<td class="membertr"><a href="<? echo "$site"; ?>" target="_new">www</a></td>
			<td class="membernametr"><a href="<? echo "$collecting"; ?>.php" target="_new"><? echo "$collecting"; ?></a></td>
			<td class="membertr"><? echo "$birthday"; ?></td>
			
			
			</tr>
			<?
			} // end if (for level)
			++$i;
			} // end while (for reading from database)
			?>

			</table>
			</center>
			</p>
			
			<!-- to here and change the level in the h3 tag and in $level=="###" -->
		
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
