<div id="add_person">
  <?php echo form_tag('event/addPerson') ?>
    <?php use_helper('Validation'); ?>
    <div id="add_person_<?php echo $type; ?>" class="add_person_type" <?php if (!form_has_error('person_name_'.$type) && !form_has_error('email_'.$type)) { echo 'style="display:none"'; }?> >
      <h4><?php echo ucfirst($type); ?></h4>
      <table>
        <?php if (form_has_error('person_name_'.$type)): ?>
        <tr> <td colspan="2"><?php echo form_error('person_name_'.$type); ?></td> </tr>
        <?php endif; ?>
        <tr>
          <td><label for="name">Name:</label></td>
          <td><?php echo input_tag('person_name_'.$type, $sf_params->get('person_name_'.$type)) ?></td>
        </tr>
       
        <?php if (form_has_error('email_'.$type)): ?>
        <tr> <td colspan="2"><?php echo form_error('email_'.$type); ?></td> </tr>
        <?php endif; ?>
        <tr>
          <td><label for="email">Email:</label></td>
          <td><?php echo input_tag('email_'.$type, $sf_params->get('email_'.$type)) ?></td>
        </tr>
       
        <tr>
          <td><label for="phone">Phone:</label></td>
          <td><?php echo input_tag('phone_'.$type, $sf_params->get('phone_'.$type)) ?></td>
        </tr>
      </table>
      
      <?php echo input_hidden_tag('type', $type); ?>
      <?php echo input_hidden_tag('event_id', $event_id); ?>
      <?php echo input_hidden_tag('referer', $sf_params->get('referer') ? $sf_params->get('referer') : $sf_request->getUri()) ?>
      <?php echo submit_tag('Add'); ?>
      &nbsp;<?php echo link_to_function('cancel', visual_effect('blind_up', 'add_person_'.$type, array('duration' => 0.5))) ?>
    </div>
  </form>
</div>
