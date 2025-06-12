	<footer class="ts-footer ts-footer-4 ts-footer-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="footer-widget border-right">
						<div class="footer-logo">
							<?php
							$footer_logo = get_theme_mod('footer_logo');
							if($footer_logo) {
							?>
								<a href="<?php echo site_url(); ?>" rel="home"><img src="<?php echo esc_url($footer_logo); ?>" alt="Cryptotale Footer Logo" decoding="async" fetchpriority="high"></a>
							<?php
							} else {
							?>
								<a href="<?php echo site_url(); ?>" rel="home"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/header-logo-dark.png" alt="Cryptotale Footer Logo" decoding="async" fetchpriority="high"></a>
							<?php
							}
							?>
						</div>
						<p>CryptoTale is an unbiased news portal providing breaking news, guides, blockchain news, and crypto price analysis & forecasts for bitcoin price and other altcoins.</p>
						<ul class="footer-social-list">
							<li class="ts-instagram"><a href="<?php echo ct_url("instagram"); ?>" aria-label="Instagram Share Button" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<li class="ts-facebook"><a href="<?php echo ct_url("facebook"); ?>" aria-label="Facebook Share Button" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li class="ts-twitter"><a href="<?php echo ct_url("twitter"); ?>" aria-label="Twitter Share Button" target="_blank" style="position: relative;top: 1px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 13px; width: 13px; fill: #fff;"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a></li>
							<li class="ts-telegram"><a href="<?php echo ct_url("telegram"); ?>" aria-label="Telegram Share Button" target="_blank"><i class="fa fa-telegram"></i></a></li>
							<li class="ts-linkedin"><a href="<?php echo ct_url("linkedin"); ?>" aria-label="Linkedin Share Button" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="footer-widget newsletter-widgets">
						<p>Get Crypto Stories Delivered Weekly</p>
						<form id="subscribe-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="newsletter-widgets-form" name="subscribe-email">
							<input type="email" name="subscriber_email" placeholder="Enter your e-mail..." class="newsletter-email" required autocomplete="off">
							<input type="hidden" name="action" value="subscribe_form">
							<button class="btn btn-primary m-0" name="subscribe" type="submit">Subscribe</button>
						</form>
						<?php
						if (isset($_GET['subscribe'])) {
							if ($_GET['subscribe'] == 'invalid') {
								echo '<p>Please enter a valid email address.</p>';
							} elseif ($_GET['subscribe'] == 'exists') {
								echo '<p>This email is already subscribed.</p>';
							} elseif ($_GET['subscribe'] == 'success') {
								echo '<p>Thank you for subscribing!</p>';
							}
						}
						?>
						<span>Your email address will NEVER be shared, rented or sold and you can unsubscribe at any time.</span>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<section class="copyright-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="copyright-text">
						<p>© Cryptotale. Blockchain News Media. All Rights Reserved.</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="footer-menu text-right">
						<ul>
							<li><a href="<?php echo site_url(); ?>/privacy-policy">Privacy Policy</a></li>
							<li><a href="<?php echo site_url(); ?>/terms">Terms and Conditions</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php wp_footer(); ?>
</body>
</html>