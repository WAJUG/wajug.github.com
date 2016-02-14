<?php /* Template Name: special Event */
get_header(); ?>
    <section id="page" class="page--specialEvent" data-page="specialEvent" aria-labelledby="fullpage-title">
        <div class="specialEvent__intro">
            <div class="wrap">
                <h1 class="specialEvent__introTitle txt-center">
                    <?php the_field('titre_evènement'); ?>
                </h1>
                <div class="specialEvent__introItems table">
                    <div class="specialEvent__introContent table-cell">
                        <?php the_field('description_evenement'); ?>
                    </div>
                    <div class="specialEvent__introImg table-cell txt-right">
                        <img src="<?php the_field('image'); ?>" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <?php
            if(get_field('évènement_termine')) {
                ?>
                <div class="specialEvent__noPlace">
                    <div class="wrap txt-center">
                        <img src="<?php bloginfo('template_url'); ?>/img/enveloppe.svg" alt="" width="140" />
                        <?php the_field('message') ?>
                    </div>
                </div>
                <?php
            }
        ?>

        <div class="specialEvent__description">
            <div class="wrap">
                <h1 class="specialEvent__descriptionTitle txt-center">
                    <?php the_field('titre') ?>
                </h1>
                <ul class="txt-center">
                    <?php
                    while ( have_rows('box') ) : the_row();

                        ?>
                        <li class="specialEvent__descriptionItem">
                            <h2 class="specialEvent__descriptionItemTitle">
                                <?php the_sub_field('titre'); ?>
                            </h2>
                            <div class="specialEvent__descriptionItemContent">
                                <?php the_sub_field('description'); ?>
                            </div>
                        </li>
                    <?php
                    endwhile;
                    ?>
                </ul>
            </div>
            <?php

            $location = get_field('google_map');

            if( !empty($location) ):
                ?>
                <div class="specialEvent__map acf-map">
                    <div class="marker" style="height: 350px" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                </div>
            <?php endif; ?>

            <p class="txt-center">
                <a href="<?php the_field('url_bouton') ?>" class="btn btn--blue"><?php the_field('intitule_bouton') ?></a>
            </p>
        </div>


        <div class="specialEvent__animators">
            <div class="wrap">
                <?php
                    if(get_field('titre_sponsors')) {
                ?>
                <h1 class="specialEvent_title txt-center">
                    <?php the_field('titre_animateur') ?>
                </h1>
                <?php
                }
                ?>
                <ul class=specialEvent__animatorList>
                    <?php
                    while ( have_rows('animateur') ) : the_row();
                        if(get_sub_field('photo')) {
                            $image = get_sub_field('photo');
                            $url_image = $image['url'];
                        } else {
                            $url_image = false;
                        }
                        ?>
                        <li class="specialEvent__animator">
                            <h2 class="specialEvent__animatorTitle">
                                <?php the_sub_field('nom') ?>
                            </h2>
                            <div class="specialEvent__animatorImage" role="presentation">
                                <?php if($url_image) {
                                    ?>
                                        <span style="background-image: url('<?php echo $url_image ?>');"></span>
                                    <?php
                                } else {
                                    ?>
                                    <span style="background-image: url(<?php bloginfo('template_url'); ?>/img/orator-bg.png);"></span>
                                <?php
                                } ?>

                            </div>
                            <?php
                            if(get_sub_field('nom_compte_twitter')) {
                                ?>
                                <a href="<?php the_sub_field('url_compte_twitter'); ?>" class="specialEvent__animatorLink"><?php the_sub_field('nom_compte_twitter'); ?></a>
                            <?
                            }
                            ?>
                        </li>
                    <?php
                    endwhile;
                    ?>
                </ul>
            </div>
        </div>

        <div class="specialEvent__sponsors">
            <div class="wrap">
                <?php
                    if(get_field('titre_sponsors')) {
                        ?>
                            <h1 class="specialEvent_title txt-center">
                                <?php the_field('titre_sponsors') ?>
                            </h1>
                        <?php
                    }
                ?>
                <ul class="specialEvent__sponsorsList">
                    <?php
                    while ( have_rows('sponsors') ) : the_row();
                        $image = get_sub_field('logo');
                        ?>
                        <li class="specialEvent__sponsor txt-center">
                            <?php
                                if(get_sub_field('url_site')) {
                                    ?>
                                        <a href="<?php the_sub_field('url_site'); ?>">
                                    <?php
                                }
                            ?>
                                            <img src="<?php echo $image['url']; ?>" alt="<?php the_sub_field('nom') ?>" class="specialEvent__sponsorsLogo" />
                            <?php
                                if(get_sub_field('url_site')) {
                                    ?>
                                        </a>
                                    <?php
                                }
                            ?>
                        </li>
                    <?php
                    endwhile;
                    ?>
                </ul>
            </div>
        </div>
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php
get_footer();