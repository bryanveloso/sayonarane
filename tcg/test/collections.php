<?php
	include "header.php";
	include "myTCGpost/config.php";
?>
	<h1>&raquo; C O L L E C T I O N S &laquo;</h1>
	<br />
	<?= tcg_print_collections( 2, 1 ); ?>

	<h1>&raquo; P U Z Z L E S &laquo;</h1>
	<br />
	<?= tcg_print_collections( 2, 2 ); ?>
	<br />
	<h1>&raquo; F U T U R E &nbsp;C O L L E C T I O N S &laquo;</h1>
<?= tcg_print_cards( 6, 2, 2 ); ?>
<?php
	include "footer.php"
?>