<?php
include "header.php";
include "config.php";
?>
<h2>Edit a category</h2>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

$id_cat = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

if( isset($_POST['update']) && !empty($_POST['update']) ) // si formulaire soumis
{
	echo "<p><img src=\"images/info.gif\" /> ";


	// recuperation des variables saisies dans le formulaire
  	$id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';
	$name = (isset($_POST['name']) && !empty($_POST['name']))?$_POST['name']:'';

	if(get_magic_quotes_gpc()) {
           $name = stripslashes($name);
        }

	$update = sprintf("UPDATE $db_category SET name='%s' WHERE idCategory='%d'",
			   mysql_real_escape_string($name, $db_link),
			   $id
			   );

	$maj = mysql_query($update) or die('Requête invalide : ' . mysql_error());
	echo "Data updated.</p><br />";
}

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_category WHERE idCategory='$id_cat'") or die(mysql_error());

	// On affiche le resultat sous forme de tableau
	echo "<table>";

	while( $patch = mysql_fetch_array( $requete ) )
	{
		// On affiche la ligne du tableau de l'actu courante
		echo "<tr>
			  <form name=\"update\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "?id=$id_cat\">
		      <input name=\"id\" type=\"hidden\" value=\"" . $patch[0] . "\" />
		      <tr><td class=\"droitep\"> Name : </td>
		      <td class=\"pair\"><input name=\"name\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $patch[1] . "\" /></td></tr>
		      <tr><td><input name=\"update\" type=\"submit\" value=\"Edit\"></td>
			<td></td>
		      </form></tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>