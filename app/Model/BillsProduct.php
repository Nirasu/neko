<?php
App::uses('AppModel', 'Model');
/**
 * BillsProduct Model
 *
 * @property Bill $Bill
 * @property Product $Product
 */
class BillsProduct extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Bill' => array(
			'className' => 'Bill',
			'foreignKey' => 'bill_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
