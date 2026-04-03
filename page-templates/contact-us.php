<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Contact us
 */
?>
<?php get_header();
$form_shortcode = get_field( 'form_shortcode' );
$title          = get_field( 'title' );
$name           = get_field( 'name_store' );
$tel_office     = get_field( 'tel_office' );
$add_office     = get_field( 'add_office' );
$email          = get_field( 'email' );
$info           = get_field( 'info' );
$map            = get_field( 'map' );
?>
<section class="banner">
	<div class="container">
		<h1 class="page__title m-0 text-center text-heading text-[40px] md:text-[42px] lg:text-[44px] xl:text-[48px] font-bold py-16">
			<?php the_title(); ?>
		</h1>
	</div>
</section>
<section class="contact py-8 xl:py-16">
	<div class="container">
		<div class="contact__wrap grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 xl:items-start">
			<div class="contact__wrap--map wow animate__animated animate__fadeInUp">
				<?php if( !empty( $title ) ): ?>
					<h2 class="intro__title mt-0 mb-6 text-heading xl:max-w-[555px] text-left text-[30px] lg:text-[40px] font-bold wow animate__animated animate__fadeInUp">
						<?php echo $title; ?>
					</h2>
				<?php endif; ?>
				<?php if( !empty( $name ) ): ?>
					<h2 class="text-heading font-bold text-[18px] lg:text-[20px]  my-0"><?php echo $name ?></h2>
				<?php endif; ?>
				<ul class="no-list p-0 m-0 flex flex-col gap-3 xl:gap-4 mt-5 xl:mt-8">
					<?php if( !empty( $tel_office ) ): ?>
						<li class="flex items-center gap-4">
							<?= Flux\Icon::output( 'phone' ) ?>
							<p class="py-0 m-0 text-[#000000] text-[16px] xl:text-[18px] font-light  "><?php echo $tel_office ?></p>
						</li>
					<?php endif; ?>
					<?php if( !empty( $email ) ): ?>
						<li class="flex items-center gap-4">
							<?= Flux\Icon::output( 'mail' ) ?>
							<p class="py-0 m-0 text-[#000000] text-[16px] xl:text-[18px] font-light  "><?php echo $email ?></p>
						</li>
					<?php endif; ?>
					<?php if( !empty( $add_office ) ): ?>
						<li class="flex items-center gap-4">
							<?= Flux\Icon::output( 'add' ) ?>
							<p class="py-0 m-0 text-[#000000] text-[16px] xl:text-[18px] font-light  "><?php echo $add_office ?></p>
						</li>
					<?php endif; ?>
				</ul>

				<?php if( !empty( $info ) ): ?>
					<?= $info; ?>
				<?php endif; ?>
			</div>
			<div class="contact__wrap--form wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
				<?php echo do_shortcode( $form_shortcode ) ?>
			</div>
		</div>
		<div class="contact__map mt-10">
			<?php if( !empty( $map ) ): ?>
				<?= $map; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>