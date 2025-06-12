<?php get_header(); ?>

    <?php
    $s = get_search_query();
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 9,
        'paged' => $paged
    );

    if($s) {
        $args["s"] = $s;
    }

    $the_query = new WP_Query($args);
    if($the_query->have_posts()) {
    ?>
        <br><br>
        <div class="">
            <div class="container">
                <ul class="breadcumb-menu">
                    <li><a href="#!">Search Results for:</a></li>
                    <li class="fs-4"><?= _e(get_query_var('s')); ?></li>
                </ul>
            </div>
        </div>

        <section class="mt-4 space-extra-bottom">
            <div class="container">
                <div class="row gy-30 mb-30">
                    <?php
                    while($the_query->have_posts()) {
                        $the_query->the_post();

                        $search_posts = array(
                            "permalink" => get_permalink(),
                            "title" => get_the_title(),
                            "short_title" => title_short(150),
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

                        if($search_posts["cat"] == "UAE") {
                            $data_theme_color = "#007BFF";
                            $data_color = "#000000";
                            $cust_cls = "";
                        } elseif($search_posts["cat"] == "இந்தியா") {
                            $data_theme_color = "#FF9500";
                            $data_color = "#000000";
                            $cust_cls = "";
                        } elseif($search_posts["cat"] == "உலகம்") {
                            $data_theme_color = "#4E4BD0";
                            $data_color = "#ffffff";
                            $cust_cls = "";
                        } elseif($search_posts["cat"] == "துபாய்") {
                            $data_theme_color = "#00D084";
                            $data_color = "#ffffff";
                            $cust_cls = "";
                        } elseif($search_posts["cat"] == "பொழுதுபோக்கு") {
                            $data_theme_color = "#9f2100";
                            $data_color = "#ffffff";
                            $cust_cls = "cust-bg";
                        }
                    ?>
                        <div class="col-xl-4 col-sm-6">
                            <div class="blog-style1">
                                <div class="blog-img">
                                    <img src="<?= $search_posts["392-310"]; ?>" alt="<?= $search_posts["title"]; ?>">
                                    <a data-theme-color="<?= $data_theme_color; ?>" data-text-color="<?= $data_color; ?>" href="<?= $search_posts["cat_url"]; ?>" class="category <?= $cust_cls; ?>"><?= $search_posts["cat"]; ?></a>
                                </div>
                                <h3 class="box-title-22"><a class="hover-line" href="<?= $search_posts["permalink"]; ?>"><?= $search_posts["title"]; ?></a></h3>
                                <div class="blog-meta">
                                    <!-- <a href="<?= $search_posts["author_url"]; ?>"><i class="far fa-user"></i>By - <?= $search_posts["author"]; ?></a> -->
                                    <a href="<?= $search_posts["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $search_posts["date"]; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                
                <br><?php tamilbuzz_pagination(); ?><br>

            </div>
        </section>
    
    <?php
    } else {
    ?>
        <br><br>
        <div class="">
            <div class="container">
                <ul class="breadcumb-menu">
                    <li><a href="#!">Nothing Found</a></li>
                    <li class="fs-4">Sorry, but nothing matched your search criteria. Please try again with some different keywords.</li>
                </ul>
            </div>
        </div>
        <br><br>
    <?php
    }
    ?>

<?php get_footer(); ?>