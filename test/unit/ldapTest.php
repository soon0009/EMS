<?php

include(dirname(__FILE__).'/../bootstrap/unit.php');
include(dirname(__FILE__).'/../../lib/FlindersLDAP.class.php');

$t = new lime_test(3, new lime_output_color());

$t->diag('FlindersLDAP::checkPassword');
$t->isa_ok(FlindersLDAP::checkPassword('username', 'password'), 'boolean', 'FlindersLDAP::checkPassword() returns true or false');
$t->is(FlindersLDAP::checkPassword('soon0009', '*th3C0n*'), true, 'Check against valid fan and password');
$t->is(FlindersLDAP::checkPassword('soon0009', 'abcd1234'), false, 'Check against invalid fan and password');
