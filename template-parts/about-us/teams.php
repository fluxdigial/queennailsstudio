<?php
$title = get_field( 'teams_title' );
$teams = get_field( 'teams' );
if ( empty( $teams ) ) {
	return;
}
?>
<section class="teams py-12 xl:py-16 overflow-hidden">
	<div class="container">
        <?php if ( ! empty( $title ) ) : ?>
            <h2 class="my-0 text-heading text-center text-[30px] lg:text-[40px] font-normal  wow animate__animated animate__fadeInUp">
                <?php echo $title ?>
            </h2>
        <?php endif; ?>
        <div id="teams-list" class="mt-6 lg:mt-8 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-y-6 gap-x-8 overflow-hidden">
            <?php foreach ( $teams as $index => $item ) :
                $image = isset( $item['image'] ) ? $item['image'] : '';
                $name = ! empty( $item['name'] ) ? $item['name'] : '';
                $position = ! empty( $item['position'] ) ? $item['position'] : '';
                $delay = ($index + 1) * 0.2;
            ?>
                <div class="teams__item overflow-hidden wow animate__animated animate__fadeInUp" data-wow-delay="<?= esc_attr( $delay ); ?>s" >
                    <?php if ( ! empty( $image ) ) : ?>
                        <div class="teams__item--image bg-white rounded-[40%] overflow-hidden">
                            <img src="<?= esc_url( $image ) ?>" alt="<?= esc_attr( $item_title ); ?>"
                            loading="lazy" class="w-full aspect-413/530 object-cover block mx-auto" width="413" height="530">
                        </div>
                    <?php endif; ?>
                    <?php if ( ! empty( $name ) ) : ?>
                        <h3 class="teams__item--title text-center mt-4 lg:mt-5 mb-0 text-heading text-[18px] lg:text-[20px]  font-medium">
                            <?= nl2br( esc_html( $name ) ); ?>
                        </h3>
                    <?php endif; ?>
                     <?php if( ! empty( $position ) ) : ?>
                        <div class="teams__item--position mt-2 text-[#000000] capitalize text-center mt-3 text-[16px] leading-[1.4] text-[#000000] font-normal">
                        <?= nl2br( esc_html( $position ) ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>