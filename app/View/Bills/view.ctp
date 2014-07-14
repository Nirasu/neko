<div class="bills view">
<h2><?php echo __('Bill'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bill['Bill']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bill['User']['name'], array('controller' => 'users', 'action' => 'view', $bill['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($bill['Bill']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Facture'); ?></dt>
		<dd>
			<?php echo h($bill['Bill']['no_facture']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bill'), array('action' => 'edit', $bill['Bill']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bill'), array('action' => 'delete', $bill['Bill']['id']), array(), __('Are you sure you want to delete # %s?', $bill['Bill']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bills'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bill'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Types'); ?></h3>
	<?php if (!empty($bill['Type'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Facture'); ?></th>
		<th><?php echo __('Type Facture'); ?></th>
		<th><?php echo __('Bill Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bill['Type'] as $type): ?>
		<tr>
			<td><?php echo $type['id']; ?></td>
			<td><?php echo $type['facture']; ?></td>
			<td><?php echo $type['type_facture']; ?></td>
			<td><?php echo $type['bill_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'types', 'action' => 'view', $type['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'types', 'action' => 'edit', $type['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'types', 'action' => 'delete', $type['id']), array(), __('Are you sure you want to delete # %s?', $type['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($bill['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Sku'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Poid'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bill['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['sku']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td><?php echo $product['details']; ?></td>
			<td><?php echo $product['poid']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), array(), __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
