<?php

$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('follow other Larabook users.');


$I->haveAnAccount(['username' => 'NewUser']);
$I->signIn();


$I->click('Browse Users');

$I->seeCurrentUrlEquals('/users');


$I->click('at38');

$I->seeCurrentUrlEquals('/@at38');
$I->click('Follow at38');
$I->seeCurrentUrlEquals('/@at38');


//$I->see('You are following at38.');
$I->see('Unfollow at38');

$I->click('Unfollow at38');

$I->see('Follow at38');