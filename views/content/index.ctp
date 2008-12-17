<div id="column_right">
	<?php if (!$session->read('Auth')) print $this->renderElement('login')?>
	<?php print $this->renderElement('links', compact('links')) ?>
	<?php print $this->renderElement('categories', compact('categories')) ?>
	<?php print $this->renderElement('comments_recent', compact('comments_recent')) ?>
</div>

<?php print $this->renderElement('content', compact('content')) ?>
<?php print $html->link($html->image('rss.png', array('width' => 30, 'align' => 'absmiddle')).' RSS', '/content.rss', null, null, false) ?>