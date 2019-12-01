<section class="wrapper">
  <h2 class="Activity__title">Add an activity</h2>
  <form class="activity__form" id="insertActivityForm" method="post" action="index.php?page=activity&id=<?php echo $workout_id; ?>&intensity=<?php echo $intensity; ?>">
  <input type="hidden" name="action" value="insertActivity"/>
  <p class="jserror"></p>
    <div class="phase1">
      <!-- First div is for the different phases in Javascript. -->
      <div class="activity__form__section">
        <!-- The second div is for styling. Because in JS you go from display none to display block. So you can't use flexbox or grid -->
        <label class="activity__label title" for="title">Title</label>
        <p class="activity__form__description">Give your activity a short title. E.g. Go run!</p>
        <div>
          <input class="input" id="title" name="title" type="text" required>
          <p class="jserror"></p>
        </div>
        <label class="activity__label title" for="description">Description</label>
        <p class="activity__form__description">Explain what you have to do. E.g. The steps you have to do.</p>
        <textarea id="description" name="description" type="text" class="input__description input" required></textarea>

        <div class="button__wrapper">
          <a class="activity__button" href="index.php?page=workout"><p class="back-button">Back</p></a>
          <button data-id="1" class="activity__button next"><p class="next-button">Next</p></button>
        </div>
      </div>
    </div>


    <div class="phase2">
      <div class="activity__form__section">
        <p class="activity__label title" for="time1">Time</p>
        <p class="activity__form__description">How long will your activity take?</p>
        <div class="num__wrapper">
          <div class="num__wrapper-label">
            <label class="activity__label title" for="time1">Minutes</label>
            <input class="input" id="time1" min="0" max="60" name="min" type="number" value="00" maxlength="2" required>
            <p class="jserror"></p>
          </div>
          <div class="num__wrapper-label">
            <label class="activity__label title" for="time2">Seconds</label>
            <input class="input" id="time2" min="0" max="60" step="15" name="sec" type="number" value="00" maxlength="2" required>
            <p class="jserror"></p>
          </div>
        </div>
        <label class="activity__label title" for="amount">Amount</label>
        <div>
        <p class="amount__text title">1</p>
        <input class="input amount" type="range" name="amount" id="amount" value="1" min="1" max="5" step="1">
          <p class="jserror"></p>
        </div>
        <p class="activity__extra-time">This adds <span class="activity__extra-time__total title"><span></p>
        <div class="button__wrapper">
          <button data-id="2"  class="activity__button prev"><p class="back-button">Back</p></button>
          <button data-id="2" class="activity__button next"><p class="next-button">Next</p></button>
        </div>
      </div>
    </div>

    <div class="phase3">
      <div class="activity__form__section">
        <label class="activity__label title" for="youtube">Youtube link</label>
        <div>
          <input class="input video-input" id="youtube" name="youtube" type="url" required>
          <p class="jserror"></p>
        </div>
        <div class="detail_video">video preview.</div>
        <div>
          <label class="activity__label title" for="time">Time</label>
          <p class="activity__form__description">From what timestamp do you want the video to start?</p>
          <input class="input timestamp" type="range" name="time" id="time" value="0" min="0" max="10" step="0.01"><span class="timestamp__text">Timestamp: 0:00</span>
          <p class="jserror"></p>
        </div>
      </div>
      <div class="button__wrapper">
        <button data-id="3"  class="activity__button prev"><p class="back-button">Back</p></button>
        <input type="submit" class="activity__button next-button" value="finish">
      </div>
    </div>


  </form>
</section>
