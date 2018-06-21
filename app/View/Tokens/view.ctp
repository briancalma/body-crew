<div class="tokens view">
<h2><?php echo __('Token'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($token['Token']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Token'); ?></dt>
		<dd>
			<?php echo h($token['Token']['token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($token['User']['id'], array('controller' => 'users', 'action' => 'view', $token['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Token'), array('action' => 'edit', $token['Token']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Token'), array('action' => 'delete', $token['Token']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $token['Token']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Tokens'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Token'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
