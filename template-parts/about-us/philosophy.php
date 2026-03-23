<?php
$title = get_field( 'philosophy_titlee' );
$content = get_field( 'philosophy_content' );
$image = get_field( 'philosophy_image' );
if ( empty( $image ) ) {
	return;
}
?>
<section class="fultue py-12 md:py-14 xl:py-16 bg-[#efcec9] overflow-hidden" >
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div class="fultue__image wow animate__animated animate__fadeInUp">
                <?php if ( ! empty( $image ) ) : ?>
                    <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="w-full aspect-square object-cover block mx-auto" >
                <?php endif; ?>
            </div>
            <div class="fultue__content wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                <?php if ( ! empty( $title ) ) : ?>
                    <h2 class="my-0 text-heading text-left text-[30px] lg:text-[40px] font-normal  wow animate__animated animate__fadeInUp">
                        <?php echo $title ?>
                    </h2>
                <?php endif; ?>
                <?php if ( ! empty( $content ) ) : ?>
                    <div class="mt-6 text-[16px] lg:text-[18px]">
                         <?= $content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>