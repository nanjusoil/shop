<?php
/********
 **		Thread Tooltip Preview  for MyBB 1.4
 **		By ZiNgA BuRgA
 **
 ********/

define('THREADTOOLTIP_ACTIVE', 1);

$plugins->add_hook('datahandler_post_insert_thread', 'threadtooltip_threadnew');
$plugins->add_hook('datahandler_post_update_thread', 'threadtooltip_threadupdate');
$plugins->add_hook('datahandler_post_insert_post', 'threadtooltip_threadlpupdate');

// since I really hate MyBB's find_replace_templatesets()...
$plugins->add_hook('forumdisplay_start', 'threadtooltip_forumdisplay_template');
$plugins->add_hook('search_results_start', 'threadtooltip_search_template');

$plugins->add_hook('admin_tools_recount_rebuild_start', 'threadtooltip_admin_cache');

function threadtooltip_info()
{
	return array(
		'name'			=> 'Thread Tooltip Preview',
		'description'	=> 'Allows users to preview the content of a thread via a tooltip, similar to vBulletin.',
		'website'		=> 'http://mybbhacks.zingaburga.com/',
		'author'		=> 'ZiNgA BuRgA',
		'authorsite'	=> 'http://zingaburga.com/',
		'version'		=> '1.33',
		'compatibility'	=> '14*,15*,16*,17*,18*',
		'guid'			=> 'f21a783394ed9a02296746b8281956f6'
	);
}

function threadtooltip_is_installed() {
	return $GLOBALS['db']->field_exists('postpreview', 'threads');
}

function threadtooltip_install()
{
	global $db;
	
	$db->write_query('ALTER TABLE '.TABLE_PREFIX.'threads ADD COLUMN (postpreview VARCHAR(255) NOT NULL default ""), ADD COLUMN (lastpostpreview VARCHAR(255) NOT NULL default "")');
	// add settings
	$gid = $db->insert_query('settinggroups', array(
		'name' => 'threadtooltip',
		'title' => 'Thread Tooltip Preview Options',
		'disporder' => 100,
		'isdefault' => 0
	));
	$db->insert_query('settings', array(
		'gid' => $gid,
		'name' => 'threadtooltip_len',
		'title' => 'Length of Tooltip',
		'description' => 'The number of characters to display in the thread preview tooltip.  Please don\'\'t use a value higher than about 200.',
		'optionscode' => 'text',
		'value' => 100,
		'disporder' => 1,
		'isdefault' => 0
	));
	$db->insert_query('settings', array(
		'gid' => $gid,
		'name' => 'threadtooltip_stripmycode',
		'title' => 'Strip MyCode from Tooltip',
		'description' => 'If yes, tries to strip MyCode from tooltips.  Note: this setting is NOT forum setting dependent (ie it will try to strip MyCode even if you disable it)',
		'optionscode' => 'yesno',
		'value' => 1,
		'disporder' => 1,
		'isdefault' => 0
	));
	rebuild_settings();
	
	// tell user to rebuild tooltip cache
	$GLOBALS['lang']->success_plugin_installed .= '<br /><big style="color: #F0A000;">Note: Existing threads will NOT display a tooltip until you <a href="index.php?module=tools/recount_rebuild#rebuild_threadtooltip">rebuild thread tooltips</a>!</big>';
}

function threadtooltip_uninstall()
{
	global $db;
	
	$db->write_query('ALTER TABLE '.TABLE_PREFIX.'threads DROP COLUMN postpreview, DROP COLUMN lastpostpreview');
	// add settings
	$gid = $db->fetch_field($db->simple_select('settinggroups', 'gid', 'name="threadtooltip"'), 'gid');
	if($gid)
	{
		$db->delete_query('settings', 'gid='.$gid);
		$db->delete_query('settinggroups', 'gid='.$gid);
	}
	rebuild_settings();
}

function threadtooltip_admin_cache() {
	global $mybb, $db;
	if($mybb->request_method == 'post') {
		if(isset($mybb->input['do_rebuildthreadtooltip'])) {
			$page = intval($mybb->input['page']);
			if($page < 1)
				$page = 1;
			/* if($page == 1)
				log_admin_action('thread'); */
			$perpage = intval($mybb->input['threadtooltips']);
			if(!$perpage) $perpage = 500;
			
			@set_time_limit(1800);
			//@ignore_user_abort(true);
			$query = $db->query('SELECT p.message,lp.message AS lastmessage,t.tid FROM '.$db->table_prefix.'threads t LEFT JOIN '.$db->table_prefix.'posts p ON t.firstpost=p.pid LEFT JOIN '.$db->table_prefix.'posts lp ON (t.lastpost=lp.dateline AND t.tid=lp.tid AND t.lastposteruid=lp.uid) ORDER BY t.tid DESC LIMIT '.$perpage.' OFFSET '.($page-1)*$perpage);
			// MyBB doesn't store the pid of the last post, so we use a psuedo condition which _should_ work
			while($t = $db->fetch_array($query))
				$db->update_query('threads', array('postpreview' => threadtooltip_getpreview($t['message']), 'lastpostpreview' => threadtooltip_getpreview($t['lastmessage'])), 'tid='.$t['tid']);
			++$page;
			check_proceed($db->fetch_field($db->simple_select('threads','count(*) as t'),'t'), $page*$perpage, $page, $perpage, 'threadtooltips', 'do_rebuildthreadtooltip', 'Thread tooltips successfully rebuilt.');
		}
	}
	else
		$GLOBALS['plugins']->add_hook('admin_formcontainer_end', 'threadtooltip_admin_cache_show');
}
function threadtooltip_admin_cache_show() {
	global $form_container, $form, $lang;
	$form_container->output_cell('<a id="rebuild_threadtooltip"></a><label>Rebuild Thread Tooltips</label><div class="description">This will rebuild the thread tooltips cache.</div>');
	$form_container->output_cell($form->generate_text_box('threadtooltips', 500, array('style' => 'width: 150px;')));
	$form_container->output_cell($form->generate_submit_button($lang->go, array('name' => 'do_rebuildthreadtooltip')));
	$form_container->construct_row();
}

