<div class="widgets ts-grid-box widgets-populer-post border">
    <h3 class="widget-title">Most Viewed</h3>
    <?php
    $sidebar_most_viewed_args = array(
        'post_type' => 'post',
        'meta_key' => 'post_views_count', // Replace with your view count meta key
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => 1, // Number of popular posts to retrieve
        'post__not_in' => (is_single()) ? array(get_the_ID()) : array(),
    );
    
    $sidebar_most_viewed = new WP_Query($sidebar_most_viewed_args);
    
    if($sidebar_most_viewed->have_posts()) {
        while($sidebar_most_viewed->have_posts()) {
            $sidebar_most_viewed->the_post();

            $sidebar_most_posts = array(
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
    ?>
            <div class="item">
                <div class="ts-post-thumb">
                    <a href="<?php echo $sidebar_most_posts["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $sidebar_most_posts["cat"]; ?></a>
                    <a href="<?php echo $sidebar_most_posts["permalink"]; ?>"><img class="img-fluid" src="<?php echo $sidebar_most_posts["medium-img"]; ?>" alt="<?php echo $sidebar_most_posts["title"]; ?>" decoding="async"></a>
                </div>
                <div class="post-content">
                    <h3 class="post-title"><a href="<?php echo $sidebar_most_posts["permalink"]; ?>"><?php echo $sidebar_most_posts["title"]; ?></a></h3>
                    <a href="<?php echo $sidebar_most_posts["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $sidebar_most_posts["date"]; ?></a>
                </div>
            </div>
    <?php
        }
        wp_reset_postdata(); // Reset post data
    }
    ?>
</div>