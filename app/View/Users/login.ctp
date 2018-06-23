<!-- Basic Login Page -->

<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Login'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Login')); ?>
<?php echo $this->Html->link('Cancel',['controller' => 'pages','action' => 'index']); ?> ||
<?php echo $this->Html->link('Sign Up',['action' => 'signup']); ?>
</div>
