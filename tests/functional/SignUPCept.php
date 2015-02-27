<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign in to flight deck');

$I->amOnPage('/');
$I->click('Get Started');
$I->seeCurrentUrlEquals('/register');

$I->submitForm('#register_form', array(
	'username' => 'eliseoeric',
	'email' => 'eric@thinkgeneric.com',
	'password' => 'eat@joes1',
	'passwordc_onfirmation' => 'eat@joes1'
));
//
//$I->fillField('Username:', 'eliseoerics');
//$I->fillField('Email:', 'erics@thinkgeneric.com');
//$I->fillField('Password:', 'eat@joes1');
//$I->fillField('Password Confirmation:', 'eat@joes1');
//$I->click('Submit');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Flight Deck');
$I->seeRecord('users', [
	'username' => 'eliseoeric',
	'email' => 'eric@thinkgeneric.com'
]);

//$I->assertTrue(Sentry::check());