<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

// create a new test browser
$browser = new sfTestBrowser();
$browser->initialize();
$browser->
  get('/')->
  isStatusCode(401)->
  isRequestParameter('module', 'event')->
  isRequestParameter('action', 'list')->
  checkResponseElement('body', '/FAN:/')->
  click('sign in', array('username'=>'soon0009', 'password'=>'*th3C0n*'))->
  isRedirected()->
  followRedirect()->
  isStatusCode(200)->
  isRequestParameter('action', 'list')->
  checkResponseElement('body', '/Contemplating/')->
  click('logout')->
  isRequestParameter('module', 'sfGuardAuth')->
  isRequestParameter('action', 'signout')->
  isRedirected()->
  followRedirect()->
  isStatusCode(401)->
  get('/event/trip-to-the-moon')->
  isStatusCode(401)->
  isRequestParameter('module', 'event')->
  isRequestParameter('action', 'show')->
  checkResponseElement('body', '/FAN:/')->
  click('sign in', array('username'=>'soon0009', 'password'=>'*th3C0n*'))->
  isRedirected()->
  followRedirect()->
  isStatusCode(200)->
  isRequestParameter('module', 'event')->
  isRequestParameter('action', 'list')
;
