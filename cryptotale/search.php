<?php 
get_header(); 

// get search string count
$trimmed_str = trim(get_query_var('s'));
$trimmed_len = strlen($trimmed_str);
?>

	<section class="block-wrapper mt-15 search-page">
		<div class="container">
			<div class="row mb-3">
				<div class="col-lg-12">
					<div class="">
						<div class="clearfix entry-cat-header">
							<h2 class="float-left ts-title">Search: <span class="yellow-color"><?php echo $trimmed_str; ?></span></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-lg-12">
					<div class="ts-grid-box mb-0">
						<div>
							<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
								<?php
								if(isset($_GET["s"])) {
									$search_text = trim($_GET["s"]);
									if (preg_match('/"(.*?)"/', $search_text, $matches)) {
										$search_text = '"'.str_replace('\"', '', $_GET["s"]).'"';
									}
								} else {
									$search_text = "";
								}
								?>
								<div class="form-group">
									<input type="search" class="form-control" name="s" placeholder="Search..." value='<?php echo $search_text; ?>' autocomplete="off">
								</div>
								<button type="submit" class="btn btn btn-primary">Search</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<?php
			if($trimmed_len) {
				if(have_posts()) {
			?>
				<div class="row">
					<div class="col-lg-9 col-md-8">
						<div class="post-list">

							<?php
							while(have_posts()) {
								the_post();

								// Get the post type
								$post_type = get_post_type();
								// Check if it's a post
								if($post_type == 'post') {
								
									$search_posts = array(
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

									// if(defined('WPSEO_VERSION')) {
									// 	// Retrieve Yoast SEO values
									// 	$yoast_title = get_post_meta($post->ID, '_yoast_wpseo_title', true);
						
									// 	if(esc_html($yoast_title)) {
									// 		$search_posts["title"] = esc_html($yoast_title);
									// 	}
									// }
							?>
									<div class="bg-white mb-10 ml-0 mr-0 px-2 py-3 row search">
										<div class="col-md-4">
											<div class="mb-0 ts-post-thumb">
												<a href="<?php echo $search_posts["cat_url"]; ?>" class="post-cat ts-purple-bg"><?php echo $search_posts["cat"]; ?></a>
												<a href="<?php echo $search_posts["permalink"]; ?>" class="d-block w-100"><img class="img-fluid h-100 mh-100 w-100" src="<?php echo $search_posts["medium-img"]; ?>" alt="<?php echo $search_posts["title"]; ?>" decoding="async"></a>
											</div>
										</div>
										<div class="col-md-8">
											<div class="post-content">
												<h3 class="md mt-3 mt-md-0 post-title"><a href="<?php echo $search_posts["permalink"]; ?>"><?php echo $search_posts["title"]; ?></a></h3>
												<ul class="post-meta-info">
													<li><a href="<?php echo $search_posts["author_url"]; ?>"><?php echo $search_posts["author"]; ?></a></li>
													<li><a href="<?php echo $search_posts["date_url"]; ?>"><i class="fa fa-clock-o"></i><?php echo $search_posts["date"]; ?></a></li>
												</ul>
												<p><?php echo $search_posts["excerpt"]; ?></p>
											</div>
										</div>
									</div>
							<?php
								}
							}
							?>
							
							<br><?php cryptotale_pagination(); ?><br>

						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="right-sidebar-1">
							<?php get_template_part('template-parts/widgets/sidebar-popular_posts'); ?>
						</div>
					</div>
				</div>
			<?php
				} else {
					get_template_part('template-parts/not-found');
				}
			}
			?>

		</div>
	</section>

<?php get_footer(); ?>