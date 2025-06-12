<?php get_header(); ?>

    <?php
    if(have_posts()) {
        $author_id = get_the_author_meta('ID');
    ?>
        <section class="block-wrapper mt-15 author-page">
            <div class="container">
                <div class="row mb-3">
					<div class="col-lg-12">
                        <div class="ts-grid-box">
                            <div class="author-box author-box-item">
                                <?php echo get_avatar($author_id, $size = '80', $default = '', $alt = '', $args = array('class' => 'author-img')); ?>
                                <div class="author-info" style="min-height: 80px;">
                                    <div class="author-name"><h4 style="color: #FFA031;"><?php echo get_the_author(); ?></h4></div>
                                    <div class="clearfix"></div>
                                    <p class="m-0"><?php echo nl2br(get_the_author_meta('description', $author_id)); ?></p>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
				<div class="row">

                    <?php
                    while(have_posts()) {
                        the_post();

                        $author_posts = array(
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
                        <div class="author col-12 col-xl-3 col-lg-4 col-md-6">
                            <div class="ts-grid-box ts-grid-content mb-30">
                                <a href="<?php echo $author_posts["cat_url"]; ?>" class="post-cat ts-orange-bg"><?php echo $author_posts["cat"]; ?></a>
                                <div class="ts-post-thumb">
                                    <a href="<?php echo $author_posts["permalink"]; ?>"><img class="img-fluid" src="<?php echo $author_posts["medium-img"]; ?>" alt="<?php echo $author_posts["title"]; ?>" decoding="async"></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title md"><a href="<?php echo $author_posts["permalink"]; ?>"><?php echo $author_posts["title"]; ?></a></h3>
                                    <p><?php echo $author_posts["excerpt"]; ?></p>
                                    <ul class="post-meta-info">
                                        <!-- <li><a href="<?php echo $author_posts["author_url"]; ?>"><?php echo $author_posts["author"]; ?></a></li> -->
                                        <li><a href="<?php echo $author_posts["date_url"]; ?>"><i class="fa fa-clock-o"></i><?php echo $author_posts["date"]; ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-md-12">
                        <br><?php cryptotale_pagination(); ?><br>
                    </div>

                </div>
            </div>
        </section>
    <?php
    } else {
        get_template_part('template-parts/not-found');
    }
    ?>

<?php get_footer(); ?>