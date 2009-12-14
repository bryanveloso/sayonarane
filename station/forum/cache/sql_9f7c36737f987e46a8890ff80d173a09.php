<?php

/* SELECT forum_name FROM hstcg_phpbb_forums WHERE forum_id = 4 */

$expired = (time() > 1253483420) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = unserialize('a:1:{i:0;a:1:{s:10:"forum_name";s:7:"Updates";}}');

?>