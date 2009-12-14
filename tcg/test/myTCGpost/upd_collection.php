<?php
include "header.php";
include "config.php";

?>
<h2>Edit a Collection</h2>
<br />
<?php
// Connexion a la base
$db_link = @mysql_connect($db_server, $db_user, $db_password);
@mysql_select_db($db_database, $db_link) or die("Cannot connect to the database.");

$id_coll = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

	if (isset($_POST['update']) && !empty($_POST['update']))
	{
		echo "<p><img src=\"images/info.gif\" /> ";
		$content_dir = $_SESSION['rootPath'] . "images/";

		// recuperation des variables saisies dans le formulaire
		$id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';
		$name = (isset($_POST['name']) && !empty($_POST['name']))?$_POST['name']:'';
		$deck = (isset($_POST['deck']) && !empty($_POST['deck']))?$_POST['deck']:'';
		$choice = (isset($_POST['choice']) && !empty($_POST['choice']))?$_POST['choice']:"current";
		$total = (isset($_POST['total']) && !empty($_POST['total']))?$_POST['total']:$_SESSION['nbCardDesk'];
		$tpl = (isset($_POST['template']) && !empty($_POST['template']))?$_POST['template']:'';

		if (get_magic_quotes_gpc()) {
			$name = stripslashes($name);
			$deck = stripslashes($deck);
		}

	// On veut supprimer l'ancien filler car soit on en upload un nouveau, soit on utilise le default filler
	if ( $choice == "new" || $choice == "default" ) {
		// On selectionne le nom du patch a supprimer
		$requete = mysql_query("select filler from $db_collection WHERE idCollection=$id_coll") or die(mysql_error());

		// Contient le nom du fichier a modifier
		$nom_coll = mysql_fetch_array($requete);

		// Supprimer l'image
		unlink($content_dir . $nom_coll[0]);
	}

	// On upload un nouveau filler
	if ( $choice == "new" || $choice == "newDef" ) {

		$tmp_file = $_FILES['filler']['tmp_name'];
		// on vérifie maintenant l'extension
		$type_file = $_FILES['filler']['type'];
		// on copie le fichier dans le dossier de destination
		$name_file = $_FILES['filler']['name'];

		if (!is_uploaded_file($tmp_file)) {
			echo("File not found.<br />");
		} else if (!strstr($type_file, 'gif') && !strstr($type_file, 'png')) {
			echo("The file type must be gif or png.<br />");
		}
		// Si le fichier existe
		if (file_exists($content_dir . $name_file)) {
		if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
			echo("The file ($nom_coll[0]) was not copied in the directory \"$content_dir\".<br />");
		} else {
			echo "The existing file has been replaced.<br />";
		}
		} else if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
			echo("The file ($nom_coll[0]) was not copied in the directory \"$content_dir\".<br />");
		} else echo "The file has been uploaded.<br />";

		$update = sprintf("UPDATE $db_collection SET name='%s', deck='%s', filler='%s', nbCards='%d', idTemplate='%d' WHERE idCollection='%d'",
			mysql_real_escape_string($name, $db_link),
			mysql_real_escape_string($deck, $db_link),
			$name_file,
			$total,
			$tpl,
			$id
			);
	}
	else if ( $choice == "default" ) {
		$update = sprintf("UPDATE $db_collection SET name='%s', deck='%s', filler='', nbCards='%d', idTemplate='%d' WHERE idCollection='%d'",
			mysql_real_escape_string($name, $db_link),
			mysql_real_escape_string($deck, $db_link),
			$total,
			$tpl,
			$id
			);
	}
	else {
		$update = sprintf("UPDATE $db_collection SET name='%s', deck='%s', nbCards='%d', idTemplate='%d' WHERE idCollection='%d'",
			mysql_real_escape_string($name, $db_link),
			mysql_real_escape_string($deck, $db_link),
			$total,
			$tpl,
			$id
			);
	}
	$maj = mysql_query($update) or die('Requête invalide : ' . mysql_error());
	echo "Data updated.</p><br />";
}
// Execution de la requete selectionnant tous les enregistrements la table actualite
$requete = mysql_query("select * from $db_collection WHERE idCollection='$id_coll'") or die(mysql_error());
// On affiche le resultat sous forme de tableau
echo "<table>";

while ($patch = mysql_fetch_array($requete)) {

    echo "<form name=\"update\" method=\"post\" enctype=\"multipart/form-data\" action=\"" . $_SERVER['PHP_SELF'] . "?id=$id_coll\">
		      <input name=\"id\" type=\"hidden\" value=\"" . $patch[0] . "\" />
		      <tr><td class=\"droitep\"> Name : </td>
		      <td class=\"pair\"><input name=\"name\" type=\"text\" size=\"30\" maxlength=\"50\" value=\"" . $patch[1] . "\" /></td></tr>
			<tr><td class=\"droite\"> Deck name : </td>
		      <td><input name=\"deck\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $patch[2] . "\" /></td></tr>
			<tr><td class=\"droitep\"> Filler : </td><td class=\"pair\">";

			if ( $patch[3] == "" ) {
				echo "<img src=\"" . $_SESSION['url'] . "images/" . $_SESSION['defaultFiller'] . "\" />
				<br /><p class=\"legend\">(Default Filler)</p>
				<input type=\"radio\" name=\"choice\" value=\"current\" checked /> Keep the current filler (default Filler).<br />
				<input type=\"radio\" name=\"choice\" value=\"newDef\" /> Upload a new filler for this collection.<br />";
			}
			else {
				echo "<img src=\"" . $_SESSION['url'] . "images/" . $patch[3] . "\" />
				<br /><p class=\"legend\">(Current Filler)</p>
				<input type=\"radio\" name=\"choice\" value=\"current\" checked /> Keep the current filler.<br />
				<input type=\"radio\" name=\"choice\" value=\"default\" /> Use default Filler.<br />
				<input type=\"radio\" name=\"choice\" value=\"new\" /> Upload a new filler for this collection.<br />";
			}


			echo "<input type=\"file\" name=\"filler\" /></td></tr>
			<tr><td class=\"droite\"> Total cards : </td>
		      <td><input name=\"total\" type=\"text\" size=\"5\" maxlength=\"2\" value=\"" . $patch[4] . "\" /></td></tr>
		      <tr><td class=\"droitep\"> Template : </td>
		      <td><select name=\"template\"><option value=\"\">       </option>
			<option value=\"\">-------</option>";

		      $requete = mysql_query("select * from $db_template ORDER BY name") or die(mysql_error());
			while( $tpl = mysql_fetch_array( $requete ) )
			{
			  if ( $tpl[0] == $patch[6] )
			  {
			 	echo "<option value=\"$tpl[0]\" selected>$tpl[1] (Current)</option>";
			  }
			  else echo "<option value=\"$tpl[0]\">$tpl[1]</option>";
			}

			echo "</select></tr><tr><td class=\"droite\"></td>
		      <td> <input name=\"update\" type=\"submit\" value=\"Edit\"><br /></td>
		      </form></tr>";
}

echo "</table>";

mysql_close();

include "footer.php";

?>