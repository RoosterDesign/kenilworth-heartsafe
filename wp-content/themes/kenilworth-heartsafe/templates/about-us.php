<?php
/*
Template Name: About Us
*/
?>
<?php get_header(); ?>
<div class="page">
  
  <?php include get_theme_file_path("templates/partials/masthead.php"); ?>
  
  <section class="block">
    <div class="container">
      <div class="page-content">
        <?php the_content(); ?>
      </div>
    </div>
  </section>

  <section class="block">
    <div class="container">

      <header class="block__header">
        <h2 class="block__title">Our people</h2>
      </header>

      <?php $posts = get_posts(array( 'post_type' => 'people', 'nopaging' => true )); if ($posts) { ?>

        <div class="card-list card-list--vertical">

          <?php foreach($posts as $post): setup_postdata($post); ?>
            <div class="card">

              <div class="card__img">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'people-photo' );
                } else { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/no-photo.png" alt="<?php the_title(); ?>" width="340" height="340" />
                <?php } ?>
              </div>

              <div class="card__content">

                <h3 class="card__title">
                  <?php the_title(); ?>
                  <?php if( get_field('job_title') ) : ?>
                    <span class="card__job-title">(<?php the_field('job_title'); ?>)</span>
                  <?php endif; ?>                  
                </h3>

                <?php the_content(); ?>

              </div>

            </div>
          <?php endforeach; ?>   
        
        </div>

      <?php }; wp_reset_postdata(); ?>

    </div>
  </section>

  <?php include get_theme_file_path("templates/partials/supporters.php"); ?>

</div>
<?php get_footer(); ?>