<?php get_header(); ?>

    <?php
    if(have_posts()) {
        while(have_posts()) {
            the_post();

            // echo "<pre>";
            // print_r($post);
            // echo "</pre>";

            // update post view
            ct_set_post_view();

            $get_view_count = ct_get_post_view();

            $single_posts = array(
                "permalink" => get_permalink(),
                "title" => get_the_title(),
                "short_title" => title_short(150),
                "excerpt" => get_the_excerpt(),
                "content" => get_field("content"),
                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                "all_tags" => ct_post_taxonomies(),
                "all_cats" => ct_post_taxonomies("cat"),
                "date" => get_the_date('j M, Y'),
                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                "modified" => date("j M, Y H:i", strtotime($post->post_modified)),
                "time_ago" => ct_post_time_ago(),
                "views" => ct_get_post_view(),
                "read_count" => get_post_meta($post->ID, 'read_count', true),
                "author" => get_the_author_meta('display_name', $post->post_author),
                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
            );

            $post_categories = get_the_terms($post->ID, 'live_wire_cat');
            if(!empty($post_categories) && !is_wp_error($post_categories)) {
                $allCat = wp_list_pluck($post_categories, 'name');
            } else {
                $allCat = array("Uncategorized");
            }
    ?>
            <section class="single-post-wrapper post-layout-10 single-live-wire">
                <div class="container">
                    <div class="row mb-10">
                        <div class="col-lg-12">
                            <ol class="breadcrumb mb-0">
                                <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i>Home</a></li>
                                <li><a href="<?php echo site_url(); ?>/live-wire/">Live Wire Archive</a></li>
                                <li><?php echo $single_posts["title"]; ?></li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-lg-12">
                            <div class="entry-header pb-2">
                                <?php
                                if($allCat) {
                                    foreach($allCat as $cat) {
                                ?>
                                        <a href="#" class="post-cat ts-orange-bg"><?php echo $cat; ?></a>
                                <?php
                                    }
                                }
                                ?>
                                <h2 class="post-title lg"><?php echo $single_posts["title"]; ?></h2>
                                <div class="align-items-center d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between">
                                    <ul class="post-meta-info">
                                        <li>Author: <a href="<?php echo $single_posts["author_url"]; ?>"><?php echo $single_posts["author"]; ?></a></li>
                                        <li><a href="#"><i class="fa fa-calendar"></i>Published: <?php echo $single_posts["date"]; ?></a></li>
                                    </ul>
                                    <ul class="align-self-start d-flex ml-5 ts-block-social-list">
                                        <li class="ts-facebook"><a class="social-share-button" href="<?php echo 'https://www.facebook.com/sharer.sharer.php?u='.get_the_permalink(); ?>" target="_blank" rel="noopener" data-post-id="<?php echo get_the_ID(); ?>" data-social-media="facebook"><div><i class="fa fa-facebook mr-0"></i></div></a></li>
                                        <li class="ts-twitter"><a class="social-share-button" href="<?php echo 'https://twitter.com/intent/tweet?url='.get_the_permalink(); ?>" target="_blank" rel="noopener" data-post-id="<?php echo get_the_ID(); ?>" data-social-media="twitter"><div><i class="fa fa-twitter mr-0"></i></div></a></li>
                                        <li class="ts-pinterest"><a class="social-share-button" href="<?php echo 'https://www.pinterest.com/pin/create/button/?url='.get_the_permalink().'&media='.get_the_post_thumbnail_url(); ?>" target="_blank" rel="noopener" data-post-id="<?php echo get_the_ID(); ?>" data-social-media="pinterest"><div><i class="fa fa-pinterest-p mr-0"></i></div></a></li>
                                        <li class="ts-linkedin"><a class="social-share-button" href="<?php echo 'https://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.urlencode(get_the_title()); ?>" target="_blank" rel="noopener" data-post-id="<?php echo get_the_ID(); ?>" data-social-media="linkedin"><div><i class="fa fa-linkedin mr-0"></i></div></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="ts-grid-box content-wrapper mb-0">
                                <div class="post-content-area mb-3">
                                    <div class="entry-content">
                                        <p><?php echo $single_posts["content"]; ?></p>
                                    </div>
                                </div>
                                <?php
                                $previous_post = get_previous_post();
                                $next_post = get_next_post();
                                ?>
                                <div class="post-navigation clearfix">
                                    <?php
                                    if($previous_post) {
                                        $prev_post_arr = array(
                                            "id" => $previous_post->ID,
                                            "title" =>  $previous_post->post_title,
                                            "short_title" => title_trim(150, $previous_post->post_title, false),
                                            "permalink" => get_permalink($previous_post->ID),
                                        );
                                    ?>
                                        <div class="post-previous float-left pl-0">
                                            <a href="<?php echo $prev_post_arr["permalink"]; ?>">
                                                <span>Read Previous</span>
                                                <p><?php echo $prev_post_arr["title"]; ?></p>
                                            </a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if($next_post) {
                                        $next_post_arr = array(
                                            "id" => $next_post->ID,
                                            "title" =>  $next_post->post_title,
                                            "short_title" => title_trim(150, $next_post->post_title, false),
                                            "permalink" => get_permalink($next_post->ID),
                                        );
                                    ?>
                                        <div class="post-next float-right pr-0">
                                            <a href="<?php echo $next_post_arr["permalink"]; ?>">
                                                <span>Read Next</span>
                                                <p><?php echo $next_post_arr["title"]; ?></p>
                                            </a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php
        }
    } else {
        get_template_part('template-parts/not-found');
    }
    ?>

<?php get_footer(); ?>