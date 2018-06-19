<?php
App::uses('BloodType', 'Model');

/**
 * BloodType Test Case
 */
class BloodTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.blood_type',
		'app.user',
		'app.prefecture'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BloodType = ClassRegistry::init('BloodType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BloodType);

		parent::tearDown();
	}

}
