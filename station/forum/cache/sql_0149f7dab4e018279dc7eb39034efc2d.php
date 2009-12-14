<?php

/* SELECT COUNT(DISTINCT s.session_ip) as num_guests FROM hstcg_phpbb_sessions s WHERE s.session_user_id = 1 AND s.session_time >= 1253484720 AND s.session_forum_id = 4 */

$expired = (time() > 1253485080) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = unserialize('a:1:{i:0;a:1:{s:10:"num_guests";s:1:"0";}}');

?>