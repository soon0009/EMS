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
    $this->forward404Unless($this->getRequestParameter('event_id'));
    $this->etime = new Etime();
    $this->etime->setEventId($this->getRequestParameter('event_id'));

    $this->setTemplate('edit');
  }

  public function executeEdit() {
    if ($this->getRequest()->getMethod() != sfRequest::POST) {
      if ($this->getRequestParameter('id')) {
        $c = new Criteria();
        $c->add(EtimePeer::ID, $this->getRequestParameter('id'));
        $this->etime = EtimePeer::doSelectOne($c);
      }
      $this->forward404Unless($this->etime);
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
      $etime->setTitle($this->getRequestParameter('etime_title'));
      $etime->setStartDate(strtotime($this->getRequestParameter('start_date').' '.$this->getRequestParameter('start_date_time')));
      $etime->setEndDate(strtotime($this->getRequestParameter('end_date').' '.$this->getRequestParameter('end_date_time')));
      $etime->setAllDay($this->getRequestParameter('all_day') ? $this->getRequestParameter('all_day') : false);
      $etime->setLocation($this->getRequestParameter('location'));
      $etime->setDescription($this->getRequestParameter('etime_description'));
      $etime->setNotes($this->getRequestParameter('etime_notes'));
      $etime->setCapacity($this->getRequestParameter('capacity')? $this->getRequestParameter('capacity') : null);
      $etime->setAdditionalGuests($this->getRequestParameter('additional_guests')? $this->getRequestParameter('additional_guests') : 0);
      $etime->setHasFee($this->getRequestParameter('has_fee') ? $this->getRequestParameter('has_fee') : false);
      $etime->setAudioVisualSupport($this->getRequestParameter('audio_visual_support') ? $this->getRequestParameter('audio_visual_support') : false);
      $etime->setOrganiser($this->getRequestParameter('etime_organiser'));
      $etime->setInterestedParties($this->getRequestParameter('etime_interested_parties'));

      $etime->save();

      // Update many-to-many for "etime_rsvp"
      $c = new Criteria();
      $c->add(EtimeRsvpPeer::ETIME_ID, $etime->getPrimaryKey());
      EtimeRsvpPeer::doDelete($c);

      $ids = $this->getRequestParameter('associated_etime_rsvp');
      if (is_array($ids))
      {
        foreach ($ids as $id)
        {
          $EtimeRsvp = new EtimeRsvp();
          $EtimeRsvp->setEtime($etime);
          $EtimeRsvp->setRsvpId($id);
          $EtimeRsvp->save();
        }
      }

      // Update many-to-many for "etime_audience"
      $c = new Criteria();
      $c->add(EtimeAudiencePeer::ETIME_ID, $etime->getPrimaryKey());
      EtimeAudiencePeer::doDelete($c);

      $ids = $this->getRequestParameter('associated_etime_audience');
      if (is_array($ids))
      {
        foreach ($ids as $id)
        {
          $EtimeAudience = new EtimeAudience();
          $EtimeAudience->setEtime($etime);
          $EtimeAudience->setAudienceId($id);
          $EtimeAudience->save();
        }
      }

      TagTools::replaceTags($this->getRequestParameter('etime_tag_string'), "etime", $etime);

      return $this->redirect('@show_event?slug='.$etime->getEvent()->getSlug());
    }
    return sfView::SUCCESS;
  }

  public function handleErrorEdit() {
    $this->etime = $this->getEtimeOrCreate();
    return sfView::SUCCESS;
  }

  public function executeDelete()
  {
    $etime = EtimePeer::retrieveByPk($this->getRequestParameter('id'));
    $event = $etime->getEvent();

    $this->forward404Unless($etime);

    $etime->delete();

    return $this->redirect('@show_event?slug='.$event->getSlug());
  }

  protected function getEtimeOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $etime = new Etime();
    }
    else
    {
      $etime = EtimePeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($etime);
    }

    return $etime;
  }
}
