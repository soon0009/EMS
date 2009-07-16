<div class="form-row">
  <?php echo label_for('guest[attending]', $labels['guest{attending}'], 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('guest{attending}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{attending}')): ?>
    <?php echo form_error('guest{attending}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($guest, 'getAttending', array (
  'control_name' => 'guest[attending]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('guest[extra_info]', $labels['guest{extra_info}'], '') ?>
  <div class="content<?php if ($sf_request->hasError('guest{extra_info}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{extra_info}')): ?>
    <?php echo form_error('guest{extra_info}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($guest, 'getExtraInfo', array (
  'size' => '30x3',
  'control_name' => 'guest[extra_info]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
