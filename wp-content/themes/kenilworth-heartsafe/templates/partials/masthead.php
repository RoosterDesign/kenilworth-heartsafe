<?php  wp_reset_postdata();
    if(has_post_thumbnail()) :
    $mobileImage = get_the_post_thumbnail_url(get_the_ID(), 'fw-img-mobile');
    $tabletImage = get_the_post_thumbnail_url(get_the_ID(), 'fw-img-tablet');
    $desktopImage = get_the_post_thumbnail_url(get_the_ID(), 'fw-img-desktop');
    $desktopLgImage = get_the_post_thumbnail_url(get_the_ID(), 'fw-img-desktop-lg');    
  ?>
  <style>
    .masthead { background-image: url("<?php echo $mobileImage; ?>"); }
    @media only screen and (min-width: 768px) {
      .masthead { background-image: url("<?php echo $tabletImage; ?>"); }
    }
    @media only screen and (min-width: 1024px) {
      .masthead { background-image: url("<?php echo $desktopImage; ?>"); }
    }
    @media only screen and (min-width: 2560px) {
      .masthead { background-image: url("<?php echo $desktopLgImage; ?>"); }
    }
  </style>
  <?php else : ?>
  <style>
    .masthead { background-image: url("<?php echo get_option('masthead_fallback_image'); ?>"); }
  </style>
  <?php endif; ?> 
  

  <?php if(is_404()) :
    $title = "Error 404 - Page Not Found";
  elseif(is_home()) :
    $title = "News"; 
  elseif(is_post_type_archive('activities')):
      $title = "Activities";
  else :
    $title = get_the_title();
  endif;
?>

<section class="masthead">
  <div class="container">    
    <h1 class="masthead__title"><?php echo $title; ?></h1> 
  </div>
</section>