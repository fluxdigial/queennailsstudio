<?php
$services_title  = get_field( 'services_title' );
$services_desc = get_field( 'services_desc' );
$serivces_item = get_field( 'serivces_item' );
if ( empty( $serivces_item ) ) {
	return;
}
?>
<section class="service py-16 md:py-24 xl:py-[100px]">
	<div class="container">
        <?php
        foreach ( $serivces_item as $index => $items ) :
            $image         = isset( $items['image'] ) ? $items['image'] : '';
            $subtitle          = ! empty( $items['subtitle'] ) ? $items['subtitle'] : '';
            $title          = ! empty( $items['title'] ) ? $items['title'] : '';
            $desc          = ! empty( $items['content'] ) ? $items['content'] : '';
                $delay = $index * 0.3;
            ?>
            <div class="service__item bg-[#F3F3F3] mt-6 first:mt-0 p-6 xl:p-10 grid grid-cols-1 md:grid-cols-2 gap-6 xl:gap-12 wow animate__animated animate__fadeInUp" data-wow-delay="<?= esc_attr( $delay . 's' ); ?>">
                 <div class="service__item--info flex flex-col gap-6 justify-between ">
                    <div class="service__item--top">
                        <span class="text-[20px] xl:text-[24px] font-light text-black"><?= sprintf('%02d', $index + 1) ?></span>
                        <?php if ( ! empty( $subtitle ) ) : ?>
                            <p class="mb-0 mt-3 text-[#A4030B] text-[20px] xl:text-[24px] tracking-[1.44px] font-normal uppercase ">
                                <?=  $subtitle ; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="service__item--bottom">
                        <?php if ( ! empty( $title ) ) : ?>
                            <h3 class="my-0 text-[#000000] text-[24px] xl:text-[32px] font-normal">
                                <?= nl2br( esc_html( $title ) ); ?>
                            </h3>
                        <?php endif; ?>
                        <?php if ( ! empty( $desc ) ) : ?>
                            <p class="mb-0 mt-4 text-[#000000] text-base font-light  ">
                                <?= nl2br( esc_html( $desc ) ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ( ! empty( $image) ) : ?>
                    <div class="service__item--img overflow-hidden group">
                        <img src="<?= esc_url( $image ) ?>" alt="<?= nl2br( esc_html( $title ) ); ?>"
                        loading="lazy" class="w-full aspect-616/486 object-cover block mx-auto" width="615" height="486">
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
	</div>
</section>