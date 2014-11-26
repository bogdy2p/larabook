<?php 

$I = new FunctionalTester($scenario);

$I->am('a guest');


$I->wantTo('sign up for a Larabook pbc Account');

$I->amOnPage('/');
$I->click('Sign Up!');
$I->seeCurrentUrlEquals('/register');
$I->fillField('Username:', 'JohnDoe');
$I->fillField('Email:', 'JohnDoe@link.com');
$I->fillField('Password:', 'asd');
$I->fillField('Password Confirmation:', 'asd');

$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Larabook!');