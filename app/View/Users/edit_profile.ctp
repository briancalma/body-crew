<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit My Profile'); ?></legend>
	<?php
	    echo $this->Form->input('id',['type' => 'hidden']);
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('prefecture_id');
		echo $this->Form->input('city');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('blood_type_id');
		echo $this->Form->input('body_type_id');
		echo $this->Form->input('bodyfat');
		echo $this->Form->input('body_weight');
		echo $this->Form->input('intro');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Save')); ?>
</div>

