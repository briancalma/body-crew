<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('firstname'); ?></th>
			<th><?php echo $this->Paginator->sort('lastname'); ?></th>
			<th><?php echo $this->Paginator->sort('profileimgpath'); ?></th>
			<th><?php echo $this->Paginator->sort('birthdate'); ?></th>
			<th><?php echo $this->Paginator->sort('intro'); ?></th>
			<th><?php echo $this->Paginator->sort('bloodtype'); ?></th>
			<th><?php echo $this->Paginator->sort('bodyfat'); ?></th>
			<th><?php echo $this->Paginator->sort('target_weight'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('address1'); ?></th>
			<th><?php echo $this->Paginator->sort('address2'); ?></th>
			<th><?php echo $this->Paginator->sort('emailaddress'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('height'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('target_bodyfat'); ?></th>
			<th><?php echo $this->Paginator->sort('target_musclemass'); ?></th>
			<th><?php echo $this->Paginator->sort('target_waist'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('coach_training_experience'); ?></th>
			<th><?php echo $this->Paginator->sort('coach_training_description'); ?></th>
			<th><?php echo $this->Paginator->sort('custom_specialty'); ?></th>
			<th><?php echo $this->Paginator->sort('profile_views_count'); ?></th>
			<th><?php echo $this->Paginator->sort('student_additional_goal'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['profileimgpath']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['birthdate']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['intro']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['bloodtype']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['bodyfat']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['target_weight']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['city']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['address1']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['address2']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['emailaddress']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['type']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['height']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['gender']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['target_bodyfat']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['target_musclemass']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['target_waist']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['coach_training_experience']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['coach_training_description']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['custom_specialty']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['profile_views_count']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['student_additional_goal']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li>
	</ul>
</div>