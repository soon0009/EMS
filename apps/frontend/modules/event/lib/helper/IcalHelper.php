<?php

function link_to_ics_generator($link_text) {
  $generator_link = "http://feeds.technorati.com/events/";
  return "<a href='".$generator_link.sfContext::getInstance()->getRequest()->getUri()."'>".$link_text."</a>";
}
