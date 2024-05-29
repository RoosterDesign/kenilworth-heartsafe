<section class="defibrillator-map">

    <div class="container">

        <div class="defibrillator-map__panel">

            <h2 class="h4">Locations</h2>

            <?php $posts = get_posts(array( 'post_type' => 'defibrillators', 'nopaging' => true ));
                if ($posts) { ?>
                <ul class="defibrillator-map__locations">
                    <?php foreach($posts as $post): setup_postdata($post); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="btn btn--secondary" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php }; wp_reset_postdata(); ?>

        </div>

    </div>

  <div class="defibrillator-map__map" id="googleMap"></div>

</section>