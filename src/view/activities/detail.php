<section class="wrapper">
  <h2 class="hidden">Detail</h2>
  <article class="detail-overview">
    <h3 class="detail__title"><?php echo $activity->getTitle() ?></h3>

      <?php if(empty($activity->getYoutube())) {
        echo '<p class="detail__description">No video found.</p>';
      } else {
        echo '<div class="detail_video"><iframe width="560" height="315" src="https://www.youtube.com/embed/' .
          $activity->getYoutube() .
          '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
      }
      ?>

    <p class="detail__description"><?php
      if(empty($activity->getDescription())){
        echo 'no discription';
      } else {
        echo $activity->getDescription();
      };
    ?> </p>
  </article>
</section>
<section class="detail__time">
  <div class="detail__time__circle">
    <h2 class="detail__time__clock"><?php echo $activity->getDuration() ?></h2>
  </div>
</section>
