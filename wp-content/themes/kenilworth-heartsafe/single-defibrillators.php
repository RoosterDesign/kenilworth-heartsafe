
<?php get_header(); ?>
<div class="page">

  <?php include get_theme_file_path("templates/partials/masthead.php"); ?>

  <section class="block">
    <div class="container">

        <div class="defibrillator-details<?php if (!has_post_thumbnail()) { echo ' defibrillator-details--no-img' ;} ?>">

          <?php $location = get_field('map'); ?>

          <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'defibrillator-location', array('class' => 'defibrillator-details__image') ); } ?>

          <div class="defibrillator-details__map">
            <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
          </div>

          <div class="card defibrillator-details__address">
            <div class="card__content">
              <h3 class="card__title">Address</h3>
                <?php
                  if (get_field('address')) :
                    the_field('address');
                  else:
                    $address = '';
                    $location_parts = array('city', 'post_code');
  
                    // Combine street number and street name if street number has a value
                    if (isset($location['street_number']) && !empty($location['street_number'])) {
                      if (isset($location['street_name'])) {
                        $address .= $location['street_number'] . ' ' . $location['street_name'] . '<br>';
                      } else {
                        $address .= $location['street_number'] . '<br>';
                      }
                    } elseif (isset($location['street_name'])) {
                      $address .= $location['street_name'] . '<br>';
                    }
  
                    // Append the rest of the address parts
                    foreach ($location_parts as $k) {
                      if (isset($location[$k])) {
                        $address .= $location[$k] . '<br>';
                      }
                    }
  
                    // Trim the trailing <br> if any
                    $address = trim($address, '<br>');
                    echo '<p>' . $address . '</p>';
                  endif;                 
                ?>

            </div>
          </div>  

      </div>
    </div>      
  </section>

  <?php include get_theme_file_path("templates/partials/supporters.php"); ?>

</div>

<?php get_footer(); ?>