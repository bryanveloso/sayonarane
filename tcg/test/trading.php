<?php
	include "header.php";
	include "myTCGpost/config.php";
?>
<h1>&raquo; F O R &nbsp;T R A D E &laquo;</h1>
<?= tcg_print_cards( 3, 2, 2 ); ?>
<br />
<h1>&raquo; T R A D E &nbsp;F O R &nbsp;W H I S H L I S T &laquo;</h1>
<?= tcg_print_cards( 5, 2, 2 ); ?>

<?php
	include "footer.php";
?>