<?php get_header(); ?>
<div class="page">  
  <?php include get_theme_file_path("templates/partials/masthead.php"); ?>    
    <div class="container">      
      <div class="page-content">
        <?php the_content(); ?>
        <p><a href="/news" title="Back to news page">Back to news page</a></p>
      </div>
  </div>  
</div>
<?php get_footer(); ?>