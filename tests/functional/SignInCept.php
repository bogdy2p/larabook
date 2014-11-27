<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('Log in to my Larabook account');

//Custom signin into functional helper
$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome back!');
