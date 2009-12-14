<?php
include "header.php";
include "config.php";

?>
<h2>Edit a Token</h2>
<br />
<?php
// Connexion a la base
$db_link = @mysql_connect($db_server, $db_user, $db_password);
@mysql_select_db($db_database, $db_link) or die("Cannot connect to the database.");

$id_cur = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

	if (isset($_POST['update']) && !empty($_POST['update']))
	{
		echo "<p><img src=\"images/info.gif\" /> ";
		$content_dir = $_SESSION['rootPath'] . $_SESSION['tokenDir'];

		// On selectionne le nom du patch a supprimer
		$requete = mysql_query("select image from $db_token WHERE idToken=$id_cur") or die(mysql_error());
		// Contient le nom du fichier a modifier
		$nom_cur = mysql_fetch_array($requete);
		// recuperation des variables saisies dans le formulaire
		$id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';
		$remplacer = (isset($_POST['replace']) && !empty($_POST['replace']))?$_POST['replace']:'';
		$name = (isset($_POST['name']) && !empty($_POST['name']))?$_POST['name']:'';

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
		unlink($content_dir . $nom_cur[0]);

        if (!is_uploaded_file($tmp_file)) {
            echo("File not found.<br />");
        } else if (!strstr($type_file, 'gif') && !strstr($type_file, 'png')) {
            echo("The file type must be gif or png.<br />");
        }
        // Si le fichier existe
        if (file_exists($content_dir . $name_file)) {
            if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
                echo("The file ($nom_cur[0]) was not copied in the directory \"$content_dir\".<br />");
            } else {
                echo "The existing file has been replaced.<br />";
            }
        } else if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
            echo("The file ($nom_cur[0]) was not copied in the directory \"$content_dir\".<br />");
        } else echo "The file has been uploaded.<br />";

        $update = sprintf("UPDATE $db_token SET image='%s', name='%s' WHERE idToken='%d'",
            $name_file,
            mysql_real_escape_string($name, $db_link),
            $id
            );
    } else {
        $update = sprintf("UPDATE $db_token SET name='%s' WHERE idToken='%d'",
            mysql_real_escape_string($name, $db_link),
            $id
            );
    }
    $maj = mysql_query($update) or die('Requête invalide : ' . mysql_error());
    echo "Data updated.</p><br />";
}
// Execution de la requete selectionnant tous les enregistrements la table actualite
$requete = mysql_query("SELECT * from $db_token WHERE idToken='$id_cur'") or die(mysql_error());
// On affiche le resultat sous forme de tableau
echo "<table>";

while ($patch = mysql_fetch_array($requete)) {

    echo "<tr><td class=\"droitep\"> Token : </td>
			  <form name=\"update\" method=\"post\" enctype=\"multipart/form-data\" action=\"" . $_SERVER['PHP_SELF'] . "?id=$id_cur\">
		      <input name=\"id\" type=\"hidden\" size=\"1\" maxlength=\"1\" value=\"" . $patch[0] . "\" />
		      <td class=\"pair\"><img src=\"" . $_SESSION['url'] . $_SESSION['tokenDir'] . $patch[2] . "\" /><br />
			<input type=\"checkbox\" name=\"replace\" value=\"y\" id=\"replace\" />replace image.<br /><br /><input type=\"file\" name=\"image\" /></td></tr>
			<tr><td class=\"droite\"> Name : </td>
		      <td><input name=\"name\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $patch[1] . "\" /></td></tr>
		      <tr><td class=\"droite\"></td>
		      <td> <input name=\"update\" type=\"submit\" value=\"Edit\"><br /></td>
		      </form></tr>";
}

echo "</table>";

mysql_close();

include "footer.php";

?>