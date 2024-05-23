<?php get_header(); ?>
<div class="page">

    <?php include get_theme_file_path("templates/partials/masthead.php"); ?>    

    <div class="container">
            
      <div class="page-content">
        <?php the_content(); ?>
        <p><a href="/activities" title="Back to activities page">Back to activities page</a></p>
      </div>

    </div>
  </div>

</div>
<?php get_footer(); ?>