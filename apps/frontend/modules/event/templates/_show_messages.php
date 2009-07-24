  <?php if (!$event->regFormOk()): ?>
    <div class="form-errors">
      <h2>The event is not valid because it is incomplete</h2>
      <dl>
        <dt>RSVP Online:</dt>
        <dd>Registration form has not been created</dd>
      </dl>
    </div>
  <?php endif; ?>
  <?php if (count($other_events = $event->getEventsOnSameDay())): ?>
<pre>
</pre>
    <div class="form-warning">
      <h2>Other events occuring during this event</h2>
      <dl>
        <?php foreach ($other_events as $oe): ?>
        <dt>Event:</dt>
        <dd><?php echo link_to($oe->getTitle(), '@show_event?slug='.$oe->getSlug()); ?></dd>
        <?php endforeach; ?>
      </dl>
    </div>
  <?php endif; ?>
