<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('profileimgpath');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('intro');
		echo $this->Form->input('bloodtype');
		echo $this->Form->input('bodyfat');
		echo $this->Form->input('target_weight');
		echo $this->Form->input('city');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('emailaddress');
		echo $this->Form->input('type');
		echo $this->Form->input('height');
		echo $this->Form->input('gender');
		echo $this->Form->input('target_bodyfat');
		echo $this->Form->input('target_musclemass');
		echo $this->Form->input('target_waist');
		echo $this->Form->input('role');
		echo $this->Form->input('coach_training_experience');
		echo $this->Form->input('coach_training_description');
		echo $this->Form->input('custom_specialty');
		echo $this->Form->input('profile_views_count');
		echo $this->Form->input('student_additional_goal');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
