<?php

/* SELECT m.*, u.user_colour, g.group_colour, g.group_type FROM (hstcg_phpbb_moderator_cache m) LEFT JOIN hstcg_phpbb_users u ON (m.user_id = u.user_id) LEFT JOIN hstcg_phpbb_groups g ON (m.group_id = g.group_id) WHERE m.display_on_index = 1 AND m.forum_id IN (3, 8, 4, '2') */

$expired = (time() > 1253458309) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = unserialize('a:0:{}');

?>