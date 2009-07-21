<?php if ($parent_id) { echo input_hidden_tag('parent_id', $parent_id); } ?>
<?php if (in_array('title', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('title', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[title]', $labels['guest{title}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{title}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{title}')): ?>
    <?php echo form_error('guest{title}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getTitle', array (
  'size' => 50,
  'control_name' => 'guest[title]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('firstname', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('firstname', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[firstname]', $labels['guest{firstname}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{firstname}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{firstname}')): ?>
    <?php echo form_error('guest{firstname}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getFirstname', array (
  'size' => 80,
  'control_name' => 'guest[firstname]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('lastname', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('lastname', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[lastname]', $labels['guest{lastname}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{lastname}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{lastname}')): ?>
    <?php echo form_error('guest{lastname}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getLastname', array (
  'size' => 80,
  'control_name' => 'guest[lastname]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('preferred_name', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('preferred_name', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[preferred_name]', $labels['guest{preferred_name}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{preferred_name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{preferred_name}')): ?>
    <?php echo form_error('guest{preferred_name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPreferredName', array (
  'size' => 80,
  'control_name' => 'guest[preferred_name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('email', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('email', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[email]', $labels['guest{email}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{email}')): ?>
    <?php echo form_error('guest{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getEmail', array (
  'size' => 80,
  'control_name' => 'guest[email]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('phone', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('phone', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[phone]', $labels['guest{phone}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{phone}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{phone}')): ?>
    <?php echo form_error('guest{phone}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPhone', array (
  'size' => 80,
  'control_name' => 'guest[phone]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('mobile', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('mobile', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[mobile]', $labels['guest{mobile}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{mobile}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{mobile}')): ?>
    <?php echo form_error('guest{mobile}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getMobile', array (
  'size' => 80,
  'control_name' => 'guest[mobile]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('primary_address_line1', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('primary_address_line1', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[primary_address_line1]', $labels['guest{primary_address_line1}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{primary_address_line1}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{primary_address_line1}')): ?>
    <?php echo form_error('guest{primary_address_line1}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPrimaryAddressLine1', array (
  'size' => 80,
  'control_name' => 'guest[primary_address_line1]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('primary_address_line2', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('primary_address_line2', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[primary_address_line2]', $labels['guest{primary_address_line2}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{primary_address_line2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{primary_address_line2}')): ?>
    <?php echo form_error('guest{primary_address_line2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPrimaryAddressLine2', array (
  'size' => 80,
  'control_name' => 'guest[primary_address_line2]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('primary_address_line3', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('primary_address_line3', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[primary_address_line3]', $labels['guest{primary_address_line3}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{primary_address_line3}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{primary_address_line3}')): ?>
    <?php echo form_error('guest{primary_address_line3}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPrimaryAddressLine3', array (
  'size' => 80,
  'control_name' => 'guest[primary_address_line3]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('primary_address_city', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('primary_address_city', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[primary_address_city]', $labels['guest{primary_address_city}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{primary_address_city}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{primary_address_city}')): ?>
    <?php echo form_error('guest{primary_address_city}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPrimaryAddressCity', array (
  'size' => 80,
  'control_name' => 'guest[primary_address_city]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('primary_address_postcode', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('primary_address_postcode', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[primary_address_postcode]', $labels['guest{primary_address_postcode}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{primary_address_postcode}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{primary_address_postcode}')): ?>
    <?php echo form_error('guest{primary_address_postcode}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPrimaryAddressPostcode', array (
  'size' => 80,
  'control_name' => 'guest[primary_address_postcode]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('primary_address_state', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('primary_address_state', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[primary_address_state]', $labels['guest{primary_address_state}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{primary_address_state}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{primary_address_state}')): ?>
    <?php echo form_error('guest{primary_address_state}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPrimaryAddressState', array (
  'size' => 80,
  'control_name' => 'guest[primary_address_state]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('primary_address_country', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('primary_address_country', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[primary_address_country]', $labels['guest{primary_address_country}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{primary_address_country}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{primary_address_country}')): ?>
    <?php echo form_error('guest{primary_address_country}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPrimaryAddressCountry', array (
  'size' => 80,
  'control_name' => 'guest[primary_address_country]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('secondary_address_line1', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('secondary_address_line1', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[secondary_address_line1]', $labels['guest{secondary_address_line1}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{secondary_address_line1}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{secondary_address_line1}')): ?>
    <?php echo form_error('guest{secondary_address_line1}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getSecondaryAddressLine1', array (
  'size' => 80,
  'control_name' => 'guest[secondary_address_line1]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('secondary_address_line2', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('secondary_address_line2', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[secondary_address_line2]', $labels['guest{secondary_address_line2}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{secondary_address_line2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{secondary_address_line2}')): ?>
    <?php echo form_error('guest{secondary_address_line2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getSecondaryAddressLine2', array (
  'size' => 80,
  'control_name' => 'guest[secondary_address_line2]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('secondary_address_line3', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('secondary_address_line3', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[secondary_address_line3]', $labels['guest{secondary_address_line3}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{secondary_address_line3}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{secondary_address_line3}')): ?>
    <?php echo form_error('guest{secondary_address_line3}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getSecondaryAddressLine3', array (
  'size' => 80,
  'control_name' => 'guest[secondary_address_line3]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('secondary_address_city', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('secondary_address_city', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[secondary_address_city]', $labels['guest{secondary_address_city}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{secondary_address_city}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{secondary_address_city}')): ?>
    <?php echo form_error('guest{secondary_address_city}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getSecondaryAddressCity', array (
  'size' => 80,
  'control_name' => 'guest[secondary_address_city]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('secondary_address_postcode', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('secondary_address_postcode', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[secondary_address_postcode]', $labels['guest{secondary_address_postcode}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{secondary_address_postcode}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{secondary_address_postcode}')): ?>
    <?php echo form_error('guest{secondary_address_postcode}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getSecondaryAddressPostcode', array (
  'size' => 80,
  'control_name' => 'guest[secondary_address_postcode]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('secondary_address_state', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('secondary_address_state', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[secondary_address_state]', $labels['guest{secondary_address_state}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{secondary_address_state}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{secondary_address_state}')): ?>
    <?php echo form_error('guest{secondary_address_state}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getSecondaryAddressState', array (
  'size' => 80,
  'control_name' => 'guest[secondary_address_state]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('secondary_address_country', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('secondary_address_country', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[secondary_address_country]', $labels['guest{secondary_address_country}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{secondary_address_country}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{secondary_address_country}')): ?>
    <?php echo form_error('guest{secondary_address_country}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getSecondaryAddressCountry', array (
  'size' => 80,
  'control_name' => 'guest[secondary_address_country]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('special_req', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('special_req', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[special_req]', $labels['guest{special_req}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{special_req}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{special_req}')): ?>
    <?php echo form_error('guest{special_req}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($guest, 'getSpecialReq', array (
  'size' => '30x3',
  'control_name' => 'guest[special_req]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('position', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('position', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[position]', $labels['guest{position}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{position}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{position}')): ?>
    <?php echo form_error('guest{position}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPosition', array (
  'size' => 80,
  'control_name' => 'guest[position]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('presenter', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('presenter', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[presenter]', $labels['guest{presenter}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{presenter}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{presenter}')): ?>
    <?php echo form_error('guest{presenter}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getPresenter', array (
  'size' => 80,
  'control_name' => 'guest[presenter]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('srn', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('srn', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[srn]', $labels['guest{srn}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{srn}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{srn}')): ?>
    <?php echo form_error('guest{srn}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getSrn', array (
  'size' => 80,
  'control_name' => 'guest[srn]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('fan', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('fan', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[fan]', $labels['guest{fan}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{fan}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{fan}')): ?>
    <?php echo form_error('guest{fan}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getFan', array (
  'size' => 20,
  'control_name' => 'guest[fan]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>

<?php if (in_array('aou', $form_fields)): ?>
<div class="form-row">
  <?php $required = ''; if (in_array('aou', $required_form_fields)) { $required = 'class="required"'; } ?>
  <?php echo label_for('guest[aou]', $labels['guest{aou}'], $required) ?>
  <div class="content<?php if ($sf_request->hasError('guest{aou}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('guest{aou}')): ?>
    <?php echo form_error('guest{aou}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($guest, 'getAou', array (
  'size' => 80,
  'control_name' => 'guest[aou]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php endif; ?>
