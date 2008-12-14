<div class="contents view">
<h2><?php  __('Content');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $content['Content']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $content['Content']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $content['Content']['body']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Content', true), array('action'=>'edit', $content['Content']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Content', true), array('action'=>'delete', $content['Content']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $content['Content']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Contents', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Content', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Comments', true), array('controller'=> 'comments', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Comment', true), array('controller'=> 'comments', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Categories', true), array('controller'=> 'categories', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Category', true), array('controller'=> 'categories', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Comments');?></h3>
	<?php if (!empty($content['Comment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Content Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($content['Comment'] as $comment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $comment['id'];?></td>
			<td><?php echo $comment['body'];?></td>
			<td><?php echo $comment['email'];?></td>
			<td><?php echo $comment['name'];?></td>
			<td><?php echo $comment['content_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'comments', 'action'=>'view', $comment['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'comments', 'action'=>'edit', $comment['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'comments', 'action'=>'delete', $comment['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $comment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Comment', true), array('controller'=> 'comments', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Categories');?></h3>
	<?php if (!empty($content['Category'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Lft'); ?></th>
		<th><?php __('Rght'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($content['Category'] as $category):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $category['id'];?></td>
			<td><?php echo $category['name'];?></td>
			<td><?php echo $category['lft'];?></td>
			<td><?php echo $category['rght'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'categories', 'action'=>'view', $category['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'categories', 'action'=>'edit', $category['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'categories', 'action'=>'delete', $category['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Category', true), array('controller'=> 'categories', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
