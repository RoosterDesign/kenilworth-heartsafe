<?php  wp_reset_postdata();
    if(has_post_thumbnail()) :
    $mobileImage = get_the_post_thumbnail_url(get_the_ID(), 'masthead-mobile');
    $desktopImage = get_the_post_thumbnail_url(get_the_ID(), 'masthead-desktop');   
  ?>


  <style>
    .masthead__bg { background-image: url("<?php echo $mobileImage; ?>"); }
    @media only screen and (min-width: 1200px) {
      .masthead__bg { background-image: url("<?php echo $desktopImage; ?>"); }
    }
  </style>

  <?php /*
  <?php else : ?>
  <style>
    .masthead { background-image: url("<?php echo get_option('masthead_fallback_image'); ?>"); }    
  </style>
  */ ?>
  <?php endif; ?> 
  

  <?php if(is_404()) :
    $title = "Error 404 - Page Not Found";
  // elseif(is_home()) :
  //   $title = "News";
  // elseif(is_singular('defibrillators')):
  //     $title = "Defibrillators";
  else :
    $title = get_the_title();
  endif;
?>

<section class="masthead">
  <div class="container">    
    <h1><?php echo $title; ?></h1> 

    <?php if(is_singular('defibrillators')) : ?>
      <a href="/defibrillators" class="btn btn--back masthead__back" title="Back to defibrillators list">
        <span>Back to list</span> 
      </a>
    <?php endif; ?>

  </div>

  <div class="masthead__bg"></div>
</section>