<?php
include "header.php";
include "config.php";
?>
<h2>Tokens</h2>
<p>Manage the tokens used in your Tcg.</p>
<br />
<form name="add_token" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
<tr><th colspan="2">Add a token</th></tr>
<tr><td class="droite">Name : </td><td><input name="name" type="text" size="50" maxlength="100" /></td></tr>
<tr><td class="droite">Image : </td><td><input type="file" name="image" /></td></tr>
<tr><td class="droite"></td><td><input name="token" type="submit" value="Add"></td></tr>
</table>
</form>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

	if( isset($_POST['token']) ) // si formulaire soumis
	{
		// recuperation des variables saisies dans le formulaire
		$name = (isset($_POST['name']) && !empty($_POST['name']))?$_POST['name']:'';
		$num = 0;

		if(get_magic_quotes_gpc()) {
		    $name = stripslashes($name);
		}

		$content_dir = $_SESSION['rootPath'] . $_SESSION['tokenDir']; // dossier où sera déplacé le fichier

		$tmp_file = $_FILES['image']['tmp_name'];

		// on vérifie maintenant l'extension
		$type_file = $_FILES['image']['type'];

		// on copie le fichier dans le dossier de destination
		$name_file = $_FILES['image']['name'];


		if( !is_uploaded_file($tmp_file) )
		{
		    echo("<p><img src=\"images/info.gif\" /> File not found.</p><br />");
		}
		else if( !strstr($type_file, 'gif') && !strstr($type_file, 'png'))
		{
		    echo("<p><img src=\"images/info.gif\" /> The file type must be gif or png.</p><br />");
		}

		// Si le fichier a uploader existe mais qu'on n'a pas coche la case, on previent qu'il existe et qu'en cas de remplacement il faut cocher la case
		else if( file_exists($content_dir . $name_file) )
		{
			echo("<p><img src=\"images/info.gif\" /> The file already exists.<br />");
			echo("Rename the file or check the replace option if you want to upload it.<br /></p><br />");
		}
		else if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
		{
		    echo("<p><img src=\"images/info.gif\" /> The file was not copied in the directory \"$content_dir\".</p><br />");
		}
		else
		{

			$insert = sprintf("INSERT INTO $db_token ( name, image, number ) VALUES ('%s', '%s', '%d')",
					mysql_real_escape_string($name, $db_link),
					$name_file,
					$num);

			// Le fichier a bien ete transfere on ajoute alors les donnees a la table token
			$ajout = mysql_query($insert) or die('Invalid query : ' . mysql_error());


			echo "<p><img src=\"images/info.gif\" />The token has been added.</p><br />";
		}

	}

	// Mise à jour du nombre d'exemplaire d'un 'token'
	if( isset($_POST['numC']) ) // si formulaire soumis
	{
		$ido = (isset($_POST['ido']) && !empty($_POST['ido']))?$_POST['ido']:'';
		$nbitem = (isset($_POST['nbitem']) && !empty($_POST['nbitem']))?$_POST['nbitem']:0;

		$update = sprintf("UPDATE $db_token SET number='%d' WHERE idToken='%d'",
				   $nbitem,
				   $ido);

    	$maj = mysql_query($update) or die('Requête invalide : ' . mysql_error());

		echo "<p><img src=\"images/info.gif\" />The number of tokens has been updated.</p><br />";
	}

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_token ORDER BY name ASC") or die(mysql_error());

 	// On affiche le resultat sous forme de tableau
	echo "<h3>Tokens</h3>
	<table>
	<th> Image </th>
	<th> Number of items </th>
	<th> Action </th>";

	// Pour afficher une ligne sur deux de couleur differente on declare une variable a 1, qu'on multiplie par -1 a chaque passage de boucle. et on teste son signe.
	$pair = 1;

	$dir = $_SESSION['url'] . $_SESSION['tokenDir'];

	while( $actu = mysql_fetch_array( $requete ) )
	{
		// On definit si on est dans une ligne paire ou impaire pour afficher une couleur de fond différente
		($pair > 0) ? $classe = "pair" : $classe = "impair";
		$pair = $pair * -1;

		// On affiche la ligne du tableau de l'actu courante
		echo "<tr>
		<td class=\"". $classe ."\"><img src=\"" . $dir . $actu[2] . "\" alt=\"" . $actu[1] . "\" title=\"" . $actu[1] . "\" /></td>
		<td class=\"". $classe ."\">
		<form name=\"numC" . $actu[0] . "\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">
		<input name=\"ido\" type=\"hidden\" size=\"1\" maxlength=\"1\" value=\"" . $actu[0] . "\" />
		<input class=\"ordre\" style=\"text-align:right\" name=\"nbitem\" type=\"text\" size=\"10\" maxlength=\"5\" value=\"" . $actu[3] . "\" />
		<input name=\"numC\" type=\"submit\" value=\"ok\">
		</form>
		</td>
		<td class=\"". $classe ."\"><a href=\"upd_token.php?id=" . $actu[0] . "\"><img src=\"images/edit.gif\" /></a>
		<a href=\"del_token.php?id=" . $actu[0] . "\" ><img src=\"images/del.gif\" /></a> </td>
		</tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>