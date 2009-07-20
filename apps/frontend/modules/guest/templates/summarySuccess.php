<h1>
<?php echo $rootGuest->getEtime()->getEvent()->getTitle(); ?>
&nbsp;-&nbsp;
<?php echo $rootGuest->getEtime()->getTitle(); ?>
</h1>

<?php foreach ($guests as $guest): ?>
  <?php echo $guest->getGuestRelatedByChildGuestId()->getFirstName()."<br>"; ?>
<?php endforeach; ?>
