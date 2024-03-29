<?php
App::uses('Bill', 'Model');

/**
 * Bill Test Case
 *
 */
class BillTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bill',
		'app.user',
		'app.type',
		'app.product',
		'app.bills_product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bill = ClassRegistry::init('Bill');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bill);

		parent::tearDown();
	}

}
