<h2><?php __('Links') ?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table>
	<tr>
		<th><?php print $paginator->sort('name') ?></th>
		<th><?php print $paginator->sort('url') ?></th>
		<th></th>
	</tr>
	<?php foreach ($links as $l) { ?>
		<tr>
			<td><?php print $l['Link']['name']?></td>
			<td><?php print $l['Link']['url']?></td>
			<td>
				<?php print $html->link('Edit', '/admin/links/edit/'.$l['Link']['id']) ?>
				<?php print $html->link('Delete', '/admin/links/delete/'.$l['Link']['id'], null, 'Are you sure?') ?>
			</td>
		</tr>
	<?php } ?>
</table>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>