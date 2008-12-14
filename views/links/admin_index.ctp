<h2>Links</h2>

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
				<?php print $html->link('Delete', '/admin/links/delete/'.$l['Link']['id']) ?>
			</td>
		</tr>
	<?php } ?>
</table>