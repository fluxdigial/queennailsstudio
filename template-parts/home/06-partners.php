<?php
$partners_title  = get_field( 'partner_title' );
$partners = get_field( 'partners' );
if ( empty( $partners ) ) {
    return;
}
?>
<section class="partners pt-5 xl:pt-8 pb-12 xl:pb-16 overflow-hidden">
	<div class="container">
		<?php if ( ! empty( $partners_title ) ) : ?>
            <h2 class="intro__title my-0 text-heading text-center text-[32px] lg:text-[48px] font-normal   wow animate__animated animate__fadeInUp">
                <?php echo $partners_title; ?>
            </h2>
        <?php endif; ?>
        <div class="my-0 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-3 lg:gap-6 items-center justify-items-center">
            <?php
            foreach ( $partners as $index => $items ) :
                $image         = isset( $items['logo'] ) ? $items['logo'] : '';
                $delay = $index * 0.3;
                ?>
                <?php if ( ! empty( $image) ) : ?>
                    <div class="w-full h-full aspect-square flex items-center justify-center border-solid border-[1px] border-[#efcec9] overflow-hidden  wow animate__animated animate__fadeInUp" data-wow-delay="<?= esc_attr( $delay . 's' ); ?>">
                        <img src="<?= esc_url( $image ) ?>" alt="<?= nl2br( esc_html( $title ) ); ?>"
                        loading="lazy" class="block max-w-[112px] xl:max-w-[173px]" width="" height="">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
	</div>
</section>