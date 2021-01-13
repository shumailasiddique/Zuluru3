<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\WaiversPeopleTable;

/**
 * App\Model\Table\WaiversPeopleTable Test Case
 */
class WaiversPeopleTableTest extends TableTestCase {

	/**
	 * Test subject
	 *
	 * @var \App\Model\Table\WaiversPeopleTable
	 */
	public $WaiversPeopleTable;

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('WaiversPeople') ? [] : ['className' => 'App\Model\Table\WaiversPeopleTable'];
		$this->WaiversPeopleTable = TableRegistry::get('WaiversPeople', $config);
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->WaiversPeopleTable);

		parent::tearDown();
	}

}
