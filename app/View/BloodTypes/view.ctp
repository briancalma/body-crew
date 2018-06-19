<div class="bloodTypes view">
<h2><?php echo __('Blood Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bloodType['BloodType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bloodType['BloodType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Blood Type'), array('action' => 'edit', $bloodType['BloodType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Blood Type'), array('action' => 'delete', $bloodType['BloodType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $bloodType['BloodType']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($bloodType['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Profileimgpath'); ?></th>
		<th><?php echo __('Birthdate'); ?></th>
		<th><?php echo __('Intro'); ?></th>
		<th><?php echo __('Bodyfat'); ?></th>
		<th><?php echo __('Target Weight'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Address1'); ?></th>
		<th><?php echo __('Address2'); ?></th>
		<th><?php echo __('Emailaddress'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Target Bodyfat'); ?></th>
		<th><?php echo __('Target Musclemass'); ?></th>
		<th><?php echo __('Target Waist'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Coach Training Experience'); ?></th>
		<th><?php echo __('Coach Training Description'); ?></th>
		<th><?php echo __('Custom Specialty'); ?></th>
		<th><?php echo __('Profile Views Count'); ?></th>
		<th><?php echo __('Student Additional Goal'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Body Weight'); ?></th>
		<th><?php echo __('Prefecture Id'); ?></th>
		<th><?php echo __('Body Type Id'); ?></th>
		<th><?php echo __('Blood Type Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bloodType['User'] as $user): ?>
		<tr>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['firstname']; ?></td>
			<td><?php echo $user['lastname']; ?></td>
			<td><?php echo $user['profileimgpath']; ?></td>
			<td><?php echo $user['birthdate']; ?></td>
			<td><?php echo $user['intro']; ?></td>
			<td><?php echo $user['bodyfat']; ?></td>
			<td><?php echo $user['target_weight']; ?></td>
			<td><?php echo $user['city']; ?></td>
			<td><?php echo $user['address1']; ?></td>
			<td><?php echo $user['address2']; ?></td>
			<td><?php echo $user['emailaddress']; ?></td>
			<td><?php echo $user['type']; ?></td>
			<td><?php echo $user['height']; ?></td>
			<td><?php echo $user['gender']; ?></td>
			<td><?php echo $user['target_bodyfat']; ?></td>
			<td><?php echo $user['target_musclemass']; ?></td>
			<td><?php echo $user['target_waist']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td><?php echo $user['coach_training_experience']; ?></td>
			<td><?php echo $user['coach_training_description']; ?></td>
			<td><?php echo $user['custom_specialty']; ?></td>
			<td><?php echo $user['profile_views_count']; ?></td>
			<td><?php echo $user['student_additional_goal']; ?></td>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['body_weight']; ?></td>
			<td><?php echo $user['prefecture_id']; ?></td>
			<td><?php echo $user['body_type_id']; ?></td>
			<td><?php echo $user['blood_type_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
