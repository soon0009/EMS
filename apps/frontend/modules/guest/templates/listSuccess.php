<table>
<?php foreach ($guests as $guest): ?>
  <tr>
  <?php foreach ($regForm as $form_field): ?>
    <?php if ($form_field->getRequiredField()): ?>
      <td>
        <?php if(method_exists($guest, 'get'.$form_field->getRegField()->getName())): ?>
          <?php echo call_user_func(array($guest, 'get'.$form_field->getRegField()->getName())); ?>
        <?php endif; ?>
      </td>
    <?php endif; ?>
  <?php endforeach; ?>
  </tr>
<?php endforeach; ?>
</table>
