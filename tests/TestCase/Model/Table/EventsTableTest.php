<?php
namespace App\Test\TestCase\Model\Table;

use App\Test\Factory\EventFactory;
use App\Test\Factory\GameFactory;
use Cake\Event\Event;
use Cake\I18n\FrozenDate;
use Cake\ORM\TableRegistry;
use App\Model\Table\EventsTable;

/**
 * App\Model\Table\EventsTable Test Case
 */
class EventsTableTest extends TableTestCase {

	/**
	 * Test subject
	 *
	 * @var \App\Model\Table\EventsTable
	 */
	public $EventsTable;

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Events') ? [] : ['className' => 'App\Model\Table\EventsTable'];
		$this->EventsTable = TableRegistry::get('Events', $config);
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->EventsTable);

		parent::tearDown();
	}

	/**
	 * Test validationGeneric method
	 *
	 * @return void
	 */
	public function testValidationGeneric() {
		$this->markTestIncomplete('Not implemented yet.');
	}

	/**
	 * Test validationIndividual method
	 *
	 * @return void
	 */
	public function testValidationIndividual() {
		$this->markTestIncomplete('Not implemented yet.');
	}

	/**
	 * Test validationMembership method
	 *
	 * @return void
	 */
	public function testValidationMembership() {
		$this->markTestIncomplete('Not implemented yet.');
	}

	/**
	 * Test validationTeam method
	 *
	 * @return void
	 */
	public function testValidationTeam() {
		$this->markTestIncomplete('Not implemented yet.');
	}

	/**
	 * Test beforeMarshal method
	 *
	 * @return void
	 */
	public function testBeforeMarshal() {
        $this->markTestSkipped(GameFactory::TODO_FACTORIES);
		$date = FrozenDate::now();
		$custom_membership = [
			'membership_begins' => $date,
			'membership_ends' => $date,
			'membership_type' => 'full',
		];
		$custom_team = [
			'ask_status' => true,
			'ask_attendance' => true,
		];

		$data = new \ArrayObject(array_merge($custom_membership, [
			'event_type_id' => EVENT_TYPE_ID_MEMBERSHIP,
		]));
		$expected = serialize($custom_membership);
		$this->EventsTable->beforeMarshal(new Event('testing'), $data, new \ArrayObject());
		$this->assertEquals($expected, $data['custom']);

		$data = new \ArrayObject(array_merge($custom_membership, [
			'event_type_id' => EVENT_TYPE_ID_INDIVIDUALS_FOR_EVENTS,
		]));
		$expected = serialize([]);
		$this->EventsTable->beforeMarshal(new Event('testing'), $data, new \ArrayObject());
		$this->assertEquals($expected, $data['custom']);

		$data = new \ArrayObject(array_merge($custom_team, [
			'event_type_id' => EVENT_TYPE_ID_TEAMS_FOR_EVENTS,
		]));
		$expected = serialize($custom_team);
		$this->EventsTable->beforeMarshal(new Event('testing'), $data, new \ArrayObject());
		$this->assertEquals($expected, $data['custom']);
	}

	/**
	 * Test afterSave method
	 *
	 * @return void
	 */
	public function testAfterSave() {
		$this->markTestIncomplete('Not implemented yet.');
	}

	/**
	 * Test affiliate method
	 *
	 * @return void
	 */
	public function testAffiliate() {
        $affiliateId = rand();
        $event = EventFactory::make(['affiliate_id' => $affiliateId])->persist();
		$this->assertEquals($affiliateId, $this->EventsTable->affiliate($event->id));
	}

}
