<?php $location = get_field('map'); ?>
<?php get_header(); ?>
<div class="page">

  <?php include get_theme_file_path("templates/partials/masthead.php"); ?>

  <section class="block">
    <div class="container">

        <div class="defibrillator-details">

          <!-- if image -->
          <img src="https://picsum.photos/340/190" alt="" class="defibrillator-details__image" />
          <!-- end if -->

          <div class="defibrillator-details__map" data-zoom="16">
            <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
          </div>

          <div class="card defibrillator-details__address">
            <div class="card__content">
              <h3 class="card__title">Address</h3>                  
                <?php $address = '';
                  foreach(array('street_number', 'street_name', 'city', 'state', 'post_code', 'country') as $i => $k) {
                    if(isset($location[$k])) {
                      $address .= $location[$k] . '<br>';
                    }
                  }
                  $address = trim($address, '<br>');
                  echo '<p>' . $address . '</p>';
                ?>
            </div>
          </div>  

      </div>
    </div>      
  </section>

  <?php include get_theme_file_path("templates/partials/supporters.php"); ?>

</div>

<?php get_footer(); ?>