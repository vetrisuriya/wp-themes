<!DOCTYPE html>
<html class="no-js" data-theme="light" <?= language_attributes(); ?>>
<head>
    <!-- meta character set -->
	<meta charset="<?= bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Author Meta -->
	<meta name="author" content="Tamilbuzz">

    
    <link rel="stylesheet" href="<?= get_stylesheet_uri(); ?>">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri(); ?>/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#93201e">
    <meta name="msapplication-TileImage" content="<?= get_template_directory_uri(); ?>/assets/img/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#93201e">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/magnific-popup.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/style.css">

    <style>
        .header-middle {
            background: url('<?= get_template_directory_uri(); ?>/assets/img/header-bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            padding: 12px 0;
        }
        @media (max-width: 991px) {
            .menu-area {
                background: url('<?= get_template_directory_uri(); ?>/assets/img/header-bg.png');
                background-repeat: no-repeat;
                background-size: cover;
            }
        }
        .th-menu-wrapper .mobile-logo {
            background-color: #800601;
        }

        .cust-bg, .icon-btn, .footer-wrapper {
            background: #800601 url('<?= get_template_directory_uri(); ?>/assets/img/bg.svg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .light-img, .dark-img, .mobile-logo a img, .header-logo a img {
            width: 130px;
        }
		
		
		.blog-content-wrap .blog-content .content iframe {
			margin: 20px auto !important;
		}
		.blog-content-wrap .blog-content .content .twitter-tweet {
			margin-right: auto !important;
			margin-left: auto !important;
		}
    </style>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MV7B3NSM');</script>
<!-- End Google Tag Manager -->

    <?= wp_head(); ?>
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MV7B3NSM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php
    // Get the current timestamp according to WordPress timezone settings
    $current_timestamp = current_time('timestamp');

    // Format the timestamp
    $top_bar_date = date_i18n('d F, Y', $current_timestamp);
    ?>


    <!--******************************** Code Start From Here ******************************** -->
    
    <?php
    // navigation menu
    // $nav_el = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display(84);
    // echo $nav_el;
    
    // load_elementor_template('Navigation');
    ?>



    <?php
    $all_posts = [];

    $all_post_query = new WP_Query(array(
        'posts_per_page' => 50,
    ));
    if($all_post_query->have_posts()) {
        while($all_post_query->have_posts()) {
            $all_post_query->the_post();

            $all_posts[] = array(
                "permalink" => get_permalink(),
                "title" => get_the_title(),
                "short_title" => title_short(120),
                "excerpt" => get_the_excerpt(),
                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                "600-464" =>  get_the_post_thumbnail_url(get_the_ID(), '600-464'),
                "288-220" =>  get_the_post_thumbnail_url(get_the_ID(), '288-220'),
                "288-187" =>  get_the_post_thumbnail_url(get_the_ID(), '288-187'),
                "355-450" =>  get_the_post_thumbnail_url(get_the_ID(), '355-450'),
                "392-414" =>  get_the_post_thumbnail_url(get_the_ID(), '392-414'),
                "130-122" =>  get_the_post_thumbnail_url(get_the_ID(), '130-122'),
                "80-80" =>  get_the_post_thumbnail_url(get_the_ID(), '80-80'),
                "386-300" =>  get_the_post_thumbnail_url(get_the_ID(), '386-300'),
                "270-220" =>  get_the_post_thumbnail_url(get_the_ID(), '270-220'),
                "896-500" =>  get_the_post_thumbnail_url(get_the_ID(), '896-500'),
                "392-310" =>  get_the_post_thumbnail_url(get_the_ID(), '392-310'),
                "all_tags" => ct_post_taxonomies(),
                "all_cats" => ct_post_taxonomies("cat"),
                "cat" => get_the_category()[0]->cat_name,
                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                "date" => tamil_mon(get_the_date('j M, Y')),
                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                "modified" => date("d M, Y", strtotime($post->post_modified)),
                "time_ago" => ct_post_time_ago(),
                "views" => ct_get_post_view(),
                "author" => get_the_author_meta('display_name', $post->post_author),
                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
            );
        }
        wp_reset_postdata();
    }
    ?>

    
    
    <!--============================== Sidemenu ============================== -->
    <div class="sidemenu-wrapper sidemenu-1 d-none d-md-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls" aria-label="Menu Close"><i class="far fa-times"></i></button>
            <div class="widget  ">
                <div class="th-widget-about">
                    <div class="about-logo">
                        <a href="<?= site_url(); ?>" aria-label="Tamil Buzz Light Logo"><img class="light-img" src="<?= get_template_directory_uri(); ?>/assets/img/logo-black.png" alt="TamilBuzz"></a>
                        <a href="<?= site_url(); ?>" aria-label="Tamil Buzz Dark Logo"><img class="dark-img" src="<?= get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="TamilBuzz"></a>
                    </div>
                    <p class="about-text">Magazines cover a wide subjects, including not limited to fashion, lifestyle, health, politics, business, Entertainment, sports, science,</p>
                    <div class="th-social style-black">
                        <a href="<?= ss_url("telegram"); ?>" aria-label="Tamil Buzz Telegram Link"><i class="fab fa-telegram"></i></a>
                        <a href="<?= ss_url("whatsapp"); ?>" aria-label="Tamil Buzz Whatsapp Link"><i class="fab fa-whatsapp"></i></a>
                        <a href="<?= ss_url("twitter"); ?>" aria-label="Tamil Buzz Twitter Link">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                        </a>
                        <a href="<?= ss_url("thread"); ?>" aria-label="Tamil Buzz Thread Link">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M331.5 235.7c2.2 .9 4.2 1.9 6.3 2.8c29.2 14.1 50.6 35.2 61.8 61.4c15.7 36.5 17.2 95.8-30.3 143.2c-36.2 36.2-80.3 52.5-142.6 53h-.3c-70.2-.5-124.1-24.1-160.4-70.2c-32.3-41-48.9-98.1-49.5-169.6V256v-.2C17 184.3 33.6 127.2 65.9 86.2C102.2 40.1 156.2 16.5 226.4 16h.3c70.3 .5 124.9 24 162.3 69.9c18.4 22.7 32 50 40.6 81.7l-40.4 10.8c-7.1-25.8-17.8-47.8-32.2-65.4c-29.2-35.8-73-54.2-130.5-54.6c-57 .5-100.1 18.8-128.2 54.4C72.1 146.1 58.5 194.3 58 256c.5 61.7 14.1 109.9 40.3 143.3c28 35.6 71.2 53.9 128.2 54.4c51.4-.4 85.4-12.6 113.7-40.9c32.3-32.2 31.7-71.8 21.4-95.9c-6.1-14.2-17.1-26-31.9-34.9c-3.7 26.9-11.8 48.3-24.7 64.8c-17.1 21.8-41.4 33.6-72.7 35.3c-23.6 1.3-46.3-4.4-63.9-16c-20.8-13.8-33-34.8-34.3-59.3c-2.5-48.3 35.7-83 95.2-86.4c21.1-1.2 40.9-.3 59.2 2.8c-2.4-14.8-7.3-26.6-14.6-35.2c-10-11.7-25.6-17.7-46.2-17.8H227c-16.6 0-39 4.6-53.3 26.3l-34.4-23.6c19.2-29.1 50.3-45.1 87.8-45.1h.8c62.6 .4 99.9 39.5 103.7 107.7l-.2 .2zm-156 68.8c1.3 25.1 28.4 36.8 54.6 35.3c25.6-1.4 54.6-11.4 59.5-73.2c-13.2-2.9-27.8-4.4-43.4-4.4c-4.8 0-9.6 .1-14.4 .4c-42.9 2.4-57.2 23.2-56.2 41.8l-.1 .1z"/></svg>
                        </a>
                        <a href="<?= ss_url("facebook"); ?>" aria-label="Tamil Buzz Facebook Link"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?= ss_url("instagram"); ?>" aria-label="Tamil Buzz Instagram Link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="widget  ">
                <h3 class="widget_title">அண்மை செய்திகள்</h3>
                <div class="recent-post-wrap">
                    <?php
                    for($recent_post = 0; $recent_post <= 3; $recent_post++) {
                        if(isset($all_posts[$recent_post])) {
                    ?>
                        <div class="recent-post">
                            <div class="media-img">
                                <a href="<?= $all_posts[$recent_post]["permalink"]; ?>"><img src="<?= $all_posts[$recent_post]["80-80"]; ?>" alt="<?= $all_posts[$recent_post]["title"]; ?>"></a>
                            </div>
                            <div class="media-body">
                                <h4 class="post-title"><a class="hover-line" href="<?= $all_posts[$recent_post]["permalink"]; ?>"><?= $all_posts[$recent_post]["short_title"]; ?></a></h4>
                                <div class="recent-post-meta">
                                    <a href="<?= $all_posts[$recent_post]["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $all_posts[$recent_post]["date"]; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-search-box">
        <button class="searchClose" aria-label="Search Close"><i class="fal fa-times"></i></button>
        <form action="<?= esc_url(home_url('/')); ?>" method="get">
            <?php
            if(isset($_GET["s"])) {
                $search_text = $_GET["s"];
            } else {
                $search_text = "";
            }
            ?>
            <input type="text" placeholder="நீ என்ன தேடுகிறாய்?" name="s" value="<?= $search_text; ?>">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    
    <!--============================== Mobile Menu ============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle" aria-label="Mobile Menu"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="<?= site_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="TamilBuzz"></a>
            </div>
            <div class="th-mobile-menu">
                <?php
                wp_nav_menu(array(
                    "theme_location" => "primary_menu",
                    "container" => false,
                    "menu_id" => "",
                    "menu_class" => "",
                    "add_a_class" => "",
                ));
                ?>
            </div>
        </div>
    </div>

    <!--============================== Header Area ==============================-->
    <header class="th-header header-layout1">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto">
                        <div class="header-links no-hover">
                            <ul>
                                <li><i class="fal fa-calendar-days"></i><a href="#"><?= $top_bar_date; ?></a></li>
                                <li>
                                    <a class="theme-toggler" href="#">
                                        <span class="dark"><i class="fas fa-moon"></i>Dark Mode</span>
                                        <span class="light"><i class="fas fa-sun-bright"></i>Light Mode</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-links">
                            <ul class="d-flex">
                                <li>
                                    <div class="social-links">
                                        <a href="<?= ss_url("telegram"); ?>" aria-label="Tamil Buzz Telegram Link"><i class="fab fa-telegram"></i></a>
                                        <a href="<?= ss_url("whatsapp"); ?>" aria-label="Tamil Buzz Whatsapp Link"><i class="fab fa-whatsapp"></i></a>
                                        <a href="<?= ss_url("twitter"); ?>" aria-label="Tamil Buzz Twitter Link">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                                        </a>
                                        <a href="<?= ss_url("thread"); ?>" aria-label="Tamil Buzz Thread Link">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M331.5 235.7c2.2 .9 4.2 1.9 6.3 2.8c29.2 14.1 50.6 35.2 61.8 61.4c15.7 36.5 17.2 95.8-30.3 143.2c-36.2 36.2-80.3 52.5-142.6 53h-.3c-70.2-.5-124.1-24.1-160.4-70.2c-32.3-41-48.9-98.1-49.5-169.6V256v-.2C17 184.3 33.6 127.2 65.9 86.2C102.2 40.1 156.2 16.5 226.4 16h.3c70.3 .5 124.9 24 162.3 69.9c18.4 22.7 32 50 40.6 81.7l-40.4 10.8c-7.1-25.8-17.8-47.8-32.2-65.4c-29.2-35.8-73-54.2-130.5-54.6c-57 .5-100.1 18.8-128.2 54.4C72.1 146.1 58.5 194.3 58 256c.5 61.7 14.1 109.9 40.3 143.3c28 35.6 71.2 53.9 128.2 54.4c51.4-.4 85.4-12.6 113.7-40.9c32.3-32.2 31.7-71.8 21.4-95.9c-6.1-14.2-17.1-26-31.9-34.9c-3.7 26.9-11.8 48.3-24.7 64.8c-17.1 21.8-41.4 33.6-72.7 35.3c-23.6 1.3-46.3-4.4-63.9-16c-20.8-13.8-33-34.8-34.3-59.3c-2.5-48.3 35.7-83 95.2-86.4c21.1-1.2 40.9-.3 59.2 2.8c-2.4-14.8-7.3-26.6-14.6-35.2c-10-11.7-25.6-17.7-46.2-17.8H227c-16.6 0-39 4.6-53.3 26.3l-34.4-23.6c19.2-29.1 50.3-45.1 87.8-45.1h.8c62.6 .4 99.9 39.5 103.7 107.7l-.2 .2zm-156 68.8c1.3 25.1 28.4 36.8 54.6 35.3c25.6-1.4 54.6-11.4 59.5-73.2c-13.2-2.9-27.8-4.4-43.4-4.4c-4.8 0-9.6 .1-14.4 .4c-42.9 2.4-57.2 23.2-56.2 41.8l-.1 .1z"/></svg>
                                        </a>
                                        <a href="<?= ss_url("facebook"); ?>" aria-label="Tamil Buzz Facebook Link"><i class="fab fa-facebook-f"></i></a>
                                        <a href="<?= ss_url("instagram"); ?>" aria-label="Tamil Buzz Instagram Link"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle d-lg-block d-none">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-auto d-none d-lg-block">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="<?= site_url(); ?>" aria-label="Tamil Buzz Light Logo"><img class="light-img" src="<?= get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="TamilBuzz"></a>
                                <a href="<?= site_url(); ?>" aria-label="Tamil Buzz Dark Logo"><img class="dark-img" src="<?= get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="TamilBuzz"></a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-8 text-end">
                        <div class="header-ads">
                            <a href="#">
                                <img class="light-img" src="<?= get_template_directory_uri(); ?>/assets/img/ads/ads_banner_1.jpg" alt="ads">
                                <img class="dark-img" src="<?= get_template_directory_uri(); ?>/assets/img/ads/ads_banner_1_dark.jpg" alt="ads">
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto d-lg-none d-block">
                            <div class="header-logo">
                                <a href="<?= site_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="TamilBuzz"></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <?php
                                wp_nav_menu(array(
                                    "theme_location" => "primary_menu",
                                    "container" => false,
                                    "menu_id" => "",
                                    "menu_class" => "",
                                    "add_a_class" => "",
                                ));
                                ?>
                            </nav>
                        </div>
                        <div class="col-auto">
                            <div class="header-button">
                                <button type="button" class="simple-icon searchBoxToggler" aria-label="Search Button"><i class="far fa-search"></i></button>
                                <a href="#" class="icon-btn sideMenuToggler d-none d-lg-block" aria-label="Desktop Menu Button"><i class="far fa-bars"></i></a>
                                <button type="button" class="th-menu-toggle d-block d-lg-none" aria-label="Mobile Menu Button"><i class="far fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    
    <!--============================== News Area ==============================-->
    <style>
        .card-news {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ededed;
            position: relative;
            overflow: hidden;
            height: 50px;
        }
        .card-news .news-title {
            color: #fff;
            font-size: 14px;
            padding: 10px 20px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #800601 url('<?= get_template_directory_uri(); ?>/assets/img/bg.svg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            line-height: 0;
        }
        @media (max-width: 600px) {
            .card-news .news-title {
                padding: 10px;
            }
        }
        .card-news .news-text {
            flex: 1 1 auto;
            width: 1%;
            margin: 0;
            font-size: 14px;
            line-height: 1;
            overflow: hidden;
            white-space: nowrap;
            height: 100%;
            padding: 0px 10px;
        }
        .card-news .news-text * {
            padding: 0px;
            margin: 0px;
            line-height: initial;
        }
        .card-news .news-text .news-items {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            white-space: nowrap;
            height: 100%;
        }
        .card-news .news-text .news-item {
            border-right: 1px solid #800601;
            padding-right: 20px;
            margin-right: 20px;
            white-space: nowrap;
        }
        .card-news .news-text .news-item a {
            font-weight: 600;
            font-size: 14px;
        }
        .card-news .news-text .news-item a:not(.btn-darkpink) {
            color: #000;
            text-decoration: none;
        }
        .card-news .news-text .news-item a:not(.btn-darkpink):hover, .card-news .news-text .news-item a:not(.btn-darkpink):focus {
            color: #800601;
        }
        .card-news .news-text .news-item a.btn-darkpink {
            padding: 5px 10px;
            font-size: 13px;
            margin-left: 5px;
        }
        .card-news .news-text .news-item:last-child {
            border-right: 0px;
            margin-right: 0px;
        }
    </style>
    <div class="container">
        <div class="card-news">
            <h2 class="news-title">முக்கிய செய்தி :</h2>
            <div class="news-text">
                <div class="news-ticker news-items">
                    <?php
                    for($news_ticker = 0; $news_ticker <= 9; $news_ticker++) {
                        if(isset($all_posts[$news_ticker])) {
                    ?>
                        <div class="news-item"><a href="<?= $all_posts[$news_ticker]["permalink"]; ?>"><?= $all_posts[$news_ticker]["title"]; ?></a></div> 
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    