<?php $this->_tpl_include('overall_header.html'); ?>

<h4><?php echo (isset($this->_rootref['TOTAL_REGISTERED_USERS_ONLINE'])) ? $this->_rootref['TOTAL_REGISTERED_USERS_ONLINE'] : ''; ?></h4>
<h4><?php echo (isset($this->_rootref['TOTAL_GUEST_USERS_ONLINE'])) ? $this->_rootref['TOTAL_GUEST_USERS_ONLINE'] : ''; if ($this->_rootref['S_SWITCH_GUEST_DISPLAY']) {  ?> [ <a href="<?php echo (isset($this->_rootref['U_SWITCH_GUEST_DISPLAY'])) ? $this->_rootref['U_SWITCH_GUEST_DISPLAY'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SWITCH_GUEST_DISPLAY'])) ? $this->_rootref['L_SWITCH_GUEST_DISPLAY'] : ((isset($user->lang['SWITCH_GUEST_DISPLAY'])) ? $user->lang['SWITCH_GUEST_DISPLAY'] : '{ SWITCH_GUEST_DISPLAY }')); ?></a> ]<?php } ?></h4>
<br />

<?php if ($this->_rootref['PAGINATION']) {  ?>
	<table width="100%" cellspacing="1">
	<tr>
		<td class="nav" valign="middle" nowrap="nowrap">&nbsp;<?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?><br /></td>
		<td class="gensmall" width="100%" align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>" nowrap="nowrap"><b><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo ((isset($this->_rootref['L_GOTO_PAGE'])) ? $this->_rootref['L_GOTO_PAGE'] : ((isset($user->lang['GOTO_PAGE'])) ? $user->lang['GOTO_PAGE'] : '{ GOTO_PAGE }')); ?></a> <?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a>&nbsp;&nbsp;<?php } echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; if ($this->_rootref['NEXT_PAGE']) {  ?>&nbsp;&nbsp;<a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a><?php } ?></b></td>
	</tr>
	</table>
<?php } ?>

<table class="tablebg" width="100%" cellspacing="1">
<tr>
	<th width="40%"><a href="<?php echo (isset($this->_rootref['U_SORT_USERNAME'])) ? $this->_rootref['U_SORT_USERNAME'] : ''; ?>"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></a></th>
	<th width="20%"><a href="<?php echo (isset($this->_rootref['U_SORT_UPDATED'])) ? $this->_rootref['U_SORT_UPDATED'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LAST_UPDATED'])) ? $this->_rootref['L_LAST_UPDATED'] : ((isset($user->lang['LAST_UPDATED'])) ? $user->lang['LAST_UPDATED'] : '{ LAST_UPDATED }')); ?></a></th>
	<th width="40%"><a href="<?php echo (isset($this->_rootref['U_SORT_LOCATION'])) ? $this->_rootref['U_SORT_LOCATION'] : ''; ?>"><?php echo ((isset($this->_rootref['L_FORUM_LOCATION'])) ? $this->_rootref['L_FORUM_LOCATION'] : ((isset($user->lang['FORUM_LOCATION'])) ? $user->lang['FORUM_LOCATION'] : '{ FORUM_LOCATION }')); ?></a></th>
</tr>
<?php $_user_row_count = (isset($this->_tpldata['user_row'])) ? sizeof($this->_tpldata['user_row']) : 0;if ($_user_row_count) {for ($_user_row_i = 0; $_user_row_i < $_user_row_count; ++$_user_row_i){$_user_row_val = &$this->_tpldata['user_row'][$_user_row_i]; ?>
	<tr>
		<td class="row1"><p class="gen"><?php echo $_user_row_val['USERNAME_FULL']; ?></p><?php if ($_user_row_val['USER_IP']) {  ?><p class="gensmall"><?php echo ((isset($this->_rootref['L_IP'])) ? $this->_rootref['L_IP'] : ((isset($user->lang['IP'])) ? $user->lang['IP'] : '{ IP }')); ?>: <a href="<?php echo $_user_row_val['U_USER_IP']; ?>"><?php echo $_user_row_val['USER_IP']; ?></a> &#187; <a href="<?php echo $_user_row_val['U_WHOIS']; ?>" onclick="popup(this.href, 750, 500); return false;"><?php echo ((isset($this->_rootref['L_WHOIS'])) ? $this->_rootref['L_WHOIS'] : ((isset($user->lang['WHOIS'])) ? $user->lang['WHOIS'] : '{ WHOIS }')); ?></a></p><?php } if ($_user_row_val['USER_BROWSER']) {  echo $_user_row_val['USER_BROWSER']; } ?></td>
		<td class="row2" align="center" nowrap="nowrap"><p class="genmed">&nbsp;<?php echo $_user_row_val['LASTUPDATE']; ?></p></td>
		<td class="row1"><p class="genmed"><a href="<?php echo $_user_row_val['U_FORUM_LOCATION']; ?>"><?php echo $_user_row_val['FORUM_LOCATION']; ?></a></p></td>
	</tr>
<?php }} if ($this->_rootref['LEGEND']) {  ?>
	<tr>
		<td class="row1" colspan="3"><b class="gensmall"><?php echo ((isset($this->_rootref['L_LEGEND'])) ? $this->_rootref['L_LEGEND'] : ((isset($user->lang['LEGEND'])) ? $user->lang['LEGEND'] : '{ LEGEND }')); ?> :: <?php echo (isset($this->_rootref['LEGEND'])) ? $this->_rootref['LEGEND'] : ''; ?></b></td>
	</tr>
<?php } ?>
</table>

<?php if ($this->_rootref['PAGINATION']) {  ?>
	<table width="100%" cellspacing="1">
	<tr>
		<td class="nav" valign="middle" nowrap="nowrap">&nbsp;<?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?><br /></td>
		<td class="gensmall" width="100%" align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>" nowrap="nowrap"><b><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo ((isset($this->_rootref['L_GOTO_PAGE'])) ? $this->_rootref['L_GOTO_PAGE'] : ((isset($user->lang['GOTO_PAGE'])) ? $user->lang['GOTO_PAGE'] : '{ GOTO_PAGE }')); ?></a> <?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a>&nbsp;&nbsp;<?php } echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; if ($this->_rootref['NEXT_PAGE']) {  ?>&nbsp;&nbsp;<a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a><?php } ?></b></td>
	</tr>
	</table>
<?php } ?>

<div class="gensmall" align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><?php echo ((isset($this->_rootref['L_ONLINE_EXPLAIN'])) ? $this->_rootref['L_ONLINE_EXPLAIN'] : ((isset($user->lang['ONLINE_EXPLAIN'])) ? $user->lang['ONLINE_EXPLAIN'] : '{ ONLINE_EXPLAIN }')); ?></div>

<br clear="all" />

<?php $this->_tpl_include('breadcrumbs.html'); ?>

<br clear="all" />

<div align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><?php $this->_tpl_include('jumpbox.html'); ?></div>

<?php $this->_tpl_include('overall_footer.html'); ?>