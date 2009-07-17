    <td><?php echo $guest->getAttendingString(); ?></td>
    <?php foreach ($form_fields as $form_field): ?>
    <td>
      <?php if(method_exists($guest, 'get'.$form_field)): ?>
        <?php echo call_user_func(array($guest, 'get'.$form_field)); ?>
      <?php endif; ?>
    </td>
    <?php endforeach; ?>
