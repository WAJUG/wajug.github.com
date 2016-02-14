<?php /* Template Name: Page pleine */
get_header(); ?>


    <section id="page" class="page--example" data-page="example" aria-labelledby="fullpage-title">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <h1 id="fullpage-title"><?php the_title(); ?></h1>

            <?php the_content(); ?>

        <?php endwhile; else: ?>

            <p><?php _e('Il semblerait qu\'il n\'y ai rien ici.', 'eyaka'); ?></p>

        <?php endif; ?>

    </section>

<?php get_footer();