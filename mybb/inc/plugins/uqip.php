<?php
if(!defined('IN_MYBB')){
	die('Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.');
}

function uqip_info()
{
    global $lang, $mybb;
    $lang->load("uqm"); 
	
	return array(
		"name"			=> "<a href=http://www.neonshares.info/>{$lang->title}</a>",
		"description"	=> "{$lang->description}",
		"website"		=> "http://www.neonshares.info/",
		"author"		=> "TheGodFather",
		"authorsite"	=> "http://www.neonshares.info/",
		"version"		=> "1.0",
		"compatibility" => "1*",
		"guid"        	=> "ae6e7ce1dd963edc890b2a7f8785ce71"
	);
}

function uqip_activate()
{
       global $lang, $mybb;
	   $lang->load("uqm"); 
	   
	   include MYBB_ROOT."/inc/adminfunctions_templates.php";
	   
	   $new = '<strong><span class="largetext"><a href="{$post[\'profilelink_plain\']}" id="profile_{$post[\'pid\']}">{$post[\'username_formatted\']}</a></span></strong> {$post[\'onlinestatus\']}<br /><div id="profile_{$post[\'pid\']}_popup" class="popup_menu" style="display: none;"><div class="popup_item_container"><table style="text-align: left;"><tr><td ><a href="{$post[\'profilelink_plain\']}"><img src="{$theme[\'imgdir\']}/uqm/profile.png" alt="" title="" /> {$lang->viewprofile}</a></td><td><a href="private.php?action=send&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/pm.png" alt="" title="" /> {$lang->sendpm}</a></td></tr><tr><td><a href="search.php?action=finduserthreads&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/thread.png" alt="" title="" /> {$lang->viewthreads}</a></td><td><a href="member.php?action=emailuser&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/email.png" alt="" title="" /> {$lang->sendemail}</a></td></tr><tr><td><a href="search.php?action=finduser&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/post.png" alt="" title="" /> {$lang->viewposts}</a></td><td>{$post[\'buddy_post\']}</td></tr></table></div></div><script type="text/javascript">if(use_xmlhttprequest == "1"){new PopupMenu("profile_{$post[\'pid\']}");}</script>';		
		$old = '<strong><span class="largetext">{$post[\'profilelink\']}</span></strong> {$post[\'onlinestatus\']}<br />';
		find_replace_templatesets("postbit", "#".preg_quote($old)."#i", $new);
		
		$new = '<strong><span class="largetext"><a href="{$post[\'profilelink_plain\']}" id="profile_{$post[\'pid\']}">{$post[\'username_formatted\']}</a></span></strong> {$post[\'onlinestatus\']}<br /><div id="profile_{$post[\'pid\']}_popup" class="popup_menu" style="display: none;"><div class="popup_item_container"><table style="text-align: left;"><tr><td ><a href="{$post[\'profilelink_plain\']}"><img src="{$theme[\'imgdir\']}/uqm/profile.png" alt="" title="" /> {$lang->viewprofile}</a></td><td><a href="private.php?action=send&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/pm.png" alt="" title="" /> {$lang->sendpm}</a></td></tr><tr><td><a href="search.php?action=finduserthreads&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/thread.png" alt="" title="" /> {$lang->viewthreads}</a></td><td><a href="member.php?action=emailuser&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/email.png" alt="" title="" /> {$lang->sendemail}</a></td></tr><tr><td><a href="search.php?action=finduser&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/post.png" alt="" title="" /> {$lang->viewposts}</a></td><td>{$post[\'buddy_post\']}</td></tr></table></div></div><script type="text/javascript">if(use_xmlhttprequest == "1"){new PopupMenu("profile_{$post[\'pid\']}");}</script>';		
		$old = '<strong><span class="largetext">{$post[\'profilelink\']}</span></strong> {$post[\'onlinestatus\']}<br />';
		find_replace_templatesets("postbit_classic", "#".preg_quote($old)."#i", $new);
				
}

