<?php foreach ($events as $event): ?>
<div>
  <div><?php echo link_to($event->getTitle(), '@show_event?slug='.$event->getSlug()) ?></div>
  <div><?php echo $event->getDescription() ?></div>
  <div><?php echo $event->getEventPeoples() ?></div>
</div>
<?php endforeach; ?>
