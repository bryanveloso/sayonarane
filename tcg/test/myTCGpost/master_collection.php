<?php
include "header.php";
include "config.php";

// Connexion a la base
$db_link = @mysql_connect($db_server,$db_user,$db_password);
@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");
?>
<h2>Master the Collection</h2>
<p>You can add the collection to your Mastered Collections.</p>
<?php
$id_coll = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

// On selectionne la collection a "masteriser"
$requete = mysql_query("select * from $db_collection WHERE idCollection='$id_coll'") or die(mysql_error());
$collec = mysql_fetch_array($requete);

// On compte si on a bien toutes les cartes
// Recuperation de la liste des cartes possedees
$cardList = explode(';',$collec[5]);

// S'il en manque on affiche un warning
if ( count($cardList) != $collec[4] ) {
	echo "<p><img src=\"images/info.gif\" /> You have ". count($cardList) ." cards of ". $collec[4] ."! Do you still want to add this collection to mastered ?</p>";
}

// Si le formulaire a été validé
if( isset($_POST['master']) )
	{
		// recuperation des variables saisies dans le formulaire
		$name = (isset($_POST['name']) && !empty($_POST['name']))?$_POST['name']:'';
		$deck = (isset($_POST['deck']) && !empty($_POST['deck']))?$_POST['deck']:'';
		$total = (isset($_POST['total']) && !empty($_POST['total']))?$_POST['total']:'';
		$tpl = (isset($_POST['template']) && !empty($_POST['template']))?$_POST['template']:'';

		$content_dir = $_SESSION['rootPath'] . $_SESSION['masteredDir']; // dossier où sera déplacé le fichier

		$tmp_file = $_FILES['badge']['tmp_name'];

		// on vérifie maintenant l'extension
		$type_file = $_FILES['badge']['type'];

		// on copie le fichier dans le dossier de destination
		$name_file = $_FILES['badge']['name'];

		if( !is_uploaded_file($tmp_file) )
		{
		    echo("<p><img src=\"images/info.gif\" /> File not found.</p><br />");
		}
		else if( !strstr($type_file, 'gif') && !strstr($type_file, 'png'))
		{
		    echo("<p><img src=\"images/info.gif\" /> The file type must be gif or png.</p><br />");
		}

		// Si le fichier a uploader existe mais qu'on a pas coche la case, on previent qu'il existe et qu'en cas de remplacement il faut cocher la case
		else if( file_exists($content_dir . $name_file) )
		{
			echo("<p><img src=\"images/info.gif\" /> The file already exists.<br />");
		}
		else if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
		{
		    echo("<p><img src=\"images/info.gif\" /> The file was not copied in the directory \"$content_dir\".</p><br />");
		}
		else
		{
			$insert = sprintf("INSERT INTO $db_mastered ( name, deck, card, nbCards, idTemplate ) VALUES ('%s', '%s', '%s', '%d', '%d')",
					mysql_real_escape_string($name, $db_link),
					mysql_real_escape_string($deck, $db_link),
					$name_file,
					$total,
					$tpl);
		}

		// Le fichier a bien ete transfere on ajoute alors les donnees a la table mastered
		$ajout = mysql_query($insert) or die('Invalid query : ' . mysql_error());

		// On supprimer aussi la collection des collections en cours
		$delete = "DELETE FROM $db_collection WHERE idCollection='$id_coll'";
		$suppr = mysql_query($delete) or die('Invalid Request : ' . mysql_error());


		echo "<p><img src=\"images/info.gif\" />The collection has been added to mastered collections.</p><br />";
	}


// On affiche le resultat sous forme de tableau
echo "<table>";


echo "<form name=\"master_collection\" method=\"post\" enctype=\"multipart/form-data\" action=\"" . $_SERVER['PHP_SELF'] . "?id=$id_coll\">
<input name=\"id\" type=\"hidden\" value=\"" . $collec[0] . "\" />
<tr><td class=\"droitep\"> Name : </td>
<td class=\"pair\"><input name=\"name\" type=\"text\" size=\"30\" maxlength=\"50\" value=\"" . $collec[1] . "\" /></td></tr>
<tr><td class=\"droite\"> Deck name : </td>
<td><input name=\"deck\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $collec[2] . "\" /></td></tr>
<tr><td class=\"droitep\"> Master badge : </td><td class=\"pair\">
<input type=\"file\" name=\"badge\" /></td></tr>
<tr><td class=\"droite\"> Total cards : </td>
<td><input name=\"total\" type=\"text\" size=\"5\" maxlength=\"2\" value=\"" . $collec[4] . "\" /></td></tr>
<tr><td class=\"droitep\"> Template : </td>
<td><select name=\"template\"><option value=\"\">       </option>
<option value=\"\">-------</option>";

$requete = mysql_query("select * from $db_template ORDER BY name") or die(mysql_error());
while( $tpl = mysql_fetch_array( $requete ) )
{
	if ( $tpl[0] == $collec[6] )
	{
		echo "<option value=\"$tpl[0]\" selected>$tpl[1] (Current)</option>";
	}
	else echo "<option value=\"$tpl[0]\">$tpl[1]</option>";
}

echo "</select></tr><tr><td class=\"droite\"></td>
<td> <input name=\"master\" type=\"submit\" value=\"Master\"><br /></td>
</form></tr>";


echo "</table><br />";

mysql_close();

include "footer.php";
?>