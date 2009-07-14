<?php

class myRegFormValidator extends sfValidator
{
  public function initialize($context, $parameters = null) {
    parent::initialize($context);

    $this->setParameter('reg_error', 'This field is required');
    $this->getParameterHolder()->add($parameters);

    return true;
  }

  public function execute(&$value, &$error) {
    $field_value = trim($value);
    $etime_id_param = $this->getParameter('hidden_etime_id'); 
    $etime_id = $this->getContext()->getRequest()->getParameter($etime_id_param); 
    $field = $this->getParameter('field'); 

    $c = new Criteria();
    $c->add(EtimePeer::ID, $etime_id);
    $etime = EtimePeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(RegFieldPeer::NAME, $field);
    $regField = RegFieldPeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(RegFormPeer::EVENT_ID, $etime->getEvent()->getId());
    $c->add(RegFormPeer::REG_FIELD_ID, $regField->getId());
    $regForm = RegFormPeer::doSelectOne($c);

    if ($regForm->getRequiredField() && $field_value == "") {
      $error = $this->getParameter('reg_error');
      return false;
    }

    return true;
  }
}
