  <th id="list_th_attending>">
    attending
  </th>
  <?php foreach ($form_fields as $form_field): ?>
  <th id="list_th_<?php echo $form_field; ?>">
    <?php echo $form_field; ?>
  </th>
  <?php endforeach; ?>
