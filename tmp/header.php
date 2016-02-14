<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <script src="<?php bloginfo('template_url'); ?>/js/src/vendor/modernizr-latest.min.js"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/img/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/img/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/img/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/img/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/img/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/img/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/img/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/img/icons/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/icons/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/icons/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/icons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/icons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/icons/favicon-32x32.png" sizes="32x32">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,400italic' rel='stylesheet' type='text/css'>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <!--[if lt IE 9]><link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('template_url'); ?>/print.css"><![endif]-->
    <!--[if IE 8]><style>.ie8-background-size { -ms-behavior: url("<?php echo home_url(); ?>/backgroundsize.min.htc"); }</style><![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="snap-drawers">
        <div class="snap-content">
            <div class="snap--switch">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <header class="page__header"  role="banner">
                <div class="wrap">
                    <div class="page__headerBranding headerBranding">
                        <h1 class="headerBranding__title">
                            <a href="<?php echo site_url(); ?>">
                                <?php echo wp_get_attachment_image(get_field('option-logo', 'option'), 'medium'); ?>
                            </a>
                        </h1>
                        <h2 class="headerBranding__baseline">
                            <?php bloginfo('description'); ?>
                        </h2>
                    </div>
                    <nav role="navigation" class="page__headerNavigation ">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'mobile',
                            'menu_class' => 'mobile-menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                        )); ?>
                    </nav>
                    <ul class="events__authorSocialsMedia" style="top: -30px">
                        <?php
                        while ( have_rows('social_media','option') ) : the_row();

                            ?>
                            <li class="events__authorSocialMedia">
                                <a class="events__authorSocialMediaLink" href="<?php the_sub_field('social_link','option');?>">
                                    <i class="fa <?php the_sub_field('social_icon');?>"></i>
                                    <span class="screenreader-only">
                                        <?php the_sub_field('social_name');?>
                                    </span>
                                </a>
                            </li>
                        <?php
                        endwhile;
                        ?>
                    </ul>
                </div>
            </header>

            <main role="main" id="page--content" >
                <div class="snap-drawer snap-drawer-left">
                    <nav role="navigation">
                        <h1 class="screenreader-only">
                            <?php _e('Navigation mobile', 'eyaka'); ?>
                        </h1>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'mobile',
                            'menu_class' => 'mobile-menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                        )); ?>
                    </nav>
                </div>