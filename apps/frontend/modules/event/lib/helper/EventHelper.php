<?php
use_helper('Javascript');

function link_to_publish($event) {
  if ($event->getPublished()) {
    $publish = "Published";
  }
  else {
    $publish = "Publish";
  }

  return link_to_remote($publish, array(
    'url'      => 'event/publish?id='.$event->getId(),
    'update'   => array('success' => 'publish'),
    'loading'  => "Element.show('published_indicator')",
    'complete' => "Element.hide('published_indicator');".visual_effect('highlight', 'publish_button'),
  ));
}
