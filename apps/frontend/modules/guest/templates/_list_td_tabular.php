    <td><?php echo link_to('edit', 'guest/edit?id='.$guest->getId().'&etime_id='.$guest->getEtimeId()) ?></td>
    <?php foreach ($form_fields as $form_field): ?>
    <td>
      <?php if(method_exists($guest, 'get'.$form_field)): ?>
        <?php echo call_user_func(array($guest, 'get'.$form_field)); ?>
      <?php endif; ?>
    </td>
    <?php endforeach; ?>
