<?php /* Template Name: Page avec sidebar à gauche */
get_header(); ?>


    <div id="page" class="page--sidebar" data-page="sidebar">
        <div class="sidebar--side">

            <?php if (is_active_sidebar('main-sidebar')) : ?>

                <?php dynamic_sidebar('main-sidebar'); ?>

            <?php endif; ?>

        </div>
        <div class="sidebar--content">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <h1><?php if (!is_front_page()) {  the_title(); } ?></h1>

                <?php the_content(); ?>

            <?php endwhile; else: ?>

                <p><?php _e('Il semblerait qu\'il n\'y ai rien ici.', 'eyaka'); ?></p>

            <?php endif; ?>

        </div>
    </div>

<?php get_footer();