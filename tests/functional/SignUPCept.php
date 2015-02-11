<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign in to flight deck');

$I->amOnPage('/');
$I->click('Get Started');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'eliseoeric');
$I->fillField('Email:', 'eric@thinkgeneric.com');
$I->fillField('Password:', 'eat@joes1');
$I->fillField('Password Confirmation:', 'eat@joes1');
$I->click('Submit');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Flight Deck');
$I->seeRecord('users', [
	'username' => 'eliseoeric',
	'email' => 'eric@thinkgeneric.com'
]);

$I->assertTrue(Auth::check());