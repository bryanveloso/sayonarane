<?php
include "header.php";
include "config.php";
?>
<h2>Delete a Template</h2>
<p>Do you really want to delete this Template</p>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

  	$id_tpl = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_template WHERE idtemplate='$id_tpl'") or die(mysql_error());

	// On affiche le resultat sous forme de tableau
	echo "<table>";

	while( $template = mysql_fetch_array( $requete ) )
	{
		// On affiche la ligne du tableau de l'actu courante
		echo "<tr>
			  <form name=\"update\" method=\"post\" action=\"delete.php\">
		      <input name=\"id\" type=\"hidden\" value=\"" . $template[0] . "\" />
		      <input name=\"type_del\" type=\"hidden\" value=\"template\" />
			<tr><td class=\"droite\">Name : </td><td><input name=\"name\" type=\"text\" size=\"50\" maxlength=\"50\" value=\"" . $template[1] . "\" /></td></tr>
			<tr><td class=\"droitep\">Number of columns : </td><td class=\"pair\"><input name=\"cols_num\" type=\"text\" size=\"3\" maxlength=\"2\" value=\"" . $template[2] . "\" /></td></tr>
			<tr><td class=\"droite\">Header : </td><td><textarea rows=3 cols=70 name=\"start\" onKeyDown=\"CheckLen(this, 'c1')\" onKeyUp=\"CheckLen(this, 'c1')\">" . $template[3] . "</textarea><br />
			There are <input type=\"text\" name=\"c1\" size=\"3\" value=\"250\" class=\"template\" readonly> chars left.</td></tr>

			<tr><td class=\"droitep\">Beginning of a line : </td><td class=\"pair\"><textarea rows=3 cols=70 name=\"start_line\" onKeyDown=\"CheckLen(this, 'c2')\" onKeyUp=\"CheckLen(this, 'c2')\">" . $template[4] . "</textarea><br />
			There are <input type=\"text\" name=\"c2\" size=\"3\" value=\"250\" class=\"template\" readonly> chars left.<br /></td></tr>

			<tr><td class=\"droite\">Before each card : </td><td><textarea rows=3 cols=70 name=\"be_card\" onKeyDown=\"CheckLen(this, 'c3')\" onKeyUp=\"CheckLen(this, 'c3')\">" . $template[5] . "</textarea><br />
			There are <input type=\"text\" name=\"c3\ size=\"3\" value=\"250\" class=\"template\" readonly> chars left.<br /></td></tr>

			<tr><td class=\"droitep\">After each card : </td><td class=\"pair\"><textarea rows=3 cols=70 name=\"af_card\" onKeyDown=\"CheckLen(this, 'c4')\" onKeyUp=\"CheckLen(this, 'c4')\">" . $template[6] . "</textarea><br />
			There are <input type=\"text\" name=\"c4\" size=\"3\" value=\"250\" class=\"template\" readonly> chars left.<br /></td></tr>

			<tr><td class=\"droite\">End of a line : </td><td><textarea rows=3 cols=70 name=\"end_line\" onKeyDown=\"CheckLen(this, 'c5')\" onKeyUp=\"CheckLen(this, 'c5')\">" . $template[7] . "</textarea><br />
			There are <input type=\"text\" name=\"c5\" size=\"3\" value=\"250\" class=\"template\" readonly> chars left.<br /></td></tr>

			<tr><td class=\"droitep\">Footer : </td><td class=\"pair\"><textarea rows=3 cols=70 name=\"end\" onKeyDown=\"CheckLen(this, 'c6')\" onKeyUp=\"CheckLen(this, 'c6')\">" . $template[8] . "</textarea><br />
			There are <input type=\"text\" name=\"c6\" size=\"3\" value=\"250\" class=\"template\" readonly> chars left.<br /></td></tr>
			<tr><td><input name=\"delete\" type=\"submit\" value=\"Delete\"></td></tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>