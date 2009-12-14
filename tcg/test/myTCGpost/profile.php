<?php
include "header.php";
include "config.php";
?>
<h2>Manage your profile</h2>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");


	if( isset($_POST['update']) ) // si formulaire soumis
	{
		// recuperation des variables saisies dans le formulaire
		$tcg_name = (isset($_POST['tcg_name']) && !empty($_POST['tcg_name']))?$_POST['tcg_name']:'';
		$tcg_url = (isset($_POST['tcg_url']) && !empty($_POST['tcg_url']))?$_POST['tcg_url']:'';
		$mem_name = (isset($_POST['mem_name']) && !empty($_POST['mem_name']))?$_POST['mem_name']:'';
		$level = (isset($_POST['level']) && !empty($_POST['level']))?$_POST['level']:'';
		$wishlist = (isset($_POST['wishlist']) && !empty($_POST['wishlist']))?$_POST['wishlist']:'';
		$remplacer = (isset($_POST['replace']) && !empty($_POST['replace']))?$_POST['replace']:'';
		$mastered = (isset($_POST['choice']) && !empty($_POST['choice']))?$_POST['choice']:'';
		$masteredPage = (isset($_POST['mfile']) && !empty($_POST['mfile']))?$_POST['mfile']:'';

		$content_dir = $_SESSION['rootPath'] . 'images/'; // dossier où sera déplacé le fichier

		// On selectionne le nom du patch a supprimer
		$requete = mysql_query("select lvImage from $db_profile") or die(mysql_error());
		// Contient le nom du fichier a modifier
		$nom_patch = mysql_fetch_array($requete);


		echo "<p><img src=\"images/info.gif\" /> ";


		// Si on veut remplacer le fichier image
		if( $remplacer == "y" )
		{
			$tmp_file = $_FILES['level_image']['tmp_name'];

			// on vérifie maintenant l'extension
			$type_file = $_FILES['level_image']['type'];

			// on copie le fichier dans le dossier de destination
			$name_file = $_FILES['level_image']['name'];


			unlink($_SESSION['rootPath'] . 'images/' . $nom_patch[0]);

			if (!is_uploaded_file($tmp_file)) {
				echo("File not found.<br />");
			} else if (!strstr($type_file, 'gif') && !strstr($type_file, 'png')) {
				echo("The file type must be gif or png.<br />");
			}
			// Si le fichier existe
			if (file_exists($content_dir . $name_file)) {
			if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
			    echo("The file was not copied in the directory \"$content_dir\".<br />");
			} else {
			    echo "The existing file has been replaced.<br />";
			}
			} else if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
				echo("The file was not copied in the directory \"$content_dir\".<br />");
			} else echo "The file has been uploaded.<br />";

		// On met a jour la table profil
		$update = "UPDATE $db_profile SET tcgName='$tcg_name', tcgUrl='$tcg_url', name='$mem_name', level='$level', lvImage='$name_file', wishlist='$wishlist', mastered='$mastered', masterPage='$masteredPage'";
		}

		else
		{
			// On met a jour la table admin
			$update = "UPDATE $db_profile SET tcgName='$tcg_name', tcgUrl='$tcg_url', name='$mem_name', level='$level', wishlist='$wishlist', mastered='$mastered', masterPage='$masteredPage'";
		}

		$maj = mysql_query($update) or die('Invalid Request : ' . mysql_error());
		echo "Data updated.</p><br />";
	}

	// Execution de la requete selectionnant tous les enregistrements la table admin
	$requete = mysql_query("select * from $db_profile") or die(mysql_error());

 	// Creation du formulaire
  echo "<form name=\"update_profile\" method=\"post\" enctype=\"multipart/form-data\"  action=\"" . $_SERVER['PHP_SELF'] . "\">
    <table>";

	 $admin = mysql_fetch_array( $requete );

   // On affiche la ligne du tableau de l'actu courante
   echo "<tr>
            <td class=\"droite\"> TCG name :  </td><td><input name=\"tcg_name\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $admin[0] . "\" /></td>
         </tr>
         <tr>
            <td class=\"droitep\"> TCG url :  </td><td class=\"pair\"><input name=\"tcg_url\" type=\"text\" size=\"70\" maxlength=\"150\" value=\"" . $admin[1] . "\" /></td>
         </tr>
         <tr>
            <td class=\"droite\"> Member name :  </td><td><input name=\"mem_name\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $admin[2] . "\" /></td>
         </tr>
         <tr>
            <td class=\"droitep\"> Level :  </td><td class=\"pair\"><input name=\"level\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $admin[3] . "\" /></td>
         </tr>
         <tr>
            <td class=\"droite\"> Level image :  </td><td>
            <img src=\"". $_SESSION['url'] . "images/" . $admin[4] . "\" /><br />
            <input type=\"checkbox\" name=\"replace\" value=\"y\" id=\"replace\" />replace image.
            <br /><br />
            <input type=\"file\" name=\"level_image\" /></td>
         </tr>
         <tr>
            <td class=\"droitep\"> Wishlist :  </td><td class=\"pair\"><input name=\"wishlist\" type=\"text\" size=\"100\" maxlength=\"250\" value=\"" . $admin[5] . "\" /></td>
         </tr>
         <tr><td class=\"droite\"> Mastered :  </td><td>
	   <input type=\"radio\" name=\"choice\" value=\"1\" id=\"chkb1\" onClick=\"GereControle('chkb1', 'mfile', '0');\"  ";
	   if ( $admin[6] == 1 ) echo "checked";
	   echo "/> <label for=\"chkb1\">Show text list of mastered decks.</label><br />
	   <input type=\"radio\" name=\"choice\" value=\"2\" id=\"chkb2\" onClick=\"GereControle('chkb2', 'mfile', '0');\" ";
	   if ( $admin[6] == 2 ) echo "checked";
	   echo "/> <label for=\"chkb2\">Show image list of mastered decks.</label><br />
	   <input type=\"radio\" name=\"choice\" value=\"3\" id=\"chkb3\" onClick=\"GereControle('chkb3', 'mfile', '1');\" ";
	   if ( $admin[6] == 3 ) echo "checked";
	   echo "/> <label for=\"chkb3\">Show text list with links to mastered decks.</label><br />
	   <input type=\"radio\" name=\"choice\" value=\"4\" id=\"chkb4\" onClick=\"GereControle('chkb4', 'mfile', '1');\" ";
	   if ( $admin[6] == 4 ) echo "checked";
	   echo "/> <label for=\"chkb4\">Show image list with links to mastered decks.</label><br /></td>
          </tr>
          <tr>
            <td class=\"droite\"> Mastered file name :  </td><td><input name=\"mfile\" id=\"mfile\" type=\"text\" size=\"50\" maxlength=\"50\" value=\"" . $admin[7] . "\"";

		if ( $admin[6] == 1 || $admin[6] == 2 ) echo "style=\"visibility:hidden\"";

		echo "/><br />
		<p class=\"legend\">(Visible only if you choose to link to mastered decks.)</p></td>
         </tr>
	   <tr><td class=\"droite\"><input name=\"update\" type=\"submit\" value=\"Update\"></td><td><input name=\"cancel\" type=\"reset\" value=\"Reset form\"></td></tr></table></form>";


  mysql_close();

  include "footer.php";
?>