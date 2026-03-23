<?php
$banners = get_field( 'banners' );
// var_dump( $banners );
if ( empty( $banners ) ) {
    return;
}
?>
<section class="banners relative">
    <?php
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
    <div class="banners__wrap relative slider" data-options="<?= esc_attr( wp_json_encode( $slider_options ) ) ?>">
        <div class="blaze-track-container">
            <div class="blaze-track">
                <?php foreach ( $banners as $index => $banner ) :
                    $desktop_url = isset( $banner['img_banner']['sizes']['large'] ) ? $banner['img_banner']['sizes']['large'] : '';
                    $mobile_url  = isset( $banner['img_banner_mobile']['sizes']['large'] ) ? $banner['img_banner_mobile']['sizes']['large'] : $desktop_url;
                    $alt_attribute = ! empty( $banner['img_banner']['alt'] ) ? esc_attr( $banner['img_banner']['alt'] ) : '';
                    $buttons = ! empty( $banner['buttons'] ) ? $banner['buttons'] : [];
                    ?>
                    <div class="banners__item relative">
                        <img src="<?= esc_url( $desktop_url ) ?>" alt="<?= $alt_attribute ?>"
                             loading="<?= $index === 0 ? 'eager' : 'lazy' ?>" class="banners__image w-full hidden md:block"
                             width="1920" height="630">

                        <img src="<?= esc_url( $mobile_url ) ?>" alt="<?= $alt_attribute ?>"
                             loading="<?= $index === 0 ? 'eager' : 'lazy' ?>"
                             class="banners__image_mb w-full block md:hidden" width="768" height="1365">

                        <div class="banners__content w-full lg:w-[714px] px-4 lg:px-0 text-center absolute">
                            <?php if ( ! empty( $banner['title'] ) ) : ?>
                                <h2 class="banners__content--heading text-center my-0 text-heading text-[40px] md:text-[44px] lg:text-[48px] xl:text-[56px] font-bold wow animate__animated animate__fadeInUp">
                                    <?= $banner['title'] ; ?>
                                </h2>
                            <?php endif; ?>
                            <?php if ( ! empty( $banner['content'] ) ) : ?>
                                <div class="banners__content--desc mt-5 lg:mt-6 text-center my-0 text-heading text-[16px] lg:text-[18px]  font-light wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                    <?= $banner['content'] ; ?>
                                </div>
                            <?php endif; ?>
                             <?php if ( ! empty( $buttons ) ) : ?>
                                <div class="buttons__wrap mt-10 flex flex-col lg:flex-row gap-4 justify-center wow animate__animated animate__fadeInUp" aria-label="Slider Button <?= $index + 1 ?>" >
                                    <?php foreach ( $buttons as $index => $items ) :
                                        $btn_text = ! empty( $items['button_text'] ) ? $items['button_text'] : '';
                                        $btn_link = ! empty( $items['link_button'] ) ? esc_url( $items['link_button'] ) : '';
                                        $is_even = $index % 2 === 0;
                                        $btn_class = $is_even
                                            ? 'text-white bg-[#911439] hover:text-[#911439] hover:bg-white'
                                            : 'text-[#911439] bg-white hover:text-white hover:bg-[#911439]';
                                        ?>
                                        <?php if ( $btn_link ) : ?>
                                            <a href="<?= $btn_link ?>" class="inline-block px-6 py-3 xl:min-w-[160px] text-[18px] font-medium hover:no-underline <?= $btn_class ?>" title="Slider Button <?= $index + 1 ?>" data-wow-delay="<?= 0.3 + ( $index + 1 ) * 0.3 ?>s">
                                                <?= esc_html( $btn_text ); ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>