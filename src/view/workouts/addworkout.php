<section class="wrapper">
  <h2 class="Activity__title">Add a workout!</h2>
  <form class="activity__form" method="POST" action="index.php?page=addworkout">
  <input type="hidden" name="action" value="insertWorkout"/>

    <div class="phase1">
      <!-- First div is for the different phases in Javascript. -->
      <div class="activity__form__section">
        <!-- The second div is for styling. Because in JS you go from display none to display block. So you can't use flexbox or grid -->
        <label class="activity__label title" for="title">Title</label>
        <p class="activity__form__description">Give your workout a short title.</p>
        <input class="input__title" id="title" name="title" type="text">

        <div class="button__wrapper">
          <a class="activity__button" href="index.php?page=home"><p class="back-button">Back</p></a>
          <button type="submit" class="activity__button"><p class="next-button">Next</p></button>
        </div>
      </div>
    </div>
  </form>
</section>
