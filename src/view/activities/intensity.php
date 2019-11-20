<section class="wrapper">
  <h2 class="title">Intensity</h2>
  <p class="subtext">How intense do you want your training to be?</p>
  <article class="intensity">
    <h3 class="hidden">intensity overview</h3>
    <ul class="white-button-list">
    <li class="intensity__intensity-list__item">
        <a href="index.php?page=workout&id=<?php echo $workout_id; ?>&intensity=easy" class="button-white intensity__intensity-list__item__link">
          <p class="intensity__intensity-list__item__link__text">Easy</p>
          <div class="white-button-list__time">
            <?php echo gmdate("i:s", $totalTime);?>
          </div>
        </a>
      </li>
      <li class="intensity__intensity-list__item">
        <a href="index.php?page=workout&id=<?php echo $workout_id; ?>&intensity=normal" class="button-white intensity__intensity-list__item__link">
          <p class="intensity__intensity-list__item__link__text">Normal</p>
          <div class="white-button-list__time">
            <?php echo gmdate("i:s", $totalTime*2);?>
          </div>
        </a>
      </li>
      <li class="intensity__intensity-list__item">
        <a href="index.php?page=workout&id=<?php echo $workout_id; ?>&intensity=hard" class="button-white intensity__intensity-list__item__link">
          <p class="intensity__intensity-list__item__link__text">Hard</p>
          <div class="white-button-list__time">
            <?php echo gmdate("i:s", $totalTime*3);?>
          </div>
        </a>
      </li>
    </ul>
  </article>
</section>
