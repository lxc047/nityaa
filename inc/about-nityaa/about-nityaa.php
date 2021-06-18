<?php
/**
 * About Nityaa
 *
 * @package Nityaa
 */

function about_nityaa() {
	add_theme_page( esc_html__( 'About nityaa', 'nityaa' ), esc_html__( 'About nityaa', 'nityaa' ), 'edit_theme_options', 'about-nityaa', 'about_nityaa_page' );
}
add_action( 'admin_menu', 'about_nityaa' );

/**
 * Enqueue css
 */

function nityaa_enqueue_about_info_scripts($hook) {
	if ( 'appearance_page_about-nityaa' != $hook ) {
		return;
	}
	// enqueue CSS
	wp_enqueue_style( 'about-nityaa-page-css', get_theme_file_uri( '/inc/about-nityaa/css/about-nityaa.css' ) );
}
add_action( 'admin_enqueue_scripts', 'nityaa_enqueue_about_info_scripts' );

/**
 * Check if plugin is installed
 */

function nityaa_check_if_plugin_installed( $slug, $filename ) {
	return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}

/**
 * Generate Recommended Plugin HTML
 */

function nityaa_recommended_plugin( $slug, $filename, $name, $description) {
	$img_size = '128x128';
?>
	<div class="plugin-card">
		<div class="name column-name">
			<h3>
				<?php echo esc_html( $name ); ?>
				<img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $img_size .'.png') ?>" class="plugin-icon" alt="">
			</h3>
		</div>
		<div class="action-links">

			<?php if ( nityaa_check_if_plugin_installed( $slug, $filename ) ) : ?>

			<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'nityaa' ); ?></button>

			<?php else : ?>

			<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >

				<?php esc_html_e( 'Install Now', 'nityaa' ); ?>

			</a>							

			<?php endif; ?>

		</div>

		<div class="desc column-description">

			<p><?php echo esc_html( $description ); ?></p>

		</div>
	</div>
<?php
}

/**
 * Changelog tab
 */

function parse_changelog() {

    WP_Filesystem();
    global $wp_filesystem;
    $changelog = $wp_filesystem->get_contents( get_template_directory() . '/inc/about-nityaa/changelog.txt' );
    if ( is_wp_error( $changelog ) ) {
        $changelog = '';
    }
    return $changelog;
}

/**
 * Render About Nityaa HTML
 */

function about_nityaa_page() {
?>

	<div class="info-wrap">
		<h1> <?php esc_html_e( 'Welcome to Nityaa !', 'nityaa' ); ?> </h1>
		<p class="welcome-text">
			<?php esc_html_e( 'Nityaa is fast & beautiful WordPress theme suitable for blog, personal portfolio website and business website. It works perfectly with elementor page builder so you can use elementor builder in this theme. This theme is fully responsive and translation ready. Nityaa is fast, fully customizable and you can use for building any kind of website.', 'nityaa' ); ?>
		</p>

		<!-- Tabs -->
		<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'getting_started'; ?>  

		<div class="tab-navigation-wrapper">
			<a href="?page=about-nityaa&tab=getting_started" class="nav-tab <?php echo $active_tab == 'getting_started' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'nityaa' ); ?>
			</a>
			<a href="?page=about-nityaa&tab=recommended_plugins" class="nav-tab <?php echo $active_tab == 'recommended_plugins' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Recommended Plugins', 'nityaa' ); ?>
			</a>

			<a href="?page=about-nityaa&tab=support" class="nav-tab <?php echo $active_tab == 'support' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'nityaa' ); ?>
			</a>
			
		</div>

		<!-- Tab Content -->

		<?php if ( $active_tab == 'getting_started' ) : ?>
			<div class="col-3-wrapper">
				<div class="col-3">
					<h3>
						<span class="dashicons dashicons-admin-customizer"></span>
						<?php esc_html_e( 'Theme Customizer', 'nityaa' ); ?>
					</h3>
					<p>
					<?php esc_html_e( 'We recommend you to open the Theme Customizer and add the content with available options.', 'nityaa' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'nityaa' ); ?></a>
				</div>

			</div>

		<?php elseif ( $active_tab == 'recommended_plugins' ) : ?>
			<div class="col-3-wrapper">

				<p><?php esc_html_e( 'You can use the recommended plugins that are styled to fit the theme design.', 'nityaa' ); ?></p>

				<br>
				<?php
				// Contact Form 7

				nityaa_recommended_plugin( 'contact-form-7', 'wp-contact-form-7', esc_html__( 'Contact Form 7', 'nityaa' ), esc_html__( 'Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup. ', 'nityaa' ) );

				?>
			</div>

		<?php elseif ( $active_tab == 'support' ) : ?>
			<div class="col-3-wrapper">
				<div class="col-3">
					<h3>
						<span class="dashicons dashicons-sos"></span>
						<?php esc_html_e( 'Contact Support', 'nityaa' ); ?>
					</h3>
					<p>

						<?php esc_html_e( 'If you have any problem, feel free to contact us through our online chat system or you can email us at any time.', 'nityaa' ); ?>

						<hr>

						<a target="_blank" href="<?php echo esc_url('https://www.dhaulagiriit.com.np/contact/'); ?>" class="button button-primary"><?php esc_html_e( 'Contact Support', 'nityaa' ); ?></a>
					</p>
				</div>

			</div>
		<?php endif; ?>
	</div><!-- /.wrap -->
<?php
} // end about_nityaa_page