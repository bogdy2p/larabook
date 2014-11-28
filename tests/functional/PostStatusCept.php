<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('Post statuses to my profile');

$I->amOnPage('statuses');

$I->postAStatus(['body' => 'My first post!']);

$I->seeCurrentUrlEquals('statuses');

$I->see('My first post!');
