<?php
use_helper('Javascript');

function person_item($type, $name="", $email="", $phone="") {
  $tag = "<li>\n";
  $tag .= "Name: <input type='text' name='event[$type][name][]' value='$name' />";
  $tag .= "<br>Email: <input type='text' name='event[$type][email][]' value='$email' />";
  $tag .= "<br>Phone: <input type='text' name='event[$type][phone][]' value='$phone' />";
  $tag .= "</li>\n";
  return $tag;
}

function add_person_item($id, $type) {
  return update_element_function($id, array(
    'position' => 'before',
    'content' => person_item($type),
  ));
}

function people_tag($object, $method, $type) {
  $type = strtolower($type);
  $tag = "";
  $people = call_user_func(array($object, $method));
  $tag .= "<ul>\n";
  foreach ($people as $person) {
    if (strtolower($person->getPersonType()) == $type) {
      $tag .= person_item($type, $person->getName(), $person->getEmail(), $person->getPhone());
    }
  }
  $tag .= person_item($type);
  $tag .= "<li id='link_to_add_person'>".link_to_function("Add another $type", add_person_item('link_to_add_person', $type))."</li>";
  $tag .= "</ul>\n";

  return $tag;
}

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
