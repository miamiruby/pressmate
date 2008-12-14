<div id="user">
	<?php if(Configure::read('User.avatar_url')) print $html->image(Configure::read('User.avatar_url'), array('width' => 30, 'align' => 'absmiddle', 'style' => 'border:1px solid black')) ?>
	<?php if($session->read('Auth.User.username')) { print 'Hello, '.$session->read('Auth.User.username').'.' ?> [<?php print $html->link('Sign Out', '/users/logout') ?>, <?php print $html->link('Account', '/admin/users/edit/'.$session->read('Auth.User.id')) ?>, <?php print $html->link('Admin', '/admin') ?>]<?php } ?>
</div>