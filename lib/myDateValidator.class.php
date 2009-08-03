<?php

class myDateValidator extends sfValidator
{
  public function initialize($context, $parameters = null) {
    parent::initialize($context);

    $this->setParameter('date_error', 'Error comparing start and end dates');
    $this->getParameterHolder()->add($parameters);

    return true;
  }

  public function execute(&$value, &$error) {
    $start_date = $this->getContext()->getRequest()->getParameter($this->getParameter('start_date')); 
    $start_date_time = $this->getContext()->getRequest()->getParameter($this->getParameter('start_date_time')); 
    $end_date   = $value;
    $end_date_time = $this->getContext()->getRequest()->getParameter($this->getParameter('end_date_time')); 

    if (strtotime($start_date.' '.$start_date_time) > strtotime($end_date.' '.$end_date_time)) {
      $error = $this->getParameter('date_error');
      return false;
    }
    return true;
  }
}
