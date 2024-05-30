<!-- <section class="hero" style="background-image: url(<?php the_field('background_image'); ?>)"> -->
<section class="hero">
  <div class="container">
    <?php the_content(); ?>
    <a href="/defibrillators" title="View our defibrillators" class="btn btn--primary hero__btn">View our defibrillators</a>
  </div> 

  <?php $posts = get_posts(array( 'post_type' => 'hero-slider', 'nopaging' => true ));
      if ($posts) { ?>
        <div class="hero__bg owl-carousel">

          <?php foreach($posts as $post): setup_postdata($post); ?>              
  
              <?php
                $defaultImg = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'hero-slide-mobile' );
                $largeImg = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'hero-slide-desktop' );
              ?>

              <picture class="hero__slide">
                <source srcset="<?php echo $largeImg; ?>" media="(min-width: 1024px)" >
                <img src="<?php echo $defaultImg; ?>" alt="<?php the_title(); ?>"  />
              </picture>

          <?php endforeach; ?>

        </div>
  <?php }; wp_reset_postdata(); ?>
  
</section>