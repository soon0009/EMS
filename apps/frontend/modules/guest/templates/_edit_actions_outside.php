<ul class="sf_admin_actions">
  <li><?php echo submit_tag('save', array (
  'name' => 'save_outside',
  'class' => 'sf_admin_action_save',
)) ?></li>
<?php if ($guest->getEtime()->getAdditionalGuests()): ?>
  <li><?php echo submit_tag('save and add', array (
  'name' => 'save_and_add_outside',
  'class' => 'sf_admin_action_save_and_add',
)) ?></li>
<?php endif; ?>
</ul>