function uqip_deactivate()
{
       global $lang, $mybb;
	   $lang->load("uqm"); 
	   
	   include MYBB_ROOT."/inc/adminfunctions_templates.php";
	   
	   $new = '<strong><span class="largetext">{$post[\'profilelink\']}</span></strong> {$post[\'onlinestatus\']}<br />';
	   $old = '<strong><span class="largetext"><a href="{$post[\'profilelink_plain\']}" id="profile_{$post[\'pid\']}">{$post[\'username_formatted\']}</a></span></strong> {$post[\'onlinestatus\']}<br /><div id="profile_{$post[\'pid\']}_popup" class="popup_menu" style="display: none;"><div class="popup_item_container"><table style="text-align: left;"><tr><td ><a href="{$post[\'profilelink_plain\']}"><img src="{$theme[\'imgdir\']}/uqm/profile.png" alt="" title="" /> {$lang->viewprofile}</a></td><td><a href="private.php?action=send&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/pm.png" alt="" title="" /> {$lang->sendpm}</a></td></tr><tr><td><a href="search.php?action=finduserthreads&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/thread.png" alt="" title="" /> {$lang->viewthreads}</a></td><td><a href="member.php?action=emailuser&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/email.png" alt="" title="" /> {$lang->sendemail}</a></td></tr><tr><td><a href="search.php?action=finduser&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/post.png" alt="" title="" /> {$lang->viewposts}</a></td><td>{$post[\'buddy_post\']}</td></tr></table></div></div><script type="text/javascript">if(use_xmlhttprequest == "1"){new PopupMenu("profile_{$post[\'pid\']}");}</script>';				
		find_replace_templatesets("postbit", "#".preg_quote($old)."#i", $new, 0);
				
		$new = '<strong><span class="largetext">{$post[\'profilelink\']}</span></strong> {$post[\'onlinestatus\']}<br />';
		$old = '<strong><span class="largetext"><a href="{$post[\'profilelink_plain\']}" id="profile_{$post[\'pid\']}">{$post[\'username_formatted\']}</a></span></strong> {$post[\'onlinestatus\']}<br /><div id="profile_{$post[\'pid\']}_popup" class="popup_menu" style="display: none;"><div class="popup_item_container"><table style="text-align: left;"><tr><td ><a href="{$post[\'profilelink_plain\']}"><img src="{$theme[\'imgdir\']}/uqm/profile.png" alt="" title="" /> {$lang->viewprofile}</a></td><td><a href="private.php?action=send&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/pm.png" alt="" title="" /> {$lang->sendpm}</a></td></tr><tr><td><a href="search.php?action=finduserthreads&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/thread.png" alt="" title="" /> {$lang->viewthreads}</a></td><td><a href="member.php?action=emailuser&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/email.png" alt="" title="" /> {$lang->sendemail}</a></td></tr><tr><td><a href="search.php?action=finduser&amp;uid={$post[\'uid\']}"><img src="{$theme[\'imgdir\']}/uqm/post.png" alt="" title="" /> {$lang->viewposts}</a></td><td>{$post[\'buddy_post\']}</td></tr></table></div></div><script type="text/javascript">if(use_xmlhttprequest == "1"){new PopupMenu("profile_{$post[\'pid\']}");}</script>';
		find_replace_templatesets("postbit_classic", "#".preg_quote($old)."#i", $new, 0);
				
}

/** Credit Goes To RateU @ www.mybbhacks.zingaburga.com  **/
$plugins->add_hook('postbit', 'uqip_run');
function uqip_run($post)
{
	global $mybb, $lang;
	$lang->load("uqm"); 
	
	if($mybb->user['uid'] != $post['uid'] && $mybb->user['uid'] != 0 && $post['uid'] != 0)
	{
		if(in_array($post['uid'], explode(',', $mybb->user['buddylist'])))
		{
			$post['buddy_post'] = '<a href="'.$mybb->settings['bburl'].'/usercp.php?action=do_editlists&amp;delete='.$post['uid'].'&amp;my_post_key='.$mybb->post_code.'"><img src="'.$GLOBALS['theme']['imgdir'].'/buddies.gif" alt="" title="" /> '.$lang->removefrombuddy.'</a>';
		}
		else
		{
			$post['buddy_post'] = '<a href="'.$mybb->settings['bburl'].'/usercp.php?action=do_editlists&amp;add_username='.urlencode($post['username']).'&amp;my_post_key='.$mybb->post_code.'"><img src="'.$GLOBALS['theme']['imgdir'].'/buddies.gif" alt="" title="" /> '.$lang->addtobuddy.'</a>';
		}
	}
}
?>