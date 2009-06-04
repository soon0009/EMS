<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

// create a new test browser
$browser = new sfTestBrowser();
$browser->initialize();

$browser->
  get('/show_times')->
  isStatusCode(401)->
  isRequestParameter('module', 'etime')->
  isRequestParameter('action', 'list')->
  checkResponseElement('body', '/FAN:/')->
  click('sign in', array('username'=>'soon0009', 'password'=>'*th3C0n*'))->
  isRedirected()->
  followRedirect()->
  isStatusCode(200)->
  isRequestParameter('action', 'list')->
  checkResponseElement('body', '/Contemplating/')
;
