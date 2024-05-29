<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>
<div class="page">
  <?php include get_theme_file_path("templates/partials/hero.php"); ?>
  <?php include get_theme_file_path("templates/partials/supporters.php"); ?>
  <?php include get_theme_file_path("templates/partials/find-defibrillator-map.php"); ?>    
  <?php include get_theme_file_path("templates/partials/recently-added-defibrillators.php"); ?>  
  <?php include get_theme_file_path("templates/partials/about-panel.php"); ?>    
</div>
<?php get_footer(); ?>