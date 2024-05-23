<div class="square-row square-row--form">
  <div class="container">    
    <div class="square-text">
      <?php /*
      <h2 class="square-text__title"><?php echo $block['title']; ?></h2>
      <?php echo $block['body']; ?>
      */ ?>
      <?php echo do_shortcode($block["form_id"]);?>
    </div>  
    <picture class="square-image">
      <source srcset="<?php echo $desktopImage; ?>" media="(min-width: 2000px)" >  
      <source srcset="<?php echo $tabletImage; ?>" media="(min-width: 768px)" >
      <img src="<?php echo $mobileImage; ?>" alt="Friends of Abbey Fields" />
    </picture>
  </div>
</div>