<?php
/**
 * The home content hook for Nityaa theme.
 *
 * This is the template that displays home page contents of the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nityaa
 */

if ( ! function_exists( 'nityaa_home_content' ) ) :

	function nityaa_home_content(){

		$theme_options  = nityaa_theme_options();
		?>
				<?php
					do_action( 'nityaa_banner_content' );
					do_action( 'nityaa_about_content' );
					do_action( 'nityaa_services_content' );
					do_action( 'nityaa_testimonial_content' );
					do_action( 'nityaa_clients_content' );
				?>
			<?php
	}

endif;

add_action( 'nityaa_action_home_content', 'nityaa_home_content', 10 );


/**
 * For banner section
 */
if ( ! function_exists( 'nityaa_banner_content_section' ) ) :

	function nityaa_banner_content_section(){

		$theme_options    = nityaa_theme_options();

		$enable_btn       = $theme_options['slider_btn_enable'];

		$enable_excerpt   = $theme_options['slider_excerpt_enable'];

		if( 'slider' === $theme_options['main_slider_type'] && ( 1 === $theme_options['slider_enable']) ){ 

			if(!empty( $theme_options['slider_cat'] )){

				$slider_args = array( 
									'cat'             => absint( $theme_options['slider_cat'] ), 
									'post_status'     => 'publish', 
									'posts_per_page'  => 5,
									'ignore_sticky_posts' => 1,
								);

			} else{

			$slider_args = array( 'post_status' => 'publish', 'posts_per_page' => 5, 'ignore_sticky_posts' => 1 );

			}

			$slider_query = new WP_Query( $slider_args ); 

			if ( $slider_query->have_posts() ) {

		?>

		<!-- Banner Starts Here -->

		<section class="main-banner header-text" id="top">
				<div class="Modern-Slider">

				<?php
					$count= 1;
					while ( $slider_query->have_posts() ) : $slider_query->the_post();

					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>

					<div class="item item-<?php echo $count; ?>">

					<div class="img-fill" style="background-image: url(<?php echo esc_url($image_url[0]); ?>);">
							<div class="text-content">
									
									<h4><?php the_title(); ?></h4>
									<?php if( 1 == $enable_excerpt ){ ?>
									<?php the_excerpt(); ?>
								<?php } ?>
								
								<?php if( 1 == $enable_btn ){ ?>
							<div class="btn btn-business">
								<a href="<?php the_permalink(); ?>" class="filled-button"> <?php echo esc_html__( 'Read More', 'nityaa' ) ?> </a>
							</div>
							<?php } ?>
							</div>
					</div>
				</div><!--item-->

			<?php $count++; endwhile; ?>

			</div><!--Modern-Slider-->
		</section><!--main-banner-->

		<!-- Banner Ends Here -->

		<?php
		wp_reset_postdata(); 
			} else {

			}

		} elseif( 'banner-image' === $theme_options['main_slider_type'] && ( 1 === $theme_options['slider_enable']) ) { 

			$banner_args = array( 
								'p'           		=> absint( $theme_options['banner_image'] ),
								'post_status'   	=> 'publish', 
								'posts_per_page'  	=> 1,
								'ignore_sticky_posts' => 1,
							);

			if(empty( $banner_args )) {

				$banner_args = array( 'post_status' => 'publish', 'posts_per_page' => 1, 'ignore_sticky_posts' => 1 );

			}
			 
			$banner_query = new WP_Query( $banner_args ); 

			if ( $banner_query->have_posts() ) {


		while ( $banner_query->have_posts() ) : $banner_query->the_post(); 

					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>

					<!-- Page Content -->
		<section class="page-heading header-text" style="background-image: url(<?php echo esc_url($image_url[0]); ?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><?php the_title(); ?></h1>
						<?php if( 1 == $enable_excerpt ){ ?>
							<?php the_excerpt(); ?>
						<?php } ?>

						<?php if( 1 == $enable_btn ){ ?>
							<div class="btn btn-business">
								<a href="<?php the_permalink(); ?>" class="filled-button"> <?php echo esc_html__( 'Read More', 'nityaa' ) ?> </a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>

		<?php 
		endwhile;
		wp_reset_postdata(); 
			} else { ?>

			<div class="page-heading header-text">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1><?php echo esc_html( 'Invalid Post ID, Please insert the valid Post ID', 'nityaa' ); ?></h1>
						</div>
					</div>
				</div>
			</div>

		<?php
			}
		} else {


		}

	}

endif;

add_action( 'nityaa_banner_content', 'nityaa_banner_content_section', 10 );


/**
 * For about section
 */

if ( ! function_exists( 'nityaa_about_content_section' ) ) :

	function nityaa_about_content_section(){

		$theme_options  = nityaa_theme_options();

		$about_us         = $theme_options['about_us'];

		if( !empty( $about_us )){

			$about_args = array( 
				'page_id'         => absint( $about_us ), 
				'post_status'     => 'publish',
			);

			$about_query = new WP_Query( $about_args ); 

			if ( $about_query->have_posts() ) :

				while ( $about_query->have_posts() ) : $about_query->the_post();

				$about_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>

				<section class="more-info">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="more-info-content">
									<div class="row">
										<div class="col-md-6">
											<div class="left-image">
												<?php if(!empty( $about_img )) { ?>
													<img src="<?php echo esc_url($about_img[0]); ?>" alt="<?php the_title(); ?>">
												<?php } ?>
											</div>
										</div>
										<div class="col-md-6 align-self-center">
											<div class="right-content">
												<h2><?php the_title(); ?></h2>
												<?php the_excerpt(); ?>
												<a href="<?php the_permalink(absint( $about_us )); ?>" class="filled-button"> <?php echo esc_html__( 'Read More', 'nityaa' ) ?> </a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<?php
				endwhile;
				wp_reset_postdata();

				endif;
			}
	}

endif;

add_action( 'nityaa_about_content', 'nityaa_about_content_section', 10 );


/**
 * For services section
 */

if ( ! function_exists( 'nityaa_services_content_section' ) ) :

	function nityaa_services_content_section(){

		$theme_options  = nityaa_theme_options();

		$our_services   = $theme_options['our_services'];

		if( !empty( $our_services ) ){

		?>

		<section class="services">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-heading">
							<h2><?php echo esc_html(get_the_category_by_ID( absint( $our_services ) )); ?></h2>
							<span><?php echo wp_kses_post(category_description( absint( $our_services ) )); ?></span>
						</div>
					</div>
					<?php
					$services_args = array( 
								'cat'             => absint( $our_services ), 
								'post_status'     => 'publish', 
								'posts_per_page'  => 3,
							);
					
						$services_query = new WP_Query( $services_args ); 

						if ( $services_query->have_posts() ) :

						while ( $services_query->have_posts() ) : $services_query->the_post();

						$service_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'nityaa-blog' );
					?>

					<div class="col-xs-12 col-md-4">
						<div class="service-item">
							<?php if(!empty( $service_img )) { ?>
							<img src="<?php echo esc_url($service_img[0]); ?>" alt="">
							<?php } ?>
							<div class="down-content">
								<h4><?php the_title(); ?></h4>
								<p><?php the_excerpt(); ?></p>
								<a href="<?php the_permalink(); ?>" class="filled-button"> <?php echo esc_html__( 'Read More', 'nityaa' ) ?> </a>
							</div>
						</div>
					</div>

					<?php endwhile; wp_reset_postdata(); endif; ?>

				</div>
			</div>
		</section>

		<?php
			}

	}

