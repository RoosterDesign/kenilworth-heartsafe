<?php $posts = get_posts(array( 'post_type' => 'defibrillators', 'nopaging' => true, 'orderby' => 'date', 'order' => 'DESC' )); if ($posts) : ?>

<section class="defibrillator-map">

    <div class="container">

        <div class="defibrillator-map__panel">

            
            <?php
                $url = rtrim($_SERVER['REQUEST_URI'], '/');
                if ($url === '/defibrillators' || $url === '/defibrillators/') : ?>

                    <!-- DEFIB PAGE -->
                    <h2 class="h4">Locations</h2>                
                    <ul class="defibrillator-map__locations">
                        <?php foreach($posts as $post): setup_postdata($post); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>" class="btn btn--secondary" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                <? else: ?>

                <!-- HOMEPAGE -->
                <h2 class="h4">Find Local AEDs by Postcode</h2>
                <form class="form defibrillator-map__form" id="postcodeForm">
                    <input type="text" id="postcode" placeholder="Enter postcode" class="form__input" required />
                    <button type="submit" class="btn btn--primary btn--no-icon">Search</button>
                </form>
                <a href="#" class="btn btn--secondary">View all Defibrillators</a> 

            <?php endif; ?>
            

        </div>

    </div>        

    <div class="defibrillator-map__map" id="googleMap"></div>

</section>

  <?php $data = array();

        foreach($posts as $post) {
            setup_postdata($post);

            $location = get_field('map');        

            $address = '';
            if (get_field('address')) {
                $address = '<p><strong>' . get_the_title() . '</strong></p>' . get_field('address');
            } else {

                $address = '';
                $location_parts = array('city', 'post_code');

                if (isset($location['street_number']) && !empty($location['street_number'])) {
                    if (isset($location['street_name'])) {
                    $address .= $location['street_number'] . ' ' . $location['street_name'] . '<br>';
                    } else {
                    $address .= $location['street_number'] . '<br>';
                    }
                } elseif (isset($location['street_name'])) {
                    $address .= $location['street_name'] . '<br>';
                }

                foreach ($location_parts as $k) {
                    if (isset($location[$k])) {
                    $address .= $location[$k] . '<br>';
                    }
                }

                $address = '<p><strong>' . get_the_title() . '</strong><br>' . trim($address, '<br>') . '</>';

            }

            $data[] = array(
                'title' => get_the_title(),
                'lat' => $location['lat'],
                'lng' => $location['lng'],
                'content' => $address
            );
            
        }

        wp_reset_postdata();

        // Encode the PHP array into JSON
        $json_data = json_encode($data); ?>
        
        <script type="text/javascript">
            // Decode the JSON data into a JavaScript array
            var defibrillatorData = <?php echo $json_data; ?>;
        </script>

<?php endif; ?>

