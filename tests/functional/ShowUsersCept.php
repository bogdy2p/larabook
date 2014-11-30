<?php 
$I = new FunctionalTester($scenario);
$I->am('A larabook registered member');
$I->wantTo('List all user who are registered on larabook');


$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');

