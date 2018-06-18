<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($user['User']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profileimgpath'); ?></dt>
		<dd>
			<?php echo h($user['User']['profileimgpath']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthdate'); ?></dt>
		<dd>
			<?php echo h($user['User']['birthdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Intro'); ?></dt>
		<dd>
			<?php echo h($user['User']['intro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bloodtype'); ?></dt>
		<dd>
			<?php echo h($user['User']['bloodtype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bodyfat'); ?></dt>
		<dd>
			<?php echo h($user['User']['bodyfat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target Weight'); ?></dt>
		<dd>
			<?php echo h($user['User']['target_weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($user['User']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($user['User']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($user['User']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emailaddress'); ?></dt>
		<dd>
			<?php echo h($user['User']['emailaddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($user['User']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo h($user['User']['height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($user['User']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target Bodyfat'); ?></dt>
		<dd>
			<?php echo h($user['User']['target_bodyfat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target Musclemass'); ?></dt>
		<dd>
			<?php echo h($user['User']['target_musclemass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target Waist'); ?></dt>
		<dd>
			<?php echo h($user['User']['target_waist']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coach Training Experience'); ?></dt>
		<dd>
			<?php echo h($user['User']['coach_training_experience']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coach Training Description'); ?></dt>
		<dd>
			<?php echo h($user['User']['coach_training_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Custom Specialty'); ?></dt>
		<dd>
			<?php echo h($user['User']['custom_specialty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profile Views Count'); ?></dt>
		<dd>
			<?php echo h($user['User']['profile_views_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student Additional Goal'); ?></dt>
		<dd>
			<?php echo h($user['User']['student_additional_goal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
