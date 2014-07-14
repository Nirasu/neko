<div class="billsProducts view">
<h2><?php echo __('Bills Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($billsProduct['BillsProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bill'); ?></dt>
		<dd>
			<?php echo $this->Html->link($billsProduct['Bill']['id'], array('controller' => 'bills', 'action' => 'view', $billsProduct['Bill']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($billsProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $billsProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($billsProduct['BillsProduct']['quantity']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bills Product'), array('action' => 'edit', $billsProduct['BillsProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bills Product'), array('action' => 'delete', $billsProduct['BillsProduct']['id']), array(), __('Are you sure you want to delete # %s?', $billsProduct['BillsProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bills Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bills Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bills'), array('controller' => 'bills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bill'), array('controller' => 'bills', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
