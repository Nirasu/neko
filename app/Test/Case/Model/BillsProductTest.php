<?php
App::uses('BillsProduct', 'Model');

/**
 * BillsProduct Test Case
 *
 */
class BillsProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bills_product',
		'app.bill',
		'app.user',
		'app.type',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BillsProduct = ClassRegistry::init('BillsProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BillsProduct);

		parent::tearDown();
	}

}
