<?php /* Template Name: sponsors */
get_header(); ?>
    <section id="page" class="page--sponsoring" data-page="sponsoring" aria-labelledby="fullpage-title">
       <div class="sponsoring__intro wrap">
           <h1 class="sponsoring__introTitle txt-center">
               <?php the_field('titre_introduction'); ?>
           </h1>
           <ul class="sponsoring__introItems txt-center">
               <?php
               while ( have_rows('introduction_item') ) : the_row();

                   ?>
                   <li class="sponsoring__introItem">
                       <h2 class="sponsoring__introSubTitle">
                           <?php if(get_sub_field('icone_item')) {
                               ?>
                                   <i class="<?php the_sub_field('icone_item'); ?>"></i>
                               <?php
                           } ?>
                           <?php the_sub_field('titre_item'); ?>
                       </h2>
                       <div class="sponsoring__introContent">
                           <?php the_sub_field('item_contenu'); ?>
                       </div>
                   </li>
                    <?php
               endwhile;
               ?>
           </ul>
       </div>
       <div class="sponsoring__offres ie8-background-size">
           <h1 class="screenreader-only">
               Les programmes
           </h1>
            <ul class="wrap">
                <?php
                while ( have_rows('offre') ) : the_row();

                    ?>
                    <li class="sponsoring__offre">
                        <div class="sponsoring__wrap">
                            <h2 class="sponsoring__title">
                                <?php the_sub_field('titre_offre'); ?>
                            </h2>
                            <img src="<?php the_sub_field('image_de_fond')?>" alt="" class="sponsoring__img" />
                            <div class="sponring__avantages">
                                <?php
                                if(get_sub_field('titre_droite')) {
                                    ?>
                                    <h3 class="sponsoring__subtitle">
                                        <?php the_sub_field('titre_droite'); ?>
                                    </h3>
                                <?php
                                }
                                ?>
                                <ul>
                                    <?php
                                    while ( have_rows('avantages') ) : the_row();
                                        ?>
                                        <li class="sponring__avantage">
                                            <span>
                                                <?php the_sub_field('titre'); ?>
                                            </span>
                                            <?php
                                                if(get_sub_field('par_an')) {
                                                    ?>
                                                    <span class='right'>
                                                        <?php the_sub_field('par_an') ?>
                                                    </span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class='right'>
                                                        <img src="<?php bloginfo('template_url'); ?>/img/bullet--ok.png" alt="" />
                                                    </span>
                                                    <?php
                                                }
                                            ?>
                                        </li>
                                    <?php
                                    endwhile;
                                    ?>
                                </ul>
                                <p class="sponsoring__price"><?php the_sub_field('prix'); ?></p>
                            </div>
                        </div>
                    </li>
                <?php
                endwhile;
                ?>

            </ul>
       </div>
    </section>

<?php
get_footer();