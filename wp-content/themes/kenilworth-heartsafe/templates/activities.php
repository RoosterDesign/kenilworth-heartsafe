<?php
/*
Template Name: Activities
*/
?>
<?php get_header(); ?>
<div class="page">
  
    <?php include get_theme_file_path("templates/partials/masthead.php"); ?>

    <div class="container">
      
      <?php if(get_the_content()) : ?>
        <div class="page-content">
          <?php the_content(); ?>
        </div>
      <?php endif; ?>
            
        <?php
          $args = array( 'hide_empty' => false );
          $categories = get_terms( 'activities_category', $args );				
          foreach( $categories as $category ): ?>		
          
          <div class="activity-category">
          
            <h2 class="card-panel__title" id="<?php echo $category->slug; ?>"><?php echo $category->name; ?></h2>		

            <?php $posts = get_posts(array(
              'post_type' => 'activities',
              'taxonomy' => $category->taxonomy,
              'term' => $category->slug,
              'nopaging' => true
            ));
            if ($posts) { ?>
              <div class="card-list">			
                <?php foreach($posts as $post): setup_postdata($post);
                  include get_theme_file_path("templates/partials/card.php");
                endforeach; ?>
              </div>  
            <?php } else { ?>
              <p class="no-results">We currently have no activities for this category, please check back again soon.</p>
            <?php };						
            ?>			

          </div>
        <?php endforeach; ?>

  </div>

</div>
<?php get_footer(); ?>