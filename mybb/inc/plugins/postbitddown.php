<?php
// Disallow direct access to this file for security reasons
if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

$plugins->add_hook("postbit", "postbitddown_postbit");

function postbitddown_info()
{
	return array(
		"name"			=> "Postbit Dropdown Menu",
		"description"	=> "Place a dropdown menu to the postbit instead of a link to user's profile.",
		"website"		=> "http://dragonfever.info",
		"author"		=> "DragonFever",
		"authorsite"	=> "http://dragonfever.info",
		"version"		=> "1.0",
		"guid" 			=> "404e90b5297c9beeed615126b883e2c2",
		"compatibility" => "18*"
	);
}

function postbitddown_postbit(&$post)
{
	global $mybb, $lang;
	$post['profilelink'] = "<a href=\"#\" id=\"profilelink_".$post['pid']."\">".$post['username_formatted']."</a>";
	$post['profilelink'] = $post['profilelink'].'<div id="profilelink_'.$post['pid'].'_popup" class="popup_menu" style="display: none; font-size:12px; font-weight: normal;">
<div class="popup_item_container">
<a href="'.$mybb->settings['bburl'].'/member.php?action=profile&amp;uid='.$post['uid'].'" class="popup_item">View Profile</a>
</div>
<div class="popup_item_container">
<a href="'.$mybb->settings['bburl'].'/search.php?action=finduser&amp;uid='.$post['uid'].'" class="popup_item">Find User\'s Posts</a>
</div>
<div class="popup_item_container">
<a href="'.$mybb->settings['bburl'].'/search.php?action=finduserthreads&uid='.$post['uid'].'" class="popup_item">Find User\'s Threads</a>
</div>
<div class="popup_item_container">
<a href="'.$mybb->settings['bburl'].'/private.php?action=send&amp;uid='.$post['uid'].'" class="popup_item">PM User</a>
</div>
<div class="popup_item_container">
<a href="'.$mybb->settings['bburl'].'/member.php?action=emailuser&amp;uid='.$post['uid'].'" class="popup_item">E-Mail User</a>
</div>
</div><br />
<script language="javascript" type="text/javascript">
new PopupMenu("profilelink_'.$post['pid'].'");
</script>';
}
?>