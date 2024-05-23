<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>
<div class="page">

  <?php include get_theme_file_path("templates/partials/hero.php"); ?>

  <?php include get_theme_file_path("templates/partials/supporters.php"); ?>  

  <section class="block">
    <div class="container">

      <header class="block__header">
        <h2 class="block__title">
          Recently added Defibrillators
        </h2>
        <a href="#" class="btn btn--secondary">View all Defibrillators</a>
      </header>

      <div class="card-list card-list--x4">

      <div class="card">
          <div class="card__img">
            <img src="https://picsum.photos/340/200" title="Special Offer" class=" img-responsive" />
          </div>
          <div class="card__content">
            <h2 class="card__title">Kenilworth Rugby</h2>
            <a href="#" class="btn btn--secondary">View more</a>
          </div>
        </div>

        <div class="card">
          <div class="card__img">
            <img src="https://picsum.photos/340/200" title="Special Offer" class=" img-responsive" />
          </div>
          <div class="card__content">
            <h2 class="card__title">Kenilworth Rugby Football Club Kenilworth Rugby Football Club</h2>
            <a href="#" class="btn btn--secondary">View more</a>
          </div>
        </div>

        <div class="card">
          <div class="card__img">
            <img src="https://picsum.photos/340/200" title="Special Offer" class=" img-responsive" />
          </div>
          <div class="card__content">
            <h2 class="card__title">Kenilworth Rugby Football Club</h2>
            <a href="#" class="btn btn--secondary">View more</a>
          </div>
        </div>

        <div class="card">
          <div class="card__img">
            <img src="https://picsum.photos/340/200" title="Special Offer" class=" img-responsive" />
          </div>
          <div class="card__content">
            <h2 class="card__title">Kenilworth Rugby Football Club</h2>
            <a href="#" class="btn btn--secondary">View more</a>
          </div>
        </div>

      </div>

    </div>
  </section>

  <?php /* 
  <section class="card-panel">
    <div class="container">
      <h2 class="card-panel__title">Upcoming Activities</h2>
      

      <?php $posts = get_posts(array( 'post_type' => 'activities', 'numberposts'	=> 3 ));
      if ($posts) { ?>
        <div class="card-list">        
          <?php foreach($posts as $post): setup_postdata($post); include get_theme_file_path("templates/partials/card.php"); endforeach;	?>
        </div>
      <?php } else { ?>
        <p class="no-results">We currently have no activities, please check back again soon.</p>
      <?php }; wp_reset_postdata(); ?>

        
    </div>
  </section>

  */?>

  <?php /* 
    <?php include get_theme_file_path("templates/partials/about-panel.php"); ?>  
  */?>
  
</div>
<?php get_footer(); ?>