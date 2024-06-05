<?php
/*
Template Name: Contact
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

  <?php include get_theme_file_path("templates/partials/supporters.php"); ?>

</div>
<?php get_footer(); ?>