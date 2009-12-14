<?php
include "header.php";
include "config.php";
?>
<h2>Templates</h2>
<p>Manage the templates that will serve to display the different categories of cards.</p>
<br />
<form name="templates" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
<tr><th colspan="2">Add a template</th></tr>
<tr><td class="droite">Name : </td><td><input name="name" type="text" size="50" maxlength="50" /></td></tr>
<tr><td class="droitep">Number of columns : </td><td class="pair"><input name="cols_num" type="text" size="3" maxlength="2" /></td></tr>
<tr><td class="droite">Header : </td><td><textarea rows=3 cols=70 name="start"  onKeyDown="CheckLen(this, 'c1')" onKeyUp="CheckLen(this, 'c1')"></textarea><br />
There are <input type="text" name="c1" size="3" value="250" class="template" readonly> chars left.</td></tr>

<tr><td class="droitep">Beginning of a line : </td><td class="pair"><textarea rows=3 cols=70 name="start_line" onKeyDown="CheckLen(this, 'c2')" onKeyUp="CheckLen(this, 'c2')"></textarea><br />
There are <input type="text" name="c2" size="3" value="250" class="template" readonly> chars left.<br /></td></tr>

<tr><td class="droite">Before each card : </td><td><textarea rows=3 cols=70 name="be_card" onKeyDown="CheckLen(this, 'c3')" onKeyUp="CheckLen(this, 'c3')"></textarea><br />
There are <input type="text" name="c3" size="3" value="250" class="template" readonly> chars left.<br /></td></tr>

<tr><td class="droitep">After each card : </td><td class="pair"><textarea rows=3 cols=70 name="af_card" onKeyDown="CheckLen(this, 'c4')" onKeyUp="CheckLen(this, 'c4')"></textarea><br />
There are <input type="text" name="c4" size="3" value="250" class="template" readonly> chars left.<br /></td></tr>

<tr><td class="droite">End of a line : </td><td><textarea rows=3 cols=70 name="end_line" onKeyDown="CheckLen(this, 'c5')" onKeyUp="CheckLen(this, 'c5')"></textarea><br />
There are <input type="text" name="c5" size="3" value="250" class="template" readonly> chars left.<br /></td></tr>

<tr><td class="droitep">Footer : </td><td class="pair"><textarea rows=3 cols=70 name="end" onKeyDown="CheckLen(this, 'c6')" onKeyUp="CheckLen(this, 'c6')"></textarea><br />
There are <input type="text" name="c6" size="3" value="250" class="template" readonly> chars left.<br /></td></tr>
<tr><td class="droite"></td><td><input name="template" type="submit" value="Add"></td></tr>
</table>
</form>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

	if( isset($_POST['template']) ) // si formulaire soumis
	{
		// recuperation des variables saisies dans le formulaire
		$name       = (isset($_POST['name']) && !empty($_POST['name']))?$_POST['name']:'';
		$cols_num   = (isset($_POST['cols_num']) && !empty($_POST['cols_num']))?$_POST['cols_num']:0;
		$start      = (isset($_POST['start']) && !empty($_POST['start']))?$_POST['start']:'';
		$start_line = (isset($_POST['start_line']) && !empty($_POST['start_line']))?$_POST['start_line']:'';
		$be_card    = (isset($_POST['be_card']) && !empty($_POST['be_card']))?$_POST['be_card']:'';
		$af_card    = (isset($_POST['af_card']) && !empty($_POST['af_card']))?$_POST['af_card']:'';
		$end_line   = (isset($_POST['end_line']) && !empty($_POST['end_line']))?$_POST['end_line']:'';
		$end        = (isset($_POST['end']) && !empty($_POST['end']))?$_POST['end']:'';

		if(get_magic_quotes_gpc()) {
		    $name = stripslashes($name);
		    $start = stripslashes($start);
		    $start_line = stripslashes($start_line);
		    $be_card = stripslashes($be_card);
		    $af_card = stripslashes($af_card);
		    $end_line = stripslashes($end_line);
		    $end = stripslashes($end);
		}

		$insert = sprintf("INSERT INTO $db_template ( name, colsNum, start, startLine, beCard, afCard, endLine, end ) VALUES ('%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s')",
				mysql_real_escape_string($name, $db_link),
				$cols_num,
				mysql_real_escape_string($start, $db_link),
				mysql_real_escape_string($start_line, $db_link),
				mysql_real_escape_string($be_card, $db_link),
				mysql_real_escape_string($af_card, $db_link),
				mysql_real_escape_string($end_line, $db_link),
				mysql_real_escape_string($end, $db_link));

		// Le fichier a bien ete transfere on ajoute alors les donnees a la table myinfos
		$ajout = mysql_query($insert) or die('Invalid query : ' . mysql_error());


		echo "<p><img src=\"images/info.gif\" />The template has been added.</p><br />";

	}

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select idTemplate, name from $db_template ORDER BY idTemplate ASC") or die(mysql_error());

 	// On affiche le resultat
	echo "<h3>Templates</h3>";


	while( $actu = mysql_fetch_array( $requete ) )
	{

    // On affiche la ligne du tableau de l'actu courante
    echo  "#" . $actu[0] . " " . $actu[1] . " <a href=\"upd_template.php?id=" . $actu[0] . "\">
	    <img src=\"images/edit.gif\" /></a>
	    <a href=\"del_template.php?id=" . $actu[0] . "\" ><img src=\"images/del.gif\" /></a><br />";
	}

	mysql_close();

	include "footer.php";
?>