<section class="wrapper">
  <h2 class="detail__title"><?php echo $activity->getTitle() ?></h2>
  <p class="detail__description"><?php echo $activity->getDescription() ?></p>
</section>
<section class="detail__time">
  <div class="detail__time__circle">
    <h2 class="detail__time__clock"><?php echo $activity->getDuration() ?></h2>
  </div>
</section>
