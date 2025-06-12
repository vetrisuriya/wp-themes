<?php get_header(); ?>

	<section class="block-wrapper pt-0 front-page">
		<div class="container">
            
            <!-- Home Slider & Live Wire -->
            <div class="row mt-4 home-slider__live-wire" id="home-slider">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="ts-grid-box watch-post">
                        <div class="cust-ts-head mb-3 clearfix">
                            <h2 class="ts-title float-left">Latest News</h2>
                        </div>
                        <div class="row home-carousel">
                            <div class="container">
                                <div class="slider">
                                    <a href="#" class="prev" aria-label="Latest News Previous Button" style="width: 30px; right: 40px;"><i class="fa fa-chevron-left" style=""></i></a>
                                    <a href="#" class="next" aria-label="Latest News Next Button" style="width: 30px;"><i class="fa fa-chevron-right"></i></a>
                                    <ul>
                                        <?php
                                        $slider_count = 0;
                                        $slider_query = new WP_Query(array(
                                            'post_type' => 'post',
                                            'posts_per_page' => 6,
                                            'category__not_in' => array(25), // Exclude the specific category
                                            'post_status' => 'publish', // Only show published posts
                                            'orderby' => 'date', // Order by date (optional)
                                            'order' => 'DESC', // Order by most recent (optional)
                                        ));
                                        if($slider_query->have_posts()) {
                                            while($slider_query->have_posts()) {
                                                $slider_query->the_post();

                                                $slider_posts = array(
                                                    "permalink" => get_permalink(),
                                                    "title" => get_the_title(),
                                                    "short_title" => title_short(20),
                                                    "excerpt" => get_the_excerpt(),
                                                    "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                    "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                    "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                    "all_tags" => ct_post_taxonomies(),
                                                    "all_cats" => ct_post_taxonomies("cat"),
                                                    "cat" => get_the_category()[0]->cat_name,
                                                    "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                    "date" => get_the_date('j M, Y'),
                                                    "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                    "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                    "time_ago" => ct_post_time_ago(),
                                                    "views" => ct_get_post_view(),
                                                    "author" => get_the_author_meta('display_name', $post->post_author),
                                                    "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                                );

                                                $class = "";
                                                if($slider_count == 0) {
                                                    $class = "show active";
                                                }
                                        ?>
                                                    <li>
                                                        <a href="<?php echo $slider_posts["permalink"]; ?>" title="<?php echo $slider_posts["title"]; ?>">
                                                            <img class="" src="<?php echo $slider_posts["img"]; ?>" alt="<?php echo $slider_posts["short_title"]; ?>" decoding="async">
                                                            <h2><?php echo $slider_posts["title"]; ?></h2>
                                                        </a>
                                                    </li>
                                        <?php
                                                $slider_count++;
                                            }
                                            wp_reset_postdata();
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu">
                                    <ul>
                                        <?php
                                        $list_count = 0;
                                        $list_query = new WP_Query(array(
                                            'post_type' => 'post',
                                            'posts_per_page' => 6,
                                            'category__not_in' => array(25), // Exclude the specific category
                                            'post_status' => 'publish', // Only show published posts
                                            'orderby' => 'date', // Order by date (optional)
                                            'order' => 'DESC', // Order by most recent (optional)
                                        ));
                                        if($list_query->have_posts()) {
                                            while($list_query->have_posts()) {
                                                $list_query->the_post();

                                                $list_posts = array(
                                                    "permalink" => get_permalink(),
                                                    "title" => get_the_title(),
                                                    "short_title" => title_short(150),
                                                    "excerpt" => get_the_excerpt(),
                                                    "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                    "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                    "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                    "all_tags" => ct_post_taxonomies(),
                                                    "all_cats" => ct_post_taxonomies("cat"),
                                                    "cat" => get_the_category()[0]->cat_name,
                                                    "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                    "date" => get_the_date('j M, Y'),
                                                    "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                    "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                    "time_ago" => ct_post_time_ago(),
                                                    "views" => ct_get_post_view(),
                                                    "author" => get_the_author_meta('display_name', $post->post_author),
                                                    "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                                );

                                                $class = "";
                                                $aria_bool = "false";
                                                if($list_count == 0) {
                                                    $class = "active";
                                                    $aria_bool = "true";
                                                }
                                        ?>
                                                    <li>
                                                        <a href="<?php echo $list_posts["permalink"]; ?>">
                                                            <img class="d-flex " src="<?php echo $list_posts["thumbnail-img"]; ?>" alt="<?php echo $list_posts["title"]; ?>" decoding="async">
                                                            <?php echo $list_posts["title"]; ?>
                                                        </a>
                                                    </li>
                                        <?php
                                                $list_count++;
                                            }
                                            wp_reset_postdata();
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- All News -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="ts-grid-box category-item mb-0">
                        <div class="cust-ts-head mb-3 clearfix">
                            <h2 class="ts-title float-left">All News</h2>
                            <div class="float-right"><a href="<?php echo site_url(); ?>/all-news/" class="view-all-link">View All</a></div>
                        </div>
                        <div class="row">

                            <?php
                            $all_news_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 4,
                                'offset' => 6,
                                'orderby' => 'date', // Order by date (optional)
                                'order' => 'DESC', // Order by most recent (optional)
                            );
                            
                            $all_news = new WP_Query($all_news_args);
                            
                            if($all_news->have_posts()) {
                                while($all_news->have_posts()) {
                                    $all_news->the_post();

                                    $all_posts = array(
                                        "permalink" => get_permalink(),
                                        "title" => get_the_title(),
                                        "short_title" => title_short(150),
                                        "excerpt" => get_the_excerpt(),
                                        "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                        "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                        "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                        "all_tags" => ct_post_taxonomies(),
                                        "all_cats" => ct_post_taxonomies("cat"),
                                        "cat" => get_the_category()[0]->cat_name,
                                        "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                        "date" => get_the_date('j M, Y'),
                                        "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                        "modified" => date("d M, Y", strtotime($post->post_modified)),
                                        "time_ago" => ct_post_time_ago(),
                                        "views" => ct_get_post_view(),
                                        "author" => get_the_author_meta('display_name', $post->post_author),
                                        "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                    );
                            ?>
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="item">
                                            <a href="<?php echo $all_posts["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $all_posts["cat"]; ?></a>
                                            <div class="ts-post-thumb">
                                                <a href="<?php echo $all_posts["permalink"]; ?>"><img class="img-fluid " src="<?php echo $all_posts["medium-img"]; ?>" alt="<?php echo $all_posts["title"]; ?>" decoding="async"></a>
                                            </div>
                                            <div class="post-content">
                                                <h3 class="post-title"><a href="<?php echo $all_posts["permalink"]; ?>"><?php echo $all_posts["title"]; ?></a></h3>
                                                <a href="<?php echo $all_posts["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $all_posts["date"]; ?></a>
                                            </div>
                                        </div>
                                    </div>     
                            <?php
                                }
                                wp_reset_postdata(); // Reset post data
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Price Analysis & Statistics -->
            <div class="row mt-3 price-analysis-section">
                <div class="col-md-12">
                    <div class="ts-grid-box category-box-item-3 price-analysis mb-0">
                        <div class="cust-ts-head mb-3 clearfix">
                            <h2 class="ts-title float-left">Price Analysis</h2>
                            <div class="float-right"><a href="<?php echo site_url(); ?>/tag/cryptocurrency-price-analysis/" class="view-all-link">View All</a></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row mx-0">
                                    <?php
                                    $price_analysis_args = array(
                                        'post_type' => 'post',
                                        'tag' => 'cryptocurrency-price-analysis',
                                        'posts_per_page' => 8,
                                        'orderby' => 'date', // Order by date (optional)
                                        'order' => 'DESC', // Order by most recent (optional)
                                    );

                                    $price_analysis = new WP_Query($price_analysis_args);
                                    $price_analysis_count = $price_analysis->post_count;
                                    if($price_analysis->have_posts()) {
                                        while($price_analysis->have_posts()) {
                                            $price_analysis->the_post();

                                            $price_analysis_posts = array(
                                                "permalink" => get_permalink(),
                                                "title" => get_the_title(),
                                                "short_title" => title_short(150),
                                                "excerpt" => get_the_excerpt(),
                                                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                "all_tags" => ct_post_taxonomies(),
                                                "all_cats" => ct_post_taxonomies("cat"),
                                                "cat" => get_the_category()[0]->cat_name,
                                                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                "date" => get_the_date('j M, Y'),
                                                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                "time_ago" => ct_post_time_ago(),
                                                "views" => ct_get_post_view(),
                                                "author" => get_the_author_meta('display_name', $post->post_author),
                                                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                            );
                                    ?>
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="item mb-20">
                                                    <a href="<?php echo $price_analysis_posts["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $price_analysis_posts["cat"]; ?></a>
                                                    <div class="ts-post-thumb">
                                                        <a href="<?php echo $price_analysis_posts["permalink"]; ?>"><img class="img-fluid " src="<?php echo $price_analysis_posts["medium-img"]; ?>" alt="<?php echo $price_analysis_posts["title"]; ?>" decoding="async"></a>
                                                    </div>
                                                    <div class="post-content">
                                                        <h3 class="post-title"><a href="<?php echo $price_analysis_posts["permalink"]; ?>"><?php echo $price_analysis_posts["title"]; ?></a></h3>
                                                        <a href="<?php echo $price_analysis_posts["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $price_analysis_posts["date"]; ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                        wp_reset_postdata();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Press Release -->
            <div class="row mt-3 press-release-section">
                <div class="col-md-12">
                    <div class="ts-grid-box mb-0">
                        <div class="cust-ts-head mb-3 clearfix">
                            <h2 class="ts-title float-left">Press Release</h2>
                            <div class="float-right"><a href="<?php echo site_url(); ?>/press-releases/" class="view-all-link">View All</a></div>
                        </div>
                        <div class="row ts-post-style-2">
                            <?php
                            $press_realease_posts = array();

                            $press_release_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 7,
                                'category_name' => 'press-releases', // Filter by category slug
                                'orderby' => 'date', // Order by date (optional)
                                'order' => 'DESC', // Order by most recent (optional)
                            );
                            
                            $press_release_query = new WP_Query($press_release_args);
                            
                            if($press_release_query->have_posts()) {
                                while($press_release_query->have_posts()) {
                                    $press_release_query->the_post();

                                    $arr_val = array(
                                        "permalink" => get_permalink(),
                                        "title" => get_the_title(),
                                        "short_title" => title_short(150),
                                        "excerpt" => get_the_excerpt(),
                                        "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                        "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                        "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                        "all_tags" => ct_post_taxonomies(),
                                        "all_cats" => ct_post_taxonomies("cat"),
                                        "cat" => get_the_category()[0]->cat_name,
                                        "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                        "date" => get_the_date('j M, Y'),
                                        "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                        "modified" => date("d M, Y", strtotime($post->post_modified)),
                                        "time_ago" => ct_post_time_ago(),
                                        "views" => ct_get_post_view(),
                                        "author" => get_the_author_meta('display_name', $post->post_author),
                                        "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                    );

                                    $press_realease_posts[] = $arr_val;
                                }
                                wp_reset_postdata(); // Reset post data
                            }
                            ?>
                            <div class="col-lg-7 ">
                                <div class="featured-post h-100 ts-overlay-style">
                                    <?php
                                    for($box1_post = 0; $box1_post < 1; $box1_post++) {
                                        if(isset($press_realease_posts[$box1_post])) {
                                    ?>
                                        <div class="h-100 item " style="background-image:url(<?php echo $press_realease_posts[$box1_post]["img"]; ?>); background-repeat: no-repeat; background-size: cover;">
                                            <a href="<?php echo $press_realease_posts[$box1_post]["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $press_realease_posts[$box1_post]["cat"]; ?></a>
                                            <div class="overlay-post-content">
                                                <div class="post-content">
                                                    <h3 class="post-title md"><a href="<?php echo $press_realease_posts[$box1_post]["permalink"]; ?>"><?php echo $press_realease_posts[$box1_post]["title"]; ?></a></h3>
                                                    <ul class="post-meta-info">
                                                        <li><a href="<?php echo $press_realease_posts[$box1_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $press_realease_posts[$box1_post]["date"]; ?></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="ts-grid-content ts-list-post-box">
                                    <?php
                                    for($box2_post = 1; $box2_post <= 6; $box2_post++) {
                                        if(isset($press_realease_posts[$box2_post])) {

                                            if($box2_post == 1) {
                                                $box2_class = "pt-0 pb-2";
                                            } else {
                                                $box2_class = "py-2";
                                            }
                                    ?>
                                        <div class="item">
                                            <div class="media post-content <?php echo $box2_class; ?>">
                                            <a href="<?php echo $press_realease_posts[$box2_post]["permalink"]; ?>"><img class="d-flex " src="<?php echo $press_realease_posts[$box2_post]["thumbnail-img"]; ?>" alt="<?php echo $press_realease_posts[$box2_post]["title"]; ?>" decoding="async"></a>
                                                <div class="media-body align-self-center">
                                                    <h3 class="mb-0 post-title"><a href="<?php echo $press_realease_posts[$box2_post]["permalink"]; ?>"><?php echo $press_realease_posts[$box2_post]["title"]; ?></a></h3>
                                                    <a href="<?php echo $press_realease_posts[$box2_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $press_realease_posts[$box2_post]["date"]; ?></a>
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
                </div>
            </div>

            <!-- Most Popular -->
            <!-- <?php get_template_part('template-parts/popular-posts'); ?> -->
  
            <!-- Crypto Exchange -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="ts-grid-box category-item mb-0">
                        <div class="cust-ts-head mb-3 clearfix">
                            <h2 class="ts-title float-left">Crypto Exchange</h2>
                            <div class="float-right"><a href="<?php echo site_url(); ?>/crypto-exchanges/" class="view-all-link">View All</a></div>
                        </div>
                        <div class="row">
                            <?php
                            $crypto_exchange_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 4,
                                'category_name' => 'crypto-exchanges', // Filter by category slug
                                'orderby' => 'date', // Order by date (optional)
                                'order' => 'DESC', // Order by most recent (optional)
                            );
                            
                            $crypto_exchange_query = new WP_Query($crypto_exchange_args);
                            
                            if($crypto_exchange_query->have_posts()) {
                                while($crypto_exchange_query->have_posts()) {
                                    $crypto_exchange_query->the_post();

                                    $crypto_exchange_posts = array(
                                        "permalink" => get_permalink(),
                                        "title" => get_the_title(),
                                        "short_title" => title_short(150),
                                        "excerpt" => get_the_excerpt(),
                                        "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                        "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                        "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                        "all_tags" => ct_post_taxonomies(),
                                        "all_cats" => ct_post_taxonomies("cat"),
                                        "cat" => get_the_category()[0]->cat_name,
                                        "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                        "date" => get_the_date('j M, Y'),
                                        "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                        "modified" => date("d M, Y", strtotime($post->post_modified)),
                                        "time_ago" => ct_post_time_ago(),
                                        "views" => ct_get_post_view(),
                                        "author" => get_the_author_meta('display_name', $post->post_author),
                                        "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                    );
                            ?>
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="item">
                                            <div class="ts-post-thumb">
                                                <a href="<?php echo $crypto_exchange_posts["permalink"]; ?>"><img class="img-fluid " src="<?php echo $crypto_exchange_posts["medium-img"]; ?>" alt="<?php echo $crypto_exchange_posts["title"]; ?>" decoding="async"></a>
                                            </div>
                                            <div class="post-content">
                                                <h3 class="post-title"><a href="<?php echo $crypto_exchange_posts["permalink"]; ?>"><?php echo $crypto_exchange_posts["title"]; ?></a></h3>
                                                <a href="<?php echo $crypto_exchange_posts["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $crypto_exchange_posts["date"]; ?></a>
                                            </div>
                                        </div>
                                    </div>  
                            <?php
                                }
                                wp_reset_postdata(); // Reset post data
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Learn -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="ts-grid-box category-item mb-0">
                        <div class="cust-ts-head mb-3 clearfix">
                            <h2 class="ts-title float-left">Learn</h2>
                            <div class="float-right"><a href="<?php echo site_url(); ?>/learn/" class="view-all-link">View All</a></div>
                        </div>
                        <div class="row">

                            <?php
                            $learn_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 4,
                                'category_name' => 'learn', // Filter by category slug
                                'orderby' => 'date', // Order by date (optional)
                                'order' => 'DESC', // Order by most recent (optional)
                            );
                            
                            $learn_query = new WP_Query($learn_args);
                            
                            if($learn_query->have_posts()) {
                                while($learn_query->have_posts()) {
                                    $learn_query->the_post();

                                    $learn_posts = array(
                                        "permalink" => get_permalink(),
                                        "title" => get_the_title(),
                                        "short_title" => title_short(150),
                                        "excerpt" => get_the_excerpt(),
                                        "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                        "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                        "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                        "all_tags" => ct_post_taxonomies(),
                                        "all_cats" => ct_post_taxonomies("cat"),
                                        "cat" => get_the_category()[0]->cat_name,
                                        "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                        "date" => get_the_date('j M, Y'),
                                        "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                        "modified" => date("d M, Y", strtotime($post->post_modified)),
                                        "time_ago" => ct_post_time_ago(),
                                        "views" => ct_get_post_view(),
                                        "author" => get_the_author_meta('display_name', $post->post_author),
                                        "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                    );
                            ?>
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="item">
                                            <div class="ts-post-thumb">
                                                <a href="<?php echo $learn_posts["permalink"]; ?>"><img class="img-fluid " src="<?php echo $learn_posts["medium-img"]; ?>" alt="<?php echo $learn_posts["title"]; ?>" decoding="async"></a>
                                            </div>
                                            <div class="post-content">
                                                <h3 class="post-title"><a href="<?php echo $learn_posts["permalink"]; ?>"><?php echo $learn_posts["title"]; ?></a></h3>
                                                <a href="<?php echo $learn_posts["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $learn_posts["date"]; ?></a>
                                            </div>
                                        </div>
                                    </div>  
                            <?php
                                }
                                wp_reset_postdata(); // Reset post data
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            
            <!-- News -->
            <div class="row mt-3 bottom-news-section">
                <div class="col-md-12">
                    <div class="ts-grid-box bg-dark-item mb-3">
                        <div class="clearfix">
                            <h2 class="ts-title white float-left">News</h2>
                            <ul class="float-right mb-3 nav tab-menu-item">
                                <li class="nav-item"><a class="nav-link active" href="#altcoin-news" data-toggle="tab">Altcoin News</a></li>
                                <li class="nav-item"><a class="nav-link" href="#bitcoin-btc-news" data-toggle="tab">Bitcoin News</a></li>
                                <li class="nav-item"><a class="nav-link" href="#blockchain-news" data-toggle="tab">Blockchain News</a></li>
                                <li class="nav-item"><a class="nav-link" href="#cardano-ada-news" data-toggle="tab">Cardano News</a></li>
                                <li class="nav-item"><a class="nav-link" href="#defi-news" data-toggle="tab">DeFi News</a></li>
                                <li class="nav-item"><a class="nav-link" href="#nft-news" data-toggle="tab">NFTs News</a></li>
                                <li class="nav-item"><a class="nav-link" href="#regulation-news" data-toggle="tab">Regulation News</a></li>
                                <li class="nav-item"><a class="nav-link" href="#ripple-xrp-news" data-toggle="tab">Ripple News</a></li>
                            </ul>
                        </div>

                        <div class="tab-content ts-tabs-content news-cat__tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="altcoin-news">
                                <div class="row ts-grid-item ts-post-style-2">
                                    <?php
                                    $altcoin_posts = array();

                                    $altcoin_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'tag' => 'altcoin-news', // Filter by tag slug
                                        'orderby' => 'date', // Order by date (optional)
                                        'order' => 'DESC', // Order by most recent (optional)
                                    );
                                    
                                    $altcoin_query = new WP_Query($altcoin_args);
                                    
                                    if($altcoin_query->have_posts()) {
                                        while($altcoin_query->have_posts()) {
                                            $altcoin_query->the_post();

                                            $arr_val = array(
                                                "permalink" => get_permalink(),
                                                "title" => get_the_title(),
                                                "short_title" => title_short(150),
                                                "excerpt" => get_the_excerpt(),
                                                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                "all_tags" => ct_post_taxonomies(),
                                                "all_cats" => ct_post_taxonomies("cat"),
                                                "cat" => get_the_category()[0]->cat_name,
                                                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                "date" => get_the_date('j M, Y'),
                                                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                "time_ago" => ct_post_time_ago(),
                                                "views" => ct_get_post_view(),
                                                "author" => get_the_author_meta('display_name', $post->post_author),
                                                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                            );

                                            $altcoin_posts[] = $arr_val;
                                        }
                                        wp_reset_postdata(); // Reset post data
                                    }
                                    ?>
                                    <div class="col-lg-7 ">
                                        <div class="ts-overlay-style featured-post">
                                            <?php
                                            for($box1_post = 0; $box1_post < 1; $box1_post++) {
                                                if(isset($altcoin_posts[$box1_post])) {
                                            ?>
                                                <img src="<?php echo $altcoin_posts[$box1_post]["img"]; ?>" alt="<?php echo $altcoin_posts[$box1_post]["title"]; ?>" decoding="async">
                                                <div class="item ">
                                                    <a href="<?php echo $altcoin_posts[$box1_post]["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $altcoin_posts[$box1_post]["cat"]; ?></a>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md"><a href="<?php echo $altcoin_posts[$box1_post]["permalink"]; ?>"><?php echo $altcoin_posts[$box1_post]["title"]; ?></a></h3>
                                                            <ul class="post-meta-info">
                                                                <li><a href="<?php echo $altcoin_posts[$box1_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $altcoin_posts[$box1_post]["date"]; ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="ts-grid-content ts-list-post-box">
                                            <?php
                                            for($box2_post = 1; $box2_post <= 5; $box2_post++) {
                                                if(isset($altcoin_posts[$box2_post])) {
                                            ?>
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="<?php echo $altcoin_posts[$box2_post]["cat_url"]; ?>" class="ml-0 post-cat ts-orange-bg"><?php echo $altcoin_posts[$box2_post]["cat"]; ?></a>
                                                        <a href="<?php echo $altcoin_posts[$box2_post]["permalink"]; ?>"><img class="img-fluid " src="<?php echo $altcoin_posts[$box2_post]["medium-img"]; ?>" alt="<?php echo $altcoin_posts[$box2_post]["title"]; ?>" decoding="async"></a>
													</div>
                                                    <div class="post-content py-2">
                                                        <h3 class="mb-0 post-title"><a href="<?php echo $altcoin_posts[$box2_post]["permalink"]; ?>"><?php echo $altcoin_posts[$box2_post]["title"]; ?></a></h3>
                                                        <a href="<?php echo $altcoin_posts[$box2_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $altcoin_posts[$box2_post]["date"]; ?></a>
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
                            <div role="tabpanel" class="tab-pane fade" id="bitcoin-btc-news">
                                <div class="row ts-grid-item ts-post-style-2">
                                    <?php
                                    $bitcoin_posts = array();

                                    $bitcoin_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'tag' => 'bitcoin-btc-news', // Filter by tag slug
                                        'orderby' => 'date', // Order by date (optional)
                                        'order' => 'DESC', // Order by most recent (optional)
                                    );
                                    
                                    $bitcoin_query = new WP_Query($bitcoin_args);
                                    
                                    if($bitcoin_query->have_posts()) {
                                        while($bitcoin_query->have_posts()) {
                                            $bitcoin_query->the_post();

                                            $arr_val = array(
                                                "permalink" => get_permalink(),
                                                "title" => get_the_title(),
                                                "short_title" => title_short(150),
                                                "excerpt" => get_the_excerpt(),
                                                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                "all_tags" => ct_post_taxonomies(),
                                                "all_cats" => ct_post_taxonomies("cat"),
                                                "cat" => get_the_category()[0]->cat_name,
                                                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                "date" => get_the_date('j M, Y'),
                                                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                "time_ago" => ct_post_time_ago(),
                                                "views" => ct_get_post_view(),
                                                "author" => get_the_author_meta('display_name', $post->post_author),
                                                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                            );

                                            $bitcoin_posts[] = $arr_val;
                                        }
                                        wp_reset_postdata(); // Reset post data
                                    }
                                    ?>
                                    <div class="col-lg-7 ">
                                        <div class="ts-overlay-style featured-post">
                                            <?php
                                            for($box1_post = 0; $box1_post < 1; $box1_post++) {
                                                if(isset($bitcoin_posts[$box1_post])) {
                                            ?>
                                                <img src="<?php echo $bitcoin_posts[$box1_post]["img"]; ?>" alt="<?php echo $bitcoin_posts[$box1_post]["title"]; ?>" decoding="async">
                                                <div class="item ">
                                                    <a href="<?php echo $bitcoin_posts[$box1_post]["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $bitcoin_posts[$box1_post]["cat"]; ?></a>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md"><a href="<?php echo $bitcoin_posts[$box1_post]["permalink"]; ?>"><?php echo $bitcoin_posts[$box1_post]["title"]; ?></a></h3>
                                                            <ul class="post-meta-info">
                                                                <li><a href="<?php echo $bitcoin_posts[$box1_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $bitcoin_posts[$box1_post]["date"]; ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="ts-grid-content ts-list-post-box">
                                            <?php
                                            for($box2_post = 1; $box2_post <= 5; $box2_post++) {
                                                if(isset($bitcoin_posts[$box2_post])) {
                                            ?>
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="<?php echo $bitcoin_posts[$box2_post]["cat_url"]; ?>" class="ml-0 post-cat ts-orange-bg"><?php echo $bitcoin_posts[$box2_post]["cat"]; ?></a>
                                                        <a href="<?php echo $bitcoin_posts[$box2_post]["permalink"]; ?>"><img class="img-fluid " src="<?php echo $bitcoin_posts[$box2_post]["medium-img"]; ?>" alt="<?php echo $bitcoin_posts[$box2_post]["title"]; ?>" decoding="async"></a>
													</div>
                                                    <div class="post-content py-2">
                                                        <h3 class="mb-0 post-title"><a href="<?php echo $bitcoin_posts[$box2_post]["permalink"]; ?>"><?php echo $bitcoin_posts[$box2_post]["title"]; ?></a></h3>
                                                        <a href="<?php echo $bitcoin_posts[$box2_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $bitcoin_posts[$box2_post]["date"]; ?></a>
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
                            <div role="tabpanel" class="tab-pane fade" id="blockchain-news">
                                <div class="row ts-grid-item ts-post-style-2">
                                    <?php
                                    $blockchain_posts = array();

                                    $blockchain_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'tag' => 'blockchain-news', // Filter by tag slug
                                        'orderby' => 'date', // Order by date (optional)
                                        'order' => 'DESC', // Order by most recent (optional)
                                    );
                                    
                                    $blockchain_query = new WP_Query($blockchain_args);
                                    
                                    if($blockchain_query->have_posts()) {
                                        while($blockchain_query->have_posts()) {
                                            $blockchain_query->the_post();

                                            $arr_val = array(
                                                "permalink" => get_permalink(),
                                                "title" => get_the_title(),
                                                "short_title" => title_short(150),
                                                "excerpt" => get_the_excerpt(),
                                                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                "all_tags" => ct_post_taxonomies(),
                                                "all_cats" => ct_post_taxonomies("cat"),
                                                "cat" => get_the_category()[0]->cat_name,
                                                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                "date" => get_the_date('j M, Y'),
                                                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                "time_ago" => ct_post_time_ago(),
                                                "views" => ct_get_post_view(),
                                                "author" => get_the_author_meta('display_name', $post->post_author),
                                                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                            );

                                            $blockchain_posts[] = $arr_val;
                                        }
                                        wp_reset_postdata(); // Reset post data
                                    }
                                    ?>
                                    <div class="col-lg-7 ">
                                        <div class="ts-overlay-style featured-post">
                                            <?php
                                            for($box1_post = 0; $box1_post < 1; $box1_post++) {
                                                if(isset($blockchain_posts[$box1_post])) {
                                            ?>
                                                <img src="<?php echo $blockchain_posts[$box1_post]["img"]; ?>" alt="<?php echo $blockchain_posts[$box1_post]["title"]; ?>" decoding="async">
                                                <div class="item ">
                                                    <a href="<?php echo $blockchain_posts[$box1_post]["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $blockchain_posts[$box1_post]["cat"]; ?></a>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md"><a href="<?php echo $blockchain_posts[$box1_post]["permalink"]; ?>"><?php echo $blockchain_posts[$box1_post]["title"]; ?></a></h3>
                                                            <ul class="post-meta-info">
                                                                <li><a href="<?php echo $blockchain_posts[$box1_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $blockchain_posts[$box1_post]["date"]; ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="ts-grid-content ts-list-post-box">
                                            <?php
                                            for($box2_post = 1; $box2_post <= 5; $box2_post++) {
                                                if(isset($blockchain_posts[$box2_post])) {
                                            ?>
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="<?php echo $blockchain_posts[$box2_post]["cat_url"]; ?>" class="ml-0 post-cat ts-orange-bg"><?php echo $blockchain_posts[$box2_post]["cat"]; ?></a>
                                                        <a href="<?php echo $blockchain_posts[$box2_post]["permalink"]; ?>"><img class="img-fluid " src="<?php echo $blockchain_posts[$box2_post]["medium-img"]; ?>" alt="<?php echo $blockchain_posts[$box2_post]["title"]; ?>" decoding="async"></a>
													</div>
                                                    <div class="post-content py-2">
                                                        <h3 class="mb-0 post-title"><a href="<?php echo $blockchain_posts[$box2_post]["permalink"]; ?>"><?php echo $blockchain_posts[$box2_post]["title"]; ?></a></h3>
                                                        <a href="<?php echo $blockchain_posts[$box2_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $blockchain_posts[$box2_post]["date"]; ?></a>
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
                            <div role="tabpanel" class="tab-pane fade" id="cardano-ada-news">
                                <div class="row ts-grid-item ts-post-style-2">
                                    <?php
                                    $cardano_posts = array();

                                    $cardano_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'tag' => 'cardano-ada-news', // Filter by tag slug
                                        'orderby' => 'date', // Order by date (optional)
                                        'order' => 'DESC', // Order by most recent (optional)
                                    );
                                    
                                    $cardano_query = new WP_Query($cardano_args);
                                    
                                    if($cardano_query->have_posts()) {
                                        while($cardano_query->have_posts()) {
                                            $cardano_query->the_post();

                                            $arr_val = array(
                                                "permalink" => get_permalink(),
                                                "title" => get_the_title(),
                                                "short_title" => title_short(150),
                                                "excerpt" => get_the_excerpt(),
                                                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                "all_tags" => ct_post_taxonomies(),
                                                "all_cats" => ct_post_taxonomies("cat"),
                                                "cat" => get_the_category()[0]->cat_name,
                                                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                "date" => get_the_date('j M, Y'),
                                                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                "time_ago" => ct_post_time_ago(),
                                                "views" => ct_get_post_view(),
                                                "author" => get_the_author_meta('display_name', $post->post_author),
                                                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                            );

                                            $cardano_posts[] = $arr_val;
                                        }
                                        wp_reset_postdata(); // Reset post data
                                    }
                                    ?>
                                    <div class="col-lg-7 ">
                                        <div class="ts-overlay-style featured-post">
                                            <?php
                                            for($box1_post = 0; $box1_post < 1; $box1_post++) {
                                                if(isset($cardano_posts[$box1_post])) {
                                            ?>
                                                <img src="<?php echo $cardano_posts[$box1_post]["img"]; ?>" alt="<?php echo $cardano_posts[$box1_post]["title"]; ?>" decoding="async">
                                                <div class="item ">
                                                    <a href="<?php echo $cardano_posts[$box1_post]["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $cardano_posts[$box1_post]["cat"]; ?></a>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md"><a href="<?php echo $cardano_posts[$box1_post]["permalink"]; ?>"><?php echo $cardano_posts[$box1_post]["title"]; ?></a></h3>
                                                            <ul class="post-meta-info">
                                                                <li><a href="<?php echo $cardano_posts[$box1_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $cardano_posts[$box1_post]["date"]; ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="ts-grid-content ts-list-post-box">
                                            <?php
                                            for($box2_post = 1; $box2_post <= 5; $box2_post++) {
                                                if(isset($cardano_posts[$box2_post])) {
                                            ?>
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="<?php echo $cardano_posts[$box2_post]["cat_url"]; ?>" class="ml-0 post-cat ts-orange-bg"><?php echo $cardano_posts[$box2_post]["cat"]; ?></a>
                                                        <a href="<?php echo $cardano_posts[$box2_post]["permalink"]; ?>"><img class="img-fluid " src="<?php echo $cardano_posts[$box2_post]["medium-img"]; ?>" alt="<?php echo $cardano_posts[$box2_post]["title"]; ?>" decoding="async"></a>
													</div>
                                                    <div class="post-content py-2">
                                                        <h3 class="mb-0 post-title"><a href="<?php echo $cardano_posts[$box2_post]["permalink"]; ?>"><?php echo $cardano_posts[$box2_post]["title"]; ?></a></h3>
                                                        <a href="<?php echo $cardano_posts[$box2_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $cardano_posts[$box2_post]["date"]; ?></a>
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
                            <div role="tabpanel" class="tab-pane fade" id="defi-news">
                                <div class="row ts-grid-item ts-post-style-2">
                                    <?php
                                    $defi_posts = array();

                                    $defi_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'tag' => 'defi-news', // Filter by tag slug
                                        'orderby' => 'date', // Order by date (optional)
                                        'order' => 'DESC', // Order by most recent (optional)
                                    );
                                    
                                    $defi_query = new WP_Query($defi_args);
                                    
                                    if($defi_query->have_posts()) {
                                        while($defi_query->have_posts()) {
                                            $defi_query->the_post();

                                            $arr_val = array(
                                                "permalink" => get_permalink(),
                                                "title" => get_the_title(),
                                                "short_title" => title_short(150),
                                                "excerpt" => get_the_excerpt(),
                                                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                "all_tags" => ct_post_taxonomies(),
                                                "all_cats" => ct_post_taxonomies("cat"),
                                                "cat" => get_the_category()[0]->cat_name,
                                                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                "date" => get_the_date('j M, Y'),
                                                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                "time_ago" => ct_post_time_ago(),
                                                "views" => ct_get_post_view(),
                                                "author" => get_the_author_meta('display_name', $post->post_author),
                                                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                            );

                                            $defi_posts[] = $arr_val;
                                        }
                                        wp_reset_postdata(); // Reset post data
                                    }
                                    ?>
                                    <div class="col-lg-7 ">
                                        <div class="ts-overlay-style featured-post">
                                            <?php
                                            for($box1_post = 0; $box1_post < 1; $box1_post++) {
                                                if(isset($defi_posts[$box1_post])) {
                                            ?>
                                                <img src="<?php echo $defi_posts[$box1_post]["img"]; ?>" alt="<?php echo $defi_posts[$box1_post]["title"]; ?>" decoding="async">
                                                <div class="item ">
                                                    <a href="<?php echo $defi_posts[$box1_post]["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $defi_posts[$box1_post]["cat"]; ?></a>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md"><a href="<?php echo $defi_posts[$box1_post]["permalink"]; ?>"><?php echo $defi_posts[$box1_post]["title"]; ?></a></h3>
                                                            <ul class="post-meta-info">
                                                                <li><a href="<?php echo $defi_posts[$box1_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $defi_posts[$box1_post]["date"]; ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="ts-grid-content ts-list-post-box">
                                            <?php
                                            for($box2_post = 1; $box2_post <= 5; $box2_post++) {
                                                if(isset($defi_posts[$box2_post])) {
                                            ?>
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="<?php echo $defi_posts[$box2_post]["cat_url"]; ?>" class="ml-0 post-cat ts-orange-bg"><?php echo $defi_posts[$box2_post]["cat"]; ?></a>
                                                        <a href="<?php echo $defi_posts[$box2_post]["permalink"]; ?>"><img class="img-fluid " src="<?php echo $defi_posts[$box2_post]["medium-img"]; ?>" alt="<?php echo $defi_posts[$box2_post]["title"]; ?>" decoding="async"></a>
													</div>
                                                    <div class="post-content py-2">
                                                        <h3 class="mb-0 post-title"><a href="<?php echo $defi_posts[$box2_post]["permalink"]; ?>"><?php echo $defi_posts[$box2_post]["title"]; ?></a></h3>
                                                        <a href="<?php echo $defi_posts[$box2_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $defi_posts[$box2_post]["date"]; ?></a>
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
                            <div role="tabpanel" class="tab-pane fade" id="nft-news">
                                <div class="row ts-grid-item ts-post-style-2">
                                    <?php
                                    $nft_posts = array();

                                    $nft_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'tag' => 'nft-news', // Filter by tag slug
                                        'orderby' => 'date', // Order by date (optional)
                                        'order' => 'DESC', // Order by most recent (optional)
                                    );
                                    
                                    $nft_query = new WP_Query($nft_args);
                                    
                                    if($nft_query->have_posts()) {
                                        while($nft_query->have_posts()) {
                                            $nft_query->the_post();

                                            $arr_val = array(
                                                "permalink" => get_permalink(),
                                                "title" => get_the_title(),
                                                "short_title" => title_short(150),
                                                "excerpt" => get_the_excerpt(),
                                                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                "all_tags" => ct_post_taxonomies(),
                                                "all_cats" => ct_post_taxonomies("cat"),
                                                "cat" => get_the_category()[0]->cat_name,
                                                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                "date" => get_the_date('j M, Y'),
                                                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                "time_ago" => ct_post_time_ago(),
                                                "views" => ct_get_post_view(),
                                                "author" => get_the_author_meta('display_name', $post->post_author),
                                                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                            );

                                            $nft_posts[] = $arr_val;
                                        }
                                        wp_reset_postdata(); // Reset post data
                                    }
                                    ?>
                                    <div class="col-lg-7 ">
                                        <div class="ts-overlay-style featured-post">
                                            <?php
                                            for($box1_post = 0; $box1_post < 1; $box1_post++) {
                                                if(isset($nft_posts[$box1_post])) {
                                            ?>
                                                <img src="<?php echo $nft_posts[$box1_post]["img"]; ?>" alt="<?php echo $nft_posts[$box1_post]["title"]; ?>" decoding="async">
                                                <div class="item ">
                                                    <a href="<?php echo $nft_posts[$box1_post]["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $nft_posts[$box1_post]["cat"]; ?></a>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md"><a href="<?php echo $nft_posts[$box1_post]["permalink"]; ?>"><?php echo $nft_posts[$box1_post]["title"]; ?></a></h3>
                                                            <ul class="post-meta-info">
                                                                <li><a href="<?php echo $nft_posts[$box1_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $nft_posts[$box1_post]["date"]; ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="ts-grid-content ts-list-post-box">
                                            <?php
                                            for($box2_post = 1; $box2_post <= 5; $box2_post++) {
                                                if(isset($nft_posts[$box2_post])) {
                                            ?>
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="<?php echo $nft_posts[$box2_post]["cat_url"]; ?>" class="ml-0 post-cat ts-orange-bg"><?php echo $nft_posts[$box2_post]["cat"]; ?></a>
                                                        <a href="<?php echo $nft_posts[$box2_post]["permalink"]; ?>"><img class="img-fluid " src="<?php echo $nft_posts[$box2_post]["medium-img"]; ?>" alt="<?php echo $nft_posts[$box2_post]["title"]; ?>" decoding="async"></a>
													</div>
                                                    <div class="post-content py-2">
                                                        <h3 class="mb-0 post-title"><a href="<?php echo $nft_posts[$box2_post]["permalink"]; ?>"><?php echo $nft_posts[$box2_post]["title"]; ?></a></h3>
                                                        <a href="<?php echo $nft_posts[$box2_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $nft_posts[$box2_post]["date"]; ?></a>
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
                            <div role="tabpanel" class="tab-pane fade" id="regulation-news">
                                <div class="row ts-grid-item ts-post-style-2">
                                    <?php
                                    $regulation_posts = array();

                                    $regulation_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'tag' => 'regulation-news', // Filter by tag slug
                                        'orderby' => 'date', // Order by date (optional)
                                        'order' => 'DESC', // Order by most recent (optional)
                                    );
                                    
                                    $regulation_query = new WP_Query($regulation_args);
                                    
                                    if($regulation_query->have_posts()) {
                                        while($regulation_query->have_posts()) {
                                            $regulation_query->the_post();

                                            $arr_val = array(
                                                "permalink" => get_permalink(),
                                                "title" => get_the_title(),
                                                "short_title" => title_short(150),
                                                "excerpt" => get_the_excerpt(),
                                                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                "all_tags" => ct_post_taxonomies(),
                                                "all_cats" => ct_post_taxonomies("cat"),
                                                "cat" => get_the_category()[0]->cat_name,
                                                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                "date" => get_the_date('j M, Y'),
                                                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                "time_ago" => ct_post_time_ago(),
                                                "views" => ct_get_post_view(),
                                                "author" => get_the_author_meta('display_name', $post->post_author),
                                                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                            );

                                            $regulation_posts[] = $arr_val;
                                        }
                                        wp_reset_postdata(); // Reset post data
                                    }
                                    ?>
                                    <div class="col-lg-7 ">
                                        <div class="ts-overlay-style featured-post">
                                            <?php
                                            for($box1_post = 0; $box1_post < 1; $box1_post++) {
                                                if(isset($regulation_posts[$box1_post])) {
                                            ?>
                                                <img src="<?php echo $regulation_posts[$box1_post]["img"]; ?>" alt="<?php echo $regulation_posts[$box1_post]["title"]; ?>" decoding="async">
                                                <div class="item ">
                                                    <a href="<?php echo $regulation_posts[$box1_post]["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $regulation_posts[$box1_post]["cat"]; ?></a>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md"><a href="<?php echo $regulation_posts[$box1_post]["permalink"]; ?>"><?php echo $regulation_posts[$box1_post]["title"]; ?></a></h3>
                                                            <ul class="post-meta-info">
                                                                <li><a href="<?php echo $regulation_posts[$box1_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $regulation_posts[$box1_post]["date"]; ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="ts-grid-content ts-list-post-box">
                                            <?php
                                            for($box2_post = 1; $box2_post <= 5; $box2_post++) {
                                                if(isset($regulation_posts[$box2_post])) {
                                            ?>
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="<?php echo $regulation_posts[$box2_post]["cat_url"]; ?>" class="ml-0 post-cat ts-orange-bg"><?php echo $regulation_posts[$box2_post]["cat"]; ?></a>
                                                        <a href="<?php echo $regulation_posts[$box2_post]["permalink"]; ?>"><img class="img-fluid " src="<?php echo $regulation_posts[$box2_post]["medium-img"]; ?>" alt="<?php echo $regulation_posts[$box2_post]["title"]; ?>" decoding="async"></a>
													</div>
                                                    <div class="post-content py-2">
                                                        <h3 class="mb-0 post-title"><a href="<?php echo $regulation_posts[$box2_post]["permalink"]; ?>"><?php echo $regulation_posts[$box2_post]["title"]; ?></a></h3>
                                                        <a href="<?php echo $regulation_posts[$box2_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $regulation_posts[$box2_post]["date"]; ?></a>
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
                            <div role="tabpanel" class="tab-pane fade" id="ripple-xrp-news">
                                <div class="row ts-grid-item ts-post-style-2">
                                    <?php
                                    $ripple_posts = array();

                                    $ripple_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'tag' => 'ripple-xrp-news', // Filter by tag slug
                                        'orderby' => 'date', // Order by date (optional)
                                        'order' => 'DESC', // Order by most recent (optional)
                                    );
                                    
                                    $ripple_query = new WP_Query($ripple_args);
                                    
                                    if($ripple_query->have_posts()) {
                                        while($ripple_query->have_posts()) {
                                            $ripple_query->the_post();

                                            $arr_val = array(
                                                "permalink" => get_permalink(),
                                                "title" => get_the_title(),
                                                "short_title" => title_short(150),
                                                "excerpt" => get_the_excerpt(),
                                                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                                "thumbnail-img" => get_the_post_thumbnail_url($post->ID, "thumbnail"),
                                                "medium-img" => get_the_post_thumbnail_url($post->ID, "medium"),
                                                "all_tags" => ct_post_taxonomies(),
                                                "all_cats" => ct_post_taxonomies("cat"),
                                                "cat" => get_the_category()[0]->cat_name,
                                                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                                "date" => get_the_date('j M, Y'),
                                                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                                "modified" => date("d M, Y", strtotime($post->post_modified)),
                                                "time_ago" => ct_post_time_ago(),
                                                "views" => ct_get_post_view(),
                                                "author" => get_the_author_meta('display_name', $post->post_author),
                                                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                            );

                                            $ripple_posts[] = $arr_val;
                                        }
                                        wp_reset_postdata(); // Reset post data
                                    }
                                    ?>
                                    <div class="col-lg-7 ">
                                        <div class="ts-overlay-style featured-post">
                                            <?php
                                            for($box1_post = 0; $box1_post < 1; $box1_post++) {
                                                if(isset($ripple_posts[$box1_post])) {
                                            ?>
                                                <img src="<?php echo $ripple_posts[$box1_post]["img"]; ?>" alt="<?php echo $ripple_posts[$box1_post]["title"]; ?>" decoding="async">
                                                <div class="item ">
                                                    <a href="<?php echo $ripple_posts[$box1_post]["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $ripple_posts[$box1_post]["cat"]; ?></a>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md"><a href="<?php echo $ripple_posts[$box1_post]["permalink"]; ?>"><?php echo $ripple_posts[$box1_post]["title"]; ?></a></h3>
                                                            <ul class="post-meta-info">
                                                                <li><a href="<?php echo $ripple_posts[$box1_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $ripple_posts[$box1_post]["date"]; ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="ts-grid-content ts-list-post-box">
                                            <?php
                                            for($box2_post = 1; $box2_post <= 5; $box2_post++) {
                                                if(isset($ripple_posts[$box2_post])) {
                                            ?>
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="<?php echo $ripple_posts[$box2_post]["cat_url"]; ?>" class="ml-0 post-cat ts-orange-bg"><?php echo $ripple_posts[$box2_post]["cat"]; ?></a>
                                                        <a href="<?php echo $ripple_posts[$box2_post]["permalink"]; ?>"><img class="img-fluid " src="<?php echo $ripple_posts[$box2_post]["medium-img"]; ?>" alt="<?php echo $ripple_posts[$box2_post]["title"]; ?>" decoding="async"></a>
													</div>
                                                    <div class="post-content py-2">
                                                        <h3 class="mb-0 post-title"><a href="<?php echo $ripple_posts[$box2_post]["permalink"]; ?>"><?php echo $ripple_posts[$box2_post]["title"]; ?></a></h3>
                                                        <a href="<?php echo $ripple_posts[$box2_post]["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $ripple_posts[$box2_post]["date"]; ?></a>
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
                        </div>
                    </div>
                </div>
            </div>
            
		</div>
	</section>

<?php get_footer(); ?>