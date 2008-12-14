<!-- <?php print $html->css('/js/yui/build/menu/assets/skins/sam/menu.css') ?>
<?php print $html->css('/js/yui/build/button/assets/skins/sam/button.css') ?>
<?php print $html->css('/js/yui/build/fonts/fonts-min.css') ?>
<?php print $html->css('/js/yui/build/container/assets/skins/sam/container.css') ?>
<?php print $html->css('/js/yui/build/editor/assets/skins/sam/editor.css') ?>

<?php print $javascript->link('/js/yui/build/yahoo-dom-event/yahoo-dom-event.js') ?>
<?php print $javascript->link('/js/yui/build/element/element-beta-min.js') ?>
<?php print $javascript->link('/js/yui/build/container/container-min.js') ?>
<?php print $javascript->link('/js/yui/build/menu/menu-min.js') ?>
<?php print $javascript->link('/js/yui/build/button/button-min.js') ?>
<?php print $javascript->link('/js/yui/build/editor/editor-min.js') ?>

<style>
fieldset fieldset div {
	clear: none;
	margin: none;
}
form div {
	clear: none;
	margin-bottom: none;
	padding: none;
	vertical-align: none;
}
</style>

<script>
(function() {
    //Setup some private variables
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event;

        //The SimpleEditor config
        var myConfig = {
            height: '300px',
            width: '600px',
            dompath: true,
            focusAtStart: true
        };

    //Now let's load the SimpleEditor..
    var myEditor = new YAHOO.widget.Editor('editor', myConfig);
    myEditor.render();
})();
</script> -->
<div class="contents form">
<?php echo $form->create('Content', array('url' => '/admin/content/edit'));?>
	<fieldset>
 		<legend><?php __('Edit Content');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('body');
		echo $form->input('status_id');
		echo $form->input('commentable');
		echo $form->input('redirect_code');
		echo $form->input('redirect_url');
		echo $form->input('Category');
	?>
	<!-- <textarea id="editor" name="data[Content][body]" rows="20" cols="75">
	<?php print $this->data['Content']['body']?>
	</textarea> -->
	</fieldset>
<?php echo $form->end('Update');?>
</div>