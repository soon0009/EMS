  <?php if (!$event->regFormOk()): ?>
    <div class="form-errors">
      <h2>The event is not valid because it is incomplete</h2>
      <dl>
        <dt>RSVP Online:</dt>
        <dd>Registration form has not been created</dd>
      </dl>
    </div>
  <?php endif; ?>
