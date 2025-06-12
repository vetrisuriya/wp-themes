<?= get_header(); ?>


    <section class="space space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h2 class="blog-title">
                        <?php
                            echo 'Author : '.get_the_author();
                        ?>
                    </h2>
                    <p><?= get_the_archive_description(); ?></p>
                </div>
                <div class="col-xl-12">
                    <div class="">
                        <?php
                        if(have_posts()) {
                            while(have_posts()) {
                                the_post();

                                $all_posts = array(
                                    "permalink" => get_permalink(),
                                    "title" => get_the_title(),
                                    "short_title" => title_short(150),
                                    "excerpt" => get_the_excerpt(),
                                    "img" => get_the_post_thumbnail_url($post->ID, "full"),
                                    "600-464" =>  get_the_post_thumbnail_url(get_the_ID(), '600-464'),
                                    "288-220" =>  get_the_post_thumbnail_url(get_the_ID(), '288-220'),
                                    "288-187" =>  get_the_post_thumbnail_url(get_the_ID(), '288-187'),
                                    "355-450" =>  get_the_post_thumbnail_url(get_the_ID(), '355-450'),
                                    "392-414" =>  get_the_post_thumbnail_url(get_the_ID(), '392-414'),
                                    "130-122" =>  get_the_post_thumbnail_url(get_the_ID(), '130-122'),
                                    "80-80" =>  get_the_post_thumbnail_url(get_the_ID(), '80-80'),
                                    "386-300" =>  get_the_post_thumbnail_url(get_the_ID(), '386-300'),
                                    "270-220" =>  get_the_post_thumbnail_url(get_the_ID(), '270-220'),
                                    "896-500" =>  get_the_post_thumbnail_url(get_the_ID(), '896-500'),
                                    "392-310" =>  get_the_post_thumbnail_url(get_the_ID(), '392-310'),
                                    "all_tags" => ct_post_taxonomies(),
                                    "all_cats" => ct_post_taxonomies("cat"),
                                    "cat" => get_the_category()[0]->cat_name,
                                    "cat_url" => esc_url(get_category_link(get_the_category()[0]->cat_ID)),
                                    "date" => tamil_mon(get_the_date('j M, Y')),
                                    "date_url" => esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
                                    "modified" => date("d M, Y", strtotime($post->post_modified)),
                                    "time_ago" => ct_post_time_ago(),
                                    "views" => ct_get_post_view(),
                                    "author" => get_the_author_meta('display_name', $post->post_author),
                                    "author_url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                                );

                                if($all_posts["cat"] == "UAE") {
                                    $data_theme_color = "#007BFF";
                                    $data_color = "#000000";
                                    $cust_cls = "";
                                } elseif($all_posts["cat"] == "இந்தியா") {
                                    $data_theme_color = "#FF9500";
                                    $data_color = "#000000";
                                    $cust_cls = "";
                                } elseif($all_posts["cat"] == "உலகம்") {
                                    $data_theme_color = "#4E4BD0";
                                    $data_color = "#ffffff";
                                    $cust_cls = "";
                                } elseif($all_posts["cat"] == "துபாய்") {
                                    $data_theme_color = "#00D084";
                                    $data_color = "#ffffff";
                                    $cust_cls = "";
                                } elseif($all_posts["cat"] == "பொழுதுபோக்கு") {
                                    $data_theme_color = "#9f2100";
                                    $data_color = "#ffffff";
                                    $cust_cls = "cust-bg";
                                }
                        ?>
                                <div class="mb-4 border-blog ">
                                    <div class="blog-style4">
                                        <div class="blog-img w-270">
                                            <img src="<?= $all_posts["270-220"]; ?>" alt="<?= $all_posts["title"]; ?>">
                                        </div>
                                        <div class="blog-content">
                                            <a data-theme-color="<?= $data_theme_color; ?>" data-text-color="<?= $data_color; ?>" href="<?= $all_posts["cat_url"]; ?>" class="category <?= $cust_cls; ?>"><?= $all_posts["cat"]; ?></a>
                                            <h3 class="box-title-22"><a class="hover-line" href="<?= $all_posts["permalink"]; ?>"><?= $all_posts["title"]; ?></a></h3>
                                            <p class="blog-text"><?= $all_posts["excerpt"]; ?></p>
                                            <div class="blog-meta">
                                                <!-- <a href="<?= $all_posts["author_url"]; ?>"><i class="far fa-user"></i>By - <?= $all_posts["author"]; ?></a> -->
                                                <a href="<?= $all_posts["date_url"]; ?>"><i class="fal fa-calendar-days"></i><?= $all_posts["date"]; ?></a>
                                            </div>
                                            <!-- <a href="<?= $all_posts["permalink"]; ?>" class="th-btn style2">Read More<i class="fas fa-arrow-up-right ms-2"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                        ?>
                                <section class="space2">
                                    <div class="container">
                                        <div class="error-content">
                                            <h2 class="error-title">No Posts Found</h2>
                                            <a href="<?= site_url(); ?>" class="th-btn"><i class="fal fa-home me-2"></i>Back To Home</a>
                                        </div>
                                    </div>
                                </section>
                        <?php
                        }
                        ?>
                    </div>
                    
                    <br><?php tamilbuzz_pagination(); ?><br>
                    
                </div>
            </div>
        </div>
    </section>


<?= get_footer(); ?>