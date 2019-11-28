<section class="wrapper">
  <h2 class="Activity__title">Add an activity!</h2>
  <form class="activity__form" id="insertActivityForm" method="post" action="index.php?page=activity&id=<?php echo $workout_id; ?>&intensity=<?php echo $intensity; ?>">
  <input type="hidden" name="action" value="insertActivity"/>

    <div class="phase1">
      <!-- First div is for the different phases in Javascript. -->
      <div class="activity__form__section">
        <!-- The second div is for styling. Because in JS you go from display none to display block. So you can't use flexbox or grid -->
        <label class="activity__label title" for="title">Title</label>
        <p class="activity__form__description">Give your activity a short title. E.g. Go run!</p>

        <input class="input__title" id="title" name="title" type="text">

        <label class="activity__label title" for="description">Description</label>
        <p class="activity__form__description">Explain what you have to do. E.g. The steps you have to do.</p>
        <textarea id="description" name="description" type="text" class="input__description"></textarea>

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
            <input id="time1" min="0" max="60" name="min" type="number" placeholder="00">
          </div>
          <div class="num__wrapper-label">
            <label class="activity__label title" for="time2">Seconds</label>
            <input id="time2" min="0" max="60" step="15" name="sec" type="number" placeholder="00">
          </div>
        </div>
        <label class="activity__label title" for="amount">Amount</label>
        <div class="num__wrapper">
          <input id="amount" name="amount" min="0" max="10" type="number" placeholder="00">
        </div>
        <div class="button__wrapper">
          <button data-id="2"  class="activity__button prev"><p class="back-button">Back</p></button>
          <button data-id="2" class="activity__button next"><p class="next-button">Next</p></button>
        </div>
      </div>
    </div>

    <div class="phase3">
      <div class="activity__form__section">
        <label class="activity__label title" for="youtube">Youtube link</label>
        <input class="input__title" id="youtube" name="youtube" type="text">
        <p class="activity__label title">Time</p>
        <p class="activity__form__description">From what timestamp do you want the video to start?</p>
        <div class="num__wrapper">
          <div class="num__wrapper-label">
            <label class="activity__label title" for="minute">Minutes</label>
            <input id="minute" min="0" max="60" name="minute" type="number" placeholder="00">
          </div>
          <div class="num__wrapper-label">
            <label class="activity__label title" for="second">Seconds</label>
            <input id="second" min="0" max="60" name="second" type="number" placeholder="00">
          </div>
        </div>
      </div>
      <div class="button__wrapper">
        <button data-id="3"  class="activity__button prev"><p class="back-button">Back</p></button>
        <button type="submit" class="activity__button"><p class="next-button">Finish</p></button>
      </div>
    <div>


  </form>
</section>
