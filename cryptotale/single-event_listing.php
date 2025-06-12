<?php get_header(); ?>

<?php
if(have_posts()) {
    while(have_posts()) {
        the_post();

        // update post view
        ct_set_post_view();

        $get_view_count = ct_get_post_view();

?>
        <section class="single-post-wrapper post-layout-10 single-event-listing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php the_content(); ?>
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