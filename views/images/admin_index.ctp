<h2><?php __('Images') ?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table>
	<tr>
		<th></th>
		<th><?php print $paginator->sort('name') ?></th>
		<th></th>
	</tr>
	<?php foreach ($images as $i) { ?>
		<tr>
			<td><?php print $html->image($i['Image']['url'], array('width' => 100)) ?></td>
			<td><?php print $i['Image']['name']?></td>
			<td>
				<?php print $html->link('Edit', '/admin/images/edit/'.$i['Image']['id']) ?>
				<?php print $html->link('Delete', '/admin/images/delete/'.$i['Image']['id'], null, 'Are you sure?') ?>
			</td>
		</tr>
	<?php } ?>
</table>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>