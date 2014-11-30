<?php

$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('View my profile');

$I->signIn();

//EPISODE 22 MINUE 14:50 (completing the test for the profile

$I->postAStatus('My new status.');

$I->click('Your Profile');

$I->seeCurrentUrlEquals('@');