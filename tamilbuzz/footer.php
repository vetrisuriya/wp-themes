    <!--============================== Footer Area ==============================-->
    <footer class="footer-wrapper ">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="<?= site_url(); ?>" aria-label="Tamil Buzz Light Logo"><img class="light-img" src="<?= get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="TamilBuzz" style="width: 100px;"></a>
                                    <a href="<?= site_url(); ?>" aria-label="Tamil Buzz Dark Logo"><img class="dark-img" src="<?= get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="TamilBuzz" style="width: 100px;"></a>
                                </div>
                                <p class="about-text">துபாய் மற்றும் பிற அமீரகத்தில் வாழும் தமிழர்களுக்கான செய்திகள் மற்றும் கட்டுரைகளை தொகுத்து வழங்கும், அமீரகத்தின்  தமிழ் செய்தி நிறுவனம்.</p>
                                <div class="th-social style-black">
                                    <a href="<?= ss_url("telegram"); ?>" aria-label="Tamil Buzz Telegram Link"><i class="fab fa-telegram"></i></a>
                                    <a href="<?= ss_url("whatsapp"); ?>" aria-label="Tamil Buzz Whatsapp Link"><i class="fab fa-whatsapp"></i></a>
                                    <a href="<?= ss_url("twitter"); ?>" aria-label="Tamil Buzz Twitter Link">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                                    </a>
                                    <a href="<?= ss_url("thread"); ?>" aria-label="Tamil Buzz Thread Link">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M331.5 235.7c2.2 .9 4.2 1.9 6.3 2.8c29.2 14.1 50.6 35.2 61.8 61.4c15.7 36.5 17.2 95.8-30.3 143.2c-36.2 36.2-80.3 52.5-142.6 53h-.3c-70.2-.5-124.1-24.1-160.4-70.2c-32.3-41-48.9-98.1-49.5-169.6V256v-.2C17 184.3 33.6 127.2 65.9 86.2C102.2 40.1 156.2 16.5 226.4 16h.3c70.3 .5 124.9 24 162.3 69.9c18.4 22.7 32 50 40.6 81.7l-40.4 10.8c-7.1-25.8-17.8-47.8-32.2-65.4c-29.2-35.8-73-54.2-130.5-54.6c-57 .5-100.1 18.8-128.2 54.4C72.1 146.1 58.5 194.3 58 256c.5 61.7 14.1 109.9 40.3 143.3c28 35.6 71.2 53.9 128.2 54.4c51.4-.4 85.4-12.6 113.7-40.9c32.3-32.2 31.7-71.8 21.4-95.9c-6.1-14.2-17.1-26-31.9-34.9c-3.7 26.9-11.8 48.3-24.7 64.8c-17.1 21.8-41.4 33.6-72.7 35.3c-23.6 1.3-46.3-4.4-63.9-16c-20.8-13.8-33-34.8-34.3-59.3c-2.5-48.3 35.7-83 95.2-86.4c21.1-1.2 40.9-.3 59.2 2.8c-2.4-14.8-7.3-26.6-14.6-35.2c-10-11.7-25.6-17.7-46.2-17.8H227c-16.6 0-39 4.6-53.3 26.3l-34.4-23.6c19.2-29.1 50.3-45.1 87.8-45.1h.8c62.6 .4 99.9 39.5 103.7 107.7l-.2 .2zm-156 68.8c1.3 25.1 28.4 36.8 54.6 35.3c25.6-1.4 54.6-11.4 59.5-73.2c-13.2-2.9-27.8-4.4-43.4-4.4c-4.8 0-9.6 .1-14.4 .4c-42.9 2.4-57.2 23.2-56.2 41.8l-.1 .1z"/></svg>
                                    </a>
                                    <a href="<?= ss_url("facebook"); ?>" aria-label="Tamil Buzz Facebook Link"><i class="fab fa-facebook-f"></i></a>
                                    <a href="<?= ss_url("instagram"); ?>" aria-label="Tamil Buzz Instagram Link"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">வகைகள்</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <?php 
                                    $footer_all_cats = get_categories(array(
                                        'hide_empty' => false // for development = This returns both used and unused categories
                                    ));
                                    
                                    if(!empty($footer_all_cats)) {
                                        foreach($footer_all_cats as $cat_key => $footer_cat) {
                                            if($cat_key <= 9) {
                                                if($footer_cat->name != "Uncategorized") {
                                    ?>
                                                    <li><a href="<?= esc_url(get_category_link($footer_cat->term_id)); ?>"><?= esc_html($footer_cat->name); ?></a></li>
                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Other Links</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="#">எங்களைப் பற்றி</a></li>
                                    <li><a href="#">கேள்விகள்</a></li>
                                    <li><a href="#">தொடர்பு கொள்ள</a></li>
                                    <li><a href="#">தனியுரிமைக் கொள்கை</a></li>
                                    <li><a href="#">விதிமுறைகளும் நிபந்தனைகளும்</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget_tag_cloud footer-widget">
                            <h3 class="widget_title">Popular Tags</h3>
                            <div class="tagcloud">
                                <?php 
                                $footer_all_tags = get_tags(array(
                                    'hide_empty' => false // for development = This returns both used and unused tags
                                ));
                                
                                if(!empty($footer_all_tags)) {
                                    foreach($footer_all_tags as $tag_key => $footer_tag) {
                                        if($tag_key <= 9) {
                                ?>
                                            <a href="<?= esc_url(get_tag_link($footer_tag->term_id)); ?>"><?= esc_html($footer_tag->name); ?></a>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row jusity-content-between align-items-center">
                    <div class="col-lg-12">
                        <p class="copyright-text">காப்புரிமை <i class="fal fa-copyright"></i> 2024 தமிழ் Buzz. அனைத்து உரிமைகளும் பாதுகாக்கப்பட்டவை.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--******************************** Code End  Here ******************************** -->


    <!-- Scroll To Top -->
    <div class="scroll-top"></div>

    <!--============================== All Js File ============================== -->
    <!-- Jquery -->
    <script src="<?= get_template_directory_uri(); ?>/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Slick Slider -->
    <script src="<?= get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?= get_template_directory_uri(); ?>/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="<?= get_template_directory_uri(); ?>/assets/js/jquery.counterup.min.js"></script>
    <!-- Range Slider -->
    <script src="<?= get_template_directory_uri(); ?>/assets/js/jquery-ui.min.js"></script>
    <!-- Isotope Filter -->
    <script src="<?= get_template_directory_uri(); ?>/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= get_template_directory_uri(); ?>/assets/js/isotope.pkgd.min.js"></script>

    <!-- Main Js File -->
    <script src="<?= get_template_directory_uri(); ?>/assets/js/main.js"></script>

    <script>
        if(document.querySelector(".news-ticker")){
            (function () {
                function start_marquee() {
                    function go() {
                        i = i < width ? i + step : 1;
                        m.style.marginLeft = -i + 'px';
                    }
                    var i = 0,
                        step = 3,
                        space = '';
                    var m = document.querySelector('.news-ticker');
                    var t = m.innerHTML; //text
                    m.innerHTML = t + space;
                    m.style.position = 'absolute'; 
                    var width = (m.clientWidth + 1);
                    m.style.position = '';
                    m.innerHTML = t + space + t + space + t + space;
                    // m.innerHTML = t + space + t + space + t + space + t + space + t + space + t + space + t + space;
                    if (m.addEventListener) {
                        m.addEventListener('mouseenter', function () {
                            step = 0;
                        }, false);
                        m.addEventListener('mouseleave', function () {
                            step = 3;
                        }, false);
                    }

                    var x = setInterval(go, 20);
                }

                if (window.addEventListener) {
                    window.addEventListener('load', start_marquee, false);
                } else if (window.attachEvent) { //IE7-8
                    window.attachEvent('onload', start_marquee);
                }
            })();
        }
    </script>

    <?= wp_footer(); ?>
</body>
</html>