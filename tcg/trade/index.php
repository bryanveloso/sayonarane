<?php
# header( "HTTP/1.1 301 Moved Permanently" );
# header( "Status: 301 Moved Permanently" );
# header( "Location: http://sayonarane.net/layouts/konchan/" );
# exit(0); // This is Optional but suggested, to avoid any accidental output
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>さようなら ね・・・ { SAYONARANE.net ・・・ index ・・・ v.2 KONchan  ☆ paraDISE }</title>
  <link rel="stylesheet" href="/layouts/konchan/master.css" type="text/css" media="screen" charset="utf-8">

    <link rel="openid.server" href="http://sayonarane.net/id.php">
    <link rel="openid.delegate" href="http://sayonarane.net/id.php">
	
</head>
<body>

<div id="container">
	
	<?php include "/home/237/domains/sayonarane.net/html/header.php" ?>

	<div id="content">
		<div id="main">
		<h4>trade form</h4>
		
		<p>this form is new, so if you encounter any problems, please let me know!</p>
		
		<?php
		function clean($data) {
			$data = trim(stripslashes(strip_tags($data)));
			return $data;
		}
		$exploits = "/(content-type|bcc:|cc:|document.cookie|onclick|onload)/i";
		foreach ($_POST as $key => $val) {
			$c[$key] = clean($val);

			if (preg_match($exploits, $val)) {
				exit("<p>No exploits, please!</p>");
			}
		}

		$show_form = true;
		$error_msg = NULL;

		if (isset($c['submit'])) {
			if (empty($c['name']) || empty($c['email']) || empty($c['offer'])) {
				$error_msg .= "Name, e-mail and comments are required fields. \n";
			} elseif (strlen($c['name']) > 15) {
				$error_msg .= "The name field is limited at 15 characters. Your first name or nickname will do! \n";
			} elseif (!ereg("^[A-Za-z' -]", $c['name'])) {
				$error_msg .= "The name field must not contain special characters. \n";
			} elseif (!ereg("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$",strtolower($c['email']))) {
				$error_msg .= "That is not a valid e-mail address. \n";
			}

			if ($error_msg == NULL) {
				$show_form = false;

				if (!empty($c['url']) && !ereg("^(http|https)", $c['url'])) {
					$c['url'] = "http://" . $c['url'];
				}

				$subject = "{S A Y O N A R A N E} trade request";

				$message = "You received this e-mail message through SAYONARANE: \n\n";
				foreach ($c as $key => $val) {
					$message .= ucwords($key) . ": $val \n";
				}
				$message .= "IP: {$_SERVER['REMOTE_ADDR']} \n";
				$message .= "Browser: {$_SERVER['HTTP_USER_AGENT']}";

				if (strstr($_SERVER['SERVER_SOFTWARE'], "Win")) {
					$headers   = "From: iceymoon@gmail.com \n";
					$headers  .= "Reply-To: {$c['email']}";
				} else {
					$headers   = "From: SAYONARANE <iceymoon@gmail.com> \n";
					$headers  .= "Reply-To: {$c['email']}";
				}

				$recipient = "iceymoon@gmail.com";

				if (mail($recipient,$subject,$message,$headers)) {
					echo "<p><b>your mail was successfully sent!</b> i will reply shortly. if you don't get a reply within 2 weeks, feel free to re-send.</p>";
				} else {
					echo "<p>Your mail could not be sent this time.</p>";
				}
			}
		}
		if (!isset($c['submit']) || $show_form == true) {
			function get_data($var) {
				global $c;
				if (isset($c[$var])) {
					echo $c[$var];
				}
			}

			if ($error_msg != NULL) {
				echo "<p><strong style='color: red;'>ERROR:</strong><br />";
				echo nl2br($error_msg) . "</p>";
			}
		?>
			
			<center>
			<table border="0" cellpadding="0" cellspacing="0"><tr><td>
			<form action="" method="post"><p>
				<label><input type="text" name="name" id="name" value="<?php get_data("name"); ?>" /> name</label><br />
				<label><input type="text" name="email" id="email" value="<?php get_data("email"); ?>" /> e-mail</label><br />
				<label><input type="text" name="url" id="url" value="<?php get_data("url"); ?>" /> website</label><br />
				<label><input type="text" name="tcg" id="tcg" value="<?php get_data("tcg"); ?>" /> which tcg?</label><br />
				<label><textarea name="offer" id="offer"><?php get_data("comments"); ?>what is your offer?</textarea> </label><br />
				<input type="submit" name="submit" id="submit" class="button" value="let's trade!! x3" /> <input type="reset" name="clear" id="clear" class="button" value="nevermind T-T" />
			</p></form></td></tr></table>
			</center>
			
		<?php
		}
		?>
		
		</div>

		<div id="footer">
		<?php include "/home/237/domains/sayonarane.net/html/footer.php" ?>
	  </div>

		<div id="sidebar">
		<?php include "/home/237/domains/sayonarane.net/html/sidebar.php" ?>
	  </div>

	</div>
</div>	

</body>
</html>