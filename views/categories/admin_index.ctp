<h2><?php __('Categories') ?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table>
	<tr>
		<th><?php print $paginator->sort('name') ?></th>
		<th></th>
	</tr>
	<?php foreach ($categories as $l) { ?>
		<tr>
			<td><?php print $l['Category']['name']?></td>
			<td>
				<?php print $html->link('Edit', '/admin/categories/edit/'.$l['Category']['id']) ?>
				<?php print $html->link('Delete', '/admin/categories/delete/'.$l['Category']['id'], null, 'Are you sure?') ?>
			</td>
		</tr>
	<?php } ?>
</table>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>