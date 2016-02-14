<?php /* Template Name: contact */
get_header(); ?>
<section id="page" class="page--contact" data-page="contact" aria-labelledby="fullpage-title">
    <div class="table">
        <?php

        $location = get_field('googlemap');

        if( !empty($location) ):
            ?>
            <div class="contact__map table-cell acf-map" id="map_canvas">
                <div class="marker" style="height: 350px" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
        <?php endif; ?>

        <div class="contact__right table-cell">

        </div>
    </div>

    <div class="wrap contact__content">
        <div class="contact__leftContent">
            <ul>
                <?php
                while ( have_rows('bloc_de_gauche') ) : the_row();
                ?>
                    <li>
                        <i class="fa <?php the_sub_field('classe_icone'); ?>"></i> <?php the_sub_field('texte'); ?>
                    </li>
                <?php
                endwhile;
                ?>
            </ul>
        </div>

        <div class="contact__rightContent">
            <h1 class="contact__rightTitle">
                Envoyez-nous un message
            </h1>
            <?php echo do_shortcode('[contact-form-7 id="26" title="Formulaire de contact"]'); ?>
            <div class="contact__rightMoreInfore">
                <h2 class="contact__rightTitle">
                    Plus d'informations
                </h2>
                <?php
                while ( have_rows('bloc_de_droite') ) : the_row();
                    ?>
                    <p>
                        <i class="fa <?php the_sub_field('classe_icone'); ?>"></i> <?php the_sub_field('text'); ?>
                    </p>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>

</section>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<?php
    get_footer();