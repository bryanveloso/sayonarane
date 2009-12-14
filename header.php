<div id="header">
<h1></h1>
<p>さようなら ね・・・{ SAYONARANE.net }</p>
<?php include('konchan_random.php'); ?>

<div id="dots" class="polaroids">
	<?php 
	echo "<img src=" . $cool[array_rand($cool,1)] . $digits2[array_rand($digits2,1)] . ">";
	?>
</div>

<div id="swirls" class="polaroids">
	<?php 
	echo "<img src=" . $simple[array_rand($simple,1)] . $digits3[array_rand($digits3,1)] . ">";
	?>
</div>

<div id="hearts" class="polaroids">
	<?php 
	echo "<img src=" . $cute[array_rand($cute,1)] . $digits[array_rand($digits,1)] . ">";
	?>
</div>

<div id="stars" class="polaroids">
	<?php 
	echo "<img src=" . $cute[array_rand($cute,1)] . $digits[array_rand($digits,1)] . ">";
	?>
</div>

<div id="flowers" class="polaroids">
	<?php 
	echo "<img src=" . $cool[array_rand($cool,1)] . $digits2[array_rand($digits2,1)] . ">";
	?>
</div>

</div>