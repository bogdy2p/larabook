<?php

$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('follow other Larabook users.');


$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();


$I->click('Browse Users');

$I->seeCurrentUrlEquals('/users');


$I->click('bogdan.popa');

$I->seeCurrentUrlEquals('/@bogdan.popa');
$I->click('Follow bogdan.popa');
$I->seeCurrentUrlEquals('/@bogdan.popa');


$I->see('You are following OtherUser.');
$I->dontSee('Follow bogdan.popa');