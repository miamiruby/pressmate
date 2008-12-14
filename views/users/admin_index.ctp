<h2><?php __('User List') ?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table class="table">
	<tr>
		<th><?php print $paginator->sort('last_name') ?></th>
		<th><?php print $paginator->sort('first_name') ?></th>
		<th><?php print $paginator->sort('username') ?></th>
		<th><?php print $paginator->sort('email') ?></th>
		<th></th>
	</tr>
	<?php foreach ($users as $u) { ?>
	<tr>
		<td><?php print $u['User']['last_name']?></td>
		<td><?php print $u['User']['first_name']?></td>
		<td><?php print $u['User']['username']?></td>
		<td><?php print $html->link($u['User']['email'], 'mailto:'.$u['User']['email'])?></td>
		<td>
			<?php print $html->link('Edit', '/admin/users/edit/'.$u['User']['id']) ?>
			<?php print $html->link('Delete', '/admin/users/delete/'.$u['User']['id'], null, 'Are you sure?') ?>
		</td>
	</tr>
	<?php } ?>
</table>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>