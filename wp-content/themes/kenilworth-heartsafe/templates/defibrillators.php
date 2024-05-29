<?php
/*
Template Name: Defibrillators
*/
?>
<?php get_header(); ?>
<div class="page">
  
  <?php include get_theme_file_path("templates/partials/masthead.php"); ?>

  <?php include get_theme_file_path("templates/partials/defibrillator-locations-map.php"); ?>   
  
  

 		

  
  
  <section class="block">
    <div class="container">
      <div class="page-content">
        <?php the_content(); ?>
      </div>
    </div>      
  </section>

  <?php include get_theme_file_path("templates/partials/supporters.php"); ?>

  <?php /*
  
    

    <div class="container">

            
        <?php
          $args = array( 'hide_empty' => false );
          $categories = get_terms( 'activities_category', $args );				
          foreach( $categories as $category ): ?>		
          
          <div class="activity-category">
          
            <h2 class="card-panel__title" id="<?php echo $category->slug; ?>"><?php echo $category->name; ?></h2>		

            

          </div>
        <?php endforeach; ?>

  </div>

   */?>

</div>
<?php get_footer(); ?>