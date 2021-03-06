<section class="wrapper">
  <h2 class="hidden">Workout</h2>
  <article class="activities">
    <h3 class="hidden">Activities overview</h3>
    <ul class="white-button-list">
    <?php foreach($activities as $activity): ?>
      <li class="activities__activity-list__item">
        <a href="index.php?page=detail&id=<?php echo $activity->getId(); ?>&intensity=<?php echo $activity->getIntensity()?>" class="button-white activities__activity-list__item__link">
          <div class="white-button-list__img-wrapper">
            <img src="assets/img/logo-gradient.svg" class="white-button-list__img" width="41" height="23" alt="dumbbell icon">
          </div>
          <p class="activities__activity-list__item__title"><?php echo $activity->getTitle(); ?></p>
          <div class="white-button-list__time"><?php echo $activity->getDuration(); ?></div>
          <form class="white-button-list__time-button" method="post" action="index.php?page=workout&id=<?php echo $workout_id; ?>&activity_id=<?php echo $activity->getId();?>&intensity=<?php echo $activity->getIntensity()?>">
          <input type="hidden" name="action" value="remove"/>
          <button type="submit" class="white-button-list__delete" name="remove" value="<?php echo $activity->getId(); ?>"><img alt="delete" src="assets/img/delete.svg"></button>
          </form>
        </a>
      </li>
    <?php endforeach; ?>

  </article>
  <article class="add">
    <h2 class="hidden">Workout add</h2>
    <a class="add__button" href="index.php?page=activity&id=<?php echo $workout_id; ?>&intensity=<?php echo $intensity ?>"><img src="assets/img/add.svg" class="add__button__img" alt="plus icon" width="15" height="16"></a>
  </article>
</section>
<section class="play">
  <h2 class="play__title">Ready... set... Go! </h2>
  <div class="play__circle">
    <a class="play__circle__button"><img src="assets/img/play.svg" class="play__circle__triangle" alt="play__button" width="101" height="101"></a>
  </div>
  <p>Overall duration:</p>
  <p class="bold"><?php echo $totalTime;?></p>
</section>


