<?php

/**
 * guest actions.
 *
 * @package    ems
 * @subpackage guest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class guestActions extends sfActions
{
  public function executeList()
  {
    $etime = EtimePeer::retrieveByPk($this->getRequestParameter('etime_id'));
    $this->forward404Unless($etime);

    $c = new Criteria();
    $c->add(RegFormPeer::EVENT_ID, $etime->getEventId());
    $c->addAscendingOrderByColumn(RegFormPeer::FIELD_ORDER);
    $this->regForm = RegFormPeer::doSelect($c);

    $c = new Criteria();
    $c->add(GuestPeer::ETIME_ID, $this->getRequestParameter('etime_id'));
    $this->guests = GuestPeer::doSelect($c);
    $this->forward404Unless($this->guests);
  }
}
