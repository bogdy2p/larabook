<?php

use Larabook\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends \Codeception\TestCase\Test {

    /**
     * @var \IntegrationTester
     */
    protected $repo;

    protected function _before() {

        $this->repo = new UserRepository;
    }

    /** @test */
    public function it_paginates_all_users() {

        TestDummy::times(4)->create('Larabook\Users\User');

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2, $results);
    }

    /** @test */
    public function it_finds_a_user_with_statuses_by_their_username() {
        //given
        $statuses = TestDummy::times(3)->create('Larabook\Statuses\Status');
        $username = $statuses[0]->user->username;

        //when
        $user = $this->repo->findByUsername($username);

        //then
        $this->assertEquals($username, $user->username);
        $this->assertCount(3, $user->statuses);
    }

    /** @test */
    public function it_follows_another_user() {
        //given we have two users
        list($vasile,$gheorghe) = TestDummy::times(2)->create('Larabook\Users\User'); // [$user, $user]
        // and one user follows another user
        $this->repo->follow($vasile->id, $gheorghe);

        //then i should see that user in the list of those that user0 follows.
        $this->tester->seeRecord('follows', [
            'follower_id' => $gheorghe->id,
            'followed_id' => $vasile->id
        ]);
    }

        /** @test */
    public function it_unfollows_another_user() {
        //given we have two users
        list($vasile,$gheorghe) = TestDummy::times(2)->create('Larabook\Users\User'); // [$user, $user]
        // and one user follows another user
        $this->repo->follow($vasile->id, $gheorghe);
        
        //when i unfollow that same user
        $this->repo->unfollow($vasile->id, $gheorghe);

        //then i should NOT see that user in the list of those that user0 follows.
        $this->tester->dontSeeRecord('follows', [
            'follower_id' => $gheorghe->id,
            'followed_id' => $vasile->id
        ]);
    }

    
}
