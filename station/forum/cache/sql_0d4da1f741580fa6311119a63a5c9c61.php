<?php

/* SELECT * FROM hstcg_phpbb_smilies WHERE display_on_posting = 1 ORDER BY smiley_order */

$expired = (time() > 1253507105) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = unserialize('a:55:{i:0;a:8:{s:9:"smiley_id";s:2:"46";s:4:"code";s:2:":D";s:7:"emotion";s:10:"Very Happy";s:10:"smiley_url";s:16:"icon_biggrin.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:1:"1";s:18:"display_on_posting";s:1:"1";}i:1;a:8:{s:9:"smiley_id";s:2:"47";s:4:"code";s:3:":-D";s:7:"emotion";s:10:"Very Happy";s:10:"smiley_url";s:16:"icon_biggrin.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:1:"2";s:18:"display_on_posting";s:1:"1";}i:2;a:8:{s:9:"smiley_id";s:2:"48";s:4:"code";s:6:":grin:";s:7:"emotion";s:10:"Very Happy";s:10:"smiley_url";s:16:"icon_biggrin.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:1:"3";s:18:"display_on_posting";s:1:"1";}i:3;a:8:{s:9:"smiley_id";s:2:"82";s:4:"code";s:12:":cheesygrin:";s:7:"emotion";s:11:"Cheesy Grin";s:10:"smiley_url";s:19:"icon_cheesygrin.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:1:"4";s:18:"display_on_posting";s:1:"1";}i:4;a:8:{s:9:"smiley_id";s:2:"49";s:4:"code";s:2:":)";s:7:"emotion";s:5:"Smile";s:10:"smiley_url";s:14:"icon_smile.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:1:"5";s:18:"display_on_posting";s:1:"1";}i:5;a:8:{s:9:"smiley_id";s:2:"50";s:4:"code";s:3:":-)";s:7:"emotion";s:5:"Smile";s:10:"smiley_url";s:14:"icon_smile.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:1:"6";s:18:"display_on_posting";s:1:"1";}i:6;a:8:{s:9:"smiley_id";s:2:"51";s:4:"code";s:7:":smile:";s:7:"emotion";s:5:"Smile";s:10:"smiley_url";s:14:"icon_smile.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:1:"7";s:18:"display_on_posting";s:1:"1";}i:7;a:8:{s:9:"smiley_id";s:2:"52";s:4:"code";s:2:";)";s:7:"emotion";s:4:"Wink";s:10:"smiley_url";s:13:"icon_wink.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:1:"8";s:18:"display_on_posting";s:1:"1";}i:8;a:8:{s:9:"smiley_id";s:2:"53";s:4:"code";s:3:";-)";s:7:"emotion";s:4:"Wink";s:10:"smiley_url";s:13:"icon_wink.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:1:"9";s:18:"display_on_posting";s:1:"1";}i:9;a:8:{s:9:"smiley_id";s:2:"54";s:4:"code";s:6:":wink:";s:7:"emotion";s:4:"Wink";s:10:"smiley_url";s:13:"icon_wink.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"10";s:18:"display_on_posting";s:1:"1";}i:10;a:8:{s:9:"smiley_id";s:2:"55";s:4:"code";s:2:":(";s:7:"emotion";s:3:"Sad";s:10:"smiley_url";s:12:"icon_sad.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"11";s:18:"display_on_posting";s:1:"1";}i:11;a:8:{s:9:"smiley_id";s:2:"56";s:4:"code";s:3:":-(";s:7:"emotion";s:3:"Sad";s:10:"smiley_url";s:12:"icon_sad.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"12";s:18:"display_on_posting";s:1:"1";}i:12;a:8:{s:9:"smiley_id";s:2:"57";s:4:"code";s:5:":sad:";s:7:"emotion";s:3:"Sad";s:10:"smiley_url";s:12:"icon_sad.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"13";s:18:"display_on_posting";s:1:"1";}i:13;a:8:{s:9:"smiley_id";s:2:"58";s:4:"code";s:2:":o";s:7:"emotion";s:9:"Surprised";s:10:"smiley_url";s:18:"icon_surprised.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"14";s:18:"display_on_posting";s:1:"1";}i:14;a:8:{s:9:"smiley_id";s:2:"59";s:4:"code";s:3:":-o";s:7:"emotion";s:9:"Surprised";s:10:"smiley_url";s:18:"icon_surprised.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"15";s:18:"display_on_posting";s:1:"1";}i:15;a:8:{s:9:"smiley_id";s:2:"60";s:4:"code";s:11:":surprised:";s:7:"emotion";s:9:"Surprised";s:10:"smiley_url";s:18:"icon_surprised.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"16";s:18:"display_on_posting";s:1:"1";}i:16;a:8:{s:9:"smiley_id";s:2:"61";s:4:"code";s:7:":shock:";s:7:"emotion";s:7:"Shocked";s:10:"smiley_url";s:12:"icon_eek.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"17";s:18:"display_on_posting";s:1:"1";}i:17;a:8:{s:9:"smiley_id";s:2:"62";s:4:"code";s:10:":confused:";s:7:"emotion";s:8:"Confused";s:10:"smiley_url";s:17:"icon_confused.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"18";s:18:"display_on_posting";s:1:"1";}i:18;a:8:{s:9:"smiley_id";s:2:"83";s:4:"code";s:5:":???:";s:7:"emotion";s:8:"Confused";s:10:"smiley_url";s:17:"icon_confused.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"19";s:18:"display_on_posting";s:1:"1";}i:19;a:8:{s:9:"smiley_id";s:2:"20";s:4:"code";s:3:"8-)";s:7:"emotion";s:4:"Cool";s:10:"smiley_url";s:13:"icon_cool.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"20";s:18:"display_on_posting";s:1:"1";}i:20;a:8:{s:9:"smiley_id";s:2:"21";s:4:"code";s:6:":cool:";s:7:"emotion";s:4:"Cool";s:10:"smiley_url";s:13:"icon_cool.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"21";s:18:"display_on_posting";s:1:"1";}i:21;a:8:{s:9:"smiley_id";s:2:"63";s:4:"code";s:5:":lol:";s:7:"emotion";s:8:"Laughing";s:10:"smiley_url";s:12:"icon_lol.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"22";s:18:"display_on_posting";s:1:"1";}i:22;a:8:{s:9:"smiley_id";s:2:"64";s:4:"code";s:2:":x";s:7:"emotion";s:3:"Mad";s:10:"smiley_url";s:12:"icon_mad.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"23";s:18:"display_on_posting";s:1:"1";}i:23;a:8:{s:9:"smiley_id";s:2:"65";s:4:"code";s:3:":-x";s:7:"emotion";s:3:"Mad";s:10:"smiley_url";s:12:"icon_mad.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"24";s:18:"display_on_posting";s:1:"1";}i:24;a:8:{s:9:"smiley_id";s:2:"78";s:4:"code";s:7:":frown:";s:7:"emotion";s:5:"Frown";s:10:"smiley_url";s:14:"icon_frown.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"25";s:18:"display_on_posting";s:1:"1";}i:25;a:8:{s:9:"smiley_id";s:2:"66";s:4:"code";s:5:":mad:";s:7:"emotion";s:3:"Mad";s:10:"smiley_url";s:12:"icon_mad.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"26";s:18:"display_on_posting";s:1:"1";}i:26;a:8:{s:9:"smiley_id";s:2:"67";s:4:"code";s:2:":P";s:7:"emotion";s:4:"Razz";s:10:"smiley_url";s:13:"icon_razz.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"27";s:18:"display_on_posting";s:1:"1";}i:27;a:8:{s:9:"smiley_id";s:2:"68";s:4:"code";s:3:":-P";s:7:"emotion";s:4:"Razz";s:10:"smiley_url";s:13:"icon_razz.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"28";s:18:"display_on_posting";s:1:"1";}i:28;a:8:{s:9:"smiley_id";s:2:"69";s:4:"code";s:8:":tongue:";s:7:"emotion";s:4:"Razz";s:10:"smiley_url";s:13:"icon_razz.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"29";s:18:"display_on_posting";s:1:"1";}i:29;a:8:{s:9:"smiley_id";s:2:"70";s:4:"code";s:6:":oops:";s:7:"emotion";s:11:"Embarrassed";s:10:"smiley_url";s:16:"icon_redface.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"30";s:18:"display_on_posting";s:1:"1";}i:30;a:8:{s:9:"smiley_id";s:2:"71";s:4:"code";s:5:":cry:";s:7:"emotion";s:6:"Crying";s:10:"smiley_url";s:12:"icon_cry.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"31";s:18:"display_on_posting";s:1:"1";}i:31;a:8:{s:9:"smiley_id";s:2:"72";s:4:"code";s:6:":evil:";s:7:"emotion";s:4:"Evil";s:10:"smiley_url";s:13:"icon_evil.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"32";s:18:"display_on_posting";s:1:"1";}i:32;a:8:{s:9:"smiley_id";s:2:"73";s:4:"code";s:9:":twisted:";s:7:"emotion";s:7:"Twisted";s:10:"smiley_url";s:16:"icon_twisted.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"33";s:18:"display_on_posting";s:1:"1";}i:33;a:8:{s:9:"smiley_id";s:2:"74";s:4:"code";s:6:":roll:";s:7:"emotion";s:9:"Roll Eyes";s:10:"smiley_url";s:17:"icon_rolleyes.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"34";s:18:"display_on_posting";s:1:"1";}i:34;a:8:{s:9:"smiley_id";s:2:"75";s:4:"code";s:3:":!:";s:7:"emotion";s:11:"Exclamation";s:10:"smiley_url";s:16:"icon_exclaim.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"35";s:18:"display_on_posting";s:1:"1";}i:35;a:8:{s:9:"smiley_id";s:2:"76";s:4:"code";s:3:":?:";s:7:"emotion";s:8:"Question";s:10:"smiley_url";s:17:"icon_question.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"36";s:18:"display_on_posting";s:1:"1";}i:36;a:8:{s:9:"smiley_id";s:2:"77";s:4:"code";s:6:":idea:";s:7:"emotion";s:4:"Idea";s:10:"smiley_url";s:13:"icon_idea.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"37";s:18:"display_on_posting";s:1:"1";}i:37;a:8:{s:9:"smiley_id";s:2:"37";s:4:"code";s:7:":arrow:";s:7:"emotion";s:5:"Arrow";s:10:"smiley_url";s:14:"icon_arrow.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"38";s:18:"display_on_posting";s:1:"1";}i:38;a:8:{s:9:"smiley_id";s:2:"43";s:4:"code";s:11:":arrowdown:";s:7:"emotion";s:10:"Arrow Down";s:10:"smiley_url";s:15:"icon_arrowd.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"39";s:18:"display_on_posting";s:1:"1";}i:39;a:8:{s:9:"smiley_id";s:2:"44";s:4:"code";s:11:":arrowleft:";s:7:"emotion";s:10:"Arrow Left";s:10:"smiley_url";s:15:"icon_arrowl.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"40";s:18:"display_on_posting";s:1:"1";}i:40;a:8:{s:9:"smiley_id";s:2:"45";s:4:"code";s:9:":arrowup:";s:7:"emotion";s:8:"Arrow Up";s:10:"smiley_url";s:15:"icon_arrowu.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"41";s:18:"display_on_posting";s:1:"1";}i:41;a:8:{s:9:"smiley_id";s:2:"79";s:4:"code";s:2:":|";s:7:"emotion";s:7:"Neutral";s:10:"smiley_url";s:16:"icon_neutral.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"42";s:18:"display_on_posting";s:1:"1";}i:42;a:8:{s:9:"smiley_id";s:2:"80";s:4:"code";s:3:":-|";s:7:"emotion";s:7:"Neutral";s:10:"smiley_url";s:16:"icon_neutral.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"43";s:18:"display_on_posting";s:1:"1";}i:43;a:8:{s:9:"smiley_id";s:2:"84";s:4:"code";s:9:":neutral:";s:7:"emotion";s:7:"Neutral";s:10:"smiley_url";s:16:"icon_neutral.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"44";s:18:"display_on_posting";s:1:"1";}i:44;a:8:{s:9:"smiley_id";s:2:"81";s:4:"code";s:9:":mrgreen:";s:7:"emotion";s:9:"Mr. Green";s:10:"smiley_url";s:16:"icon_mrgreen.gif";s:12:"smiley_width";s:2:"15";s:13:"smiley_height";s:2:"15";s:12:"smiley_order";s:2:"45";s:18:"display_on_posting";s:1:"1";}i:45;a:8:{s:9:"smiley_id";s:2:"96";s:4:"code";s:9:":excited:";s:7:"emotion";s:7:"Excited";s:10:"smiley_url";s:11:"excited.gif";s:12:"smiley_width";s:2:"50";s:13:"smiley_height";s:2:"50";s:12:"smiley_order";s:2:"46";s:18:"display_on_posting";s:1:"1";}i:46;a:8:{s:9:"smiley_id";s:2:"97";s:4:"code";s:6:":fail:";s:7:"emotion";s:4:"Fail";s:10:"smiley_url";s:8:"fail.gif";s:12:"smiley_width";s:2:"50";s:13:"smiley_height";s:2:"50";s:12:"smiley_order";s:2:"47";s:18:"display_on_posting";s:1:"1";}i:47;a:8:{s:9:"smiley_id";s:3:"101";s:4:"code";s:4:":hi:";s:7:"emotion";s:2:"Hi";s:10:"smiley_url";s:6:"hi.gif";s:12:"smiley_width";s:2:"50";s:13:"smiley_height";s:2:"50";s:12:"smiley_order";s:2:"48";s:18:"display_on_posting";s:1:"1";}i:48;a:8:{s:9:"smiley_id";s:3:"103";s:4:"code";s:9:":hopeful:";s:7:"emotion";s:7:"Hopeful";s:10:"smiley_url";s:11:"hopeful.gif";s:12:"smiley_width";s:2:"50";s:13:"smiley_height";s:2:"50";s:12:"smiley_order";s:2:"49";s:18:"display_on_posting";s:1:"1";}i:49;a:8:{s:9:"smiley_id";s:3:"104";s:4:"code";s:5:":huh:";s:7:"emotion";s:4:"Huh?";s:10:"smiley_url";s:7:"huh.gif";s:12:"smiley_width";s:2:"50";s:13:"smiley_height";s:2:"50";s:12:"smiley_order";s:2:"50";s:18:"display_on_posting";s:1:"1";}i:50;a:8:{s:9:"smiley_id";s:3:"107";s:4:"code";s:6:":iwin:";s:7:"emotion";s:6:"I Win!";s:10:"smiley_url";s:8:"iwin.gif";s:12:"smiley_width";s:2:"50";s:13:"smiley_height";s:2:"50";s:12:"smiley_order";s:2:"51";s:18:"display_on_posting";s:1:"1";}i:51;a:8:{s:9:"smiley_id";s:3:"114";s:4:"code";s:8:":pissed:";s:7:"emotion";s:6:"Pissed";s:10:"smiley_url";s:10:"pissed.gif";s:12:"smiley_width";s:2:"50";s:13:"smiley_height";s:2:"50";s:12:"smiley_order";s:2:"52";s:18:"display_on_posting";s:1:"1";}i:52;a:8:{s:9:"smiley_id";s:3:"118";s:4:"code";s:11:":soawesome:";s:7:"emotion";s:10:"So Awesome";s:10:"smiley_url";s:13:"soawesome.gif";s:12:"smiley_width";s:2:"50";s:13:"smiley_height";s:2:"50";s:12:"smiley_order";s:2:"53";s:18:"display_on_posting";s:1:"1";}i:53;a:8:{s:9:"smiley_id";s:3:"119";s:4:"code";s:11:":supercool:";s:7:"emotion";s:10:"Super Cool";s:10:"smiley_url";s:13:"supercool.gif";s:12:"smiley_width";s:2:"50";s:13:"smiley_height";s:2:"50";s:12:"smiley_order";s:2:"54";s:18:"display_on_posting";s:1:"1";}i:54;a:8:{s:9:"smiley_id";s:3:"125";s:4:"code";s:9:":whistle:";s:7:"emotion";s:7:"Whistle";s:10:"smiley_url";s:11:"whistle.gif";s:12:"smiley_width";s:2:"50";s:13:"smiley_height";s:2:"50";s:12:"smiley_order";s:2:"55";s:18:"display_on_posting";s:1:"1";}}');

?>