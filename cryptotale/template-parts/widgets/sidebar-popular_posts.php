<div class="widgets ts-grid-box post-tab-list ts-col-box">
    <h3 class="widget-title">Popular Posts</h3>

    <?php
    $sidebar_popular_posts_args = array(
        'post_type' => 'post',
        'meta_key' => 'post_views_count', // Replace with your view count meta key
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => 5, // Number of popular posts to retrieve
        'post__not_in' => (is_single()) ? array(get_the_ID()) : array(),
    );
    
    $sidebar_popular_posts = new WP_Query($sidebar_popular_posts_args);
    
    if($sidebar_popular_posts->have_posts()) {
        $sidebar_pop_posts_count = 0;
        while($sidebar_popular_posts->have_posts()) {
            $sidebar_popular_posts->the_post();

            $sidebar_pop_posts = array(
                "permalink" => get_permalink(),
                "title" => get_the_title(),
                "short_title" => title_short(40, false),
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

            if($sidebar_pop_posts_count == 0) {
    ?>
                <div class="ts-overlay-style">
                    <div class="item">
                        <div class="ts-post-thumb"><a href="<?php echo $sidebar_pop_posts["permalink"]; ?>"><img class="img-fluid" src="<?php echo $sidebar_pop_posts["medium-img"]; ?>" alt="<?php echo $sidebar_pop_posts["title"]; ?>" decoding="async"></a></div>
                        <div class="overlay-post-content">
                            <div class="post-content">
                                <h3 class="post-title"><a href="<?php echo $sidebar_pop_posts["permalink"]; ?>"><?php echo $sidebar_pop_posts["title"]; ?></a></h3>
                                <ul class="post-meta-info">
                                    <li><a href="<?php echo $sidebar_pop_posts["date_url"]; ?>"><i class="fa fa-clock-o"></i><?php echo $sidebar_pop_posts["date"]; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
                $sidebar_pop_posts_count++;
            } else {
    ?>
                <div class="post-content media">
                    <a href="<?php echo $sidebar_pop_posts["permalink"]; ?>"><img class="d-flex sidebar-img" src="<?php echo $sidebar_pop_posts["thumbnail-img"]; ?>" alt="<?php echo $sidebar_pop_posts["title"]; ?>" decoding="async"></a>
                    <div class="media-body align-self-center">
                        <h4 class="post-title"><a href="<?php echo $sidebar_pop_posts["permalink"]; ?>"><?php echo $sidebar_pop_posts["title"]; ?></a></h4>
                        <ul class="post-meta-info">
                            <li><a href="<?php echo $sidebar_pop_posts["date_url"]; ?>"><i class="fa fa-clock-o"></i><?php echo $sidebar_pop_posts["date"]; ?></a></li>
                        </ul>
                    </div>
                </div>
    <?php
            }
        }
        wp_reset_postdata(); // Reset post data
    }
    ?>
    
</div>