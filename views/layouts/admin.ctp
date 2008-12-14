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
	?>
	
	<?php if (isset($javascript)) print $javascript->link('jquery-1.2.6.min.js') ?>
	<?php if (isset($javascript)) print $javascript->link('jquery.form.js') ?>
	
    <!-- Standard reset, fonts and grids -->
		<?php print $html->css('/js/yui/build/reset-fonts-grids/reset-fonts-grids.css') ?>

     <!-- CSS for Menu -->
		<?php print $html->css('/js/yui/build/menu/assets/skins/sam/menu.css') ?>

     <!-- Dependency source files -->
		<?php print $javascript->link('yui/build/yahoo-dom-event/yahoo-dom-event.js') ?>
		<?php print $javascript->link('yui/build/container/container_core.js') ?>

     <!-- Menu source file -->
		<?php print $javascript->link('yui/build/menu/menu.js') ?>

     <!-- Page-specific script -->
     <script type="text/javascript">

         /*
              Initialize and render the MenuBar when its elements are ready 
              to be scripted.
         */

         YAHOO.util.Event.onContentReady("admin_menu", function () {

             /*
                  Instantiate a MenuBar:  The first argument passed to the 
                  constructor is the id of the element in the page 
                  representing the MenuBar; the second is an object literal 
                  of configuration properties.
             */

             var oMenuBar = new YAHOO.widget.MenuBar("admin_menu", { 
                                                         autosubmenudisplay: true, 
                                                         hidedelay: 750, 
                                                         lazyload: true });

             /*
                  Call the "render" method with no arguments since the 
                  markup for this MenuBar instance is already exists in 
                  the page.
             */

             oMenuBar.render();

         });

     </script>
	<?php print $html->css('pressmate'); ?>
</head>
<body class="yui-skin-sam">
	<div id="container">
		<div id="header">
			<?php print $this->renderElement('user') ?>
			<?php print $html->image('crystal/32x32/apps/kwrite.png', array('style' => 'display:inline', 'align' => 'absmiddle')) ?>
			pressmate
		</div>
		<div id="admin_menu" class="yuimenubar yuimenubarnav">
                <div class="bd">
                    <ul class="first-of-type">

                        <li class="yuimenubaritem first-of-type"><a class="yuimenubaritemlabel" href="#communication">Content</a>
    
                            <div id="communication" class="yuimenu">
                                <div class="bd">
                                    <ul>
                                        <li class="yuimenuitem"><a class="yuimenuitemlabel" href="<?php print Router::url('/admin/content/add') ?>">Create Content</a></li>
                                        <li class="yuimenuitem"><a class="yuimenuitemlabel" href="<?php print Router::url('/admin/content/') ?>">Manage Content</a></li> 
                                        <li class="yuimenuitem"><a class="yuimenuitemlabel" href="<?php print Router::url('/admin/links/add') ?>">Create Link</a></li>
                                        <li class="yuimenuitem"><a class="yuimenuitemlabel" href="<?php print Router::url('/admin/links/') ?>">Manage Links</a></li>                                   		
                                    </ul>
                                </div>
                            </div>      
                        
                        </li>
                        <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="<?php print Router::url('/admin/users') ?>">Users</a>
                            <div id="users" class="yuimenu">
                                <div class="bd">                    
                                    <ul>
                                        <li class="yuimenuitem"><a class="yuimenuitemlabel" href="<?php print Router::url('/admin/users/create') ?>">Create User</a></li>
                                        <li class="yuimenuitem"><a class="yuimenuitemlabel" href="<?php print Router::url('/admin/users/') ?>">View Users</a></li>
                                    </ul>
                                </div>
                            </div>                    
                        
                        </li>

                        <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="<?php print Router::url('/admin/config') ?>">Options</a>
                            <div id="entertainment" class="yuimenu">
                                <div class="bd">                    
                                    <ul>
                                        <li class="yuimenuitem"><a class="yuimenuitemlabel" href="<?php print Router::url('/admin/config') ?>">Manage Configuration</a></li>
                                    </ul>                    
                                </div>

                            </div>                                        
                        
                        </li>
                      
                    </ul>            
                </div>

            </div>
		<div id="content">		
			<?php $session->flash(); ?>
			<?php if ($session->check('Message.error')) { ?>
				<div class="errorMessage"><?php $session->flash('error')?></div>
			<?php } ?>
			<?php $session->flash('auth')?>
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">

		</div>
	</div>
	<?php #echo $cakeDebug; ?>
</body>
</html>


