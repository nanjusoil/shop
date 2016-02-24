<?php
if(!defined("IN_MYBB"))
{
    die("Direct access not allowed.");
}

$plugins->add_hook("forumdisplay_thread", "threadpreview_preview");

function threadpreview_info()
{
    return array(
        "name"			=> "Thread Preview",
		"description"	=> "Shows a part of the first post of a thread on forumdisplay when hovered over.",
		"website"		=> "http://mybb.com",
		"author"		=> "Mark Janssen",
		"authorsite"	=> "http://mybb.com",
		"version"		=> "1.0",
		"guid" 			=> "",
		"compatibility" => "*"
    );
}

function threadpreview_activate()
{
}

function threadpreview_deactivate()
{
}

function threadpreview_preview()
{
    global $mybb, $db, $tids, $threadcache, $thread, $firstpostcache;
    if(!$firstpostcache)
    {
        $query = $db->query("SELECT t.tid, t.firstpost, p.message
     FROM " . TABLE_PREFIX . "threads t
     LEFT JOIN " . TABLE_PREFIX . "posts p
     ON(t.firstpost=p.pid)
     WHERE t.tid IN(" . $tids . ")");
     while($data = $db->fetch_array($query))
     {
         // Change the third parameter of the substr function to however many characters you wish the preview to have.
         $firstpostcache[$data['tid']] = substr($data['message'], 0, 50);
         $threadcache[$data['tid']]['preview'] = substr($data['message'], 0 , 50);
     }
    }
    $thread['preview'] = $firstpostcache[$thread['tid']];
}
?>