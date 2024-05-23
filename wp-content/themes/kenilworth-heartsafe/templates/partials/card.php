<?php
  $image = get_field('image');
  if( $image ):
    $imageUrl = $image['sizes'][ 'card' ];
  elseif(has_post_thumbnail()) :
    $imageUrl = get_the_post_thumbnail_url(get_the_ID(), 'card');
  else:
    $imageUrl = get_option('masthead_card_image');
  endif;
?>
          
  <a href="<?php the_permalink(); ?>" class="card">
    <div class="card__img">
      <img src="<?php echo $imageUrl; ?>" title="Special Offer" class=" img-responsive" />
    </div>
    <div class="card__content">
      <h2 class="card__title"><?php the_title(); ?></h2>
      <p class="card__body"><?php the_field('body'); ?></p>
    </div>
</a>

<?php $image = null; ?>