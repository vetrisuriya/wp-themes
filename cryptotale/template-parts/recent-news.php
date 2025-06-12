<div class="ts-grid-box most-populer-item mt-3 mb-0" id="most-pupuler">
    <h2 class="ts-title">Recent News</h2>
    <div class="most-populers owl-carousel">

        <?php
        $recent_posts_args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
        );
          
        $recent_posts = new WP_Query($recent_posts_args);
        
        if($recent_posts->have_posts()) {
            while($recent_posts->have_posts()) {
                $recent_posts->the_post();

                $rec_posts = array(
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
                <div class="item">
                    <a href="<?php echo $rec_posts["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $rec_posts["cat"]; ?></a>
                    <div class="ts-post-thumb">
                        <a href="<?php echo $rec_posts["permalink"]; ?>"><img class="img-fluid" src="<?php echo $rec_posts["medium-img"]; ?>" alt="<?php echo $rec_posts["title"]; ?>" decoding="async"></a>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title"><a href="<?php echo $rec_posts["permalink"]; ?>"><?php echo $rec_posts["title"]; ?></a></h3>
                        <a href="<?php echo $rec_posts["date_url"]; ?>" class="post-date-info"><i class="fa fa-clock-o"></i> <?php echo $rec_posts["date"]; ?></a>
                    </div>
                </div>
        <?php
            }
        wp_reset_postdata(); // Reset post data
        }
        ?>

    </div>
</div>