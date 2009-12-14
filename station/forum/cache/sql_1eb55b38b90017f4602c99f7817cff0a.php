<?php

/* SELECT smiley_id FROM hstcg_phpbb_smilies WHERE display_on_posting = 0 LIMIT 1 */

$expired = (time() > 1253507105) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = unserialize('a:1:{i:0;a:1:{s:9:"smiley_id";s:2:"85";}}');

?>