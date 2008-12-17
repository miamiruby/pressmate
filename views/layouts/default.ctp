<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php if(Configure::read('Config.site_name')) print Configure::read('Config.site_name') . ': ' ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $scripts_for_layout;
		print $html->css('pressmate');
		print $html->css('/js/highlight/styles/vs.css');
	?>
	<?php if (isset($javascript)) print $javascript->link('jquery-1.2.6.min.js') ?>
	<?php if (isset($javascript)) print $javascript->link('jquery.form.js') ?>

	<?php if (isset($javascript)) print $javascript->link('highlight/highlight.pack.js') ?>
    <script type="text/javascript">
      hljs.initHighlightingOnLoad();
    </script>
	
	<?php print $this->renderElement('google_analytics') ?>
		
</head>
<body>
	<div id="container">
		<div id="header">
			<?php print $this->renderElement('user') ?>
			<?php print $html->image('crystal/32x32/apps/kwrite.png', array('style' => 'display:inline', 'align' => 'absmiddle')) ?>
			pressmate
		</div>
		<div id="content">

			<?php $session->flash(); ?>
			<?php $session->flash('auth'); ?>
			<?php if ($session->check('Message.error')) { ?>
				<div class="errorMessage"><?php $session->flash('error')?></div>
			<?php } ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php print $html->link('phishy', 'http://jeff.loiselles.com') ?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>


