<?php

/**
 * 1. Register or Enable Features
 * 2. Modification Existing Features
 * 3. Useful defined Scripts
 * 4. Unwanted Scripts
 */

/******** Register or Enable Features ********/
/* Enable Featured Images*/
add_theme_support("post-thumbnails");

/* Set Post Formats */
add_theme_support("post-formats", array("aside", "gallery", "image", "video"));

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
function mytheme_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

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



/******** Useful defined Scripts ********/
function ss_url($domain) {
    $social_urls = array(
        "facebook" => "https://www.facebook.com/tamilbuzzdubai",
        "instagram" => "https://www.instagram.com/tamilbuzzdubai/",
        "linkedin" => "#",
        "pinterest" => "#",
        "twitter" => "https://x.com/tamilbuzzdubai",
        "thread" => "https://www.threads.net/@tamilbuzzdubai",
        "whatsapp" => "https://www.whatsapp.com/channel/0029VaAqrXo6xCSTQXq5bi2u",
        "telegram" => "https://t.me/tamilbuzzdubai",
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

/* Single post count view & update */
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









// function load_elementor_template($template_name) {
//     $templates = \Elementor\Plugin::instance()->templates_manager->get_source('local')->get_items();

//     if (!empty($templates)) {
//         foreach ($templates as $template) {
//             if ($template['title'] == $template_name) {
//                 echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template['template_id']);
//                 break;
//             }
//         }
//     }
// }





// image custom size
function wpse_setup_theme() {
    add_theme_support('post-thumbnails');
    // home section 1
    add_image_size('600-464', 600, 464, true);
    add_image_size('288-220', 288, 220, true);
    // home section 2
    add_image_size('288-187', 288, 187, true);
    // home section 3
    add_image_size('355-450', 355, 450, true);
    // home section 4
    add_image_size('392-414', 392, 414, true);
    add_image_size('130-122', 130, 122, true);
    // footer
    add_image_size('80-80', 80, 80, true);
    // archive page (cat, tag, date)
    add_image_size('386-300', 386, 300, true);
    // author page
    add_image_size('270-220', 270, 220, true);
    // single page
    add_image_size('896-500', 896, 500, true);
    // single page
    add_image_size('392-310', 392, 310, true);
}
add_action('after_setup_theme', 'wpse_setup_theme');



function tamilbuzz_pagination() {

	$allowed_tags = [
		'span' => [
			'class' => []
		],
		'a' => [
			'class' => [],
			'href' => [],
		]
	];

	$args = [];

    $output = wp_kses(paginate_links($args), $allowed_tags);

    $output = str_replace('&laquo; Previous', '<i class="fas fa-arrow-left"></i>', $output);
    $output = str_replace('Next &raquo;', '<i class="fas fa-arrow-right"></i>', $output);


	printf('<div class="th-pagination mt-40 text-center"><ul>%s</ul></div>', $output);
}


// estimated reading time
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


function title_short($count) {
    if(strlen(the_title('','',FALSE)) > $count) { //Character length
        $title_short = substr(the_title('','',FALSE), 0, $count); // Character length
        preg_match('/^(.*)\s/s', $title_short, $matches);
        if ($matches[1]) $title_short = $matches[1];
        $title_short = $title_short.' ...'; // Ellipsis
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


function tamil_mon($date_mon) {
    if(str_contains($date_mon, "January")) {
        $date_mon = str_replace("January", "ஜனவரி", $date_mon);
    } elseif(str_contains($date_mon, "Jan")) {
        $date_mon = str_replace("Jan", "ஜனவரி", $date_mon);
    } elseif(str_contains($date_mon, "February")) {
        $date_mon = str_replace("February", "பிப்ரவரி", $date_mon);
    } elseif(str_contains($date_mon, "Feb")) {
        $date_mon = str_replace("Feb", "பிப்ரவரி", $date_mon);
    } elseif(str_contains($date_mon, "March")) {
        $date_mon = str_replace("March", "மார்ச்", $date_mon);
    } elseif(str_contains($date_mon, "Mar")) {
        $date_mon = str_replace("Mar", "மார்ச்", $date_mon);
    } elseif(str_contains($date_mon, "April")) {
        $date_mon = str_replace("April", "ஏப்ரல்", $date_mon);
    } elseif(str_contains($date_mon, "Apr")) {
        $date_mon = str_replace("Apr", "ஏப்ரல்", $date_mon);
    }  elseif(str_contains($date_mon, "May")) {
        $date_mon = str_replace("May", "மே", $date_mon);
    } elseif(str_contains($date_mon, "June")) {
        $date_mon = str_replace("June", "ஜூன்", $date_mon);
    } elseif(str_contains($date_mon, "Jun")) {
        $date_mon = str_replace("Jun", "ஜூன்", $date_mon);
    } elseif(str_contains($date_mon, "July")) {
        $date_mon = str_replace("July", "ஜூலை", $date_mon);
    } elseif(str_contains($date_mon, "Jul")) {
        $date_mon = str_replace("Jul", "ஜூலை", $date_mon);
    } elseif(str_contains($date_mon, "August")) {
        $date_mon = str_replace("August", "ஆகஸ்ட்", $date_mon);
    } elseif(str_contains($date_mon, "Aug")) {
        $date_mon = str_replace("Aug", "ஆகஸ்ட்", $date_mon);
    } elseif(str_contains($date_mon, "September")) {
        $date_mon = str_replace("September", "செப்டம்பர்", $date_mon);
    } elseif(str_contains($date_mon, "Sep")) {
        $date_mon = str_replace("Sep", "செப்டம்பர்", $date_mon);
    } elseif(str_contains($date_mon, "October")) {
        $date_mon = str_replace("October", "அக்டோபர்", $date_mon);
    } elseif(str_contains($date_mon, "Oct")) {
        $date_mon = str_replace("Oct", "அக்டோபர்", $date_mon);
    } elseif(str_contains($date_mon, "November")) {
        $date_mon = str_replace("November", "நவம்பர்", $date_mon);
    } elseif(str_contains($date_mon, "Nov")) {
        $date_mon = str_replace("Nov", "நவம்பர்", $date_mon);
    } elseif(str_contains($date_mon, "December")) {
        $date_mon = str_replace("December", "டிசம்பர்", $date_mon);
    } elseif(str_contains($date_mon, "Dec")) {
        $date_mon = str_replace("Dec", "டிசம்பர்", $date_mon);
    }

    return $date_mon;
}

?>