<?php
$title = get_field( 'testimonial_title' );
$tes   = get_field( 'testimonials' );

$partners_title = get_field( 'partner_title' );
$partners       = get_field( 'partners' );
if( empty( $tes ) ) {
	return;
}
$slider_options = [
	'all' => [
		'enableAutoplay'     => true,
		'loop'               => true,
		'autoplayInterval'   => 4000,
		'transitionDuration' => 1000,
		'slidesToShow'       => 1,
	],
];
?>
<section class="testimonial bg-[#efcec9] py-12 md:py-14 xl:py-20 overflow-hidden ">
	<div class="container relative">
		<div class="testimonial__title w-full ">
			<?php if( !empty( $title ) ): ?>
				<h2 class="my-0 text-heading text-center text-[30px] lg:text-[40px] font-bold  wow animate__animated animate__fadeInUp">
					<?= esc_html( $title ); ?>
				</h2>
			<?php endif; ?>
		</div>
		<div class="testimonial__wrap bg-white w-full slider py-10 mt-10" data-options="<?= esc_attr( wp_json_encode( $slider_options ) ) ?>">
			<div class="blaze-track-container">
				<div class="blaze-track">
					<?php
					foreach( $tes as $index => $items ):
						$image   = isset( $items['image'] ) ? $items['image'] : '';
						$name    = !empty( $items['name'] ) ? $items['name'] : '';
						$content = !empty( $items['content'] ) ? $items['content'] : '';
						?>
						<div class="testimonial__item text-center">

							<div class="testimonial__item--info px-4 lg:px-0 max-w-full lg:max-w-[60%] mx-auto w-full flex flex-col justify-between">
								<?php if( !empty( $content ) ): ?>
									<div class="mb-0 mt-5 lg:mt-6 text-base lg:text-[18px] font-medium leading-[1.5]">
										<?= Flux\Icon::output( 'quote' ) ?>
										<?= nl2br( $content ); ?>
									</div>
								<?php endif; ?>

								<?php if( !empty( $name ) ): ?>
									<h3 class="mb-0 mt-5 lg:mt-6 text-[20px] text-[#c9727a] font-bold">
										<?= nl2br( $name ); ?>
									</h3>
								<?php endif; ?>
								<?php if( !empty( $image ) ): ?>
									<div class="testimonial__item--image mt-6 w-1/3 mx-auto overflow-hidden ">
										<img src="<?= esc_url( $image ) ?>" alt="<?= nl2br( esc_html( $name ) ); ?>" loading="lazy" class="espect-square  mx-auto rounded-full size-[80px] object-cover block" width="100" height="100">
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="blaze-pagination"></div>
		</div>
	</div>
</section>