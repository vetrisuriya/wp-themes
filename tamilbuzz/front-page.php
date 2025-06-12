<?= get_header(); ?>


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
                "short_title" => title_short(150),
                "medium_title" => title_short(200),
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


    // entertainment news
    $entertainment_news = [];
    foreach($all_posts as $all_posts_key => $all_posts_val) {
        if($all_posts_val["cat"] == "பொழுதுபோக்கு") {
            $entertainment_news[] = $all_posts_val;
        }
    }

    // all news
    $all_news = [];
    foreach($all_posts as $all_posts_key => $all_posts_val) {
        if($all_posts_val["cat"] != "Uncategorized" && $all_posts_val["cat"] != "பொழுதுபோக்கு") {
            $all_news[] = $all_posts_val;
        }
    }
    ?>


    <!-- section 1 -->
    <section class="space">
        <div class="container">
            <div class="row">

                <?php
                for($box1_post = 0; $box1_post < 1; $box1_post++) {
                    if(isset($all_posts[$box1_post])) {

                        if($all_posts[$box1_post]["cat"] == "UAE") {
                            $data_theme_color = "#007BFF";
                            $data_color = "#000000";
                            $cust_cls = "";
                        } elseif($all_posts[$box1_post]["cat"] == "இந்தியா") {
                            $data_theme_color = "#FF9500";
                            $data_color = "#000000";
                            $cust_cls = "";
                        } elseif($all_posts[$box1_post]["cat"] == "உலகம்") {
                            $data_theme_color = "#4E4BD0";
                            $data_color = "#ffffff";
                            $cust_cls = "";
                        } elseif($all_posts[$box1_post]["cat"] == "துபாய்") {
                            $data_theme_color = "#00D084";
                            $data_color = "#ffffff";
                            $cust_cls = "";
                        } elseif($all_posts[$box1_post]["cat"] == "பொழுதுபோக்கு") {
                            $data_theme_color = "#9f2100";
                            $data_color = "#ffffff";
                            $cust_cls = "cust-bg";
                        }
                ?>
                        <div class="col-xl-6 mb-4 mb-xl-0">
                            <div class="row gy-4">
                                <div class="dark-theme img-overlay2">
                                    <div class="blog-style3">
                                        <div class="blog-img">
                                            <img src="<?= $all_posts[$box1_post]["600-464"]; ?>" alt="<?= $all_posts[$box1_post]["title"]; ?>">
                                        </div>
                                        <div class="blog-content">
                                        <a data-theme-color="<?= $data_theme_color; ?>" data-text-color="<?= $data_color; ?>" href="<?= $all_posts[$box1_post]["cat_url"]; ?>" class="category <?= $cust_cls; ?>"><?= $all_posts[$box1_post]["cat"]; ?></a>
                                            <h3 class="box-title-30"><a class="hover-line" href="<?= $all_posts[$box1_post]["permalink"]; ?>"><?= $all_posts[$box1_post]["title"]; ?></a></h3>
                                            <div class="blog-meta">
                                                <!-- <a href="<?= $all_posts[$box1_post]["author_url"]; ?>"><i class="far fa-user"></i>By - <?= $all_posts[$box1_post]["author"]; ?></a> -->
                                                <a href="<?= $all_posts[$box1_post]["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $all_posts[$box1_post]["date"]; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="col-xl-6">
                    <div class="row gy-4">
                        <?php
                        for($box2_post = 1; $box2_post <= 4; $box2_post++) {
                            if(isset($all_posts[$box2_post])) {

                                if($all_posts[$box2_post]["cat"] == "UAE") {
                                    $data_theme_color = "#007BFF";
                                    $data_color = "#000000";
                                    $cust_cls = "";
                                } elseif($all_posts[$box2_post]["cat"] == "இந்தியா") {
                                    $data_theme_color = "#FF9500";
                                    $data_color = "#000000";
                                    $cust_cls = "";
                                } elseif($all_posts[$box2_post]["cat"] == "உலகம்") {
                                    $data_theme_color = "#4E4BD0";
                                    $data_color = "#ffffff";
                                    $cust_cls = "";
                                } elseif($all_posts[$box2_post]["cat"] == "துபாய்") {
                                    $data_theme_color = "#00D084";
                                    $data_color = "#ffffff";
                                    $cust_cls = "";
                                } elseif($all_posts[$box2_post]["cat"] == "பொழுதுபோக்கு") {
                                    $data_theme_color = "#9f2100";
                                    $data_color = "#ffffff";
                                    $cust_cls = "cust-bg";
                                }
                        ?>
                                <div class="col-xl-6 col-md-6 dark-theme img-overlay2">
                                    <div class="blog-style3">
                                        <div class="blog-img">
                                            <img src="<?= $all_posts[$box2_post]["288-220"]; ?>" alt="<?= $all_posts[$box2_post]["title"]; ?>">
                                        </div>
                                        <div class="blog-content">
                                            <a data-theme-color="<?= $data_theme_color; ?>" data-text-color="<?= $data_color; ?>" href="<?= $all_posts[$box2_post]["cat_url"]; ?>" class="category <?= $cust_cls; ?>"><?= $all_posts[$box2_post]["cat"]; ?></a>
                                            <h3 class="box-title-18"><a class="hover-line" href="<?= $all_posts[$box2_post]["permalink"]; ?>"><?= $all_posts[$box2_post]["short_title"]; ?></a></h3>
                                            <div class="blog-meta">
                                                <!-- <a href="<?= $all_posts[$box2_post]["author_url"]; ?>"><i class="far fa-user"></i>By - <?= $all_posts[$box2_post]["author"]; ?></a> -->
                                                <a href="<?= $all_posts[$box2_post]["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $all_posts[$box2_post]["date"]; ?></a>
                                            </div>
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
    </section>

    <!-- section 2 -->
    <div class="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">பிரபலமான செய்தி</h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="icon-box">
                            <button data-slick-prev="#blog-slide1" class="slick-arrow default" aria-label="Left Post"><i class="far fa-arrow-left"></i></button>
                            <button data-slick-next="#blog-slide1" class="slick-arrow default" aria-label="Right Post"><i class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row th-carousel" id="blog-slide1" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2">
                <?php
                $trending_post_query = new WP_Query(array(
                    'posts_per_page' => 10,
                    // 'meta_key' => 'wpb_post_views_count',
                    // 'orderby' => 'meta_value_num',
                    // 'order' => 'DESC'
                ));

                if($trending_post_query->have_posts()) {
                    while($trending_post_query->have_posts()) {
                        $trending_post_query->the_post();
            
                        $trending_posts = array(
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

                        if($trending_posts["cat"] == "UAE") {
                            $data_theme_color = "#007BFF";
                            $data_color = "#000000";
                            $cust_cls = "";
                        } elseif($trending_posts["cat"] == "இந்தியா") {
                            $data_theme_color = "#FF9500";
                            $data_color = "#000000";
                            $cust_cls = "";
                        } elseif($trending_posts["cat"] == "உலகம்") {
                            $data_theme_color = "#4E4BD0";
                            $data_color = "#ffffff";
                            $cust_cls = "";
                        } elseif($trending_posts["cat"] == "துபாய்") {
                            $data_theme_color = "#00D084";
                            $data_color = "#ffffff";
                            $cust_cls = "";
                        } elseif($trending_posts["cat"] == "பொழுதுபோக்கு") {
                            $data_theme_color = "#9f2100";
                            $data_color = "#ffffff";
                            $cust_cls = "cust-bg";
                        }
                ?>
                        <div class="col-sm-6 col-xl-4">
                            <div class="blog-style1">
                                <div class="blog-img">
                                    <img src="<?= $trending_posts["288-187"]; ?>" alt="<?= $trending_posts["title"]; ?>">
                                    <a data-theme-color="<?= $data_theme_color; ?>" data-text-color="<?= $data_color; ?>" href="<?= $trending_posts["cat_url"]; ?>" class="category <?= $cust_cls; ?>"><?= $trending_posts["cat"]; ?></a>
                                </div>
                                <h3 class="box-title-22"><a class="hover-line" href="<?= $trending_posts["permalink"]; ?>"><?= $trending_posts["short_title"]; ?></a></h3>
                                <div class="blog-meta">
                                    <!-- <a href="<?= $trending_posts["author_url"]; ?>"><i class="far fa-user"></i>By - <?= $trending_posts["author"]; ?></a> -->
                                    <a href="<?= $trending_posts["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $trending_posts["date"]; ?></a>
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

    <!-- section 4 -->
    <div class="space-top">
        <div class="container container-full">
            <div class="row th-carousel" data-slide-show="5" data-xl-slide-show="4" data-ml-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1">
                
            <?php
            for($entertain_news_post = 0; $entertain_news_post <= 10; $entertain_news_post++) {
                if(isset($entertainment_news[$entertain_news_post])) {
            ?>
                    <div class="col-sm-6 col-xl-3 dark-theme">
                        <div class="blog-style3">
                            <div class="blog-img">
                                <img src="<?= $entertainment_news[$entertain_news_post]["355-450"]; ?>" alt="<?= $entertainment_news[$entertain_news_post]["title"]; ?>">
                            </div>
                            <div class="blog-content">
                                <a href="<?= $entertainment_news[$entertain_news_post]["cat_url"]; ?>" class="category <?= $cust_cls; ?>"><?= $entertainment_news[$entertain_news_post]["cat"]; ?></a>
                                <h3 class="box-title-24"><a class="hover-line" href="<?= $entertainment_news[$entertain_news_post]["permalink"]; ?>"><?= $entertainment_news[$entertain_news_post]["short_title"]; ?></a></h3>
                                <div class="blog-meta">
                                    <!-- <a href="<?= $entertainment_news[$entertain_news_post]["author_url"]; ?>"><i class="far fa-user"></i>By - <?= $entertainment_news[$entertain_news_post]["author"]; ?></a> -->
                                    <a href="<?= $entertainment_news[$entertain_news_post]["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $entertainment_news[$entertain_news_post]["date"]; ?></a>
                                </div>
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

    <!-- section 5 -->
    <section class="space mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">அனைத்து செய்திகள்</h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active">
                            <button data-filter="*" class="tab-btn active" type="button" aria-label="All Posts">ALL</button>
                            <?php 
                            $all_news_cat = get_categories(array(
                                'hide_empty' => false // for development = This returns both used and unused categories
                            ));
                            
                            if(!empty($all_news_cat)) {
                                foreach($all_news_cat as $news_cat_key => $news_cat_val) {
                                    if($news_cat_key <= 7) {
                                        if($news_cat_val->name != "Uncategorized" && $news_cat_val->name != "பொழுதுபோக்கு") {
                            ?>
                                            <button data-filter=".<?=  esc_html($news_cat_val->name); ?>" class="tab-btn" type="button" aria-label="Post Filter"><?=  esc_html($news_cat_val->name); ?></button>
                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-24 filter-active mbn-24">

                <?php
                for($all_news_post = 0; $all_news_post <= 9; $all_news_post++) {
                    if(isset($all_news[$all_news_post])) {

                        if($all_news[$all_news_post]["cat"] == "UAE") {
                            $data_theme_color = "#007BFF";
                            $data_color = "#000000";
                            $cust_cls = "";
                        } elseif($all_news[$all_news_post]["cat"] == "இந்தியா") {
                            $data_theme_color = "#FF9500";
                            $data_color = "#000000";
                            $cust_cls = "";
                        } elseif($all_news[$all_news_post]["cat"] == "உலகம்") {
                            $data_theme_color = "#4E4BD0";
                            $data_color = "#ffffff";
                            $cust_cls = "";
                        } elseif($all_news[$all_news_post]["cat"] == "துபாய்") {
                            $data_theme_color = "#00D084";
                            $data_color = "#ffffff";
                            $cust_cls = "";
                        } elseif($all_news[$all_news_post]["cat"] == "பொழுதுபோக்கு") {
                            $data_theme_color = "#9f2100";
                            $data_color = "#ffffff";
                            $cust_cls = "cust-bg";
                        }
                    ?>
                        <div class="col-xl-6 col-md-6 filter-item <?= $all_news[$all_news_post]["cat"]; ?>">
                            <div class="blog-style2">
                                <div class="blog-img img-big">
                                    <img src="<?= $all_news[$all_news_post]["130-122"]; ?>" alt="<?= $all_news[$all_news_post]["title"]; ?>">
                                </div>
                                <div class="blog-content">
                                    <a data-theme-color="<?= $data_theme_color; ?>" data-text-color="<?= $data_color; ?>" href="<?= $all_news[$all_news_post]["cat_url"]; ?>" class="category <?= $cust_cls; ?>"><?= $all_news[$all_news_post]["cat"]; ?></a>
                                    <h3 class="box-title-20"><a class="hover-line" href="<?= $all_news[$all_news_post]["permalink"]; ?>"><?= $all_news[$all_news_post]["medium_title"]; ?></a></h3>
                                    <div class="blog-meta">
                                        <a href="<?= $all_news[$all_news_post]["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $all_news[$all_news_post]["date"]; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                
            </div>
        </div>
    </section>

    <!-- section 6 -->
    <!-- <div class="bg-smoke py-lg-4">
        <div class="container">
            <div class="row flex-row-reverse justify-content-center justify-content-lg-between align-items-center">
                <div class="col-lg-5 mb-n3 mb-lg-0">
                    <div class="text-center text-lg-end pt-4 pt-lg-0">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/bg/newsletter_img.png" alt="icon">
                    </div>
                </div>
                <div class="col-lg-7 py-4 text-center text-lg-start">
                    <h2 class="box-title-30 mb-30">Join Our Newsletter to receive <br> Daily Update News</h2>
                    <form class="newsletter-form width2">
                        <input class="form-control" type="email" placeholder="Enter Email" required="">
                        <button type="submit" class="th-btn">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->


<?= get_footer(); ?>