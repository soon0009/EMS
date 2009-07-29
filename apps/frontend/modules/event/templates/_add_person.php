<div id="add_person">
  <?php echo form_tag('event/addPerson') ?>
    <?php use_helper('Validation'); ?>
    <div id="add_person_type" <?php if (!form_has_error('person_name') && !form_has_error('email')) { echo 'style="display:none"'; }?> >
      <h4><?php echo ucfirst($type); ?></h4>
      <table>
        <?php if (form_has_error('person_name')): ?>
        <tr> <td colspan="2"><?php echo form_error('person_name'); ?></td> </tr>
        <?php endif; ?>
        <tr>
          <td><label for="name">Name:</label></td>
          <td><?php echo input_tag('person_name', $sf_params->get('person_name')) ?></td>
        </tr>
       
        <?php if (form_has_error('email')): ?>
        <tr> <td colspan="2"><?php echo form_error('email'); ?></td> </tr>
        <?php endif; ?>
        <tr>
          <td><label for="email">Email:</label></td>
          <td><?php echo input_tag('email', $sf_params->get('email')) ?></td>
        </tr>
       
        <tr>
          <td><label for="phone">Phone:</label></td>
          <td><?php echo input_tag('phone', $sf_params->get('phone')) ?></td>
        </tr>
      </table>
      
      <?php echo input_hidden_tag('type', $type); ?>
      <?php echo input_hidden_tag('event_id', $event_id); ?>
      <?php echo input_hidden_tag('referer', $sf_params->get('referer') ? $sf_params->get('referer') : $sf_request->getUri()) ?>
      <?php echo submit_tag('Add'); ?>
      &nbsp;<?php echo link_to_function('cancel', visual_effect('blind_up', 'add_person_type', array('duration' => 0.5))) ?>
    </div>
  </form>
</div>
