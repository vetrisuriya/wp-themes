<?php

/**
 * 1. Register or Enable Features
 * 2. Modification Existing Features
 * 3. Useful defined Scripts
 * 4. Unwanted Scripts
*/



/* Load styles and scripts */
function my_enqueue_styles() {

    $css_version = time();

    // Enqueue the stylesheet
    wp_enqueue_style('ct-font-awesome', get_template_directory_uri() . '/assets/css/dist/font-awesome.min.css', array(), 'V3.0.0');
    wp_enqueue_style('ct-libraries', get_template_directory_uri() . '/assets/css/dist/ct-libraries.min.css', array('ct-font-awesome'), $css_version, 'all');
    wp_enqueue_style('ct-theme-styles', get_template_directory_uri() . '/assets/css/dist/ct-theme-styles.min.css', array('ct-libraries'), $css_version, 'all');
    /**
     * Front Page and Home Page
     * Front Page: The page set as the front page in WordPress settings.
     * Home Page: The main blog page when no static front page is set.
     */
    if(is_front_page() || is_home()) {
        // var_dump("Front Page");
        wp_enqueue_style('ct-home-page-style', get_template_directory_uri() . '/assets/css/dist/front-page.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    /**
     * Single Post: A single post page
     */
    if(is_single() && !is_singular('live_wire') && !is_singular('event_listing')) {
        // var_dump("Single Post Page");
        wp_enqueue_style('ct-single-post-style', get_template_directory_uri() . '/assets/css/dist/single.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    /**
     * Single Page: A single page
     */
    if(is_page() && !is_front_page() && !is_home() && !is_page_template('all-live-wire.php') && !is_page_template('all-news.php')) {
        // var_dump("Single Page");
        wp_enqueue_style('ct-single-page-style', get_template_directory_uri() . '/assets/css/dist/page.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    /**
     * Archive Page
     * Category Archive Page - Loads a specific stylesheet for category archive pages.
     * Tag Archive Page - Loads a specific stylesheet for tag archive pages.
     */
    if(is_category() || is_tag() || is_day() || is_month() || is_year() || is_date()) {
        // var_dump("Archive Page");
        wp_enqueue_style('ct-archive-page-style', get_template_directory_uri() . '/assets/css/dist/archive.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    /**
     * Author Archive Page: Load a stylesheet for author archive pages.
     */
    if(is_author()) {
        // var_dump("Author Page");
        wp_enqueue_style('ct-author-page-style', get_template_directory_uri() . '/assets/css/dist/author.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    /**
     * Search Results Page: Load a stylesheet for the search results page.
     */
    if(is_search()) {
        // var_dump("Search Page");
        wp_enqueue_style('ct-search-page-style', get_template_directory_uri() . '/assets/css/dist/search.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    /**
     * 404 Error Page: Load a stylesheet for the 404 error page.
     */
    if(is_404()) {
        // var_dump("404 Page");
        wp_enqueue_style('ct-404-page-style', get_template_directory_uri() . '/assets/css/dist/404.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    /**
     * Custom Post Type: Load a stylesheet for a specific custom post type.
     */
    if(is_singular('event_listing')) {
        // var_dump("Single Event Listing");
        wp_enqueue_style('ct-single-event_listing-style', get_template_directory_uri() . '/assets/css/dist/single-event_listing.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    if(is_singular('live_wire')) {
        // var_dump("Single Live Wire");
        wp_enqueue_style('ct-single-live_wire-style', get_template_directory_uri() . '/assets/css/dist/single-live_wire.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    if(is_post_type_archive('web-story')) {
        // var_dump("Archive Web Story");
        wp_enqueue_style('ct-archive-web-story-style', get_template_directory_uri() . '/assets/css/dist/archive-web-story.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    /**
     * Custom Templates: Load a stylesheet for specific custom page templates.
     */
    if(is_page_template('all-live-wire.php')) {
        // var_dump("All Live Wire Page Template");
        wp_enqueue_style('ct-all-live-wire-style', get_template_directory_uri() . '/assets/css/dist/all-live-wire.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    if(is_page_template('all-news.php')) {
        // var_dump("All News Page Template");
        wp_enqueue_style('ct-all-news-style', get_template_directory_uri() . '/assets/css/dist/all-news.min.css', array('ct-theme-styles'), $css_version, 'all');
    }
    
    

    // Enqueue Scripts
    wp_enqueue_script('ct-main-script', get_template_directory_uri() . '/assets/js/dist/ct-scripts.min.js', array(), $css_version, true);
    wp_enqueue_script('ct-main-script-map', '//@ sourceMappingURL=' . get_template_directory_uri() . '/assets/js/dist/ct-scripts.min.js.map');
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles', 1);

function remove_unwanted_assets() {
    if(!is_page('events') && !is_singular('event_listing')) {
        wp_dequeue_style('chosen');  // Replace with the actual style handle
        wp_dequeue_style('wp-event-manager-frontend');
        wp_dequeue_style('wp-event-manager-jquery-ui-css');
        wp_dequeue_style('wp-event-manager-jquery-timepicker-css');
        wp_dequeue_style('wp-event-manager-grid-style');
        wp_dequeue_style('wp-event-manager-font-style');
        // wp_dequeue_style('wp-event-manager-jquery-ui-daterangepicker');
        // wp_dequeue_style('wp-event-manager-jquery-ui-daterangepicker-style');

        wp_dequeue_script('wp-event-manager-common');  // Replace with the actual script handle
        wp_dequeue_script('wp-event-manager-jquery-timepicker');
        // wp_dequeue_script('wp-event-manager-jquery-ui-daterangepicker');
        // wp_dequeue_script('jquery-deserialize');
        // wp_dequeue_script('chosen');
        // wp_dequeue_script('wp-event-manager-ajax-filters');
        // wp_dequeue_script('wp-event-manager-content-event-listing');
    }

    if(!is_page('about')) {
        wp_dequeue_style('wp-block-library');
    }
}
add_action('wp_enqueue_scripts', 'remove_unwanted_assets', 100);





/******** Register or Enable Features ********/
/* Enable Featured Images*/
add_theme_support("post-thumbnails");
/* Set Post Formats */
add_theme_support("post-formats", array("aside", "gallery", "image", "video"));
// Embed support
add_filter('embed_oembed_discover', '__return_true');





/**
 * Upload the logo: After adding the above code, go to your WordPress dashboard, navigate to Appearance > Customize, and you should see the option to upload your custom logo under Site Identity.
 */
function theme_prefix_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 220,
        'flex-height' => false,
        'flex-width'  => false,
        'header-text' => array('site-title', 'site-description'),
    ) );
}
add_action('after_setup_theme', 'theme_prefix_setup');


function theme_customize_register($wp_customize) {
    // Add setting for header logo
    $wp_customize->add_setting('header_logo', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add control for header logo
    $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'header_logo', array(
        'label'    => __('Header Logo', 'theme_textdomain'),
        'section'  => 'title_tagline',
        'settings' => 'header_logo',
    )));

    // Add setting for footer logo
    $wp_customize->add_setting('footer_logo', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add control for footer logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label'    => __('Footer Logo', 'theme_textdomain'),
        'section'  => 'title_tagline',
        'settings' => 'footer_logo',
    )));
}
add_action('customize_register', 'theme_customize_register');


/* Enable menu and Register groups */
function register_my_menus() {
    register_nav_menus(array(
        "primary_menu" => _("Primary Menu")
    ));
}
add_action('after_setup_theme', 'register_my_menus');


/* Register Widgets = Better way to add multiple widgets areas */
function widget_registration($name, $id, $description,$beforeWidget, $afterWidget, $beforeTitle, $afterTitle){
	register_sidebar(array(
		'name' => $name,
		'id' => $id,
		'description' => $description,
		'before_widget' => $beforeWidget,
		'after_widget' => $afterWidget,
		'before_title' => $beforeTitle,
		'after_title' => $afterTitle,
	));
}
function ct_cust_widgets(){
	widget_registration('Single Blog Top Ad', 'single-blog-top-ad', 'Single Blog Page Top Advertisement Widget', '<div class="ct_ad-content"><div class="ct_ad-inner">', '</div></div>', '<h2>', '</h2>');
	widget_registration('Single Blog Bottom Ad', 'single-blog-bottom-ad', 'Single Blog Page Bottom Advertisement Widget', '<div class="ct_ad-content"><div class="ct_ad-inner">', '</div></div>', '<h2>', '</h2>');
	widget_registration('Recent News Top Ad', 'recent-news-top-ad', 'Single Page Recent News Top Advertisement Widget', '<div class="ct_ad-content"><div class="ct_ad-inner">', '</div></div>', '<h2>', '</h2>');
	widget_registration('Recent News Bottom Ad', 'recent-news-bottom-ad', 'Single Page Recent News Bottom Advertisement Widget', '<div class="ct_ad-content"><div class="ct_ad-inner">', '</div></div>', '<h2>', '</h2>');
}
add_action('widgets_init', 'ct_cust_widgets');



/******** Modification Existing Features ********/
/* Excerpt length Mod */
function new_excerpt_more($more) {
    return '' ;
}
add_filter('excerpt_more', 'new_excerpt_more');

function wp_example_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'wp_example_excerpt_length', 999);


// 404 Custom template
function my_custom_404_template($template) {
    if(is_404()) {
        $template = get_stylesheet_directory() . '/404.php';
    }
    return $template;
}
add_filter('template_include', 'my_custom_404_template');


/* add a class on nav menu anchor attributes */
function add_additional_class_on_a($classes, $item, $args) {
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

/* add sub menu ul class */
function my_nav_menu_submenu_css_class( $classes ) {
    $classes[] = 'submenu';
    return $classes;
}
add_filter('nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class');

/* nav menu list active highlight */
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
      $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

// image custom size
function wpse_setup_theme() {
    add_image_size('100-80', 100, 80, true);
    add_image_size('270-150', 270, 150, true);
    add_image_size('400-210', 400, 210, true);
    add_image_size('470-350', 470, 350, true);
    add_image_size('650-450', 650, 450, true);
    add_image_size('1200-600', 1200, 600, true);
}
add_action('after_setup_theme', 'wpse_setup_theme');



function cryptotale_pagination() {
	$allowed_tags = [
		'span' => [
			'class' => []
		],
		'a' => [
			'class' => [],
			'href' => []
        ],
	];

    $output = wp_kses(paginate_links(array(
        // 'before_page_number' => '<span class="">',
		// 'after_page_number' => '</span>',
    )), $allowed_tags);

    $output = str_replace('&laquo; Previous', '<i class="fa fa-angle-left"></i>', $output);
    $output = str_replace('Next &raquo;', '<i class="fa fa-angle-right"></i>', $output);

	printf('<div class="cust-pagination text-center mt-10 mb-3"><ul class="pagination">%s</ul></div>', $output);
}

function title_short($count, $dots = true) {
    if(strlen(the_title('','',FALSE)) > $count) { //Character length
        $title_short = substr(the_title('','',FALSE), 0, $count); // Character length
        preg_match('/^(.*)\s/s', $title_short, $matches);
        if ($matches[1]) $title_short = $matches[1];
        if($dots) {
            $title_short = $title_short.' ...'; // Ellipsis
        }
    } else {
        $title_short = the_title('','',FALSE);
    }

    return $title_short;
}

function title_trim($count, $str, $dots = true) {
    if(strlen($str) > $count) { //Character length
        $title_short = substr($str, 0, $count); // Character length
        preg_match('/^(.*)\s/s', $title_short, $matches);
        if ($matches[1]) $title_short = $matches[1];
        if($dots) {
            $title_short = $title_short.' ...'; // Ellipsis
        }
    } else {
        $title_short = $str;
    }

    return $title_short;
}




/******** Useful defined Scripts ********/
function ct_url($domain) {
    $social_urls = array(
        "facebook" => "https://www.facebook.com/cryptotalemedia",
        "instagram" => "https://www.instagram.com/cryptotalenews/",
        "linkedin" => "https://www.linkedin.com/company/cryptotalemedia/",
        "pinterest" => "#",
        "twitter" => "https://twitter.com/cryptotalemedia",
        "whatsapp" => "#",
        "telegram" => "https://t.me/cryptotale_news",
        "youtube" => "#"
    );
    return $social_urls[$domain];
}

/* Get list of all tags and cats associated with current post */
function ct_post_taxonomies($term = "tag") {
    if($term == "cat") {
        $post_tags = get_the_category();
    } else {
        $post_tags = get_the_tags();
    }
    $separator = ', ';
    $output = '';

    if(!empty($post_tags)) {
        foreach($post_tags as $tag) {
            $output .= '<li><a href="'.esc_attr(get_tag_link($tag->term_id)).'">'.__($tag->name).'</a>'.$separator.'</li>';
        }
    }

    return trim($output, $separator);
}

/* Function which displays your post date in time ago format */
function ct_post_time_ago() {
	return human_time_diff(get_the_time('U'), current_time('timestamp')).' '.__( 'ago' );
}

/* estimated reading time */
function reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count($content);
    $readingtime = ceil($word_count / 200);
    
    if($readingtime == 1) {
        $timer = " Min Read";
    } else {
        $timer = " Mins Read";
    }
    $totalreadingtime = $readingtime . $timer;
    
    return $totalreadingtime;
}

/* Single post & page count view & update */
function ct_posts_column_views($columns) {
    $columns['post_views'] = 'Views';
    return $columns;
}
add_filter('manage_posts_columns', 'ct_posts_column_views');
function ct_posts_custom_column_views($column) {
    if($column === 'post_views') {
        echo ct_get_post_view();
    }
}
add_action('manage_posts_custom_column', 'ct_posts_custom_column_views');
function ct_get_post_view() {
    $count = get_post_meta(get_the_ID(), 'post_views_count', true);
    return $count;
}
function ct_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta($post_id, $key, true);
    $count++;
    update_post_meta($post_id, $key, $count);
}



// live wire read more click action scripts
function enqueue_ajax_scripts() {
    wp_enqueue_script('ajax_scripts', get_template_directory_uri().'/assets/js/ajax-scripts.js', array(), 'v3.0.0', true);
    wp_localize_script('ajax_scripts', 'ajaxScripts', array('ajaxUrl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_scripts');


add_action('wp_ajax_update_read_count', 'update_read_count_callback');
add_action('wp_ajax_nopriv_update_read_count', 'update_read_count_callback'); // For non-logged-in users
function update_read_count_callback() {
    $post_id = isset($_POST['post_id']) ? sanitize_key( $_POST['post_id']) : 0;
    if($post_id) {
        $count = get_post_meta($post_id, 'read_count', true);
        $count = (int) $count + 1;
        update_post_meta( $post_id, 'read_count', $count);
        wp_die('Read count updated'); // Send a success message
    } else {
        wp_die('Error: Invalid post ID', 400); // Send an error message
    }
}

add_action('wp_ajax_update_share_count', 'update_share_count');
add_action('wp_ajax_nopriv_update_share_count', 'update_share_count');
function update_share_count() {
    if(isset($_POST['post_id'])) {

        $post_id = intval($_POST['post_id']);
        $social_media = sanitize_text_field($_POST['social_media']);

        $count_key = $social_media.'_share_count';

        $count = get_post_meta($post_id, $count_key, true);
        $count = ($count == '') ? 1 : $count + 1;
        update_post_meta($post_id, $count_key, $count);
        echo $count;
    }
    wp_die();
}




/**
 * Archive Web Stories
 */
// Web Stories Pagination customization script
add_action('pre_get_posts', 'customize_web_stories_archive_pagination');
function customize_web_stories_archive_pagination($query) {
    // Check if it's the Web Stories archive page
    if (is_archive() && $query->is_post_type_archive('web-story')) {
        // Set posts per page
        $query->set('posts_per_page', 9); // Replace with your desired number of stories per page

        // Pagination logic using `paged` or `pagename` (depending on permalink settings)
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query->set('paged', $paged);
    }
}


/********** Subscriber **********/
//  Create Custom table
function create_subscribe_table() {
    global $wpdb;
    $table_name = $wpdb->prefix.'subscribers';

    $charset_collate = $wpdb->get_charset_collate();
    $charset_collate = str_replace('utf8mb4', 'utf8', $charset_collate); // Use utf8 instead of utf8mb4

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id INT NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        date_subscribed DATETIME NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY email (email)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_setup_theme', 'create_subscribe_table');


function handle_subscribe_form() {
    if (!isset($_POST['subscriber_email'])) {
        wp_redirect(home_url());
        exit;
    }

    $email = sanitize_email($_POST['subscriber_email']);

    if (!is_email($email)) {
        wp_redirect(add_query_arg('subscribe', 'invalid', home_url()));
        exit;
    }

    global $wpdb;
    $table_name = $wpdb->prefix.'subscribers';

    // Check for existing email
    $existing_email = $wpdb->get_var($wpdb->prepare(
        "SELECT email FROM $table_name WHERE email = %s",
        $email
    ));

    if ($existing_email) {
        wp_redirect(add_query_arg('subscribe', 'exists', home_url()));
        exit;
    }

    // Insert the new email
    $wpdb->insert(
        $table_name,
        array('email' => $email, 'date_subscribed' => current_time('mysql')),
        array('%s')
    );

    wp_redirect(add_query_arg('subscribe', 'success', home_url()));
    exit;
}
add_action('admin_post_subscribe_form', 'handle_subscribe_form');
add_action('admin_post_nopriv_subscribe_form', 'handle_subscribe_form');


/********** Parent menu and Sub menu Custom Code **********/
// Add parent menu
function add_parent_menu() {
    add_menu_page(
        'Cryptotale Admin Page', // Page title
        'Cryptotale', // Menu title
        'manage_options', // Capability required to access the menu
        'cryptotale-admin', // Menu slug
        'cryptotale_admin_page_callback', // Callback function to render the menu page
        'dashicons-analytics', // Icon for the menu item
        30 // Position of the menu item
    );
}
add_action('admin_menu', 'add_parent_menu');

// Callback function to render parent menu page
function cryptotale_admin_page_callback() {
    include_once 'cryptotale-admin-menu/admin-dashboard.php'; // Path to your custom page template file
}

// Add submenus
function add_submenus() {
    add_submenu_page(
        'cryptotale-admin', // Parent menu slug
        'Subscribers Datas', // Page title
        'Subscribers', // Menu title
        'manage_options', // Capability required to access the menu
        'subscribers-lists', // Menu slug
        'cryptotale_subscribers_page_callback' // Callback function to render the submenu page
    );
}
add_action('admin_menu', 'add_submenus');

// Callback function to render subscribers datas page
function cryptotale_subscribers_page_callback() {
    include_once 'cryptotale-admin-menu/subscribers.php'; // Path to your custom page template file
}


/********** Custom Admin Dashboard Widgets **********/
// Custom Widget in WP Dashboard
// Function to add custom dashboard widget
function add_custom_dashboard_widget() {
    wp_add_dashboard_widget(
        'custom_dashboard_widget', // Widget slug
        'Cryptotale Short Dashboard', // Widget title
        'custom_dashboard_widget_content' // Callback function to render widget content
    );
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');

// Callback function to render custom dashboard widget content
function custom_dashboard_widget_content() {
    // Get total number of posts
    $total_posts = wp_count_posts()->publish;

    // Get total number of categories
    $total_categories = wp_count_terms('category');

    // Get total number of tags
    $total_tags = wp_count_terms('post_tag');

    // Output widget content
    echo '<p><strong>Total Posts:</strong> ' . $total_posts . '</p>';
    echo '<p><strong>Total Categories:</strong> ' . $total_categories . '</p>';
    echo '<p><strong>Total Tags:</strong> ' . $total_tags . '</p>';

    // You can add more information here, such as recent posts, top categories, etc.
}



/********** Custom Fields **********/
// Add custom meta box below Author block section
function add_editor_meta_box() {
    add_meta_box(
        'editor_meta_box', // Meta box ID
        'Editor', // Title of the meta box
        'display_editor_meta_box', // Callback function to display the meta box
        'post', // Post type where the meta box should be displayed
        'normal', // Context (normal, side, advanced)
        'high' // Priority (high, default, low)
    );
}
add_action('add_meta_boxes', 'add_editor_meta_box');

// Display callback function for Editor meta box
function display_editor_meta_box($post) {
    // Retrieve list of all authors
    $authors = get_users(array('role__in' => array('author', 'editor')));

    // Retrieve the current value of the Editor
    $selected_editor = get_post_meta($post->ID, 'post_editor', true);

    // Output the HTML for the meta box
    ?>
    <label for="selected_editor">Select Editor:</label>
    <select id="selected_editor" name="selected_editor">
        <option value="">Select</option>
        <?php
        foreach($authors as $author) {
            $author_selected = "";
            if($author->ID == 22) {
                $author_selected = "selected='selected'";
            }
        ?>
            <option value="<?php echo esc_attr($author->ID); ?>" <?php selected($selected_editor, $author->ID); ?> <?php echo $author_selected; ?>><?php echo esc_html($author->display_name); ?></option>
        <?php
        }
        ?>
    </select>
    <?php
}

// Save the value of the selected Editor
function save_editor_meta_box_value($post_id) {
    if(isset($_POST['selected_editor'])) {
        update_post_meta($post_id, 'post_editor', sanitize_text_field($_POST['selected_editor']));
    }
}
add_action('save_post', 'save_editor_meta_box_value');



/********** Shortcodes **********/
// Add Shortcode
function add_post_link_shortcode($atts) {
    // Extract attributes
    $atts = shortcode_atts(
        array(
            'id' => 0, // Default post ID is 0 (no post)
            'text' => '', // Default link text
        ),
        $atts,
        'post_link'
    );

    // Get the post ID from attributes
    $post_id = intval($atts['id']);
    
    // Check if the post ID is valid
    if($post_id <= 0) {
        return '<p>No valid post ID provided.</p>';
    }

    // Get the post object
    $post = get_post($post_id);

    // Check if the post exists
    if(!$post || $post->post_status != 'publish') {
        return '<p>Post not found or not published.</p>';
    }

    // Use the provided link text or default to the post title
    $link_text = !empty($atts['text']) ? $atts['text'] : get_the_title($post_id);

    // Generate the post link
    $post_link = get_permalink($post_id);

    // Return the HTML link
    return '<a href="'.esc_url($post_link).'" class="related-post">'.esc_html($link_text).'</a>';
}

// Register the shortcode
add_shortcode('post_link', 'add_post_link_shortcode'); // [post_link id="44364"]



/********** RSS feed **********/





// Lazy load images by default
/**
 * Enable Lazy Loading: WordPress 5.5+ supports native lazy loading. Ensure it’s enabled.
 */
add_filter('wp_lazy_loading_enabled', '__return_true');
// Disable srcset on images
add_filter('wp_calculate_image_srcset', '__return_false');
add_filter('wp_calculate_image_sizes', '__return_false');
add_filter('wp_get_attachment_image_attributes', function($attr) {
    if (isset($attr['srcset'])) {
        unset($attr['srcset']);
    }
    if (isset($attr['sizes'])) {
        unset($attr['sizes']);
    }
    return $attr;
});






// Add featured image to RSS feed
function add_featured_image_to_rss($content) {
    global $post;

    if (has_post_thumbnail($post->ID)) {
        $featured_image = get_the_post_thumbnail($post->ID, 'full');
        $content = $featured_image . $content;
    }

    return $content;
}
add_filter('the_excerpt_rss', 'add_featured_image_to_rss');
add_filter('the_content_feed', 'add_featured_image_to_rss');


// Remove embed, figure, object, iframe tags and their content from RSS feed
function remove_unwanted_tags_from_rss($content) {
    // Remove iframe tags and their content
    $content = preg_replace('/<iframe.*?>.*?<\/iframe>/is', '', $content);

    // Remove embed tags and their content
    $content = preg_replace('/<embed.*?>.*?<\/embed>/is', '', $content);

    // Remove object tags and their content
    $content = preg_replace('/<object.*?>.*?<\/object>/is', '', $content);

    // Remove figure tags and their content
    $content = preg_replace('/<figure.*?>.*?<\/figure>/is', '', $content);

    return $content;
}
add_filter('the_content_feed', 'remove_unwanted_tags_from_rss');


// Remove <div> elements with class 'related-post' from RSS feed content
function remove_related_post_div_from_rss($content) {
    // Remove <a> elements that contain the class 'related-post'
    $content = preg_replace('/<a[^>]*class=["\'].*?related-post.*?["\'][^>]*>.*?<\/a>/is', '', $content);

    return $content;
}
add_filter('the_content_feed', 'remove_related_post_div_from_rss');




// Sanitize html tags before storing post title
function sanitize_post_title_before_save($data, $postarr) {
    if (isset($data['post_title'])) {
        // Strip all HTML tags and ensure it's plain text
        $data['post_title'] = sanitize_text_field($data['post_title']);
    }

    return $data;
}
add_filter('wp_insert_post_data', 'sanitize_post_title_before_save', 10, 2);






function load_twitter_script() {
    wp_enqueue_script( 'twitter-widgets', 'https://platform.twitter.com/widgets.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'load_twitter_script' );

?>