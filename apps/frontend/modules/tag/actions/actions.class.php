<?php

/**
 * tag actions.
 *
 * @package    ems
 * @subpackage tag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class tagActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeShow()
  {
    $c = new Criteria();
    $c->add(TagPeer::NORMALIZED_TAG, $this->getRequestParameter('tag'));
    $this->tag = TagPeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(TagPeer::NORMALIZED_TAG, $this->getRequestParameter('tag'));
    $c->addJoin(EventTagPeer::EVENT_ID, EventPeer::ID);
    $c->addJoin(TagPeer::ID, EventTagPeer::TAG_ID);
    $this->events = EventPeer::doSelect($c);

    $this->forward404Unless($this->events);
  }
}
