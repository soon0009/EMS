<?php

/**
 * etime actions.
 *
 * @package    ems
 * @subpackage etime
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class etimeActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeList()
  {
    $this->etimes = EtimePeer::getAllOrderedByStartDate();
    $this->forward404Unless($this->etimes);
  }

  public function executeCreate()
  {
    $this->etime = new Etime();

    $this->setTemplate('edit');
  }

  public function executeEdit() {
    if ($this->getRequest()->getMethod() != sfRequest::POST) {
      if (!$this->getRequestParameter('id')) {
        $this->etime = new Etime();
        $this->forward404Unless($this->etime);
      }
      else {
        $c = new Criteria();
        $c->add(EtimePeer::ID, $this->getRequestParameter('id'));
        $this->etime = EtimePeer::doSelectOne($c);
        $this->forward404Unless($this->etime);
      }
    }
    else {
      if (!$this->getRequestParameter('id'))
      {
        $etime = new Etime();
      }
      else
      {
        $etime = EtimePeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($etime);
      }
  
      $etime->setId($this->getRequestParameter('id'));
      $etime->setEventId($this->getRequestParameter('event_id'));
      $etime->setTitle($this->getRequestParameter('title'));
      $etime->setStartDate($this->getRequestParameter('start_date'));
      $etime->setEndDate($this->getRequestParameter('end_date'));
      $etime->setStartTime($this->getRequestParameter('start_time'));
      $etime->setEndTime($this->getRequestParameter('end_time'));
      $etime->setAllDay($this->getRequestParameter('all_day') ? $this->getRequestParameter('all_day') : null);
      $etime->setLocation($this->getRequestParameter('location'));
      $etime->setDescription($this->getRequestParameter('description'));
      $etime->setNotes($this->getRequestParameter('notes'));
      $etime->setCapacity($this->getRequestParameter('capacity'));
      $etime->setHasFee($this->getRequestParameter('has_fee') ? $this->getRequestParameter('has_fee') : null);
      $etime->setOrganiser($this->getRequestParameter('organiser'));
      $etime->setInterestedParties($this->getRequestParameter('interested_parties'));

      $etime->save();
  
      return $this->redirect('@show_event?slug='.$etime->getEvent()->getSlug());
    }
    return sfView::SUCCESS;
  }

  public function handleErrorEdit() {
    $this->etime = new Etime;
    return sfView::SUCCESS;
  }
}
