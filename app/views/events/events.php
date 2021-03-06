<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="event__body background-purple-gradient" id="eventbody">

  <?php  require APPROOT . '/views/inc/nav.php'; ?>

  <div class="title">
    Events
  </div>

  <div class="event__wrapper">

    <div class="event__window">

      <div class="event__window__title">
        Your Events
      </div>

      <?php if ($data['events']): ?>


      <div class="event__window__content">

        <!-- <div class="event__panel">
          <div class="event__panel__content">
            <div class="event__panel__header">
              <div class="event__title">Picnic
              <span class="event__with">with Awad</span></div>
              <div class="event__time">15:30 PM, 16th DEC</div>
            </div>
            <div class="event__panel__body">
              <div>Gonna go on a picnic. I'll bring the snacks.</div>
            </div>
          </div>
          <span class="event__panel__exit">
            &times;
          </span>
        </div> -->

        <?php foreach ($data['events'] as $event):
          // $reminderTime = date(' g:i A, d M', strtotime($event->ReminderTime));
          $reminderTime = date(' g:i A, jS M', strtotime($event->ReminderTime));

          ?>
          <div class="event__panel">
            <div class="event__panel__content">
              <div class="event__panel__header">
                <div class="event__title"><?= $event->Name ?>
                <span class="event__with">with <?= $event->FirstName ?></span></div>
                <div class="event__time"><?= $reminderTime ?></div>
              </div>
              <div class="event__panel__body">
                <div><?= $event->Description ?></div>
              </div>
            </div>
            <span class="event__panel__exit">
              &times;
            </span>
          </div>
        <?php endforeach; ?>

      </div>
      <?php elseif (empty($data['events'])): ?>
        <div class="">
          No Events to display. Create events using the menu to your right.
        </div>
      <?php endif; ?>


      <div class="event__window__btn">
        <button class="btn-same c2" type="button" name="button">Edit Event</button>
      </div>
    </div>

    <form class="event__side" action="<?php echo URLROOT?>/Events/createEvent" method="POST">
      <div class="event__side__title">
        Create Event
      </div>


        <div class="event__side__content">
          <label>Give the event a title</label>
          <div class="input-group">
            <span class="">Event</span>
            <input class="" type="text" name="name" value="">
          </div>
          <label>Who with?</label>
          <div class="input-group">
            <span class="">Who</span>
            <select class="event__buddy" name="match">
              <?php foreach ($data['matches'] as $match): ?>
                <option value="<?php echo $match->User_ID ?>"><?php echo $match->FirstName ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <label>What do you plan to do?</label>
          <div class="input-group">
            <span class="">Description</span>
            <textarea name="description" rows="1"></textarea>
          </div>
          <label>When?</label>
          <div class="input-group">
            <span class="">Time</span>
            <input class="" type="datetime-local" name="time" value="">
          </div>
        </div>

        <div class="event__side__btn">
          <input type="submit" class="btn-same c2" name="createEvent" value="Create Event">
        </div>



    </form>
  </div>

</div>

<?php  require APPROOT . '/views/inc/footer.php'; ?>