endif;

add_action( 'nityaa_services_content', 'nityaa_services_content_section', 10 );

/**
 * For testimonial section
 */

if ( ! function_exists( 'nityaa_testimonial_content_section' ) ) :

	function nityaa_testimonial_content_section(){

		$theme_options  = nityaa_theme_options();

		$testimonial   = $theme_options['nityaa_testi'];

		if( !empty( $testimonial ) ){

		?>

		<section class="testimonials">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-heading">
							<h2><?php echo esc_html(get_the_category_by_ID( absint( $testimonial ) )); ?></h2>
							<span><?php echo wp_kses_post(category_description( absint( $testimonial ) )); ?></span>
						</div>
					</div>

					<?php
					$testimonial_args = array( 
								'cat'             => absint( $testimonial ), 
								'post_status'     => 'publish', 
								'posts_per_page'  => 4,
							);
					
					$testimonial_query = new WP_Query( $testimonial_args ); 

					if ( $testimonial_query->have_posts() ) :
				?>

					<div class="col-md-12">
						<div class="owl-testimonials owl-carousel">
							<?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post();

							$testi_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
							?> 
							<div class="testimonial-item">
								<div class="inner-content">
									<h4><?php the_title(); ?></h4>
									<?php the_content(); ?>
								</div>
								<?php if(!empty( $testi_img )) { ?>
								<img src="<?php echo esc_url($testi_img[0]); ?>" alt="<?php the_title(); ?>">
							<?php } ?>
							</div>
							<?php endwhile; ?>
							
						</div>
					</div>
				<?php wp_reset_postdata();  endif; ?>
				</div>
			</div>
		</section>

		<?php
		}

	}

endif;

add_action( 'nityaa_testimonial_content', 'nityaa_testimonial_content_section', 10 );


/**
 * For clients section
 */

if ( ! function_exists( 'nityaa_clients_content_section' ) ) :

	function nityaa_clients_content_section(){

		$theme_options  = nityaa_theme_options();

		$our_clients   = $theme_options['our_clients'];

		if( !empty( $our_clients ) ){

		?>

		<section class="partners">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-heading">
							<h2><?php echo esc_html(get_the_category_by_ID( absint( $our_clients ) )); ?></h2>
							<span><?php echo wp_kses_post(category_description( absint( $our_clients ) )); ?></span>
						</div>
					</div>

					<?php
					$clients_args = array( 
								'cat'             => absint( $our_clients ), 
								'post_status'     => 'publish', 
								'posts_per_page'  => 6,
							);
					
					$clients_query = new WP_Query( $clients_args ); 

					if ( $clients_query->have_posts() ) : ?>

					<div class="col-md-12">
						<div class="owl-partners owl-carousel">

							<?php while ( $clients_query->have_posts() ) : $clients_query->the_post(); 
								$clients_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'nityaa-clients' );
								?>
						
							<div class="partner-item">
								<?php if(!empty( $clients_img )) { ?>
									<img src="<?php echo esc_url($clients_img[0]); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
								<?php } ?>
							</div>

						<?php endwhile; ?>
							
						</div>
					</div>
					<?php wp_reset_postdata();  endif; ?>
				</div>
			</div>
		</section>

		<?php
		}

	}

endif;

add_action( 'nityaa_clients_content', 'nityaa_clients_content_section', 10 );
