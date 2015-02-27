<?php 
$I = new FunctionalTester($scenario);
$I->am('a Flight Deck Member');
$I->wantTo('login to my Flight Deck account');

$I->amOnPage('/login');
$I->fillField('email', 'eric@thinkgeneric.com');
$I->fillField('password', 'eat');
$I->click('Login');

$I->seeInCurrentUrl('/dashboard');
$I->see('Welcome back');