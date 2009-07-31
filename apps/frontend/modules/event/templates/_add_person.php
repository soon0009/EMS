<div class="add_person">
  <?php echo form_tag($obj_type.'/addPerson') ?>
    <?php use_helper('Validation'); ?>
    <div id="<?php echo $obj_type; ?>_add_person_<?php echo $type; ?>" class="add_person_type" <?php if (!form_has_error($obj_type.'_person_name_'.$type) && !form_has_error($obj_type.'_email_'.$type)) { echo 'style="display:none"'; }?> >
      <h4><?php echo ucfirst($type); ?></h4>
      <table>
        <?php if (form_has_error($obj_type.'_person_name_'.$type)): ?>
        <tr> <td colspan="2"><?php echo form_error($obj_type.'_person_name_'.$type); ?></td> </tr>
        <?php endif; ?>
        <tr>
          <td><label for="name">Name:</label></td>
          <td><?php echo input_tag($obj_type.'_person_name_'.$type, $sf_params->get($obj_type.'_person_name_'.$type)) ?></td>
        </tr>
       
        <?php if (form_has_error($obj_type.'_email_'.$type)): ?>
        <tr> <td colspan="2"><?php echo form_error($obj_type.'_email_'.$type); ?></td> </tr>
        <?php endif; ?>
        <tr>
          <td><label for="email">Email:</label></td>
          <td><?php echo input_tag($obj_type.'_email_'.$type, $sf_params->get($obj_type.'_email_'.$type)) ?></td>
        </tr>
       
        <tr>
          <td><label for="phone">Phone:</label></td>
          <td><?php echo input_tag($obj_type.'_phone_'.$type, $sf_params->get($obj_type.'_phone_'.$type)) ?></td>
        </tr>
      </table>
      
      <?php echo input_hidden_tag('type', $type); ?>
      <?php echo input_hidden_tag('event_id', $event_id); ?>
      <?php echo input_hidden_tag('etime_id', $etime_id); ?>
      <?php echo input_hidden_tag('referer', $sf_params->get('referer') ? $sf_params->get('referer') : $sf_request->getUri()) ?>
      <?php echo submit_tag('Add'); ?>
      &nbsp;<?php echo link_to_function('cancel', visual_effect('blind_up', $obj_type.'_add_person_'.$type, array('duration' => 0.5))) ?>
    </div>
  </form>
</div>
