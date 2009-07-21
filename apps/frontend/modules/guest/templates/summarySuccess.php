<?php use_helper('Date'); ?>
<h1>
<?php echo link_to($rootGuest->getEtime()->getEvent()->getTitle(),'@show_outside_event?slug='.$rootGuest->getEtime()->getEvent()->getSlug()); ?>
</h1>

<h3>
<?php echo $rootGuest->getEtime()->getTitle(); ?>
</h3>

<div>
  <?php echo include_partial('etime/show_public', array('etime'=>$rootGuest->getEtime())); ?>
</div>

<?php foreach ($additional_guests as $additional_guest): ?>
  <h4>Guest details</h4>
  <?php $guest = $additional_guest->getGuestRelatedByChildGuestId(); ?>

  <?php if (in_array('title', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{title}']; ?></div>
    <div class="value"><?php echo $guest->getTitle(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('firstname', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{firstname}']; ?></div>
    <div class="value"><?php echo $guest->getFirstname(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('lastname', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{lastname}']; ?></div>
    <div class="value"><?php echo $guest->getLastname(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('preferred_name', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{preferred_name}']; ?></div>
    <div class="value"><?php echo $guest->getPreferredName(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('email', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{email}']; ?></div>
    <div class="value"><?php echo $guest->getEmail(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('phone', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{phone}']; ?></div>
    <div class="value"><?php echo $guest->getPhone(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('mobile', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{mobile}']; ?></div>
    <div class="value"><?php echo $guest->getMobile(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('primary_address_line1', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{primary_address_line1}']; ?></div>
    <div class="value"><?php echo $guest->getPrimaryAddressLine1(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('primary_address_line2', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{primary_address_line2}']; ?></div>
    <div class="value"><?php echo $guest->getPrimaryAddressLine2(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('primary_address_line3', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{primary_address_line3}']; ?></div>
    <div class="value"><?php echo $guest->getPrimaryAddressLine3(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('primary_address_city', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{primary_address_city}']; ?></div>
    <div class="value"><?php echo $guest->getPrimaryAddressCity(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('primary_address_postcode', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{primary_address_postcode}']; ?></div>
    <div class="value"><?php echo $guest->getPrimaryAddressPostcode(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('primary_address_state', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{primary_address_state}']; ?></div>
    <div class="value"><?php echo $guest->getPrimaryAddressState(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('primary_address_country', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{primary_address_country}']; ?></div>
    <div class="value"><?php echo $guest->getPrimaryAddressCountry(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('secondary_address_line1', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{secondary_address_line1}']; ?></div>
    <div class="value"><?php echo $guest->getSecondaryAddressLine1(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('secondary_address_line2', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{secondary_address_line2}']; ?></div>
    <div class="value"><?php echo $guest->getSecondaryAddressLine2(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('secondary_address_line3', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{secondary_address_line3}']; ?></div>
    <div class="value"><?php echo $guest->getSecondaryAddressLine3(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('secondary_address_city', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{secondary_address_city}']; ?></div>
    <div class="value"><?php echo $guest->getSecondaryAddressCity(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('secondary_address_postcode', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{secondary_address_postcode}']; ?></div>
    <div class="value"><?php echo $guest->getSecondaryAddressPostcode(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('secondary_address_state', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{secondary_address_state}']; ?></div>
    <div class="value"><?php echo $guest->getSecondaryAddressState(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('secondary_address_country', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{secondary_address_country}']; ?></div>
    <div class="value"><?php echo $guest->getSecondaryAddressCountry(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('special_req', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{special_req}']; ?></div>
    <div class="value"><?php echo $guest->getSpecialReq(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('position', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{position}']; ?></div>
    <div class="value"><?php echo $guest->getPosition(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('presenter', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{presenter}']; ?></div>
    <div class="value"><?php echo $guest->getPresenter(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('srn', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{srn}']; ?></div>
    <div class="value"><?php echo $guest->getSrn(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('fan', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{fan}']; ?></div>
    <div class="value"><?php echo $guest->getFan(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
  
  <?php if (in_array('aou', $form_fields)): ?>
    <div class="label"><?php echo $labels['guest{aou}']; ?></div>
    <div class="value"><?php echo $guest->getAou(); ?></div>
    <div class="clear_float"></div>
  <?php endif; ?>
<?php endforeach; ?>
