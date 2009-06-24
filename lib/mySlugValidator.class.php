<?php

class mySlugValidator extends sfValidator
{
  public function initialize($context, $parameters = null) {
    parent::initialize($context);

    $this->setParameter('slug_error', 'Slug already exists');
    $this->getParameterHolder()->add($parameters);

    return true;
  }

  public function execute(&$value, &$error) {
    $slug = myTools::stripText($value);
    $event_id_param = $this->getParameter('event_id'); 

    $event_id = $this->getContext()->getRequest()->getParameter($event_id_param); 

    $c = new Criteria();
    $c->add(EventPeer::SLUG, $slug);
    $event_slug = EventPeer::doSelectOne($c);

    if ($event_slug && $event_slug->getId() != $event_id) {
      $error = $this->getParameter('slug_error');
      return false;
    }
    return true;
  }
}
