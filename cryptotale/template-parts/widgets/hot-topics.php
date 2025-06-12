<div class="widgets ts-grid-box widgets-populer-post">
    <div class="topic-list">Hot Topics</div>

    <?php
    $sidebar_hot_topics_args = array(
        'post_type' => 'post',
        'orderby' => 'comment_count',
        'order' => 'DESC',
        'posts_per_page' => 3, // Number of popular posts to retrieve
        'post__not_in' => (is_single()) ? array(get_the_ID()) : array(),
    );
    
    $sidebar_hot_topics = new WP_Query($sidebar_hot_topics_args);
    
    if($sidebar_hot_topics->have_posts()) {
        $sidebar_hot_posts_count = 0;
        while($sidebar_hot_topics->have_posts()) {
            $sidebar_hot_topics->the_post();

            $sidebar_hot_posts = array(
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

            if($sidebar_hot_posts_count == 0) {
    ?>
                <div class="ts-overlay-style">
                    <div class="item">
                        <div class="ts-post-thumb"><a href="<?php echo $sidebar_hot_posts["permalink"]; ?>"><img class="img-fluid" src="<?php echo $sidebar_hot_posts["medium-img"]; ?>" alt="<?php echo $sidebar_hot_posts["title"]; ?>" decoding="async"></a></div>
                        <div class="overlay-post-content">
                            <div class="post-content">
                                <h3 class="post-title"><a href="<?php echo $sidebar_hot_posts["permalink"]; ?>"><?php echo $sidebar_hot_posts["title"]; ?></a></h3>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
                $sidebar_hot_posts_count++;
            } else {
    ?>
                <div class="post-content media">
                    <a href="<?php echo $sidebar_hot_posts["permalink"]; ?>"><img class="d-flex sidebar-img" src="<?php echo $sidebar_hot_posts["thumbnail-img"]; ?>" alt="<?php echo $sidebar_hot_posts["title"]; ?>" decoding="async"></a>
                    <div class="media-body align-self-center">
                        <h4 class="post-title"><a href="<?php echo $sidebar_hot_posts["permalink"]; ?>"><?php echo $sidebar_hot_posts["title"]; ?></a></h4>
                    </div>
                </div>
    <?php
            }
        }
        wp_reset_postdata(); // Reset post data
    }
    ?>
</div>