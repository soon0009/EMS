<h1>Events</h1>

<?php foreach ($events as $event): ?>
<div>
  <div><?php echo link_to($event->getTitle(), '@show_event?slug='.$event->getSlug()) ?></div>
  <div><?php echo $event->getDescription() ?></div>
  <div><?php echo $event->getOrganiser() ?></div>
</div>
<?php endforeach; ?>

<?php echo link_to ('ADD EVENT', '@add_event') ?>
