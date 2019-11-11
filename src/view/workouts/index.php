<section class="wrapper">
  <h2 class="hidden">Workouts</h2>
  <article class="workouts">
    <h3 class="hidden">Workout overview</h3>
    <ul class="white-button-list">
    <?php foreach($workouts as $workout): ?>
      <li class="workouts__workout-list__item">
        <a href="index.php?page=intensity&id=<?php echo $workout['id']; ?>" class="button-white workouts__workout-list__item__link">
          <div class="white-button-list__img-wrapper">
            <img src="assets/img/logo-gradient.svg" class="white-button-list__img" width="41" height="23" alt="dumbbell icon">
          </div>
          <?php echo $workout['title']; ?>
        </a>
      </li>
    <?php endforeach; ?>
      <!-- <li class="workouts__workout-list__item">
        <a href="index.php?page=intensity" class="button-white workouts__workout-list__item__link">
          <div class="white-button-list__img-wrapper">
            <img src="assets/img/logo-gradient.svg" class="white-button-list__img" width="41" height="23" alt="dumbbell icon">
          </div>
          Core
        </a>
      </li>
      <li class="workouts__workout-list__item">
        <a href="index.php?page=intensity" class="button-white workouts__workout-list__item__link">
          <div class="white-button-list__img-wrapper">
            <img src="assets/img/logo-gradient.svg" class="white-button-list__img" width="41" height="23" alt="dumbbell icon">
          </div>
          Arms
        </a>
      </li> -->
  </article>
  <article class="add">
    <h2 class="hidden">Workout add</h2>
    <a class="add__button" href="index.php?page=addworkout"><img src="assets/img/add.svg" class="add__button__img" alt="plus icon" width="15" height="16"></a>
  </article>
</section>

