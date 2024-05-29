<section class="gallery">


 <!-- Image 1 -->

  <?php $image = get_field('image_1');
    if( $image ):
      $mobileImage = $image['sizes'][ 'fw-img-mobile' ];
      $tabletImage = $image['sizes'][ 'fw-img-tablet' ];
  ?>

  <picture class="gallery__img">
    <source srcset="<?php echo $tabletImage; ?>" media="(min-width: 1800px)" >
    <img src="<?php echo $mobileImage; ?>" alt="Kenilworth Heartsafe" />
  </picture> 

  <?php endif; $image = null; ?>
  <!-- end: Image 1 -->


   <!-- Image 2-->
  <?php $image = get_field('image_2');
    if( $image ):
      $mobileImage = $image['sizes'][ 'fw-img-mobile' ];
      $tabletImage = $image['sizes'][ 'fw-img-tablet' ];
  ?>

  <picture class="gallery__img">
    <source srcset="<?php echo $tabletImage; ?>" media="(min-width: 1800px)" >
    <img src="<?php echo $mobileImage; ?>" alt="Kenilworth Heartsafe" />
  </picture> 

  <?php endif; $image = null; ?>
  <!-- end: Image 2 -->


  <!-- Image 3 -->
  <?php $image = get_field('image_3');
    if( $image ):
      $mobileImage = $image['sizes'][ 'fw-img-mobile' ];
      $tabletImage = $image['sizes'][ 'fw-img-tablet' ];
  ?>

  <picture class="gallery__img">
    <source srcset="<?php echo $tabletImage; ?>" media="(min-width: 1800px)" >
    <img src="<?php echo $mobileImage; ?>" alt="Kenilworth Heartsafe" />
  </picture>

  <?php endif; $image = null; ?>
  <!-- end: Image 3 -->


  <!-- Image 4 -->
  <?php $image = get_field('image_4');
    if( $image ):
      $mobileImage = $image['sizes'][ 'fw-img-mobile' ];
      $tabletImage = $image['sizes'][ 'fw-img-tablet' ];
  ?>

  <picture class="gallery__img">
    <source srcset="<?php echo $tabletImage; ?>" media="(min-width: 1800px)" >
    <img src="<?php echo $mobileImage; ?>" alt="Kenilworth Heartsafe" />
  </picture>

  <?php endif; $image = null; ?>
  <!-- end: Image 4 -->
    
</section>
