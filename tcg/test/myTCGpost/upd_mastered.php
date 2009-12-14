<?php
include "header.php";
include "config.php";

?>
<h2>Edit a Mastered Collection</h2>
<br />
<?php
// Connexion a la base
$db_link = @mysql_connect($db_server, $db_user, $db_password);
@mysql_select_db($db_database, $db_link) or die("Cannot connect to the database.");

$id_master = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

	if (isset($_POST['update']) && !empty($_POST['update']))
	{
		echo "<p><img src=\"images/info.gif\" /> ";
		$content_dir = $_SESSION['rootPath'] . $_SESSION['masteredDir'];

		// On selectionne le nom du patch a supprimer
		$requete = mysql_query("select card from $db_mastered WHERE idMastered=$id_master") or die(mysql_error());
		// Contient le nom du fichier a modifier
		$nom_master = mysql_fetch_array($requete);
		// recuperation des variables saisies dans le formulaire
		$id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';
		$remplacer = (isset($_POST['replace']) && !empty($_POST['replace']))?$_POST['replace']:'';
		$name = (isset($_POST['name']) && !empty($_POST['name']))?$_POST['name']:'';
		$tpl = (isset($_POST['template']) && !empty($_POST['template']))?$_POST['template']:'';

		if (get_magic_quotes_gpc()) {
			$name = stripslashes($name);
		}

		// Si on veut remplacer le fichier image
		if ($remplacer == "y") {
		$tmp_file = $_FILES['image']['tmp_name'];
		// on vérifie maintenant l'extension
		$type_file = $_FILES['image']['type'];
		// on copie le fichier dans le dossier de destination
		$name_file = $_FILES['image']['name'];
		// Supprimer l'image
		unlink($content_dir . $nom_master[0]);

        if (!is_uploaded_file($tmp_file)) {
            echo("File not found.<br />");
        } else if (!strstr($type_file, 'gif') && !strstr($type_file, 'png')) {
            echo("The file type must be gif or png.<br />");
        }
        // Si le fichier existe
        if (file_exists($content_dir . $name_file)) {
            if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
                echo("The file ($nom_master[0]) was not copied in the directory \"$content_dir\".<br />");
            } else {
                echo "The existing file has been replaced.<br />";
            }
        } else if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
            echo("The file ($nom_master[0]) was not copied in the directory \"$content_dir\".<br />");
        } else echo "The file has been uploaded.<br />";

        $update = sprintf("UPDATE $db_mastered SET card='%s', name='%s', idTemplate='%d' WHERE idMastered='%d'",
            $name_file,
            mysql_real_escape_string($name, $db_link),
            $tpl,
            $id
            );
    } else {
        $update = sprintf("UPDATE $db_mastered SET name='%s', idTemplate='%d' WHERE idMastered='%d'",
            mysql_real_escape_string($name, $db_link),
            $tpl,
            $id
            );
    }
    $maj = mysql_query($update) or die('Requête invalide : ' . mysql_error());
    echo "Data updated.</p><br />";
}
// Execution de la requete selectionnant tous les enregistrements la table actualite
$requete = mysql_query("SELECT * from $db_mastered WHERE idMastered='$id_master'") or die(mysql_error());
// On affiche le resultat sous forme de tableau
echo "<table>";

while ($patch = mysql_fetch_array($requete)) {

    echo "<tr><td class=\"droite\"> Name : </td>
			  <form name=\"update\" method=\"post\" enctype=\"multipart/form-data\" action=\"" . $_SERVER['PHP_SELF'] . "?id=$id_master\">
		      <input name=\"id\" type=\"hidden\" size=\"1\" maxlength=\"1\" value=\"" . $patch[0] . "\" />

		      <td><input name=\"name\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $patch[1] . "\" /></td></tr>
		      <tr><td class=\"droitep\"> Badge : </td>
		      <td class=\"pair\"><img src=\"" . $_SESSION['url'] . $_SESSION['masteredDir'] . $patch[4] . "\" /><br />
			<input type=\"checkbox\" name=\"replace\" value=\"y\" id=\"replace\" />replace image.<br /><br /><input type=\"file\" name=\"image\" /></td></tr>
			<tr><td class=\"droite\"> Template : </td>
		      <td><select name=\"template\"><option value=\"\">       </option>
			<option value=\"\">-------</option>";

		      $requete = mysql_query("select * from $db_template ORDER BY name") or die(mysql_error());
			while( $tpl = mysql_fetch_array( $requete ) )
			{
			  if ( $tpl[0] == $patch[5] )
			  {
			 	echo "<option value=\"$tpl[0]\" selected>$tpl[1] (Current)</option>";
			  }
			  else echo "<option value=\"$tpl[0]\">$tpl[1]</option>";
			}

			echo "</select></tr>
		      <tr><td></td><td> <input name=\"update\" type=\"submit\" value=\"Edit\"><br /></td>
		      </form></tr>";
}

echo "</table>";

mysql_close();

include "footer.php";

?>