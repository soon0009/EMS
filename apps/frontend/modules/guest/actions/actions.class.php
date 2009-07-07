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
    $c = new Criteria();
    $c->add(GuestPeer::ETIME_ID, $etime->getPrimaryKey());
    $this->guests = GuestPeer::doSelect(new Criteria());
  }
}
