<div class="billsProducts index">
	<h2><?php echo __('Bills Products'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('bill_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($billsProducts as $billsProduct): ?>
	<tr>
		<td><?php echo h($billsProduct['BillsProduct']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($billsProduct['Bill']['id'], array('controller' => 'bills', 'action' => 'view', $billsProduct['Bill']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($billsProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $billsProduct['Product']['id'])); ?>
		</td>
		<td><?php echo h($billsProduct['BillsProduct']['quantity']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $billsProduct['BillsProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $billsProduct['BillsProduct']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $billsProduct['BillsProduct']['id']), array(), __('Are you sure you want to delete # %s?', $billsProduct['BillsProduct']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Bills Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bills'), array('controller' => 'bills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bill'), array('controller' => 'bills', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
