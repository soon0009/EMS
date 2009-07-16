  <th> &nbsp; </th> <!-- edit column -->
  <th id="list_th_attending>">
    <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/guest/sort') == 'attending'): ?>
      <?php echo link_to('attending', 'guest/list?etime_id='.$etime->getId().'&sort='.'attending'.'&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/guest/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo $sf_user->getAttribute('type', 'asc', 'sf_admin/guest/sort') ?>)
    <?php else: ?>
      <?php echo link_to('attending', 'guest/list?etime_id='.$etime->getId().'&sort='.'attending'.'&type=asc') ?>
    <?php endif; ?>
  </th>
  <?php foreach ($form_fields as $form_field): ?>
  <th id="list_th_<?php echo $form_field; ?>">
    <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/guest/sort') == $form_field): ?>
      <?php echo link_to($form_field, 'guest/list?etime_id='.$etime->getId().'&sort='.$form_field.'&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/guest/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo $sf_user->getAttribute('type', 'asc', 'sf_admin/guest/sort') ?>)
    <?php else: ?>
      <?php echo link_to($form_field, 'guest/list?etime_id='.$etime->getId().'&sort='.$form_field.'&type=asc') ?>
    <?php endif; ?>
  </th>
  <?php endforeach; ?>
