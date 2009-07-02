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
    $this->event = $this->getEventFromSlug($this->getRequestParameter('slug'));
    $this->forward404Unless($this->event);

    $this->regForm = $this->getOrCreateRegForm($this->event->getId());
    $this->forward404Unless($this->regForm);
  }

  public function executeCreate() {
    return $this->forward('registration_form', 'change');
  }

  public function executeChange() {
    $this->event = $this->getEventFromSlug($this->getRequestParameter('slug'));
    $this->regForm = $this->getOrCreateRegForm($this->event->getId());
    $c = new Criteria();
    $c->addAscendingOrderByColumn(RegFieldPeer::ID);
    $this->regFields = RegFieldPeer::doSelect($c);
    $this->forward404Unless($this->event);
    $this->forward404Unless($this->regForm);
    $this->forward404Unless($this->regFields);

    if ($this->getRequest()->getMethod() == sfRequest::POST) {
      $c = new Criteria();
      $c->add(RegFormPeer::EVENT_ID, $this->event->getId());
      RegFormPeer::doDelete($c);

      foreach($this->regFields as $field) {
        $field_name = $field->getName();
        if ($this->getRequestParameter($field_name)) {
          $checked_field = $this->getRequestParameter($field_name);
          $regForm = new RegForm();
          $regForm->setEventId($this->event->getId());
          $regForm->setRegFieldId($field->getId());
          if (array_key_exists('required', $checked_field)) {
            $regForm->setRequiredField(true);
          }
          else {
            $regForm->setRequiredField(false);
          }
          $regForm->save();
        }
      }
      return $this->redirect('@show_reg_form?slug='.$this->event->getSlug());
    }
    return sfView::SUCCESS;
  }

  public function handleErrorEdit() {
    $this->event = $this->getEventFromSlug($this->getRequestParameter('slug'));
    $this->regForm = $this->getOrCreateRegForm($this->event->getId());
    $c = new Criteria();
    $c->addAscendingOrderByColumn(RegFieldPeer::ID);
    $this->regFields = RegFieldPeer::doSelect($c);
    $this->forward404Unless($this->event);
    $this->forward404Unless($this->regForm);
    $this->forward404Unless($this->regFields);
    return sfView::SUCCESS;
  }

  private function executeDelete() {
      $c = new Criteria();
      $c->add(RegFormPeer::ETIME_ID, $this->getRequestParameter('event_id'));
      RegFormPeer::doDelete($c);
      return $this->forward('event', 'show', $this->getRequestParameter('slug'));
  }

  private function getEventFromSlug($slug) {
    $c = new Criteria();
    $c->add(EventPeer::SLUG, $slug);
    return EventPeer::doSelectOne($c);
  }

  private function getOrCreateRegForm($event_id) {
    $c = new Criteria();
    $c->add(RegFormPeer::EVENT_ID, $event_id);
    $c->addAscendingOrderByColumn(RegFormPeer::FIELD_ORDER);
    $regForm = RegFormPeer::doSelect($c);

    return $regForm ? $regForm : new RegForm();
  }

}
