<?php

use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test {

    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected function _before() {

        $this->repo = new StatusRepository;
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user() {
        // Given i have two users
        $users = TestDummy::times(2)->create('Larabook\Users\User');
        // And statuses for both of them
        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[0]->id,
            'body' => 'My status'
        ]);
        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[1]->id,
            'body' => 'His status'
        ]);
        // When i fetch statuses for one user

        $statusesForUser = $this->repo->getAllForUser($users[0]);

        // I Should receive only the relveant ones for the user.
        $this->assertCount(2, $statusesForUser);
        $this->assertEquals('My status', $statusesForUser[0]->body);
        $this->assertEquals('My status', $statusesForUser[1]->body);

     
    }

    /** @test */
    public function it_saves_a_status_for_a_user() {
        // Given i have an unsaved status
        $status = TestDummy::create('Larabook\Statuses\Status', [
                    'user_id' => null,
                    'body' => 'My status'
        ]);
        // And an existing user
        $user = TestDummy::create('Larabook\Users\User');

        // When i try to persist this status

        $savedStatus = $this->repo->save($status, $user->id);


        // Then it should be saved
        $this->tester->seeRecord('statuses', ['body' => 'My status']);


        // The status should have the correct user id.
        $this->assertEquals($user->id, $savedStatus->user_id);
    }

}
