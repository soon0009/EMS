<?php

function list_people($object, $method, $type) {
  $list = "";
  $people = call_user_func(array($object, $method));
  $list .= "<ul>\n";
  foreach ($people as $person) {
    if (strtolower($person->getPersonType()) == strtolower($type)) {
      $list .= "<li>\n";
      $list .= $person->getName();
      $list .= "&nbsp;".$person->getEmail();
      $list .= "&nbsp;".$person->getPhone();
      $list .= "</li>\n";
    }
  }
  $list .= "</ul>\n";
  return $list;
}
