<?php echo form_tag('guest/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($guest, 'getId') ?>
<?php echo object_input_hidden_tag($guest, 'getEtimeId') ?>
<?php echo input_hidden_tag('event_id', $event_id) ?>

<fieldset id="sf_fieldset_none" class="">
  <?php if (!$outside): ?>
    <?php include_partial('edit_form_inside', array('guest' => $guest, 'form_fields'=>$form_fields, 'required_form_fields'=>$required_form_fields, 'labels'=>$labels)) ?>
  <?php endif; ?>
  <?php include_partial('edit_form_outside', array('guest' => $guest, 'form_fields'=>$form_fields, 'required_form_fields'=>$required_form_fields, 'labels'=>$labels)) ?>
</fieldset>

<?php if ($outside): ?>
  <?php include_partial('edit_actions_outside', array('guest' => $guest)) ?>
<?php else: ?>
  <?php include_partial('edit_actions', array('guest' => $guest)) ?>
<?php endif; ?>

</form>
