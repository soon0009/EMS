<div class="long_form">
<table>
  <thead>
    <th> Required </th>
    <th> Include </th>
    <th> Field </th>
  </thead>
<?php $row = 0; foreach ($regFields as $field): $row++; ?>
  <?php
  $c = new Criteria();
  $c->add(RegFormPeer::EVENT_ID, $event->getId());
  $c->add(RegFormPeer::REG_FIELD_ID, $field->getId());
  $formField = RegFormPeer::doSelectOne($c);
  $selected = false;
  $required = false;
  if ($formField) {
    $selected = true;
    if ($formField->getRequiredField()) {
      $required = true;
    }
  }
  ?>
  <tr class="tr_bg_<?php if ($row % 2) { echo "0"; } else { echo "1";} ?>">
    <td><?php echo checkbox_tag($field->getName()."[required]", 'checked', $required) ?></td>
    <td><?php echo checkbox_tag($field->getName()."[include]", 'checked', $selected ) ?></td>
    <td><label class="longlabel" for="<?php echo $field->getName(); ?>"><?php echo $field->getLabel(); ?></label></td>
  </tr>
<?php endforeach; ?>
</table>
</div>
