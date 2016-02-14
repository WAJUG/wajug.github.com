<?php /* Template Name: accueil */
get_header(); ?>
    <section id="page" class="page--accueil" data-page="accueil" aria-labelledby="fullpage-title">

    <div class="home__hero ie8-background-size" style="background-image: url(<?php the_field('header_image'); ?>)">
        <div class="wrap table">
            <p class="wrap table-cell">
                <?php the_field('header_contenu'); ?>
                <br><br>
                <a href="<?php the_field('header_btn_url'); ?>" class="btn">Plus d'info</a>
            </p>
        </div>
    </div>

    <div class="home__events">
        <div class="wrap">
            <h2 class="home__eventsTitle page__title">
                Prochainement …
            </h2>
            <?php

            $today = date('Ymd');

            $args = array (
                'post_type' => 'events',
                'meta_key' =>'date_evenement',
                'order_by' => 'date_evenement',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key'		=> 'date_evenement',
                        'compare'	=> '>=',
                        'value'		=> $today,
                    )
                ),
                'post_count' => 5
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();


                $date = get_field('date_evenement');
                // $date = 19881123 (23/11/1988)

                // extract Y,M,D
                $y = substr($date, 0, 4);
                $m = substr($date, 4, 2);
                $d = substr($date, 6, 2);

                // create UNIX
                $time = strtotime("{$d}-{$m}-{$y}");
                ?>


                <article class="home__event">
                    <div class="home__eventLeft">
                        <time class="home__eventTime">
                            <span><?php	 echo date_i18n('l d', $time);?> - <?php the_field('heure_debut'); ?></span>
                            <span><?php echo date_i18n('F Y', $time);?></span>
                        </time>
                        <span class="home__eventauthor">
                            <?php the_field('nom_orateur'); ?>
                        </span>

                    </div>
                    <div class="home__eventRight">
                        <h1 class="home__eventTitle">
                            <?php the_title(); ?>
                        </h1>
                        <div class="home__eventDesc">
                            <?php the_field('intro_homepage'); ?>
                        </div>
                        <a href="<?php the_permalink() ?>" class="home__eventLink">
                            Lire la suite
                        </a>
                    </div>
                </article>
            <?php
            endwhile;
            wp_reset_query();
            ?>
        </div>
    </div>

    <div class="home__about">
        <div class="wrap">
            <?php
            $i = 1;
            foreach (get_field('bloc') as $row) {
                if($i == 1) echo '<ul>';
                ?>
                    <li class="home__aboutItem">
                        <h2 class="home__aboutItemTitle">
                            <?php echo $row['item_title'] ?>
                        </h2>
                        <div>
                            <?php echo $row['item_content'] ?>
                        </div>
                        <div class="home__aboutImg">
                            <img src="<?php echo $row['item_image']['url'] ?>" alt="" />
                        </div>
                    </li>
                <?php
                if($i == 3) {
                    $i = 1;
                    echo '</ul>';
                } else $i++;
            }
            ?>
        </div>
    </div>

    <div class="home__socialMedia">
        <div class="wrap">
            <h2 class="page__title home__eventsTitle">Intéressé ?</h2>
            <p class="txt-center">
                Venez à notre prochaines sessions, voyez notre programme et faites passer le message !
            </p>
            <ul>
                <?php
                    while ( have_rows('social_media','option') ) : the_row();
                ?>
                <li class="home__socialMediaItem">
                    <a href="<?php the_sub_field('social_link','option');?>" class="home__socialMediaLink ie8-background-size">
                        <i class="fa <?php the_sub_field('social_icon');?>"></i><span class="screenreader-only"><?php the_sub_field('social_name');?></span>
                    </a>
                </li>
                <?php
                    endwhile;
                ?>
            </ul>
        </div>
    </div>
    </section>
<?php
get_footer();
