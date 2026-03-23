<?php
$services_title  = get_field( 'Service_title' );
$services_items = get_field( 'Service_item' );
if ( empty( $services_items ) ) {
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
		'slideGap'           => '20px',
	],
	'(max-width: 1500px)' => [
		'slidesToShow'   => 3.1,
		'slidesToScroll' => 1,
		'slideGap'       => '16px',
	],
	'(max-width: 500px)'  => [
		'slidesToShow'   => 1,
		'slidesToScroll' => 1,
		'slideGap'       => '12px',
	],
];
?>
<section class="services bg-[#efcec9] py-12 md:py-14 xl:py-20 overflow-hidden">
    <div class="relative">
        <div class="container">
            <div class="services__title  wow animate__animated animate__fadeInUp">
                <h2 class="my-0 text-heading text-left text-[30px] lg:text-[40px] font-bold">
                    <?= nl2br( esc_html( $services_title ) ); ?>
                </h2>
            </div>
        </div>
        <div class="services__slider px-4 lg:px-8 xl:px-16 mt-8 xl:mt-10 mb-0 slider" data-options="<?= esc_attr( wp_json_encode( $slider_options ) ) ?>">
            <div class="blaze-track-container">
                <div class="blaze-track">
                <?php
                foreach ( $services_items as $index => $items ) :
                    $image         = isset( $items['image'] ) ? $items['image'] : '';
                    $title          = ! empty( $items['title'] ) ? $items['title'] : '';
                    $desc          = ! empty( $items['desc'] ) ? $items['desc'] : '';
                    $delay = $index * 0.3;
                    ?>
                    <div class="services__item relative overflow-hidden">
                        <?php if ( ! empty( $image) ) : ?>
                            <div class="overflow-hidden">
                                <img src="<?= esc_url( $image ) ?>" alt="<?= nl2br( esc_html( $title ) ); ?>"
                                loading="lazy" class="w-full aspect-[480/702] object-cover block" width="480" height="702">
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $title ) ) : ?>
                            <h3 class="absolute p-8 bottom-0 text-left-0 text-white text-[20px] xl:text-[24px] font-bold">
                                <?= nl2br(  $title ); ?>
                            </h3>
                        <?php endif; ?>
                        <div class="services__item--card flex flex-col justify-center p-10 bg-white">
                             <?php if ( ! empty( $title ) ) : ?>
                                <p class="title my-0 text-heading text-[18px] font-bold">
                                    <?= nl2br(  $title ); ?>
                                </p>
                            <?php endif; ?>
                            <?php if ( ! empty( $desc ) ) : ?>
                                <div class="mb-0 mt-5 text-heading text-base font-normal">
                                    <?= $desc; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="arrow__pagination">
                <button class="blaze-prev"
                    aria-label="Go to previous slide"><?= Flux\Icon::output( 'before' ) ?></button>
                <button class="blaze-next" aria-label="Go to next slide"><?= Flux\Icon::output( 'next' ) ?></button>
            </div>
        </div>
    </div>
</section>