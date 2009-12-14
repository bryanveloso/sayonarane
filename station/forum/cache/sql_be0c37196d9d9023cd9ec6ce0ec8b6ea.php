<?php

/* SELECT ban_ip, ban_userid, ban_email, ban_exclude, ban_give_reason, ban_end FROM hstcg_phpbb_banlist WHERE (ban_ip = '' OR ban_exclude = 1) AND (ban_userid = 0 OR ban_exclude = 1) */

$expired = (time() > 1253515614) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = unserialize('a:0:{}');

?>