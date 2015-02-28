<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign in to flight deck');

$I->amOnPage('/');
$I->click('Get Started');
$I->seeCurrentUrlEquals('/register');

$I->submitForm('#register_form', array(
	'username' => 'jackjohnson',
	'email' => 'jack@hawaii.com',
	'password' => 'secret',
	'passwordc_onfirmation' => 'secret'
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
	'username' => 'jackjohnson',
	'email' => 'jack@hawaii.com'
]);

//$I->assertTrue(Sentry::check());