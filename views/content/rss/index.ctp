<?php

Configure::write('debug', 0);
print $rss->items($contents, 'transformRSS');

function transformRSS($c) {
	return array(
	'title' => $c['Content']['title'],
	'link' => array(’action’ => ‘view’, $c['Content']['id']),
	'guid' => array(’action’ => ‘view’, $c['Content']['id']),
	'description' => $c['Content']['body'],
	'author' => $c['User']['first_name'].' '.$c['User']['last_name'],
	'pubDate' => $c['Content']['updated']
	);
}
?>