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
    $this->processSort();

    $this->processFilters();

    $this->etime = EtimePeer::retrieveByPk($this->getRequestParameter('etime_id'));
    $this->forward404Unless($this->etime);

    $c = new Criteria();
    $c->add(RegFormPeer::EVENT_ID, $this->etime->getEventId());
    $c->addAscendingOrderByColumn(RegFormPeer::FIELD_ORDER);
    $this->regForm = RegFormPeer::doSelect($c);
    
    $this->form_fields = array();
    foreach ($this->regForm as $form_field) {
      if ($form_field->getRequiredField()) {
        $this->form_fields[] = $form_field->getRegField()->getName();
      }
    }
    if (!count($this->form_fields)) {
      foreach ($this->regForm as $form_field) {
        $this->form_fields[] = $form_field->getRegField()->getName();
      }
    }

    $this->pager = new sfPropelPager('Guest', 10);
    $c = new Criteria();
    $c->add(GuestPeer::ETIME_ID, $this->getRequestParameter('etime_id'));
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/guest')));
    $this->pager->init();
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/guest');
    }

  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/guest/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/guest/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/guest/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/guest/sort'))
    {
      $sort_column = GuestPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/guest/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }
}
