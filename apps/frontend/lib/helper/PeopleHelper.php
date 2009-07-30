<?php
use_helper('Javascript');

function list_people($object, $method, $type, $obj_type) {
  $list = "";
  $people = call_user_func(array($object, $method));
  $list .= "<ul>\n";
  foreach ($people as $person) {
    if (strtolower($person->getPersonType()) == strtolower($type)) {
      $list .= "<li>\n";
      $list .= $person->getName();
      $list .= "&nbsp;".$person->getEmail();
      $list .= "&nbsp;".$person->getPhone();
      $list .= "&nbsp;".link_to_remote(image_tag('delete', array('alt'=>'delete')), array(
        'url' => $obj_type.'/deletePerson?id='.$person->getId(),
        'update' => array('success'=>$obj_type.'_'.myTools::stripText($type)),
      ));
      $list .= "</li>\n";
    }
  }
  $list .= "</ul>\n";
  return $list;
}
