<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Sign Up'); ?></legend>
	<?php
		echo $this->Form->input('emailaddress',['placeholder' => '* Enter Email Address']);
		echo $this->Form->input('username',['placeholder' => '* Enter Email Address']);
		echo $this->Form->input('password',['placeholder' => '* Enter Password']);
		echo $this->Form->input('password',['name' => 'data[User][passwordb]','placeholder' => '* Re-Enter Password']);
		echo $this->Form->input('role', ['options' => ['student' => 'student','trainer' => 'trainer'],'empty' => '(choose one)']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Register')); ?>
</div>

