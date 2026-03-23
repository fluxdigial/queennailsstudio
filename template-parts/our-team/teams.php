<?php
$desc = get_field( 'teams' );
$teams = get_field( 'teams' );
if ( empty( $teams ) ) {
	return;
}
?>
<section class="teams py-12 xl:py-16">
	<div class="container">
        <div id="teams-list" class=" grid grid-cols-2 xl:grid-cols-3 gap-y-8 gap-x-3 xl:gap-y-16 xl:gap-x-5 overflow-hidden">
            <?php foreach ( $teams as $index => $item ) :
                $image = isset( $item['image'] ) ? $item['image'] : '';
                $name = ! empty( $item['name'] ) ? $item['name'] : '';
                $position = ! empty( $item['position'] ) ? $item['position'] : '';
                $delay = ($index + 1) * 0.2;
            ?>
                <div class="teams__item overflow-hidden wow animate__animated animate__fadeInUp" data-wow-delay="<?= esc_attr( $delay ); ?>s" >
                    <?php if ( ! empty( $image ) ) : ?>
                        <div class="teams__item--image bg-white">
                            <img src="<?= esc_url( $image ) ?>" alt="<?= esc_attr( $item_title ); ?>"
                            loading="lazy" class="w-full aspect-square object-cover block mx-auto" width="870" height="648">
                        </div>
                    <?php endif; ?>
                    <?php if ( ! empty( $name ) ) : ?>
                        <h3 class="teams__item--title text-left xl:text-center mt-2 lg:mt-5 mb-0 text-heading text-[20px] xl:text-[32px]   font-normal">
                            <?= nl2br( esc_html( $name ) ); ?>
                        </h3>
                    <?php endif; ?>
                     <?php if( ! empty( $position ) ) : ?>
                        <div class="teams__item--position mt-2 text-[#000000] capitalize text-left xl:text-center mt-2 text-[16px] leading-[1.4] text-[#000000] font-normal">
                        <?= nl2br( esc_html( $position ) ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


