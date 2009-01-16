<div id="user">  
	<?php 
	if(Configure::read('User.avatar_url') == 'http://www.gravatar.com/avatar/'){
		echo $gravatar->image(Configure::read('User.email'),array('size' => 30, 'align' => 'absmiddle', 'style' => 'border:1px solid black'));
	} else {
		if(Configure::read('User.avatar_url')) print $html->image(Configure::read('User.avatar_url'), array('width' => 30, 'align' => 'absmiddle', 'style' => 'border:1px solid black')); 
	}
	
	?>
	<?php if($session->read('Auth.User.username')) { print 'Hello, '.$session->read('Auth.User.username').'@'.Configure::read('Area.name').'.' ?> [<?php print $html->link('Sign Out', '/users/logout') ?>, <?php print $html->link('Account', '/admin/users/edit/'.$session->read('Auth.User.id')) ?>, <?php print $html->link('Admin', '/admin') ?>]<?php } ?>
</div>