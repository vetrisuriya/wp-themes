<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
<head>
    <!-- meta character set -->
	<meta charset="<?php echo bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Author Meta -->
	<meta name="author" content="Cryptotale">


    <!-- Favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicon.png">
    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-icon" sizes="57x57" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-icon" sizes="60x60" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-icon" sizes="72x72" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-icon" sizes="76x76" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-icon" sizes="114x114" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-icon" sizes="120x120" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-icon" sizes="144x144" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-icon" sizes="152x152" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#FFA031">
    <meta name="msapplication-TileImage" content="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#FFA031">

    <!-- 
        Colors
            - orange: #FFA031
            - gray: #242527
	-->
   
	<?php wp_head(); ?>

	<!-- Performance Issue = Performance, Accessibility -->
	<!-- <meta name="msvalidate.01" content="E4D115CA16C99777BCBF00BBCAF6C2B5" /> -->

	
	<!-- Google Tag Manager --> 
	<script>
		(function(w,d,s,l,i){
			w[l]=w[l]||[];
			w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
			var f=d.getElementsByTagName(s)[0], 
				j=d.createElement(s),
				dl=l!='dataLayer'?'&l='+l:'';
			j.async=true;
			j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
			f.parentNode.insertBefore(j,f); 
		})(window,document,'script','dataLayer','GTM-N6Z6NDWF');
	</script>
	<!-- End Google Tag Manager -->

	<!-- addons styles for browser extension -->
	<style>
		div[style*="background-color:#22F5F5"] {
			background-color: red !important;
		}
	</style>
</head>
<body class="body-color">
	
	<!-- Google Tag Manager (noscript) --> 
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N6Z6NDWF" 
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> 
	<!-- End Google Tag Manager (noscript) -->

	<!-- top bar start -->
	<section class="top-bar bg-dark-item">
		<div class="container">
			<div class="row">
				<div class="align-self-center col-6 col-md-6 col-sm-6">
					<ul class="text-left text-sm-left top-social">
						<li class="ts-date ml-0"><i class="fa fa-clock-o"></i> <?php echo date("d F, Y"); ?></li>
					</ul>
				</div>
				<div class="align-self-center col-6 col-md-6 col-sm-6">
					<ul class="text-right text-sm-right top-social social-icons">
						<li>
							<a href="<?php echo ct_url("instagram"); ?>" aria-label="Instagram Share Button" target="_blank"><i class="fa fa-instagram"></i></a>
							<a href="<?php echo ct_url("facebook"); ?>" aria-label="Facebook Share Button" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="<?php echo ct_url("twitter"); ?>" aria-label="Twitter Share Button" target="_blank" style="position: relative;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 13px; width: 13px; fill: #edededad;"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a>
							<a href="<?php echo ct_url("telegram"); ?>" aria-label="Telegram Share Button" target="_blank"><i class="fa fa-telegram"></i></a>
							<a href="<?php echo ct_url("linkedin"); ?>" aria-label="Linkedin Share Button" target="_blank"><i class="fa fa-linkedin"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- end top bar-->

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

	<!-- ad banner start -->
	<section class="header-middle p-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 align-self-center header-logo-parent">
					<div class="header-logo">
						<?php
						$header_logo = get_theme_mod('header_logo');
						if($header_logo) {
						?>
							<a href="<?php echo site_url(); ?>" rel="home"><img src="<?php echo esc_url($header_logo); ?>" alt="Cryptotale Logo" decoding="async" fetchpriority="high" rel="preload"></a>
						<?php
						} else {
						?>
							<a href="<?php echo site_url(); ?>" rel="home"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/header-logo.png" alt="Cryptotale Logo" decoding="async" fetchpriority="high" rel="preload"></a>
						<?php
						}
						?>
					</div>
				</div>
				<div class="align-self-center col-12 col-lg-7 col-md-12 px-0">
					<div class="block-wrapper">
						<div class="clearfix ts-breaking-news">

						</div>
					</div>
				</div>
				<div class="align-items-center col-lg-3 flex justify-content-center search-form-parent">
					<form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="search-forms">
						<div class="email-form-group media-body">
							<input type="search" name="s" id="newsletter-form-email" class="form-control newsletter-mail" placeholder="Type Here..." autocomplete="off" required="" value='<?php echo $search_text; ?>'>
							<button class="btn btn-primary ts-submit-btn" aria-label="Search Post Button"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- header nav start-->
	<header class="navbar-standerd nav-item">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="navigation ts-main-menu navigation-landscape">
						<div class="nav-header">
							<?php
							$header_logo = get_theme_mod('header_logo');
							if($header_logo) {
							?>
								<a class="nav-brand" href="<?php echo site_url(); ?>" rel="home"><img src="<?php echo esc_url($header_logo); ?>" alt="Cryptotale Mobile Logo" decoding="async" fetchpriority="high" rel="preload"></a>
							<?php
							} else {
							?>
								<a class="nav-brand" href="<?php echo site_url(); ?>" rel="home"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/header-logo.png" alt="Cryptotale Mobile Logo" decoding="async" fetchpriority="high" rel="preload"></a>
							<?php
							}
							?>
							<div class="nav-toggle"></div>
						</div>

						<div class="nav-menus-wrapper clearfix">
							<!--nav right menu start-->
							<ul class="right-menu align-to-right desktop-search">
								<li class="header-search">
									<div class="nav-search">
										<div class="nav-search-button"><i class="icon icon-search"></i></div>
										<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
											<span class="nav-search-close-button" tabindex="0">✕</span>
											<div class="nav-search-inner">
												<input type="search" name="s" placeholder="Type Here..." value='<?php echo $search_text; ?>' autocomplete="off">
											</div>
										</form>
									</div>
								</li>
							</ul>
							<!--nav right menu end-->

							<!-- nav menu start-->
							<ul class="align-items-center flex justify-content-center nav-menu">
								<?php
								$menu_name = 'primary_menu'; // Replace with your menu name
								$locations = get_nav_menu_locations();
								$menu_id = $locations[$menu_name];
								$menuitems = wp_get_nav_menu_items($menu_id);

								// echo "<pre>";
								// print_r($menuitems);
								// echo "</pre>";

								if($menuitems) {
									foreach($menuitems as $item) {
										if(!$item->menu_item_parent) { // Top-level item
											echo '<li><a href="' . $item->url . '"><div>' . $item->title . '</div></a>';
											$has_submenu = false;
											foreach($menuitems as $sub_item) {
												if($sub_item->menu_item_parent == $item->ID) { // Submenu item
													if(!$has_submenu) {
														echo '<ul class="nav-dropdown">';
														$has_submenu = true;
													}

													echo '<li><a href="' . $sub_item->url . '">' . $sub_item->title . '</a>';
													$has_subsubmenu = false;
													foreach($menuitems as $subsub_item) {
														if($subsub_item->menu_item_parent == $sub_item->ID) { // Submenu item
															if(!$has_subsubmenu) {
																echo '<ul class="nav-dropdown">';
																$has_subsubmenu = true;
															}
															echo '<li><a href="' . $subsub_item->url . '">' . $subsub_item->title . '</a></li>';
														}
													}
													if($has_subsubmenu) {
														echo '</ul>';
													}
													echo '</li>';
												}
											}
											if($has_submenu) {
												echo '</ul>';
											}
											echo '</li>';
										}
									}
								}
								?>
							</ul>
							<!--nav menu end-->
						</div>
					</nav>
					<!-- nav end-->
				</div>
			</div>
		</div>
	</header>
	<!-- header nav end-->