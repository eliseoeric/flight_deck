<?php 
$I = new FunctionalTester($scenario);
$I->am('a Flightdeck member');
$I->wantTo('I want to post a dashboard (status) object to a profile');

$I->amOnPage('dasboard');

$I->postAStatus(['body' => 'My first post']);


