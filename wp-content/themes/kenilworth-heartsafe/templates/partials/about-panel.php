<?php /*
  $leftImage = get_field('about_left_image')['sizes'][ 'fw-img-desktop-lg' ];
  $rightImage = get_field('about_right_image')['sizes'][ 'fw-img-desktop-lg' ];
*/ ?>

  <section class="about-panel" style="background-image: url('https://picsum.photos/seed/picsum/1920/900')">
    <div class="container">

      <div class="about-panel__content">
        <h2>Aims & Objectives</h2>
        <p>The provision of training in Cardiopulmonary Resuscitation (CPR) and the use of Automatic External Defibrillators (AED) to residents of our community.</p>
        <p>Supporting in the acquisition and maintenance of 24/7 publicly accessible AED's registered with The Circuit (The National Defibrillator Network) in strategic locations across the community to provide broad geographical coverage.</p>
        <?php /*  
          <p class="about-panel__subHead"><?php the_field('about_intro'); ?></p>        
          <?php the_field('about_body'); ?>
        */ ?>
      </div>

    </div>

    <!-- <div class="about-panel__leftImg" style="background-image: url(<?php echo $leftImage; ?>)"></div> -->
    <!-- <div class="about-panel__rightImg" style="background-image: url(<?php echo $rightImage; ?>)"></div> -->

  </section>

<?php /*endwhile; wp_reset_postdata(); endif; */ ?>