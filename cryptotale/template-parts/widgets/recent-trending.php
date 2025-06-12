<div class="post-list-item widgets recent-trending">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-clock-o"></i> Recent</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-heart"></i> Trendings</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">

            <?php
            $recent_posts_args = array(
                'post_type' => 'post',
                'orderby' => 'post_date',
                'order' => 'DESC',
                'posts_per_page' => 5, // Number of popular posts to retrieve
                'post__not_in' => (is_single()) ? array(get_the_ID()) : array(),
            );
            
            $recent_posts = new WP_Query($recent_posts_args);
            
            if($recent_posts->have_posts()) {
                while($recent_posts->have_posts()) {
                    $recent_posts->the_post();

                    $rec_posts = array(
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
                    <div class="post-content media ">
                        <a href="<?php echo $rec_posts["permalink"]; ?>"><img class="d-flex sidebar-img" src="<?php echo $rec_posts["thumbnail-img"]; ?>" alt="<?php echo $rec_posts["title"]; ?>" decoding="async"></a>
                        <div class="media-body">
                            <span class="post-tag"><a href="<?php echo $rec_posts["cat_url"]; ?>" class="yellow-color"><?php echo $rec_posts["cat"]; ?></a></span>
                            <h4 class="post-title"><a href="<?php echo $rec_posts["permalink"]; ?>"><?php echo $rec_posts["title"]; ?></a></h4>
                        </div>
                    </div>
            <?php
                }
                wp_reset_postdata(); // Reset post data
            }
            ?>

        </div>

        <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="profile">
           
            <?php
            $trending_posts_args = array(
                'post_type' => 'post',
                'meta_key' => 'post_views_count', // Replace with your view count meta key
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
                'posts_per_page' => 5, // Number of popular posts to retrieve
                'post__not_in' => (is_single()) ? array(get_the_ID()) : array(),
            );
            
            $trending_posts = new WP_Query($trending_posts_args);
            
            if($trending_posts->have_posts()) {
                while($trending_posts->have_posts()) {
                    $trending_posts->the_post();

                    $trend_posts = array(
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
                    <div class="post-content media ">
                        <a href="<?php echo $trend_posts["permalink"]; ?>"><img class="d-flex sidebar-img" src="<?php echo $trend_posts["thumbnail-img"]; ?>" alt="<?php echo $trend_posts["title"]; ?>" decoding="async"></a>
                        <div class="media-body">
                            <span class="post-tag"><a href="<?php echo $trend_posts["cat_url"]; ?>" class="yellow-color"><?php echo $trend_posts["cat"]; ?></a></span>
                            <h4 class="post-title"><a href="<?php echo $trend_posts["permalink"]; ?>"><?php echo $trend_posts["title"]; ?></a></h4>
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