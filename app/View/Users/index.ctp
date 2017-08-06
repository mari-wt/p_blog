<h1>My Page</h1>
<?php echo $this->Html->link(
    'Edit My Profile',
    array('controller' => 'users', 'action' => 'edit')
); ?>
<table>
	<th>id</th>
	<th>Title</th>
	<th>Category</th>
	<th>Action</th>
	<th>Created</th>
	
	<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user['Post']['id']; ?></td>
			<td><?php echo $this->Html->link($user['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>
			<td><?php ?></td>
			<td>
				<?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $user['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
				?>
				｜
				<?php
					echo $this->Html->link(
						'Edit',
						array('action' => 'edit', $post['Post']['id'])
					);
				?>
			</td>
			<td><?php echo $post['Post']['created']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->Html->link(
    'log out',
    array('controller' => 'users', 'action' => 'logout')
); ?>
