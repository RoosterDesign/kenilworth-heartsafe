<?php
  $leftImage = get_field('about_left_image')['sizes'][ 'fw-img-desktop-lg' ];
  $rightImage = get_field('about_right_image')['sizes'][ 'fw-img-desktop-lg' ];
?>

  <section class="about-panel">
    <div class="container">

      <div class="about-panel__content">
        <p class="about-panel__subHead"><?php the_field('about_intro'); ?></p>
        <?php the_field('about_body'); ?>
      </div>

    </div>

    <div class="about-panel__leftImg" style="background-image: url(<?php echo $leftImage; ?>)"></div>
    <div class="about-panel__rightImg" style="background-image: url(<?php echo $rightImage; ?>)"></div>

  </section>

<?php /*endwhile; wp_reset_postdata(); endif; */ ?>