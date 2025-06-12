<?php
/*
 * Template Name: All News Archive
 * Description: A custom template to display all posts.
 */

get_header();
?>

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'post', // Change to custom post type if needed
        'posts_per_page' => 12, // Display all posts
        'paged' => $paged,
        'orderby' => 'date', // Order by date (optional)
        'order' => 'DESC', // Order by most recent (optional)
    );

    $query = new WP_Query($args);

    if($query->have_posts()) {
    ?>
        <section class="block-wrapper mt-15 all-news">
            <div class="container">
                <div class="row mb-3">
					<div class="col-lg-12">
						<div class="">
							<div class="clearfix entry-cat-header">
								<h2 class="float-left mb-0 ts-title">All News</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            
                            <?php
                            while($query->have_posts()) {
                                $query->the_post();

                                $archive_posts = array(
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
                                <div class="all-news col-12 col-lg-4 col-md-6 col-sm-6">
                                    <div class="ts-grid-box ts-grid-content mb-30">
                                        <a href="<?php echo $archive_posts["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $archive_posts["cat"]; ?></a>
                                        <div class="ts-post-thumb">
                                            <a href="<?php echo $archive_posts["permalink"]; ?>"><img class="img-fluid" src="<?php echo $archive_posts["medium-img"]; ?>" alt="<?php echo $archive_posts["title"]; ?>" decoding="async"></a>
                                        </div>
                                        <div class="post-content">
                                            <h3 class="post-title md"><a href="<?php echo $archive_posts["permalink"]; ?>"><?php echo $archive_posts["title"]; ?></a></h3>
                                            <p><?php echo $archive_posts["excerpt"]; ?></p>
                                            <ul class="post-meta-info">
												<li><a href="<?php echo $archive_posts["author_url"]; ?>"><?php echo $archive_posts["author"]; ?></a></li>
												<li><a href="<?php echo $archive_posts["date_url"]; ?>"><i class="fa fa-clock-o"></i><?php echo $archive_posts["date"]; ?></a></li>
											</ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
							?>

                        </div>

                        <br>
                        <?php
                        $allowed_tags = [
                            'span' => [
                                'class' => []
                            ],
                            'a' => [
                                'class' => [],
                                'href' => [],
                            ]
                        ];
                    
                        $output = wp_kses(paginate_links(array(
                            'total' => $query->max_num_pages,
                            // 'before_page_number' => '<span class="">',
                            // 'after_page_number' => '</span>',
                        )), $allowed_tags);
                    
                        $output = str_replace('&laquo; Previous', '<i class="fa fa-angle-left"></i>', $output);
                        $output = str_replace('Next &raquo;', '<i class="fa fa-angle-right"></i>', $output);
                    
                        printf('<div class="cust-pagination text-center mt-10 mb-3"><ul class="pagination">%s</ul></div>', $output);
                        ?>
                        <br>

                    </div>
                </div>
            </div>
        </section>
    <?php
        wp_reset_postdata();
    } else {
        get_template_part('template-parts/not-found');
    }
    ?>

<?php get_footer(); ?>