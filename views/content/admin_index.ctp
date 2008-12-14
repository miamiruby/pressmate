<div class="contents index">
<h2><?php __('Contents');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('slug');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('updated');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($contents as $content):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $content['Content']['id']; ?>
		</td>
		<td>
			<?php echo $content['Content']['title']; ?>
		</td>
		<td>
			<?php echo $content['Content']['slug']; ?>
		</td>
		<td>
			<?php echo $content['Content']['created']; ?>
		</td>
		<td>
			<?php echo $content['Content']['updated']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $content['Content']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $content['Content']['id']), null, 'Are you sure you want to delete?'); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
