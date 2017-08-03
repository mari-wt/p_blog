<h1>Category index</h1>
<table>
	<th>id</th>
	<th>category name</th>
	<th>Created</th>
	
	<?php foreach ($categories as $category): ?>
		<tr>
			<td><?php echo $category['Category']['id']; ?></td>
			<td><?php echo $this->Html->link($category['Category']['categoryname'],array('controller' => 'posts', 'action' => 'view', $category['Category']['id'])); ?></td>
			<td><?php echo $category['Category']['created']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>