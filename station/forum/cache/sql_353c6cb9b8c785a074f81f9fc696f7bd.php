<?php

/* SELECT forum_id, forum_name, parent_id, forum_type, left_id, right_id FROM hstcg_phpbb_forums ORDER BY left_id ASC */

$expired = (time() > 1253519166) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = unserialize('a:6:{i:0;a:6:{s:8:"forum_id";s:1:"2";s:10:"forum_name";s:13:"At The Studio";s:9:"parent_id";s:1:"0";s:10:"forum_type";s:1:"0";s:7:"left_id";s:1:"1";s:8:"right_id";s:1:"8";}i:1;a:6:{s:8:"forum_id";s:1:"3";s:10:"forum_name";s:13:"Announcements";s:9:"parent_id";s:1:"2";s:10:"forum_type";s:1:"1";s:7:"left_id";s:1:"2";s:8:"right_id";s:1:"3";}i:2;a:6:{s:8:"forum_id";s:1:"8";s:10:"forum_name";s:18:"Caller\'s Questions";s:9:"parent_id";s:1:"2";s:10:"forum_type";s:1:"1";s:7:"left_id";s:1:"4";s:8:"right_id";s:1:"5";}i:3;a:6:{s:8:"forum_id";s:1:"4";s:10:"forum_name";s:7:"Updates";s:9:"parent_id";s:1:"2";s:10:"forum_type";s:1:"1";s:7:"left_id";s:1:"6";s:8:"right_id";s:1:"7";}i:4;a:6:{s:8:"forum_id";s:1:"5";s:10:"forum_name";s:10:"The Lounge";s:9:"parent_id";s:1:"0";s:10:"forum_type";s:1:"0";s:7:"left_id";s:1:"9";s:8:"right_id";s:2:"12";}i:5;a:6:{s:8:"forum_id";s:1:"6";s:10:"forum_name";s:14:"Random Chatter";s:9:"parent_id";s:1:"5";s:10:"forum_type";s:1:"1";s:7:"left_id";s:2:"10";s:8:"right_id";s:2:"11";}}');

?>