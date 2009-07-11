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

    $this->form_fields = $this->getFormFields($this->etime->getEventId());

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

  private function getFormFields($event_id, $all_fields=false) {
    $c = new Criteria();
    $c->add(RegFormPeer::EVENT_ID, $event_id);
    $c->addAscendingOrderByColumn(RegFormPeer::FIELD_ORDER);
    $regForm = RegFormPeer::doSelect($c);
    
    $form_fields = array();

    if ($all_fields) {
      foreach ($regForm as $form_field) {
        $form_fields[] = $form_field->getRegField()->getName();
      }
      return $form_fields;
    }

    foreach ($regForm as $form_field) {
      if ($form_field->getRequiredField()) {
        $form_fields[] = $form_field->getRegField()->getName();
      }
    }
    if (!count($form_fields)) {
      foreach ($regForm as $form_field) {
        $form_fields[] = $form_field->getRegField()->getName();
      }
    }
    return $form_fields;
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

  public function executeSave()
  {
    return $this->forward('guest', 'edit');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->guest = $this->getGuestOrCreate();
    $this->updateGuestFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveGuest($guest)
  {
    $guest->save();
  }

  public function executeCreate()
  {
    $this->forward404Unless($this->getRequestParameter('etime_id'));
    return $this->forward('guest', 'edit', 'etime_id='.$this->getRequestParameter('etime_id'));
  }

  public function executeEdit()
  {
    $this->forward404Unless($this->getRequestParameter('etime_id'));
    $this->guest = $this->getGuestOrCreate();
    $this->guest->setEtimeId($this->getRequestParameter('etime_id'));
    $this->event_id = $this->guest->getEtime()->getEventId();

    $this->form_fields = $this->getFormFields($this->event_id, true);

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateGuestFromRequest();

      $this->saveGuest($this->guest);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('guest/create?etime_id='.$this->guest->getEtimeId());
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('guest/list');
      }
      else
      {
        return $this->redirect('guest/edit?id='.$this->guest->getId().'&etime_id='.$this->guest->getEtimeId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function getGuestOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $guest = new Guest();
    }
    else
    {
      $guest = GuestPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($guest);
    }

    return $guest;
  }

  public function executeDelete()
  {
    $this->guest = GuestPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->guest);

    try
    {
      $this->deleteGuest($this->guest);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Guest. Make sure it does not have any associated items.');
      return $this->forward('guest', 'list?etime_id='.$this->guest->getEtimeId());
    }

    return $this->redirect('guest/list?etime_id='.$this->guest->getEtimeId());
  }

  protected function deleteGuest($guest)
  {
    $guest->delete();
  }

  protected function getLabels()
  {
    return array(
      'guest{etime_id}' => 'Etime:',
      'guest{attending}' => 'Attending:',
      'guest{reg_date}' => 'Reg date:',
      'guest{extra_info}' => 'Extra info:',
      'guest{created_at}' => 'Created at:',
      'guest{updated_at}' => 'Updated at:',
      'guest{title}' => 'Title:',
      'guest{firstname}' => 'Firstname:',
      'guest{lastname}' => 'Lastname:',
      'guest{preferred_name}' => 'Preferred name:',
      'guest{email}' => 'Email:',
      'guest{phone}' => 'Phone:',
      'guest{mobile}' => 'Mobile:',
      'guest{primary_address_line1}' => 'Primary address line1:',
      'guest{primary_address_line2}' => 'Primary address line2:',
      'guest{primary_address_line3}' => 'Primary address line3:',
      'guest{primary_address_city}' => 'Primary address city:',
      'guest{primary_address_postcode}' => 'Primary address postcode:',
      'guest{primary_address_state}' => 'Primary address state:',
      'guest{primary_address_country}' => 'Primary address country:',
      'guest{secondary_address_line1}' => 'Secondary address line1:',
      'guest{secondary_address_line2}' => 'Secondary address line2:',
      'guest{secondary_address_line3}' => 'Secondary address line3:',
      'guest{secondary_address_city}' => 'Secondary address city:',
      'guest{secondary_address_postcode}' => 'Secondary address postcode:',
      'guest{secondary_address_state}' => 'Secondary address state:',
      'guest{secondary_address_country}' => 'Secondary address country:',
      'guest{special_req}' => 'Special req:',
      'guest{position}' => 'Position:',
      'guest{presenter}' => 'Presenter:',
      'guest{srn}' => 'Srn:',
      'guest{fan}' => 'Fan:',
      'guest{aou}' => 'Aou:',
      'guest{id}' => 'Id:',
    );
  }

  protected function updateGuestFromRequest()
  {
    $guest = $this->getRequestParameter('guest');

    if (isset($guest['etime_id']))
    {
    $this->guest->setEtimeId($guest['etime_id'] ? $guest['etime_id'] : null);
    }
    $this->guest->setAttending(isset($guest['attending']) ? $guest['attending'] : 0);
    if (isset($guest['reg_date']))
    {
      if ($guest['reg_date'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($guest['reg_date']))
          {
            $value = $dateFormat->format($guest['reg_date'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $guest['reg_date'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->guest->setRegDate($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->guest->setRegDate(null);
      }
    }
    if (isset($guest['extra_info']))
    {
      $this->guest->setExtraInfo($guest['extra_info']);
    }
    if (isset($guest['created_at']))
    {
      if ($guest['created_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($guest['created_at']))
          {
            $value = $dateFormat->format($guest['created_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $guest['created_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->guest->setCreatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->guest->setCreatedAt(null);
      }
    }
    if (isset($guest['updated_at']))
    {
      if ($guest['updated_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($guest['updated_at']))
          {
            $value = $dateFormat->format($guest['updated_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $guest['updated_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->guest->setUpdatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->guest->setUpdatedAt(null);
      }
    }
    if (isset($guest['title']))
    {
      $this->guest->setTitle($guest['title']);
    }
    if (isset($guest['firstname']))
    {
      $this->guest->setFirstname($guest['firstname']);
    }
    if (isset($guest['lastname']))
    {
      $this->guest->setLastname($guest['lastname']);
    }
    if (isset($guest['preferred_name']))
    {
      $this->guest->setPreferredName($guest['preferred_name']);
    }
    if (isset($guest['email']))
    {
      $this->guest->setEmail($guest['email']);
    }
    if (isset($guest['phone']))
    {
      $this->guest->setPhone($guest['phone']);
    }
    if (isset($guest['mobile']))
    {
      $this->guest->setMobile($guest['mobile']);
    }
    if (isset($guest['primary_address_line1']))
    {
      $this->guest->setPrimaryAddressLine1($guest['primary_address_line1']);
    }
    if (isset($guest['primary_address_line2']))
    {
      $this->guest->setPrimaryAddressLine2($guest['primary_address_line2']);
    }
    if (isset($guest['primary_address_line3']))
    {
      $this->guest->setPrimaryAddressLine3($guest['primary_address_line3']);
    }
    if (isset($guest['primary_address_city']))
    {
      $this->guest->setPrimaryAddressCity($guest['primary_address_city']);
    }
    if (isset($guest['primary_address_postcode']))
    {
      $this->guest->setPrimaryAddressPostcode($guest['primary_address_postcode']);
    }
    if (isset($guest['primary_address_state']))
    {
      $this->guest->setPrimaryAddressState($guest['primary_address_state']);
    }
    if (isset($guest['primary_address_country']))
    {
      $this->guest->setPrimaryAddressCountry($guest['primary_address_country']);
    }
    if (isset($guest['secondary_address_line1']))
    {
      $this->guest->setSecondaryAddressLine1($guest['secondary_address_line1']);
    }
    if (isset($guest['secondary_address_line2']))
    {
      $this->guest->setSecondaryAddressLine2($guest['secondary_address_line2']);
    }
    if (isset($guest['secondary_address_line3']))
    {
      $this->guest->setSecondaryAddressLine3($guest['secondary_address_line3']);
    }
    if (isset($guest['secondary_address_city']))
    {
      $this->guest->setSecondaryAddressCity($guest['secondary_address_city']);
    }
    if (isset($guest['secondary_address_postcode']))
    {
      $this->guest->setSecondaryAddressPostcode($guest['secondary_address_postcode']);
    }
    if (isset($guest['secondary_address_state']))
    {
      $this->guest->setSecondaryAddressState($guest['secondary_address_state']);
    }
    if (isset($guest['secondary_address_country']))
    {
      $this->guest->setSecondaryAddressCountry($guest['secondary_address_country']);
    }
    if (isset($guest['special_req']))
    {
      $this->guest->setSpecialReq($guest['special_req']);
    }
    if (isset($guest['position']))
    {
      $this->guest->setPosition($guest['position']);
    }
    if (isset($guest['presenter']))
    {
      $this->guest->setPresenter($guest['presenter']);
    }
    if (isset($guest['srn']))
    {
      $this->guest->setSrn($guest['srn']);
    }
    if (isset($guest['fan']))
    {
      $this->guest->setFan($guest['fan']);
    }
    if (isset($guest['aou']))
    {
      $this->guest->setAou($guest['aou']);
    }
  }
}
