<?php
/**
 * The header for our theme
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>

<a class="skip-link screen-reader-text" href="#main">
	<?php esc_html_e( 'Skip to main content', 'sts-kollegal' ); ?>
</a>

<header id="masthead" class="site-header" role="banner">
	<!-- Top Institutional Utility Strip -->
	<div class="sts-topbar">
		<div class="sts-container sts-topbar-inner">
			<div class="sts-topbar-contact">
				<?php if ( $phone = sts_get_phone() ) : ?>
					<a href="tel:<?php echo esc_attr( sts_get_phone_tel() ); ?>" class="sts-topbar-item" aria-label="<?php esc_attr_e( 'Call school', 'sts-kollegal' ); ?>">
						<i class="bi bi-telephone-fill" aria-hidden="true"></i>
						<span><?php echo esc_html( $phone ); ?></span>
					</a>
				<?php endif; ?>

				<?php if ( $email = sts_get_email() ) : ?>
					<a href="mailto:<?php echo esc_attr( $email ); ?>" class="sts-topbar-item" aria-label="<?php esc_attr_e( 'Email school', 'sts-kollegal' ); ?>">
						<i class="bi bi-envelope-fill" aria-hidden="true"></i>
						<span><?php echo esc_html( $email ); ?></span>
					</a>
				<?php endif; ?>

				<?php if ( $hours = sts_get_hours() ) : ?>
					<span class="sts-topbar-item sts-topbar-hours">
						<i class="bi bi-clock-fill" aria-hidden="true"></i>
						<span><?php echo esc_html( $hours ); ?></span>
					</span>
				<?php endif; ?>
			</div>

			<div class="sts-topbar-social">
				<?php if ( $fb = sts_get_facebook() ) : ?>
					<a href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener noreferrer" class="sts-social-link fb-link" aria-label="<?php esc_attr_e( 'STS Kollegal Facebook Page', 'sts-kollegal' ); ?>">
						<i class="bi bi-facebook" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Main Brand Header -->
	<div class="sts-brand-header">
		<div class="sts-container sts-brand-inner">
			<div class="sts-branding">
				<div class="sts-logo">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					} else {
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="custom-logo-link">
							<img src="<?php echo esc_url( STS_KOLLEGAL_URI . '/assets/images/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="custom-logo" width="100" height="100">
						</a>
						<?php
					}
					?>
				</div>
				<div class="sts-identity">
					<div class="sts-tibetan-title">སམ་བྷོ་ཊ་ཀོ་ལི་གྷལ་བོད་སློབ།</div>
					<h1 class="sts-school-name">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">SAMBHOTA TIBETAN SCHOOL KOLLEGAL</a>
					</h1>
					<p class="sts-affiliation">Under Sambhota Tibetan Schools Society (STSS), Dharamshala | Affiliated to CBSE New Delhi</p>
				</div>
			</div>

			<!-- Mobile Hamburger Toggle -->
			<button id="sts-nav-toggle" class="sts-nav-toggle" aria-expanded="false" aria-controls="sts-primary-nav" aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'sts-kollegal' ); ?>">
				<span class="sts-toggle-bar"></span>
				<span class="sts-toggle-bar"></span>
				<span class="sts-toggle-bar"></span>
				<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'sts-kollegal' ); ?></span>
			</button>
		</div>
	</div>

	<!-- Primary Navigation Bar -->
	<nav id="sts-primary-nav" class="sts-main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'sts-kollegal' ); ?>">
		<div class="sts-container sts-nav-inner">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'sts-primary-menu',
					'menu_class'     => 'sts-nav-menu',
					'container'      => false,
					'fallback_cb'    => false,
					'depth'          => 2,
				) );
			} else {
				// Fallback to page menu if no menu assigned
				wp_page_menu( array(
					'menu_class' => 'sts-nav-menu',
					'depth'      => 1,
				) );
			}
			?>
		</div>
	</nav>
</header>

<div id="content" class="site-content">
