<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
	<?php
	if( is_front_page() && !empty( $banners ) ):
		foreach( $banners as $index => $banner ):
			$desktop_url = isset( $banner['img_banner']['sizes']['large'] )
				? $banner['img_banner']['sizes']['large']
				: '';
			$mobile_url  = isset( $banner['img_banner_mobile']['sizes']['large'] )
				? $banner['img_banner_mobile']['sizes']['large']
				: $desktop_url;
			if( !empty( $desktop_url ) ):
				?>
				<link rel="preload" href="<?= esc_url( $desktop_url ); ?>" as="image" fetchpriority="high" type="image/webp">
				<?php
			endif;
			if( !empty( $mobile_url ) && $mobile_url !== $desktop_url ):
				?>
				<link rel="preload" href="<?= esc_url( $mobile_url ); ?>" as="image" fetchpriority="high" type="image/webp" media="(max-width: 767px)">
				<?php
			endif;
		endforeach;
	endif;
	?>
</head>

<body <?php body_class() ?>>
	<?php wp_body_open();
	$book_now_header = get_field( 'book_now_header', 'option' );
	$event_image     = get_field( 'event_image', 'option' );
	$event_url       = get_field( 'event_url', 'option' );
	?>

	<header class="header bg-[#fbf4f1] sticky top-0 z-[999] w-full">
		<div class="container">
			<div class="header__wrapper">
				<div class="header__menu header__left lg:flex items-center gap-6">
					<?php
					wp_nav_menu( [
						'menu_id'         => 'menu-left',
						'menu_class'      => 'menu no-list flex font-heading',
						'container'       => 'nav',
						'container_class' => 'nav',
						'theme_location'  => 'left',
					] );
					?>
					<button type="button" class="navbar-toggler btn pr-0 toggle-menu lg:hidden" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
						<?php Flux\Icon::output( 'menu' ) ?>
					</button>
				</div>
				<div class="header__logo">
					<?php if( is_front_page() ) { ?>
						<h1 alt="<?php bloginfo( 'description' ); ?>" class="m-0 p-0 flex items-center">
							<?php the_custom_logo(); ?>
						</h1>
						<?php
					} else {
						?>
						<?php the_custom_logo(); ?>
						<?php
					}
					?>
				</div>
				<div class="header__menu header__right hidden lg:flex items-center gap-6">
					<?php
					wp_nav_menu( [
						'menu_id'         => 'menu-right',
						'menu_class'      => 'menu no-list flex font-heading',
						'container'       => 'nav',
						'container_class' => 'nav',
						'theme_location'  => 'right',
					] );
					?>
					<a href="<?= esc_url( $book_now_header ); ?>" target="_blank" class="btn-call px-6 py-3 text-white rounded-[30px] border-solid border-[1px] border-[#911439] bg-[#911439] hover:text-[#911439] hover:bg-transparent text-[14px] lg:text-[18px] font-medium hover:no-underline" aria-label="Book Now" title="Book Now">
						<?= esc_html( 'Book Now' ); ?>
					</a>
				</div>
			</div>
		</div>
	</header>
	<div class="menu-mobile">
		<div class="menu-mobile-top">
			<?php the_custom_logo(); ?>
			<button type="button" class="navbar-toggler btn pr-0 toggle-menu lg:hidden" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
				<?php Flux\Icon::output( 'close' ) ?>
			</button>
		</div>
		<div class="menu-mobile-list">
			<?php
			wp_nav_menu( [
				'menu_id'         => 'menu-mobile',
				'menu_class'      => 'menu no-list flex font-heading',
				'container'       => 'nav',
				'container_class' => 'nav ',
				'theme_location'  => 'primary',
			] );
			?>
		</div>
		<div class="menu-mobile-btn">
			<a href="<?= esc_url( $book_now_header ); ?>" class="btn-call w-full px-6 py-3 text-white rounded-[30px] border-solid border-[1px] border-[#911439] bg-[#911439] hover:text-[#911439] hover:bg-transparent text-[14px] lg:text-[18px] font-medium hover:no-underline" aria-label="Book Now" title="Book Now">
				<?= esc_html( 'Book Now' ); ?>
			</a>
		</div>
	</div>
	<div class="menu-overlay"></div>
	<?php if( !empty( $event_image ) ): ?>
		<div class="event-banner w-full">
			<?php if( !empty( $event_url ) ): ?>
				<a href="<?= esc_url( $event_url ); ?>" class="block" target="_blank" aria-label="Event Banner" title="Event Banner">
					<img src="<?= esc_url( $event_image ); ?>" alt="Event Banner" class="block w-full" />
				</a>
			<?php else: ?>
				<img src="<?= esc_url( $event_image ); ?>" alt="Event Banner" class="block w-full" />
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<main class="main" role="main">