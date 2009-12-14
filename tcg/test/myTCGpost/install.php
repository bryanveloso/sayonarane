<?php
/******************************************************************************
  DATABASE VARIABLES
******************************************************************************/
$db_server = '';
$db_user = '';
$db_password = '';
$db_database = '';

$prefix = "tcg_";

/**********************************************************************************************
  ____   ___    _   _  ___ _____   _____ ____ ___ _____   ____  _____ _     _____        __  _
 |  _ \ / _ \  | \ | |/ _ \_   _| | ____|  _ \_ _|_   _| | __ )| ____| |   / _ \ \      / / | |
 | | | | | | | |  \| | | | || |   |  _| | | | | |  | |   |  _ \|  _| | |  | | | \ \ /\ / /  | |
 | |_| | |_| | | |\  | |_| || |   | |___| |_| | |  | |   | |_) | |___| |___ |_| |\ V  V /   |_|
 |____/ \___/  |_| \_|\___/ |_|   |_____|____/___| |_|   |____/|_____|_____\___/  \_/\_/    (_)

**********************************************************************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>myTCGpost! control panel Installation</title>
<meta http-equiv="content-type" content="application/xhtml+xml;
charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div id="conteneur">
	  <div id="header">
		  <h1><img src="images/logo.gif" alt="myTCGpost!" /> myTCGpost!</h1>
	  </div>

	  <div id="haut">
	  </div>

  	<div id="centre">

<?php

if( isset( $_POST['installing'] ) ) {

// On teste si les 2 mots de passe saisis sont identiques
if( $password == $password2 ) {


	// recuperation des variables saisies dans le formulaire
	$login     = (isset($_POST['login']) && !empty($_POST['login']))?$_POST['login']:'';
	$password  = (isset($_POST['password']) && !empty($_POST['password']))?$_POST['password']:'';
	$email     = (isset($_POST['email']) && !empty($_POST['email']))?$_POST['email']:'';
	$root_path = (isset($_POST['root_path']) && !empty($_POST['root_path']))?$_POST['root_path']:'';
	$url       = (isset($_POST['url']) && !empty($_POST['url']))?$_POST['url']:'';
	$dir_card  = (isset($_POST['dir_card']) && !empty($_POST['dir_card']))?$_POST['dir_card']:'';
	$dir_token = (isset($_POST['dir_token']) && !empty($_POST['dir_token']))?$_POST['dir_token']:'';
	$dir_badge = (isset($_POST['dir_badge']) && !empty($_POST['dir_badge']))?$_POST['dir_badge']:'';

	// Cryptage password
	$pass = md5($password);

	// try to connect to the database
	$db_link = mysql_connect( $db_server, $db_user, $db_password )
	or die( '<p>Cannot connect to the database. Make sure you have entered the proper values for the database in the <code>config.php</code> file.</p>' );
	mysql_select_db( $db_database )
	or die( '<p>Cannot connect to the database. Make sure you have entered the proper values for the database in the <code>config.php</code> file.</p>' );



	// create card table
	$query = "CREATE TABLE `" . $prefix . "card` (" .
		'`idCard` int(4) NOT NULL auto_increment,' .
		'`card` varchar(100) NOT NULL default \'\',' .
		'`idCategorie` int(4) NOT NULL default \'0\',' .
		'`worth` int(4) NOT NULL default \'1\', ' .
		'PRIMARY KEY  (`idCard`)' .
		') TYPE=MyISAM AUTO_INCREMENT=1';

	$query_ok = mysql_query( $query );
	if( !$query_ok )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $query . '</p>';
	else echo "<p><img src=\"images/puce.gif\" /> Table " . $prefix . "card2 created!</p>";


	// create category table
	$query = "CREATE TABLE `" . $prefix . "category` (" .
		'`idCategory` int(4) NOT NULL auto_increment,' .
		'`name` varchar(100) NOT NULL default \'\',' .
		'PRIMARY KEY  (`idCategory`)' .
		') TYPE=MyISAM AUTO_INCREMENT=1';

	$query_ok = mysql_query( $query );
	if( !$query_ok )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $query . '</p>';
	else echo "<p><img src=\"images/puce.gif\" /> Table " . $prefix . "category created!</p>";


	// On cree les categories par defaut
	$queryadd = "INSERT INTO `" . $prefix . "category` VALUES (1, 'Currently Collecting')";
	$query_add = mysql_query( $queryadd );

		if( !$query_add )
	echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $queryadd . '</p>';

	// On cree les categories par defaut
	$queryadd = "INSERT INTO `" . $prefix . "category` VALUES (2, 'Mastered Collections')";
	$query_add = mysql_query( $queryadd );

		if( !$query_add )
	echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $queryadd . '</p>';

	// create collection table
	$query = "CREATE TABLE `" . $prefix . "collection` (" .
		'`idCollection` int(4) NOT NULL auto_increment,' .
		'`name` varchar(50) NOT NULL default \'\',' .
		'`deck` varchar(100) NOT NULL default \'\',' .
		'`filler` varchar(100) default NULL,' .
		'`nbCards` int(4) NOT NULL default \'0\',' .
		'`cardList` varchar(250) NOT NULL default \'\',' .
		'`idTemplate` int(4) NOT NULL default \'0\',' .
		'PRIMARY KEY  (`idCollection`)' .
		') TYPE=MyISAM AUTO_INCREMENT=1';

	$query_ok = mysql_query( $query );
	if( !$query_ok )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $query . '</p>';
	else echo "<p><img src=\"images/puce.gif\" /> Table " . $prefix . "collection created!</p>";


	// create mastered table
	$query = "CREATE TABLE `" . $prefix . "mastered` (" .
		'`idMastered` int(4) NOT NULL auto_increment,' .
		'`name` varchar(50) NOT NULL default \'\',' .
		'`deck` varchar(100) NOT NULL default \'\',' .
		'`nbCards` int(4) NOT NULL default \'0\',' .
		'`card` varchar(100) NOT NULL default \'\',' .
		'`idTemplate` int(4) NOT NULL default \'0\',' .
		'PRIMARY KEY  (`idMastered`)' .
		') TYPE=MyISAM AUTO_INCREMENT=1';

	$query_ok = mysql_query( $query );
	if( !$query_ok )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $query . '</p>';
	else echo "<p><img src=\"images/puce.gif\" /> Table " . $prefix . "mastered created!</p>";



	// create profile table
	$query = "CREATE TABLE `" . $prefix . "profile` (" .
		'`tcgName` varchar(100) NOT NULL default \'\',' .
		'`tcgUrl` varchar(150) NOT NULL default \'\',' .
		'`name` varchar(100) NOT NULL default \'\',' .
		'`level` varchar(100) NOT NULL default \'\',' .
		'`lvImage` varchar(50) NOT NULL default \'\',' .
		'`wishlist` varchar(250) default NULL,' .
		'`mastered` int(1) NOT NULL default \'1\',' .
		'`masterPage` varchar(50) NOT NULL default \'mastered.php\'' .
		') TYPE=MyISAM';

	$query_ok = mysql_query( $query );
	if( !$query_ok )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $query . '</p>';
	else echo "<p><img src=\"images/puce.gif\" /> Table " . $prefix . "profile created!</p>";

	// On cree le profil
	$queryadd = "INSERT INTO `" . $prefix . "profil` VALUES ('', '', '', '', '', NULL, '1', '')";
	$query_add = mysql_query( $queryadd );

	if( !$query_add )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $queryadd . '</p>';



	// create settings table
	$query = "CREATE TABLE `" . $prefix . "settings` (" .
		'`login` varchar(50) NOT NULL default \'\',' .
		'`password` varchar(200) NOT NULL default \'\',' .
		'`email` varchar(100) NOT NULL default \'\',' .
		'`format` varchar(5) NOT NULL default \'.gif\',' .
		'`defaultFiller` varchar(100) NOT NULL default \'\',' .
		'`nbCardDesk` int(4) NOT NULL default \'0\',' .
		'`rootPath` varchar(250) NOT NULL default \'\',' .
		'`url` varchar(250) NOT NULL default \'\',' .
		'`cardDir` varchar(250) NOT NULL default \'\',' .
		'`tokenDir` varchar(250) NOT NULL default \'\',' .
		'`masteredDir` varchar(250) NOT NULL default \'\'' .
		') TYPE=MyISAM';

	$query_ok = mysql_query( $query );
	if( !$query_ok )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $query . '</p>';
	else echo "<p><img src=\"images/puce.gif\" /> Table " . $prefix . "settings created!</p>";


	// On insere les donnees saisies dans le formulaire
	$queryadd = "INSERT INTO `" . $prefix . "settings` VALUES ('" . $login . "', '" . $pass . "', '" . $email . "', '.gif', '', 0, '" . $root_path . "', '" . $url . "', '" . $dir_card . "', '" . $dir_token . "', '" . $dir_badge . "')";
	$query_add = mysql_query( $queryadd );

	if( !$query_add )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $queryadd . '</p>';


	// create template table
	$query = "CREATE TABLE `" . $prefix . "template` (" .
		'`idTemplate` int(4) NOT NULL auto_increment,' .
		'`name` varchar(50) NOT NULL default \'\',' .
		'`ColsNum` int(4) NOT NULL default \'0\',' .
		'`start` varchar(250) NOT NULL default \'\',' .
		'`startLine` varchar(250) NOT NULL default \'\',' .
		'`beCard` varchar(250) NOT NULL default \'\',' .
		'`afCard` varchar(250) NOT NULL default \'\',' .
		'`endLine` varchar(250) NOT NULL default \'\',' .
		'`end` varchar(250) NOT NULL default \'\',' .
		'PRIMARY KEY  (`idTemplate`)' .
		') TYPE=MyISAM AUTO_INCREMENT=1';

	$query_ok = mysql_query( $query );
	if( !$query_ok )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $query . '</p>';
	else echo "<p><img src=\"images/puce.gif\" /> Table " . $prefix . "template created!</p>";


	// create token table
	$query = "CREATE TABLE `" . $prefix . "token` (" .
		'`idToken` int(4) NOT NULL auto_increment,' .
		'`name` varchar(50) NOT NULL default \'\',' .
		'`image` varchar(100) NOT NULL default \'\',' .
		'`number` int(4) NOT NULL default \'0\',' .
		'PRIMARY KEY  (`idToken`)' .
		') TYPE=MyISAM AUTO_INCREMENT=1';

	$query_ok = mysql_query( $query );
	if( !$query_ok )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $query . '</p>';
	else echo "<p><img src=\"images/puce.gif\" /> Table " . $prefix . "token created!</p>";


	// create tradelog table
	$query = "CREATE TABLE `" . $prefix . "tradelog` (" .
		'`idTradelog` int(4) NOT NULL auto_increment,' .
		'`month` varchar(50) NOT NULL default \'\',' .
		'`log` text NOT NULL default \'\',' .
		'PRIMARY KEY  (`idTradelog`)' .
		') TYPE=MyISAM AUTO_INCREMENT=1';

	$query_ok = mysql_query( $query );
	if( !$query_ok )
		echo '<p>Query unsuccessful: ' . mysql_error() . ' ' . $query . '</p>';
	else echo "<p><img src=\"images/puce.gif\" /> Table " . $prefix . "tradelog created!</p>";

	mysql_close();

}
// Le 2 mots de passe saisis sont différents
else {
echo "<p>The two passwords are different please go <a href=\"javascript:history.back()\">back</a> and check them.</p>";
}

}
else {
?>

<h2>Welcome to myTCGpost control panel Installation</h2>
<p>Welcome to <a href="http://www.lollie.fr">myTCGpost!</a> control panel installation, the TCG post management system.<br /> Make sure you have properly entered the database settings in the <code>config.php</code> file before begin this setup.</p>
<br />
<form name="install" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
<tr><td class="pair">Login</td></tr><tr><td><input name="login" type="text" size="50" maxlength="100" /></td></tr>
<tr><td class="pair">Password</td></tr><tr><td>
Password used to log into your control panel. Type it two time for security purpose.<br />
<input name="password" type="password" size="50" maxlength="100" /></td></tr>
<tr><td><input name="password2" type="password" size="50" maxlength="100" /></td></tr>
<tr><td class="pair">Email</td></tr><tr><td>
The email where new passwords will be retrieved.<br /><input name="email" type="text" size="50" maxlength="100" /></td></tr>
<tr><td><br /><br /><br /><br /></td></tr>
<tr><td class="pair">Root path</td></tr><tr><td>
The root path of your TCG post (Don't forget trailing slash).<br />
<input name="root_path" type="text" size="80" maxlength="100" value="/home/user/www/tcg/" /></td></tr>
<tr><td class="pair">Root url</td></tr><tr></tr><td>
The web adress to the root of your TCG post (Don't forget trailing slash).<br />
<input name="url" type="text" size="80" maxlength="100" value="http://www.yourdomain.tld/tcg/" /></td></tr>
<tr><td class="pair">Cards directory</td></tr><tr><td>
The name of the directory where cards will be stored.<br />
<input name="dir_card" type="text" size="50" maxlength="100" value="cards/" /></td></tr>
<tr><td class="pair">Token directory</td></tr><tr><td>
The name of the directory where tokens will be stored.<br /><input name="dir_token" type="text" size="50" maxlength="100" value="tokens/" /></td></tr>
<tr><td class="pair">Master badges directory</td></tr><tr><td>
The name of the directory where mastered badges will be stored.<br /><input name="dir_badge" type="text" size="50" maxlength="100" value="badges/" /></td></tr>
<tr><td></td></tr><tr><td><input name="installing" type="submit" value="Install myTCGpost admin 1.0"></td></tr>
</table>
</form>
<br />

<?php
}
?>
<br />
</div>

  <div id="pied">
  myTCGpost! 1.0 copyright &copy; 2007 by lollie.
  <br />
  <a href="http://www.lollie.fr">lollie.fr</a>
  </div>

</div>


</body>
</html>