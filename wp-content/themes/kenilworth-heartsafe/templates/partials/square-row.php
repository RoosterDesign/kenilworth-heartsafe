<div class="square-row<?php if( $textPosition == 'right' ) : echo ' square-row--reverse'; endif; ?>">
  <div class="container">
    <div class="square-text animate">      
      <h2 class="square-text__title"><?php echo $block['title']; ?></h2>
      <?php echo $block['body']; ?>
    </div>
    <picture class="square-image">
      <source srcset="<?php echo $desktopImage; ?>" media="(min-width: 2000px)" >  
      <source srcset="<?php echo $tabletImage; ?>" media="(min-width: 768px)" >
      <img src="<?php echo $mobileImage; ?>" alt="Kenilworth Heartsafe" />
    </picture>
  </div>
</div>