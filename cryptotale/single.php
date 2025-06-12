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
                "img" => get_the_post_thumbnail_url($post->ID, "full"),
                "all_tags" => ct_post_taxonomies(),
                "all_cats" => ct_post_taxonomies("cat"),
                "cat" => get_the_category()[0]->cat_name,
                "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                "date" => get_the_date('j M, Y H:i'),
                "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                "modified" => date("j M, Y H:i", strtotime($post->post_modified)),
                "time_ago" => ct_post_time_ago(),
                "views" => ct_get_post_view(),
                "author" => get_the_author_meta('display_name', $post->post_author),
                "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                "editor" => (get_post_meta(get_the_ID(), 'post_editor', true) != "") ? get_the_author_meta('display_name', get_post_meta(get_the_ID(), 'post_editor', true)) : get_the_author_meta('display_name', 22),
                "editor_url" => (get_post_meta(get_the_ID(), 'post_editor', true) != "") ? esc_url(get_author_posts_url(get_post_meta(get_the_ID(), 'post_editor', true))) : esc_url(get_author_posts_url(22))
            );
    ?>
            <section class="single-post-wrapper post-layout-10 single-post">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="entry-header">
                                <?php
                                $post_cats = get_the_category();
                                if(!empty($post_cats)) {
                                    foreach($post_cats as $cat) {
                                ?>
                                    <a href="<?php echo esc_attr(get_tag_link($cat->term_id)); ?>" class="post-cat ts-orange-bg"><?php echo __($cat->name); ?></a>
                                <?php
                                    }
                                }
                                ?>
                                <h1 class="post-title lg mb-2"><?php echo $single_posts["title"]; ?></h1>
                                <div class="align-items-center d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between">
                                    <ul class="post-meta-info">
                                        <li>Author: <a href="<?php echo $single_posts["author_url"]; ?>"><?php echo $single_posts["author"]; ?></a></li>
                                        <li>Editor: <a href="<?php echo $single_posts["permalink"]; ?>"><?php echo $single_posts["editor"]; ?></a></li>
                                        <li><i class="fa fa-calendar"></i> Published: <a href="<?php echo $single_posts["date_url"]; ?>"><?php echo $single_posts["date"]; ?></a></li>
                                        <li><i class="fa fa-edit"></i>Last Updated: <a href="<?php echo $single_posts["permalink"]; ?>"><?php echo ($post->post_date > $post->post_modified) ? $single_posts["date"] : $single_posts["modified"]; ?></a></li>
                                        <!-- <li class="<?php echo ($get_view_count >= 1000) ? 'active' : ''; ?>"><i class="<?php echo ($get_view_count >= 1000) ? 'icon-fire' : 'fa fa-eye'; ?>"></i><?php echo $get_view_count; ?></li> -->
                                        <!-- <li><i class="fa fa-book"></i> <?php echo reading_time(); ?></li> -->
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
                        <div class="col-lg-9 mb-3">
                            <div class="ts-grid-box content-wrapper mb-0">
                                <div class="post-content-area">
                                    <div class="post-media post-featured-image">
                                        <img src="<?php echo $single_posts["img"]; ?>" class="img-fluid" alt="<?php echo $single_posts["title"]; ?>" decoding="async">
                                    </div>
                                    <div class="entry-content">
                                        <?php
                                        // Get the post content
                                        $post_content = apply_filters('the_content', $post->post_content);

                                        // Load the post content into a DOMDocument
                                        $dom = new DOMDocument();
                                        // Load the HTML content directly without encoding special characters
                                        @$dom->loadHTML('<?xml encoding="UTF-8">' . $post_content);

                                        // Create a DOMXPath instance to perform XPath queries
                                        $xpath = new DOMXPath($dom);
                                        // Query to select the first element
                                        $first_element_query = $xpath->query('//body/*[position()=1]');
                                        // Initialize an empty array to store list items
                                        $list_items = array();
                                        // Check if the first element is a ul element
                                        if($first_element_query->length > 0 && $first_element_query->item(0)->nodeName == 'ul') {
                                            // Get the ul element
                                            $ul_element = $first_element_query->item(0);
                                            
                                            // Loop through each li element within the ul
                                            foreach($ul_element->getElementsByTagName('li') as $li) {
                                                // Get the text content of each li and add it to the list items array
                                                $list_items[] = $li->textContent;
                                            }

                                            // Access and use the array of text content ($textList)
                                            if(count($list_items) > 0) {
                                        ?>
                                                <div class="key-points hidden" id="key_points">
                                                    <ul>
                                                        <?php
                                                            foreach($list_items as $key_points) {
                                                        ?>
                                                                <li><p><?php echo $key_points; ?></p></li>
                                                        <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                        <?php
                                            }

                                            // If the first element is a ul, remove it
                                            $first_element_query->item(0)->parentNode->removeChild($first_element_query->item(0));
                                        }

                                        // Output the modified post content
										// echo $dom->saveHTML();


										// Retrieve only the loaded content without <html> and <body>
										$bodyContent = $dom->getElementsByTagName('body')->item(0)->childNodes;
										$newDoc = new DOMDocument();
										foreach ($bodyContent as $child) {
											$newDoc->appendChild($newDoc->importNode($child, true));
										}

										// Output or process your clean document content
										echo $newDoc->saveHTML();
                                        ?>
                                    </div>
                                    <div class="align-items-start content-tags d-flex justify-content-start mb-4 flex-wrap">
                                        <?php
                                        $post_tags = get_the_tags();
                                        if(!empty($post_tags)) {
                                            foreach($post_tags as $tag) {
                                        ?>
                                                <a href="<?php echo esc_attr(get_tag_link($tag->term_id)); ?>" class="content-tag"><?php echo __($tag->name); ?></a>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                $previous_post = get_previous_post();
                                $next_post = get_next_post();
                                ?>
                                <div class="post-navigation">
                                    <?php
                                    if($previous_post) {
                                        $prev_post_arr = array(
                                            "id" => $previous_post->ID,
                                            "title" =>  $previous_post->post_title,
                                            "short_title" => title_trim(150, $previous_post->post_title, false),
                                            "permalink" => get_permalink($previous_post->ID),
                                            "thumbnail-img" => get_the_post_thumbnail_url($previous_post->ID, "thumbnail")
                                        );
                                    ?>
                                        <div class="post-previous">
                                            <a href="<?php echo $prev_post_arr["permalink"]; ?>" class="align-items-center d-flex flex-row position-relative">
                                                <img src="<?php echo $prev_post_arr["thumbnail-img"]; ?>" alt="<?php echo $prev_post_arr["title"]; ?>" decoding="async">
                                                <div class="single-post-nav-content">
                                                    <span>Read Previous</span>
                                                    <p><?php echo $prev_post_arr["title"]; ?></p>
                                                </div>
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
                                            "thumbnail-img" => get_the_post_thumbnail_url($next_post->ID, "thumbnail")
                                        );
                                    ?>
                                        <div class="post-next">
                                            <a href="<?php echo $next_post_arr["permalink"]; ?>" class="align-items-center d-flex flex-row-reverse position-relative">
                                                <img src="<?php echo $next_post_arr["thumbnail-img"]; ?>" alt="<?php echo $next_post_arr["title"]; ?>" decoding="async">
                                                <div class="single-post-nav-content">
                                                    <span>Read Next</span>
                                                    <p><?php echo $next_post_arr["title"]; ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <?php // comments_template(); ?>
                            
                            <?php get_template_part('template-parts/related-news'); ?>
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                <div class="post-list-item widgets single-post-recent-news">
									<ul class="nav nav-tabs">
										<li role="presentation"><a class="active" href="#home" aria-controls="home" data-toggle="tab"><i class="fa fa-clock-o"></i> Recent</a></li>
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
									</div>
								</div>

                                <?php get_template_part('template-parts/widgets/categories'); ?>

                                <?php get_template_part('template-parts/widgets/tags'); ?>
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