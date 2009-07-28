<fieldset>
  <div class="form-row">
    <?php echo form_error('person_name'); ?>
    <label for="name">Name:</label>
    <?php echo input_tag('person_name', $sf_params->get('person_name')) ?>
  </div>
 
  <div class="form-row">
    <?php echo form_error('email'); ?>
    <label for="email">Email:</label>
    <?php echo input_tag('email', $sf_params->get('email')) ?>
  </div>
 
  <div class="form-row">
    <label for="phone">Phone:</label>
    <?php echo input_tag('phone', $sf_params->get('phone')) ?>
  </div>
</fieldset>

<?php echo input_hidden_tag('type', $type); ?>
<?php echo input_hidden_tag('event_id', $event_id); ?>
<?php echo input_hidden_tag('referer', $sf_params->get('referer') ? $sf_params->get('referer') : $sf_request->getUri()) ?>
<?php echo submit_tag('Add'); ?>
&nbsp;<?php echo link_to_function('cancel', visual_effect('blind_up', 'add_organiser', array('duration' => 0.5))) ?>
