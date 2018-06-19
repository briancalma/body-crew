<div class="bodyTypes form">
<?php echo $this->Form->create('BodyType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Body Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BodyType.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('BodyType.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Body Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
