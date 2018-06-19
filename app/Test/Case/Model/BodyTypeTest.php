<?php
App::uses('BodyType', 'Model');

/**
 * BodyType Test Case
 */
class BodyTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.body_type',
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
		$this->BodyType = ClassRegistry::init('BodyType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BodyType);

		parent::tearDown();
	}

}
