<?php
	include "header.php";
	include "myTCGpost/config.php";
?>
	<h1>&raquo; P R O F I L &laquo;</h1>
	<p align="center">
	<a href="<?= $tcg_url ?>" target="_blank"><?= $tcg_level_image ?></a>
	</p>
    <p>

	<strong>Game:</strong> <?= $tcg_name ?><br />
	<strong>Grade:</strong> <?= $tcg_level ?><br />
	<strong>Member Name:</strong> <?= $tcg_member_name ?><br />
	<strong>Total Cards:</strong> <?= $tcg_cards_owned + $tcg_total_mastered  ?><br />
	<strong>Total Cards Worth:</strong> <?= $tcg_cards_worth; ?><br />
	<br />
	<strong>Collecting: </strong><?= $tcg_current_collections; ?> <br />
	<br />
	<strong>Wishlist: <?= $tcg_wishlist ?></strong> <br />
	<br />
	<strong>Mastered: </strong><?= $tcg_mastered_collections; ?><br />
	</p>
	<p>
	<strong>Grades:</strong><br />
	<?= $tcg_tokens ?>
	<br />
	<br /><br />

	<strong>Member Card Tokens:</strong><br />
	<table>
	<tr>
	<td><img src="images/scallop.gif" width="51" height="48" alt="Scallop" title="Scallop" /></td>
	<td><img src="images/shrimp.gif" width="85" height="46" alt="Shrimp" title="Shrimp" /></td>
	<td><img src="images/puffer.gif" width="41" height="31" alt="Puffer" title="Puffer" /></td>
	</tr>
	<tr>
	<!-- Scallop -->
	<td> <strong>x1</strong> </td>
	<!-- Shrimp -->
	<td> <strong>x2</strong> </td>
	<!-- Puffer -->
	<td> <strong>x0</strong> </td>
	</tr>
	</table>
	<br />

	<?= $tcg_last_month ?>

	</p>
<?php
	include "footer.php"
?>