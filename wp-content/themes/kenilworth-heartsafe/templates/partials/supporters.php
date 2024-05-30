<section class="supporters block">
  <div class="container">

    <header class="block__header">
      <h2 class="block__title">Supporters</h2>
    </header>


    <?php $posts = get_posts(array( 'post_type' => 'supporters', 'nopaging' => true ));
      if ($posts) { ?>
        <div class="supporters owl-carousel">
          <?php foreach($posts as $post): setup_postdata($post); ?>              
              <a href="<?php the_field('url'); ?>" title="<?php the_title(); ?>" target="_blank">
                <?php the_post_thumbnail('supporter-logo', array('class' => '')); ?>
              </a>
          <?php endforeach; ?>
        </div>
    <?php }; wp_reset_postdata(); ?>

  </div>

</section>