<?php

/** @var AcceptanceTester $I */
$I = new ApiTester($scenario);
$I->wantTo('get list of frameworks');

$I->sendGET('/api/frameworks');

$I->seeResponseCodeIs(200);
$I->dontSeeResponseCodeIs(500);
$I->seeResponseIsJson();

$I->seeResponseContainsJson(['name' => 'Phalcon', 'version' => '2.0.8']);
$I->seeResponseMatchesJsonType([
    'name' => 'string',
    'version' => 'string:regex(~\d\.\d\.\d~)'
]);
