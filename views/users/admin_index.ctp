<h2><?php __('User List') ?></h2>

<table class="table">
	<!-- <tr>
		<th><?php print $paginator->sort('last_name') ?></th>
		<th><?php print $paginator->sort('first_name') ?></th>
		<th><?php print $paginator->sort('username') ?></th>
		<th></th>
	</tr> -->
	<?php foreach ($users as $u) { ?>
	<tr>
		<td><?php print $u['User']['last_name']?></td>
		<td><?php print $u['User']['first_name']?></td>
		<td><?php print $u['User']['username']?></td>
		<td>
			<?php print $html->link('Edit', '/admin/users/edit/'.$u['User']['id']) ?>
			<?php print $html->link('Delete', '/admin/users/delete/'.$u['User']['id']) ?>
		</td>
	</tr>
	<?php } ?>
</table>