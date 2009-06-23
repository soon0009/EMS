<?php
// auto-generated by sfPropelCrud
// date: 2009/05/28 15:55:08
?>
<?php

/**
 * event actions.
 *
 * @package    ems
 * @subpackage event
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class eventActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('event', 'list');
  }

  public function executeList()
  {
    $this->events = EventPeer::doSelect(new Criteria());
  }

  public function executeShow()
  {
    $c = new Criteria();
    $c->add(EventPeer::SLUG, $this->getRequestParameter('slug'));
    $this->event = EventPeer::doSelectOne($c);
    $this->forward404Unless($this->event);
  }

  public function executeCreate()
  {
    if ($this->getRequest()->getMethod() != sfRequest::POST) {
      $this->event = new Event();
      $this->etime = new Etime();
      $this->forward404Unless($this->event);
      $this->forward404Unless($this->etime);
    }
    else {
      $event    = new Event();
      $etime    = new Etime();
  
      $event->setTitle($this->getRequestParameter('title'));
      $event->setStatusId($this->getRequestParameter('status_id') ? $this->getRequestParameter('status_id') : null);
      $event->setPublished($this->getRequestParameter('published', 0));
      $event->setDescription($this->getRequestParameter('description'));
      $event->setNotes($this->getRequestParameter('notes'));
      $event->setImageUrl($this->getRequestParameter('image_url'));
      $event->setOrganiser($this->getRequestParameter('organiser'));
      $event->setInterestedParties($this->getRequestParameter('interested_parties'));
  
      $event->save();

      $etime->setEventId($event->getId());
      $etime->setTitle($this->getRequestParameter('etime_title'));
      $start_date = $this->getRequestParameter('start_date');
      $etime->setStartDate($start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'].' '.$start_date['hour'].':'.$start_date['minute']);
      $end_date = $this->getRequestParameter('end_date');
      $etime->setEndDate($end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'].' '.$end_date['hour'].':'.$end_date['minute']);
      $etime->setAllDay($this->getRequestParameter('all_day') ? $this->getRequestParameter('all_day') : false);
      $etime->setLocation($this->getRequestParameter('location'));
      $etime->setDescription($this->getRequestParameter('etime_description'));
      $etime->setNotes($this->getRequestParameter('etime_notes'));
      $etime->setCapacity($this->getRequestParameter('capacity')? $this->getRequestParameter('capacity') : null);
      $etime->setHasFee($this->getRequestParameter('has_fee') ? $this->getRequestParameter('has_fee') : false);
      $etime->setOrganiser($this->getRequestParameter('etime_organiser'));
      $etime->setInterestedParties($this->getRequestParameter('etime_interested_parties'));

      $etime->save();

      if ($this->getRequestParameter('tags')) {
        $tags = TagTools::splitPhrase($this->getRequestParameter('tags'));
        foreach ($tags as $settag) {
          $tag      = new Tag();
          $eventTag = new EventTag();
          $tag->setTag($settag);

          $c = new Criteria();
          $c->add(TagPeer::NORMALIZED_TAG, $tag->getNormalizedTag());
          $tag_exists = TagPeer::doSelectOne($c);
          if (!$tag_exists) {
            $tag->save();
          }
          else {
            $tag = $tag_exists;
          }

          $eventTag->setEvent($event);
          $eventTag->setTag($tag);
          $eventTag->save();
        }
      }
  
      return $this->redirect('@show_event?slug='.$event->getSlug());
    }
    return sfView::SUCCESS;

  }

  public function executeEdit()
  {
    if ($this->getRequest()->getMethod() != sfRequest::POST) {
      if ($this->getRequestParameter('slug')) {
        $c = new Criteria();
        $c->add(EventPeer::SLUG, $this->getRequestParameter('slug'));
        $this->event = EventPeer::doSelectOne($c);
        $this->forward404Unless($this->event);
      }
      elseif ($this->getRequestParameter('id')) {
        $this->event = EventPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->event);
      }
      else {
        $this->event = new Event();
        $this->forward404Unless($this->event);
      }
    }
    else {
      if (!$this->getRequestParameter('id'))
      {
        $event = new Event();
      }
      else
      {
        $event = EventPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($event);
      }
  
      $event->setId($this->getRequestParameter('id'));
      $event->setTitle($this->getRequestParameter('title'));
      $event->setStatusId($this->getRequestParameter('status_id') ? $this->getRequestParameter('status_id') : null);
      $event->setPublished($this->getRequestParameter('published', 0));
      $event->setDescription($this->getRequestParameter('description'));
      $event->setNotes($this->getRequestParameter('notes'));
      $event->setImageUrl($this->getRequestParameter('image_url'));
      $event->setOrganiser($this->getRequestParameter('organiser'));
      $event->setInterestedParties($this->getRequestParameter('interested_parties'));
  
      $event->save();
  
      return $this->redirect('@show_event?slug='.$event->getSlug());
    }
    return sfView::SUCCESS;
  }

  public function executeDelete()
  {
    $event = EventPeer::retrieveByPk($this->getRequestParameter('id'));

    $this->forward404Unless($event);

    $event->delete();

    return $this->redirect('event/list');
  }

  public function handleErrorEdit() {
    $this->event = new Event;
    return sfView::SUCCESS;
  }

  public function handleErrorCreate() {
    $this->event = new Event;
    $this->etime = new Etime;
    return sfView::SUCCESS;
  }

}
