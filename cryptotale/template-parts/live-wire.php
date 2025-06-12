<div class="left-sidebar live-wire">
    <div class="widgets post-list-item bg-dark-item">
        <div class="nav nav-tabs">
            <div>
                <a class="align-items-center d-flex font-weight-bold justify-content-start" href="<?php echo site_url(); ?>/live-wire/">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/svg-icons/live-wire.svg" alt="Live Wire Icon" class="icon ml-3 mr-3" decoding="async" fetchpriority="high"> Live Wire
                </a>
            </div>
        </div>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
                <?php
                $live_wire_query = new WP_Query(array('post_type' => 'live_wire', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 10));
                $live_wire_count = $live_wire_query->post_count;

                if($live_wire_query->have_posts()) {
                    while($live_wire_query->have_posts()) {
                        $live_wire_query->the_post();

                        $live_wire_posts = array(
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
                            "modified" => date("d M, Y", strtotime($post->post_modified)),
                            "time_ago" => ct_post_time_ago(),
                            "views" => ct_get_post_view(),
                            "read_count" => get_post_meta($post->ID, 'read_count', true),
                            "author" => get_the_author_meta('display_name', $post->post_author),
                            "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                        );

                        $post_categories = get_the_terms($post->ID, 'live_wire_cat');
                        if(!empty($post_categories) && !is_wp_error($post_categories)) {
                            $categories = wp_list_pluck($post_categories, 'name');
                            $allCat = implode(", ", $categories);
                        } else {
                            $allCat = "Uncategorized";
                        }
                ?>
                        <div class="post-content media lw-wrapper">
                            <div class="media-body">
                                <div class="d-flex flex-column-reverse">
                                    <p class="mt-2 post-title"><a href="<?php echo $live_wire_posts["permalink"]; ?>"><?php echo $live_wire_posts["title"]; ?></a></p>
                                    <span class="post-tag"><a href="#!" class="yellow-color"> <?php echo $allCat; ?></a></span>
                                </div>
                                <p class="lw-content mb-0 mt-1"><?php echo $live_wire_posts["content"]; ?></p>
                                <?php 
                                if(strlen($live_wire_posts["content"]) > 180) {
                                ?>
                                    <p class="lw-toggle-btn mb-0 mt-2 read-more-button" data-post-id="<?php echo $post->ID; ?>">Read More...</p>
                                <?php
                                }
                                ?>
                                <ul class="align-items-center d-flex justify-content-between mb-0 post-meta-info">
                                    <li><span class="align-items-center d-flex post-date-info"><i class="fa fa-clock-o"></i> <?php echo $live_wire_posts["time_ago"]; ?></span></li>
                                    <!-- <li><span class="align-items-center d-flex post-date-info"><i class="fa fa-eye"></i> <?php echo ($live_wire_posts["read_count"]) ? $live_wire_posts["read_count"] : 0; ?></span></li> -->
                                </ul>
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