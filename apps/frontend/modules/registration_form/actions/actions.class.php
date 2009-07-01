<?php

/**
 * registration_form actions.
 *
 * @package    ems
 * @subpackage registration_form
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class registration_formActions extends sfActions
{
  public function executeShow() {
    $c = new Criteria();
    $c->add(EventPeer::SLUG, $this->getRequestParameter('slug'));
    $this->event = EventPeer::doSelectOne($c);
    $this->forward404Unless($this->event);

    $c = new Criteria();
    $c->add(RegFormPeer::EVENT_ID, $this->event->getId());
    $c->addAscendingOrderByColumn(RegFormPeer::FIELD_ORDER);
    $this->regForm = RegFormPeer::doSelect($c);
    $this->forward404Unless($this->regForm);
  }
}
