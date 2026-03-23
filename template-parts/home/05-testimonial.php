<?php
$title = get_field( 'testimonial_title' );
$tes = get_field( 'testimonials' );

$partners_title  = get_field( 'partner_title' );
$partners = get_field( 'partners' );
if ( empty( $tes ) ) {
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
 <section class="testimonial pt-12 md:pt-14 xl:pt-20 overflow-hidden ">
    <div class="container relative">
        <div class="flex flex-wrap items-center">
            <div class="testimonial__title w-full lg:w-1/3">
                <?php if ( ! empty( $title ) ) : ?>
                    <h2 class="my-0 text-heading text-center lg:text-left text-[30px] lg:text-[40px] font-bold  wow animate__animated animate__fadeInUp" >
                        <?= esc_html( $title ); ?>
                    </h2>
                <?php endif; ?>
            </div>
            <div class="testimonial__wrap w-full lg:w-2/3 slider lg:pl-10 mt-6 lg:mt-0" data-options="<?= esc_attr( wp_json_encode( $slider_options ) ) ?>">
                <div class="blaze-track-container">
                    <div class="blaze-track">
                        <?php
                        foreach ( $tes as $index => $items ) :
                            $image         = isset( $items['image'] ) ? $items['image'] : '';
                            $name          = ! empty( $items['name'] ) ? $items['name'] : '';
                            $content          = ! empty( $items['content'] ) ? $items['content'] : '';
                            ?>
                            <div class="testimonial__item text-center">
                                <?php if ( ! empty( $image) ) : ?>
                                    <div class="testimonial__item--image w-1/3 mx-auto overflow-hidden ">
                                        <img src="<?= esc_url( $image ) ?>" alt="<?= nl2br( esc_html( $name ) ); ?>"
                                        loading="lazy" class="espect-square  mx-auto rounded-full size-[100px] object-cover block" width="100" height="100">
                                    </div>
                                <?php endif; ?>
                                <div class="testimonial__item--info max-w-[600px] mx-auto w-full flex flex-col justify-between">
                                    <?php if ( ! empty( $content ) ) : ?>
                                        <div class="mb-0 mt-5 lg:mt-6 text-base lg:text-[18px] font-medium leading-[1.5]">
                                            <?= nl2br( $content  ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $name ) ) : ?>
                                        <h3 class="mb-0 mt-5 lg:mt-6 text-[20px] font-bold">
                                            <?= nl2br( $name ); ?>
                                        </h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="blaze-pagination"></div>
            </div>
        </div>
    </div>
</section>