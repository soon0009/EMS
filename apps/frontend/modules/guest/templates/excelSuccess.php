<?php use_helper('I18N', 'Date') ?>
<table>
  <thead>
    <?php include_partial('list_th_tabular_excel', array('etime'=>$etime, 'form_fields'=>$form_fields)) ?>
  </thead>
<?php $i = 1; foreach ($guests as $guest): $odd = fmod(++$i, 2) ?>
  <tr class="tr_bg_<?php echo $odd ?>">
  <?php include_partial('list_td_tabular_excel', array('guest' => $guest, 'form_fields'=>$form_fields)) ?>
  </tr>
<?php endforeach; ?>

</table>
