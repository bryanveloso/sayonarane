<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo (isset($this->_rootref['S_CONTENT_ENCODING'])) ? $this->_rootref['S_CONTENT_ENCODING'] : ''; ?>">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Language" content="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>">
<title><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?> :: <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>

<style type="text/css">
<!--

body {
	font-family: Verdana,serif;
	font-size: 10pt;
}

img {
	border: 0;
}

td {
	font-family: Verdana,serif;
	font-size: 10pt;
	line-height: 150%;
}

.code,
.quote {
	font-size: smaller;
	border: black solid 1px;
}

.forum {
	font-family: Arial,Helvetica,sans-serif;
	font-weight: bold;
	font-size: 18pt;
}

.topic {
	font-family: Arial,Helvetica,sans-serif;
	font-size: 14pt;
	font-weight: bold;
}

.gensmall {
	font-size: 8pt;
}

hr {
	color: #888;
	height: 3px;
	border-style: solid;
}

hr.sep {
	color: #aaa;
	height: 1px;
	border-style: dashed;
}
//-->
</style>

</head>
<body>

<table width="85%" cellspacing="3" cellpadding="0" border="0" align="center">
<tr>
	<td colspan="2" align="center"><span class="Forum"><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?></span><br /><span class="gensmall"><a href="<?php echo (isset($this->_rootref['U_FORUM'])) ? $this->_rootref['U_FORUM'] : ''; ?>"><?php echo (isset($this->_rootref['U_FORUM'])) ? $this->_rootref['U_FORUM'] : ''; ?></a></span></td>
</tr>
<tr>
	<td colspan="2"><br /></td>
</tr>
<tr>
	<td><span class="topic"><?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?></span><br /><span class="gensmall"><a href="<?php echo (isset($this->_rootref['U_TOPIC'])) ? $this->_rootref['U_TOPIC'] : ''; ?>"><?php echo (isset($this->_rootref['U_TOPIC'])) ? $this->_rootref['U_TOPIC'] : ''; ?></a></span></td>
	<td align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>" valign="bottom"><span class="gensmall"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></span></td>
</tr>
</table>

<?php $_postrow_count = (isset($this->_tpldata['postrow'])) ? sizeof($this->_tpldata['postrow']) : 0;if ($_postrow_count) {for ($_postrow_i = 0; $_postrow_i < $_postrow_count; ++$_postrow_i){$_postrow_val = &$this->_tpldata['postrow'][$_postrow_i]; ?>

	<hr width="85%" />

	<table width="85%" cellspacing="3" cellpadding="0" border="0" align="center">
	<tr>
		<td width="10%" nowrap="nowrap"><?php echo ((isset($this->_rootref['L_AUTHOR'])) ? $this->_rootref['L_AUTHOR'] : ((isset($user->lang['AUTHOR'])) ? $user->lang['AUTHOR'] : '{ AUTHOR }')); ?>:&nbsp;</td>
		<td><b<?php if ($_postrow_val['POST_AUTHOR_COLOUR']) {  ?> style="color: <?php echo $_postrow_val['POST_AUTHOR_COLOUR']; ?>"<?php } ?>><?php echo $_postrow_val['POST_AUTHOR']; ?></b> [ <?php echo $_postrow_val['POST_DATE']; ?> ]</td>
	</tr>
	<tr>
		<td width="10%" nowrap="nowrap"><?php echo ((isset($this->_rootref['L_POST_SUBJECT'])) ? $this->_rootref['L_POST_SUBJECT'] : ((isset($user->lang['POST_SUBJECT'])) ? $user->lang['POST_SUBJECT'] : '{ POST_SUBJECT }')); ?>:&nbsp;</td>
		<td><b><?php echo $_postrow_val['POST_SUBJECT']; ?></b></td>
	</tr>
	<tr>
		<td colspan="2"><hr class="sep" /><?php echo $_postrow_val['MESSAGE']; ?>

		<?php if ($_postrow_val['S_HAS_ATTACHMENTS']) {  ?>
			<br clear="all" /><br />

			<table class="tablebg" width="100%" cellspacing="1">
			<tr>
				<td><b class="genmed"><?php echo ((isset($this->_rootref['L_ATTACHMENTS'])) ? $this->_rootref['L_ATTACHMENTS'] : ((isset($user->lang['ATTACHMENTS'])) ? $user->lang['ATTACHMENTS'] : '{ ATTACHMENTS }')); ?>: </b></td>
			</tr>
			<?php $_attachment_count = (isset($_postrow_val['attachment'])) ? sizeof($_postrow_val['attachment']) : 0;if ($_attachment_count) {for ($_attachment_i = 0; $_attachment_i < $_attachment_count; ++$_attachment_i){$_attachment_val = &$_postrow_val['attachment'][$_attachment_i]; ?>
				<tr>
					<td><?php echo $_attachment_val['DISPLAY_ATTACHMENT']; ?></td>
				</tr>
			<?php }} ?>
			</table>
		<?php } ?>

		</td>
	</tr>
	</table>
<?php }} ?>

<hr width="85%" />
<!--
	We request you retain the full copyright notice below including the link to www.phpbb.com.
	This not only gives respect to the large amount of time given freely by the developers
	but also helps build interest, traffic and use of phpBB3. If you (honestly) cannot retain
	the full copyright we ask you at least leave in place the "Powered by phpBB" line. If you
	refuse to include even this then support on our forums may be affected.

	The phpBB Group : 2006
// -->

<table width="85%" cellspacing="3" cellpadding="0" border="0" align="center">
<tr>
	<td><span class="gensmall"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></span></td>
	<td align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><span class="gensmall"><?php echo (isset($this->_rootref['S_TIMEZONE'])) ? $this->_rootref['S_TIMEZONE'] : ''; ?></span></td>
</tr>
<tr>
	<td colspan="2" align="center"><span class="gensmall">Powered by phpBB &copy; 2000, 2002, 2005, 2007 phpBB Group<br />http://www.phpbb.com/</span></td>
</tr>
</table>

</body>
</html>