function threadtooltip_forumdisplay_template()
{
	$template = &$GLOBALS['templates']->cache['forumdisplay_thread'];
	$template = strtr($template, array(
		'<td class="{$bgcolor}">' => '<td class="{$bgcolor}" title="{$thread[\'postpreview\']}">',
		'<td class="{$bgcolor}{$thread_type_class}">' => '<td class="{$bgcolor}{$thread_type_class}"><a href="{$thread[\'threadlink\']} " style="color:black">{$thread[\'postpreview\']}</a>',
		'<td class="{$bgcolor}" style="white-space: nowrap; text-align: right;">' => '<td class="{$bgcolor}" style="white-space: nowrap; text-align: right;" title="{$thread[\'lastpostpreview\']}">',
		'<td class="{$bgcolor}{$thread_type_class}" style="white-space: nowrap; text-align: right;">' => '<td class="{$bgcolor}{$thread_type_class}" style="white-space: nowrap; text-align: right;" title="{$thread[\'lastpostpreview\']}">'
	));
}
function threadtooltip_search_template()
{
	$template = &$GLOBALS['templates']->cache['search_results_threads_thread'];
	$template = strtr($template, array(
		// two copies of this replacement for MyBB 1.4 (uses Windows newlines) and 1.6 (Nix newlines)
		'<td class="{$bgcolor}">'."\r" => '<td class="{$bgcolor}" title="{$thread[\'postpreview\']}">'."\r",
		'<td class="{$bgcolor}">'."\n" => '<td class="{$bgcolor}" title="{$thread[\'postpreview\']}">'."\n",
		'<td class="{$bgcolor}" style="white-space: nowrap">' => '<td class="{$bgcolor}" style="white-space: nowrap" title="{$thread[\'lastpostpreview\']}">'
	));
}
// perhaps stick the lastpost preview in the forum home or something later on, though it's a little tricky to do

function threadtooltip_threadnew(&$ph)
{
	$ph->thread_insert_data['lastpostpreview'] = $ph->thread_insert_data['postpreview'] = threadtooltip_getpreview($ph->data['message']);
}
function threadtooltip_threadupdate(&$ph)
{
	if(isset($ph->data['message']))
		$ph->thread_update_data['postpreview'] = threadtooltip_getpreview($ph->data['message']);
}
function threadtooltip_threadlpupdate(&$ph)
{
	$tid = intval($ph->data['tid']);
	if(!$tid) return;
	$GLOBALS['db']->update_query('threads', array('lastpostpreview' => threadtooltip_getpreview($ph->data['message'])), 'tid='.$tid);
}

function threadtooltip_getpreview(&$message)
{
	global $db, $mybb;
	
	//$msg = trim(strtr($message, array("\n" => ' ', "\r" => '', "\t" => ' ')));
	$msg = $message;
	if($mybb->settings['threadtooltip_stripmycode'] == 1)
	{
		global $parser;
		if(!is_object($parser))
		{
			require_once MYBB_ROOT.'inc/class_parser.php';
			$parser = new postParser;
		}
		
		$msg = $parser->parse_message($msg, array(
			'allow_html' => 0,
			'allow_mycode' => 1,
			'allow_smilies' => 0,
			'allow_imgcode' => 1,
			'filter_badwords' => 1,
			'nl2br' => 0
		));
		
		// before stripping tags, try converting some into spaces
		$msg = preg_replace(array(
			'~\<(?:img|hr).*?/\>~si',
			'~\<li\>(.*?)\</li\>~si'
		), array(' ', "\n* $1"), $msg);
		
		$msg = unhtmlentities(strip_tags($msg));
	}
	
	// convert \xA0 to spaces (reverse &nbsp;)
	$msg = trim(preg_replace(array('~ {2,}~', "~\n{2,}~"), array(' ', "\n"), strtr($msg, array(utf8_encode("\xA0") => ' ', "\r" => '', "\t" => ' '))));
	// newline fix for browsers which don't support them
	$msg = preg_replace("~ ?\n ?~", " \n", $msg);
	
	$maxlen = intval($mybb->settings['threadtooltip_len']);
	if($maxlen < 2) $maxlen = 2;
	if(my_strlen($msg) > $maxlen)
		$msg = my_substr($msg, 0, $maxlen - 1).'...';
	
	return $db->escape_string(htmlspecialchars_uni($msg));
}
?>