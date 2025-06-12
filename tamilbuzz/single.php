<?= get_header(); ?>

    <section class="th-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-lg-8">
                    <?php
                    if(have_posts()) {
                        while(have_posts()) {
                            the_post();

                            ct_set_post_view();

                            // Get the current page URL
                            $url = esc_url(get_permalink());
                            // Get the current page title
                            $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));

                            $all_posts = array(
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

                            if($all_posts["cat"] == "UAE") {
                                $data_theme_color = "#007BFF";
                                $data_color = "#000000";
                                $cust_cls = "";
                            } elseif($all_posts["cat"] == "இந்தியா") {
                                $data_theme_color = "#FF9500";
                                $data_color = "#000000";
                                $cust_cls = "";
                            } elseif($all_posts["cat"] == "உலகம்") {
                                $data_theme_color = "#4E4BD0";
                                $data_color = "#ffffff";
                                $cust_cls = "";
                            } elseif($all_posts["cat"] == "துபாய்") {
                                $data_theme_color = "#00D084";
                                $data_color = "#ffffff";
                                $cust_cls = "";
                            } elseif($all_posts["cat"] == "பொழுதுபோக்கு") {
                                $data_theme_color = "#9f2100";
                                $data_color = "#ffffff";
                                $cust_cls = "cust-bg";
                            }
                    ?>
                            <div class="th-blog blog-single">
                                <a data-theme-color="<?= $data_theme_color; ?>" data-text-color="<?= $data_color; ?>" href="<?= $all_posts["cat_url"]; ?>" class="category <?= $cust_cls; ?>"><?= $all_posts["cat"]; ?></a>
                                <h1 class="blog-title"><?= $all_posts["title"]; ?></h1>
                                <div class="blog-meta">
                                    <a class="author" href="<?= $all_posts["author_url"]; ?>"><i class="far fa-user"></i>By - <?= $all_posts["author"]; ?></a>
                                    <a href="<?= $all_posts["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $all_posts["date"]; ?></a>

                                    <!-- <a href="#!"><i class="far fa-comments"></i>Comments (3)</a> -->
                                    <span><i class="far fa-book-open"></i><?= reading_time(); ?></span>
                                </div>
                                <div class="blog-img">
                                    <img src="<?= $all_posts["896-500"]; ?>" alt="<?= $all_posts["title"]; ?>">
                                </div>
                                <div class="blog-content-wrap">
                                    <div class="share-links-wrap">
                                        <div class="share-links">
                                            <span class="share-links-title">பகிர்:</span>
                                            <div class="multi-social">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $url; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                <a href="https://twitter.com/intent/tweet?url=<?= $url; ?>&text=<?= $title; ?>" target="_blank">
                                                    <i class="twitter"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></i>
                                                </a>
                                                <a href="https://www.linkedin.com/shareArticle?url=<?= $url; ?>&title=<?= $title; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                                <a href="https://pinterest.com/pin/create/button/?url=<?= $url; ?>&description=<?= $title; ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-info-wrap">
                                            <span class="blog-info ms-sm-auto"><?= ct_get_post_view(); ?> <i class="fas fa-eye"></i></span>
                                        </div>
                                        <div class="content">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="blog-tag">
                                            <h6 class="title">Related Tag :</h6>
                                            <div class="tagcloud">
                                                <?php
                                                $post_tags = get_the_tags();
                                                if(!empty($post_tags)) {
                                                    foreach($post_tags as $tag) {
                                                        echo '<a href="'.esc_attr(get_tag_link($tag->term_id)).'">'.__($tag->name).'</a>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $previous_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>
                            <div class="blog-navigation">
                                <?php
                                if($previous_post) {
                                    $prev_post_arr = array(
                                        "id" => $previous_post->ID,
                                        "title" =>  $previous_post->post_title,
                                        "short_title" => title_trim(150, $previous_post->post_title, false),
                                        "permalink" => get_permalink($previous_post->ID),
                                        "80-80" =>  get_the_post_thumbnail_url($previous_post->ID, '80-80')
                                    );
                                ?>
                                    <div class="nav-btn prev">
                                        <div class="img">
                                            <img src="<?= $prev_post_arr["80-80"]; ?>" alt="<?= $prev_post_arr["title"]; ?>" class="nav-img">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="title">
                                                <a class="hover-line" href="<?= $prev_post_arr["permalink"]; ?>"><?= $prev_post_arr["short_title"]; ?></a>
                                            </h5>
                                            <a href="<?= $prev_post_arr["permalink"]; ?>" class="nav-text"><i class="fas fa-arrow-left me-2"></i>Prev</a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="divider"></div>
                                <?php
                                if($next_post) {
                                    $next_post_arr = array(
                                        "id" => $next_post->ID,
                                        "title" =>  $next_post->post_title,
                                        "short_title" => title_trim(150, $next_post->post_title, false),
                                        "permalink" => get_permalink($next_post->ID),
                                        "80-80" =>  get_the_post_thumbnail_url($next_post->ID, '80-80')
                                    );
                                ?>
                                    <div class="nav-btn next">
                                        <div class="media-body">
                                            <h5 class="title">
                                                <a class="hover-line" href="<?= $next_post_arr["permalink"]; ?>"><?= $next_post_arr["short_title"]; ?></a>
                                            </h5>
                                            <a href="<?= $next_post_arr["permalink"]; ?>" class="nav-text">Next<i class="fas fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="img">
                                            <img src="<?= $next_post_arr["80-80"]; ?>" alt="<?= $next_post_arr["title"]; ?>" class="nav-img">
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- <div class="blog-author">
                                <div class="auhtor-img">
                                    <img src="<?= get_avatar_url(get_the_author_meta('ID'), ['size' => '110']); ?>" alt="<?= $all_posts["author"]; ?>">
                                </div>
                                <div class="media-body">
                                    <div class="author-top">
                                        <div>
                                            <h3 class="author-name"><a class="text-inherit" href="<?= $all_posts["author_url"]; ?>"><?= $all_posts["author"]; ?></a></h3>
                                            <span class="author-desig">Founder & CEO</span>
                                        </div>
                                        <div class="social-links">
                                            <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                            <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <p class="author-text"><?= get_the_author_meta('description'); ?></p>
                                </div>
                            </div> -->
                            <!-- <div class="th-comments-wrap ">
                                <h2 class="blog-inner-title h3">Comments (03)</h2>
                                <ul class="comment-list">
                                    <li class="th-comment-item">
                                        <div class="th-post-comment">
                                            <div class="comment-avater">
                                                <img src="<?= get_template_directory_uri(); ?>/assets/img/blog/comment-author-1.jpg" alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <span class="commented-on"><i class="fas fa-calendar-alt"></i>14 March, 2023</span>
                                                <h3 class="name">Brooklyn Simmons</h3>
                                                <p class="text">Your sport blog is simply fantastic! The in-depth analysis, engaging writing style, and up-to-date coverage of various sports events make it a must-visit for any sports enthusiast.</p>
                                                <div class="reply_and_edit">
                                                    <a href="blog-details.html" class="reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li class="th-comment-item">
                                                <div class="th-post-comment">
                                                    <div class="comment-avater">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/blog/comment-author-2.jpg" alt="Comment Author">
                                                    </div>
                                                    <div class="comment-content">
                                                        <span class="commented-on"><i class="fas fa-calendar-alt"></i>15 March, 2023</span>
                                                        <h3 class="name">Marvin McKinney</h3>
                                                        <p class="text">Whether it's breaking news, expert opinions, or inspiring athlete profiles, your blog delivers a winning combination of excitement and information that keeps.</p>
                                                        <div class="reply_and_edit">
                                                            <a href="blog-details.html" class="reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="th-comment-item">
                                        <div class="th-post-comment">
                                            <div class="comment-avater">
                                                <img src="<?= get_template_directory_uri(); ?>/assets/img/blog/comment-author-3.jpg" alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <span class="commented-on"><i class="fas fa-calendar-alt"></i>16 March, 2023</span>
                                                <h3 class="name">Ronald Richards</h3>
                                                <p class="text">The way you seamlessly blend statistical insights with compelling storytelling creates an immersive and captivating reading experience. Whether it's the latest match updates, behind-the-scenes glimpses.</p>
                                                <div class="reply_and_edit">
                                                    <a href="blog-details.html" class="reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="th-comment-form ">
                                <div class="form-title">
                                    <h3 class="blog-inner-title mb-2">Leave a Comment</h3>
                                    <p class="form-text">Your email address will not be published. Required fields are marked *</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" placeholder="Your Name*" class="form-control">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" placeholder="Your Email*" class="form-control">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="text" placeholder="Website" class="form-control">
                                        <i class="far fa-globe"></i>
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea placeholder="Write a Comment*" class="form-control"></textarea>
                                        <i class="far fa-pencil"></i>
                                    </div>
                                    <div class="col-12 form-group mb-0">
                                        <button class="th-btn">Post Comment</button>
                                    </div>
                                </div>
                            </div> -->
                            <div class="related-post-wrapper pt-30 mb-30">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="sec-title has-line">Related Post</h2>
                                    </div>
                                    <div class="col-auto">
                                        <div class="sec-btn">
                                            <div class="icon-box">
                                                <button data-slick-prev="#related-post-slide" class="slick-arrow default" aria-label="Left post"><i class="far fa-arrow-left"></i></button>
                                                <button data-slick-next="#related-post-slide" class="slick-arrow default" aria-label="Right Post"><i class="far fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row slider-shadow th-carousel" id="related-post-slide" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="2">
                                    
                                    <?php
                                    $related = get_posts(array('category__in' => wp_get_post_categories($post->ID), 'numberposts' => 10, 'post__not_in' => array($post->ID)));
                                    if($related) {
                                        foreach($related as $post) {
                                            setup_postdata($post);

                                            $rel_posts = array(
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

                                            if($rel_posts["cat"] == "UAE") {
                                                $data_theme_color = "#007BFF";
                                                $data_color = "#000000";
                                                $cust_cls = "";
                                            } elseif($rel_posts["cat"] == "இந்தியா") {
                                                $data_theme_color = "#FF9500";
                                                $data_color = "#000000";
                                                $cust_cls = "";
                                            } elseif($rel_posts["cat"] == "உலகம்") {
                                                $data_theme_color = "#4E4BD0";
                                                $data_color = "#ffffff";
                                                $cust_cls = "";
                                            } elseif($rel_posts["cat"] == "துபாய்") {
                                                $data_theme_color = "#00D084";
                                                $data_color = "#ffffff";
                                                $cust_cls = "";
                                            } elseif($rel_posts["cat"] == "பொழுதுபோக்கு") {
                                                $data_theme_color = "#9f2100";
                                                $data_color = "#ffffff";
                                                $cust_cls = "cust-bg";
                                            }
                                    ?>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="blog-style1">
                                                    <div class="blog-img">
                                                        <img src="<?= $rel_posts["288-187"]; ?>" alt="<?= $rel_posts["title"]; ?>">
                                                        <a data-theme-color="<?= $data_theme_color; ?>" data-text-color="<?= $data_color; ?>" href="<?= $rel_posts["cat_url"]; ?>" class="category <?= $cust_cls; ?>"><?= $rel_posts["cat"]; ?></a>
                                                    </div>
                                                    <h3 class="box-title-22"><a class="hover-line" href="<?= $rel_posts["permalink"]; ?>"><?= $rel_posts["short_title"]; ?></a></h3>
                                                    <div class="blog-meta">
                                                        <!-- <a href="<?= $rel_posts["author_url"]; ?>"><i class="far fa-user"></i>By - <?= $rel_posts["author"]; ?></a> -->
                                                        <a href="<?= $rel_posts["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $rel_posts["date"]; ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    wp_reset_postdata(); 
                                    ?>
                                    
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-xxl-3 col-lg-4 sidebar-wrap">
                    <aside class="sidebar-area">
                        <div class="widget widget_search  ">
                            <form action="<?= esc_url(home_url('/')); ?>" method="get" class="search-form">
                                <?php
                                if(isset($_GET["s"])) {
                                    $search_text = $_GET["s"];
                                } else {
                                    $search_text = "";
                                }
                                ?>
                                <input type="text" placeholder="தேடு" name="s" value="<?= $search_text; ?>">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_categories  ">
                            <h3 class="widget_title">வகைகள்</h3>
                            <ul>
                                <?php 
                                $archive_tags = get_categories(array(
                                    'hide_empty' => false // for development = This returns both used and unused categories
                                ));
                                
                                if(!empty($archive_tags)) {
                                    foreach($archive_tags as $cat_key => $cat_val) {
                                        if($cat_key <= 9) {
                                            if($cat_val->name != "Uncategorized") {
                                ?>
                                                <li><a href="<?= esc_url(get_category_link($cat_val->term_id)); ?>"><?= esc_html($cat_val->name); ?></a></li>
                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="widget  ">
                            <h3 class="widget_title">அண்மை செய்திகள்</h3>
                            <div class="recent-post-wrap">
                                
                                <?php
                                $all_posts = [];

                                $all_post_query = new WP_Query(array(
                                    'posts_per_page' => 10,
                                    'post__not_in' => array(get_the_ID()),
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

                                for($archive_posts = 0; $archive_posts <= 4; $archive_posts++) {
                                    if(isset($all_posts[$archive_posts])) {
                                ?>
                                    <div class="recent-post">
                                        <div class="media-img">
                                            <a href="<?= $all_posts[$archive_posts]["permalink"]; ?>"><img src="<?= $all_posts[$archive_posts]["80-80"]; ?>" alt="<?= $all_posts[$archive_posts]["title"]; ?>"></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="post-title"><a class="hover-line" href="<?= $all_posts[$archive_posts]["permalink"]; ?>"><?= $all_posts[$archive_posts]["short_title"]; ?></a></h4>
                                            <div class="recent-post-meta">
                                                <a href="<?= $all_posts[$archive_posts]["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $all_posts[$archive_posts]["date"]; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                }
                                ?>
                                
                            </div>
                        </div>
                        <div class="widget widget_tag_cloud  ">
                            <h3 class="widget_title">Popular Tags</h3>
                            <div class="tagcloud">
                                <?php 
                                $archive_tags = get_tags(array(
                                    'hide_empty' => false // for development = This returns both used and unused tags
                                ));
                                
                                if(!empty($archive_tags)) {
                                    foreach($archive_tags as $tag_key => $tag_val) {
                                        if($tag_key <= 9) {
                                ?>
                                            <a href="<?= esc_url(get_tag_link($tag_val->term_id)); ?>"><?= esc_html($tag_val->name); ?></a>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>


<?= get_footer(); ?>