<?php
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>

<div class="page">
  
  <?php include get_theme_file_path("templates/partials/masthead.php"); ?>  

  <div class="container">

    <div class="page-content">      
      <?php echo do_shortcode(get_field('form_id')); ?>
    </div>

    <div class="page-content">
      <?php the_content(); ?>      
    </div>
    
  </div>


  <!-- Google Map -->
  <div class="map">
    <?php the_field('google_map_embed') ?>
  </div>
  <!-- end: Google Map -->

</div>

<?php get_footer(); ?>