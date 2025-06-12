<?php get_header(); ?>

    <section class="block-wrapper 404-page">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">
					<div class="col error-page mb-0 text-center ts-grid-box">
						<div class="error-code">
							<h2><strong>404</strong></h2>
						</div>
						<div class="error-message">
							<h3>Sorry! The Page Not Found ;(</h3>
						</div>
						<div class="error-body">
							<h4>The Link You Followed Probably Broken or the page has been removed.</h4>
							<a href="<?php echo site_url(); ?>" class="btn btn-primary">Back to Home</a>
						</div>
					</div>
				</div>

				<div class="col-lg-12">
					<!-- Recent News -->
					<?php get_template_part('template-parts/recent-news'); ?>
				</div>

				<div class="col-lg-12 mb-3">
					<!-- Most Popular -->
					<?php get_template_part('template-parts/popular-posts'); ?>
				</div>

			</div>
		</div>
	</section>

<?php get_footer(); ?>