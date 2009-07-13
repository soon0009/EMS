<div>
<?php echo link_to('Change registration form', '@change_reg_form?slug='.$event->getSlug()) ?>
</div>
<div class="long_form">
<?php foreach ($regForm as $field): ?>
    <label class="label" for="<?php echo $field->getRegField()->getName(); ?>"><?php echo $field->getRegField(); ?><?php if ($field->getRequiredField() == true) { echo "*"; } ?></label>
    <div class="value">
      <?php if ($field->getRegField()->getType() == "longvarchar"): ?>
      <?php echo textarea_tag($field->getRegField()->getName(), '', array ( 'class'=>'long', 'disabled'=>'disabled')) ?>
      <?php elseif ($field->getRegField()->getType() == "boolean"): ?>
      <?php echo checkbox_tag($field->getRegField()->getName(), '', array ( 'disabled'=>'disabled')) ?>
      <?php else: ?>
      <?php echo input_tag($field->getRegField()->getName(), '', array ( 'class'=>'long', 'disabled'=>'disabled')) ?>
      <?php endif; ?>
    </div>
    <div class="clear_float"></div>
<?php endforeach; ?>
</div>
<div>
<?php echo link_to('back to event', '@show_event?slug='.$event->getSlug()) ?>
</div>
