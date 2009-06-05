<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

// create a new test browser
$browser = new sfTestBrowser();
$browser->initialize();

$browser->
  get('/tag')->
  click('sign in', array('username'=>'soon0009', 'password'=>'*th3C0n*'))->
  followRedirect()->
  isStatusCode(404)->
  get('/tag/sittingaround')->
  isStatusCode(200)
;
