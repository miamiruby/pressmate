<style>
.content {
	padding: 10px;
	margin: 10px;
	background-color: #EEEEEE;
	width: 60%;
}
.comments {
	padding: 10px;
	margin: 10px;
	width: 60%;	
}
fieldset {
	margin-top: 0;
}
#login {
	float: right;
	width: 33%;
}
</style>

<div id="login">
	<?php if (!$session->read('Auth')) print $this->renderElement('login') ?>
</div>

<?php foreach ($contents as $c) { ?>
<div class="content">
	<h1><?php print $c['Content']['title']?></h1>
	<h3><?php print date('F d, Y', strtotime($c['Content']['updated']))?></h3><br />
	<div><?php print $c['Content']['body']?></div>
</div>	

<div class="comments">
	<?php if ($c['Content']['commentable']) print $this->renderElement('comments', array('comments' => $c['Comment'])) ?>
</div>

<div class="comments">
	<?php if ($c['Content']['commentable']) print $this->renderElement('comment', compact('c')) ?>
</div>

<?php } ?>

<?php print $html->link($html->image('rss.png', array('width' => 30, 'align' => 'absmiddle')).' RSS', '/content.rss', null, null, false) ?>