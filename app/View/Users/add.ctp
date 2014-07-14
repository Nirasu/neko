<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('password');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('adress');
		echo $this->Form->input('city');
		echo $this->Form->input('zip');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('cellphone');
		echo $this->Form->input('country');
		echo $this->Form->input('province');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bills'), array('controller' => 'bills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bill'), array('controller' => 'bills', 'action' => 'add')); ?> </li>
	</ul>
</div>
