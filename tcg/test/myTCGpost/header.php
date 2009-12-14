<?php
/*
 *
 * Created on 16 avril 2006 by lollie
 *
 * Qbee Admin
 *
 *
 */
// On demarre la session
session_start();

// On teste si une session a deja ete ouverte
// Si oui $ok doit etre egal a "ok", sinon on redirige vers la page de login
$ok = (isset($_SESSION['loginOK']) && !empty($_SESSION['loginOK']))?$_SESSION['loginOK']:'';
if($ok == '') header('location: index.html');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>myTCGpost! Admin panel</title>
<meta http-equiv="content-type" content="application/xhtml+xml;
charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />

<script type="text/javascript">
<!--
function popimage(img) {
titre="Wide size";
w=open("",'image','width=400,height=300,toolbar=no,scrollbars=no,resizable=yes');
//w.document.write("<script type='text/javascript'>function checksize() { if (document.images[0].complete) { window.resizeTo(document.images[0].width+10,document.images[0].height+30); window.focus();} else { settimeout('checksize()',250) } }</"+"script>");
w.document.write("<body onblur='window.close()' onclick='window.close()' topmargin=0 leftmargin=0  marginwidth=0 marginheight=0>");
w.document.write("<img src='"+img+"' border='0' alt='image' />");
w.document.close();
}

function CheckLen(Target, Champ)
{
StrLen = Target.value.length
if (StrLen > 250 )
{
Target.value = Target.value.substring(0,250);
CharsLeft = 250;
}
else
{
CharsLeft = StrLen;
}
var CharsLeft1 = 250 - CharsLeft;
document.forms['templates'].elements[Champ].value = CharsLeft1;
}

function GereControle(Controleur, Controle, Status) {
var objControleur = document.getElementById(Controleur);
var objControle = document.getElementById(Controle);
	if (Status=='1')
		objControle.style.visibility=(objControleur.checked==true)?'visible':'hidden';
	else
		objControle.style.visibility=(objControleur.checked==true)?'hidden':'visible';
	return true;
}
//-->
</script>

</head>
<body>

<div id="conteneur">
	  <div id="header">
		  <h1><img src="images/logo.gif" alt="myTCGpost! Admin panel" /> myTCGpost! Admin panel</h1>
	  </div>

	  <div id="haut">
		<ul class="menuhaut">
		<li>
		[ <a href="../index.php">View TCG post</a> ]
		</li>
		<li>
		[ <a href="settings.php">Settings</a> ]
		</li>
		<li>
		[ <a href="logout.php">Log out</a> ]
		</li>
		</ul>
	  </div>

	  <div id="gauche">
	     <ul class="menugauche">
		<li>
		<a href="index.php">Home</a>
		</li>
		<li>
		<a href="card.php">Cards</a>
		</li>
		<li>
		<a href="token.php">Tokens</a>
		</li>
		<li>
		<a href="category.php">Categories</a>
		</li>
		<li>
		<a href="collection.php">Collections</a>
		</li>
		<li>
		<a href="mastered.php">Mastered</a>
		</li>
		<li>
		<a href="template.php">Templates</a>
		</li>
		<li>
		<a href="profile.php">Profile</a>
		</li>
		<li>
		<a href="tradelog.php">Tradelog</a>
		</li>
		</ul>
	  </div>

  	<div id="centre">