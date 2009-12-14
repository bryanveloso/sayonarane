<?php
include "header.php";
include "config.php";
?>
<h2>Edit a Template</h2>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

$id_tpl = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

if( isset($_POST['update']) && !empty($_POST['update']) ) // si formulaire soumis
{
	echo "<p><img src=\"images/info.gif\" /> ";


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

	$update = sprintf("UPDATE $db_template SET name='%s', colsNum='%d', start='%s', startLine='%s', beCard='%s', afCard='%s', endLine='%s', end='%s' WHERE idtemplate='%d'",
				mysql_real_escape_string($name, $db_link),
				$cols_num,
				mysql_real_escape_string($start, $db_link),
				mysql_real_escape_string($start_line, $db_link),
				mysql_real_escape_string($be_card, $db_link),
				mysql_real_escape_string($af_card, $db_link),
				mysql_real_escape_string($end_line, $db_link),
				mysql_real_escape_string($end, $db_link),
				$id_tpl);

	$maj = mysql_query($update) or die('Requête invalide : ' . mysql_error());
	echo "Data updated.</p><br />";
}

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_template WHERE idTemplate='$id_tpl'") or die(mysql_error());

	// On affiche le resultat sous forme de tableau
	echo "<table>";

	while( $template = mysql_fetch_array( $requete ) )
	{
		// On affiche la ligne du tableau de l'actu courante
		echo "<tr>
			  <form name=\"templates\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "?id=$id_tpl\">
		      <input name=\"id\" type=\"hidden\" value=\"" . $template[0] . "\" />
			<tr><td class=\"droite\">Name : </td><td><input name=\"name\" type=\"text\" size=\"50\" maxlength=\"50\" value=\"" . $template[1] . "\" /></td></tr>
			<tr><td class=\"droitep\">Number of columns : </td><td class=\"pair\"><input name=\"cols_num\" type=\"text\" size=\"3\" maxlength=\"2\" value=\"" . $template[2] . "\" /></td></tr>
			<tr><td class=\"droite\">Header : </td><td><textarea rows=3 cols=70 name=\"start\" onKeyDown=\"CheckLen(this, 'c1')\" onKeyUp=\"CheckLen(this, 'c1')\" onFocus=\"CheckLen(this, 'c1')\">" . $template[3] . "</textarea><br />
			There are <input type=\"text\" name=\"c1\" size=\"3\" value=\"250\" class=\"template\" readonly> chars left.</td></tr>

			<tr><td class=\"droitep\">Beginning of a line : </td><td class=\"pair\"><textarea rows=3 cols=70 name=\"start_line\" onKeyDown=\"CheckLen(this, 'c2')\" onKeyUp=\"CheckLen(this, 'c2')\" onFocus=\"CheckLen(this, 'c2')\">" . $template[4] . "</textarea><br />
			There are <input type=\"text\" name=\"c2\" size=\"3\" value=\"250\" class=\"template\" readonly> chars left.<br /></td></tr>

			<tr><td class=\"droite\">Before each card : </td><td><textarea rows=3 cols=70 name=\"be_card\" onKeyDown=\"CheckLen(this, 'c3')\" onKeyUp=\"CheckLen(this, 'c3')\" onFocus=\"CheckLen(this, 'c3')\">" . $template[5] . "</textarea><br />
			There are <input type=\"text\" name=\"c3\ size=\"3\" value=\"250\" class=\"template\" readonly> chars left.<br /></td></tr>

			<tr><td class=\"droitep\">After each card : </td><td class=\"pair\"><textarea rows=3 cols=70 name=\"af_card\" onKeyDown=\"CheckLen(this, 'c4')\" onKeyUp=\"CheckLen(this, 'c4')\" onFocus=\"CheckLen(this, 'c4')\">" . $template[6] . "</textarea><br />
			There are <input type=\"text\" name=\"c4\" size=\"3\" value=\"250\" class=\"template\" readonly> chars left.<br /></td></tr>

			<tr><td class=\"droite\">End of a line : </td><td><textarea rows=3 cols=70 name=\"end_line\" onKeyDown=\"CheckLen(this, 'c5')\" onKeyUp=\"CheckLen(this, 'c5')\" onFocus=\"CheckLen(this, 'c5')\">" . $template[7] . "</textarea><br />
			There are <input type=\"text\" name=\"c5\" size=\"3\" value=\"250\" class=\"template\" readonly> chars left.<br /></td></tr>

			<tr><td class=\"droitep\">Footer : </td><td class=\"pair\"><textarea rows=3 cols=70 name=\"end\" onKeyDown=\"CheckLen(this, 'c6')\" onKeyUp=\"CheckLen(this, 'c6')\" onFocus=\"CheckLen(this, 'c6')\">" . $template[8] . "</textarea><br />
			There are <input type=\"text\" name=\"c6\" size=\"3\" value=\"250\" class=\"template\" readonly> chars left.<br /></td></tr>
			<tr><td><input name=\"update\" type=\"submit\" value=\"Edit\"></td></tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>