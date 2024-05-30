<?php $image = get_field('image')['sizes'][ 'about-panel' ]; ?>
<section class="about-panel" style="background-image: url(<?php echo $image; ?>)">
  <div class="container">

    <div class="about-panel__content">
      <h2><?php the_field('title'); ?></h2>
      <?php the_field('body'); ?>
    </div>

  </div>

</section>