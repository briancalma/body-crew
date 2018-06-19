<div class="prefectures view">
<h2><?php echo __('Prefecture'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($prefecture['Prefecture']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prefecture['Prefecture']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prefecture'), array('action' => 'edit', $prefecture['Prefecture']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prefecture'), array('action' => 'delete', $prefecture['Prefecture']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $prefecture['Prefecture']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Prefectures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prefecture'), array('action' => 'add')); ?> </li>
	</ul>
</div>
