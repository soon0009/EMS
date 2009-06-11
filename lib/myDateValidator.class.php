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
    $start_date_param = $this->getParameter('start_date'); 

    $start_date = $this->getContext()->getRequest()->getParameter($start_date_param); 
    $end_date   = $value;

    if (strtotime($start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'].' '.$start_date['hour'].':'.$start_date['minute']) > strtotime($end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'].' '.$end_date['hour'].':'.$end_date['minute'])) {
      $error = $this->getParameter('date_error');
      return false;
    }
    return true;
  }
}
