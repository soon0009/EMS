<?php 
include(dirname(__FILE__).'/../bootstrap/unit.php');
include(dirname(__FILE__).'/../../lib/myTools.class.php');

$t = new lime_test(4, new lime_output_color());

$t->diag('myTools::yesNo');
$t->isa_ok(myTools::yesNo(true), 'string', 'myTools::yesNo() returns a string of Yes or No');
$t->is(myTools::yesNo(true), "Yes");
$t->is(myTools::yesNo(false), "No");
$t->is(myTools::yesNo(null), "No");
