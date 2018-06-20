<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Update Password'); ?></legend>
	<?php
		# echo $this->Form->input('password',['placeholder' => 'Enter Old Password']);
		echo $this->Form->input('newPassword',['type' => 'password','placeholder' => 'Enter New Password','required' => 'true']);
		echo $this->Form->input('confirmPassword',['type' => 'password','placeholder' => 'Confirm Password','required' => 'true']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Update Password')); ?>
</div>