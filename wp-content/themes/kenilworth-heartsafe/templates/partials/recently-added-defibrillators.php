  <section class="block">
    <div class="container">

      <header class="block__header">
        <h2 class="block__title">
          Recently added Defibrillators
        </h2>
        <a href="#" class="btn btn--secondary">View all Defibrillators</a>
      </header>

      <div class="card-list card-list--horizontal card-list--x4">

      <?php $featured_posts = get_field('recently_added_defibrillators'); if( $featured_posts ): foreach( $featured_posts as $post ): ?>
        <div class="card">
          <div class="card__img">
          <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'card' );
          } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/no-photo.png" alt="<?php the_title(); ?>" width="480" height="330" />
          <?php } ?>
          </div>
          <div class="card__content">
            <h2 class="card__title"><?php the_title(); ?></h2>
            <a href="<?php the_permalink(); ?>" class="btn btn--secondary" title="<?php the_title(); ?>">View more</a>
          </div>
        </div>
      <?php endforeach; wp_reset_postdata(); endif; ?>
    </div>
  </div>
</section>