<?php


// Add meta description in WordPress without plugin
function meta_description_r() {
    if(is_single() || is_page()) { 
?>
    <meta name="description" content="<?php echo wp_strip_all_tags(get_the_excerpt(), true); ?>">
<?php 
    }
}
add_action('wp_head', 'meta_description_r');



// How to Add Keywords In WordPress Without Plugins





// Limit login attempts
function check_attempted_login($user, $username, $password) {
	$try_limit = 3;
    if(get_transient('attempted_login_'.$username)) {
        $datas = get_transient('attempted_login_'.$username);

        if($datas['tried'] >= $try_limit) {
            $until = get_option('_transient_timeout_'.'attempted_login_'.$username);
            $time = time_to_go($until);

            return new WP_Error('too_many_tried', sprintf(__('<strong>ERROR</strong>: You have reached authentication limit, you will be able to try again in %1$s.'), $time));
        }
    }
    return $user;
}
add_filter('authenticate', 'check_attempted_login', 30, 3);

function login_failed($username) {
	$ban_duration = 1;  // hour(s)
	
    if(get_transient('attempted_login_'.$username)) {
        $datas = get_transient('attempted_login_'.$username);
        $datas['tried']++;

        if($datas['tried'] <= 3) {
            set_transient('attempted_login_'.$username, $datas, $ban_duration * 3600);
        }
    } else {
        $datas = array(
            'tried'     => 1
        );
        set_transient('attempted_login_'.$username, $datas, $ban_duration * 3600);
    }
}
add_action('wp_login_failed', 'login_failed', 10, 1);

function time_to_go($timestamp) {

    // converting the mysql timestamp to php time
    $periods = array(
        "second",
        "minute",
        "hour",
        "day",
        "week",
        "month",
        "year"
    );
    $lengths = array(
        "60",
        "60",
        "24",
        "7",
        "4.35",
        "12"
    );
    $current_timestamp = time();
    $difference = abs($current_timestamp - $timestamp);
    for($i = 0; $difference >= $lengths[$i] && $i < count($lengths) - 1; $i ++) {
        $difference /= $lengths[$i];
    }
    $difference = round($difference);
    if (isset($difference)) {
        if($difference != 1) {
            $periods[$i] .= "s";
            $output = "$difference $periods[$i]";
            return $output;
        }
    }
}


?>