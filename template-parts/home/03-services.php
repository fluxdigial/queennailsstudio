<?php
$services_title = get_field( 'Service_title' );
$services_items = get_field( 'Service_item' );
if( empty( $services_items ) ) {
	return;
}
$slider_options = [
	'all'                 => [
		'enableAutoplay'     => true,
		'loop'               => true,
		'autoplayInterval'   => 4000,
		'transitionDuration' => 1000,
		'slidesToShow'       => 4,
		'slidesToScroll'     => 1,
		'slideGap'           => '40px',
	],
	'(max-width: 1500px)' => [
		'slidesToShow'   => 2,
		'slidesToScroll' => 1,
		'slideGap'       => '16px',
	],
	'(max-width: 500px)'  => [
		'slidesToShow'   => 1,
		'slidesToScroll' => 1,
		'slideGap'       => '16px',
	],
];
?>
<section class="services py-12 md:py-14 xl:py-20 overflow-hidden">
	<div class="relative">
		<div class="container">
			<div class="services__title  wow animate__animated animate__fadeInUp">
				<h2 class="my-0 text-heading text-left text-[30px] lg:text-[40px] font-bold">
					<?= nl2br( esc_html( $services_title ) ); ?>
				</h2>
			</div>
		</div>
		<div class="services__slider px-4 md:px-8 mx-0 xl:px-0 xl:mx-[120px] mt-8 xl:mt-10 mb-0 slider" data-options="<?= esc_attr( wp_json_encode( $slider_options ) ) ?>">
			<div class="blaze-track-container">
				<div class="blaze-track">
					<?php
					foreach( $services_items as $index => $items ):
						$image = isset( $items['image'] ) ? $items['image'] : '';
						$title = !empty( $items['title'] ) ? $items['title'] : '';
						$desc  = !empty( $items['desc'] ) ? $items['desc'] : '';
						$link  = !empty( $items['link'] ) ? esc_url( $items['link'] ) : '';
						$delay = $index * 0.3;
						?>
						<div class="services__item relative overflow-hidden">
							<?php if( $link ): ?>
								<a href="<?= esc_url( $link ); ?>" class="block" target="_blank">
								<?php endif; ?>
								<div class=" mb-8 ml-8 mt-8 relative aspect-[480/650] bg-[#efcec9]">
									<?php if( !empty( $image ) ): ?>
										<div class="services__item--around absolute">
											<div class="services__item--image overflow-hidden relative">
												<img src="<?= esc_url( $image ) ?>" alt="<?= nl2br( esc_html( $title ) ); ?>" loading="lazy" class="w-full aspect-[480/600] object-cover block" width="480" height="702">
												<div class="card flex flex-col justify-center p-10 bg-white">
													<?php if( !empty( $title ) ): ?>
														<p class="title my-0 text-heading text-[18px] font-bold">
															<?= nl2br( $title ); ?>
														</p>
													<?php endif; ?>
													<?php if( !empty( $desc ) ): ?>
														<div class="mb-0 mt-5 text-heading text-base font-normal">
															<?= $desc; ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
									<?php endif; ?>

									<?php if( !empty( $title ) ): ?>
										<h3 class="absolute w-full bottom-0 right-0 py-4 px-8 m-0 text-right text-heading text-[18px] xl:text-[20px] font-bold">
											<?= nl2br( $title ); ?>
										</h3>
									<?php endif; ?>
								</div>
								<?php if( $link ): ?>
								</a>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="arrow__pagination">
				<button class="blaze-prev" aria-label="Go to previous slide"><?= Flux\Icon::output( 'before' ) ?></button>
				<button class="blaze-next" aria-label="Go to next slide"><?= Flux\Icon::output( 'next' ) ?></button>
			</div>
		</div>

	</div>
</section>