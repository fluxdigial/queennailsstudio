<?php
$title  = get_field( 'achievement_title' );
$desc = get_field( 'achievement_desc' );
$achievements = get_field( 'achievements' );
if ( empty( $achievements ) ) {
	return;
}
?>
<section class="archivement pt-12 xl:pt-16 overflow-hidden">
	<div class="container">
		<?php if ( ! empty( $title ) ) : ?>
            <h1
                class="text-center xl:max-w-[966px] mx-auto my-0 text-heading text-[40px] md:text-[44px] lg:text-[48px] xl:text-[56px]  font-normal	wow animate__animated animate__fadeInUp" >
                <?php echo $title; ?>
            </h1>
        <?php endif; ?>
        <div class="about__desc xl:max-w-[870px] mx-auto text-[#000000] mt-5 xl:mt-6 text-center text-[16px] xl:text-[18px] font-light   wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
            <?php if ( ! empty( $desc ) ) : ?>
                <?= $desc; ?>
            <?php endif; ?>
            </div>
        <div id="archivement-list" class="industries__wrapper grid grid-cols-1 md:grid-cols-2 gap-12 xl:gap-5 mt-12 xl:mt-16 mb-0 overflow-hidden">
            <?php foreach ( $achievements as $index => $items ) :
                $image = isset( $items['image'] ) ? $items['image'] : '';
                $name = ! empty( $items['name'] ) ? $items['name'] : '';
                $position = ! empty( $items['position'] ) ? $items['position'] : '';
                $info = ! empty( $items['info'] ) ? $items['info'] : '';
                $achievement = ! empty( $items['achievement'] ) ? $items['achievement'] : '';
                $delay = ($index + 1) * 0.2;
            ?>
                <div class="archivement__item overflow-hidden wow animate__animated animate__fadeInUp" data-wow-delay="<?= esc_attr( $delay ); ?>s" >
                    <?php if ( ! empty( $image ) ) : ?>
                        <div class="archivement__item--image bg-white">
                            <img src="<?= esc_url( $image ) ?>" alt="<?= esc_attr( $item_title ); ?>"
                            loading="lazy" class="w-full aspect-square xl:aspect-870/648 object-cover block mx-auto" width="870" height="648">
                        </div>
                    <?php endif; ?>
                    <?php if ( ! empty( $name ) ) : ?>
                        <h3 class="archivement__item--title text-left mt-4 lg:mt-6 mb-0 text-heading text-[24px] xl:text-[32px]   font-normal">
                            <?= nl2br( esc_html( $name ) ); ?>
                        </h3>
                    <?php endif; ?>
                     <?php if( ! empty( $position ) ) : ?>
                        <div class="archivement__item--position mt-3 text-[#000000] uppercase tracking-[0.96px] text-left mt-2 text-[16px] leading-[1.4] text-[#000000] font-normal">
                        <?= nl2br( esc_html( $position ) ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( ! empty( $info ) ) : ?>
                        <div class="archivement__item--info text-left mt-4 xl:mt-6 text-[16px] xl:text-[18px]   text-[#000000] font-light">
                            <?= nl2br( esc_html( $info ) ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( ! empty( $achievement ) ) : ?>
                        <button class="archivement__item--view bg-white font-medium text-[18px]   flex gap-3 items-center text-heading p-0 mb-0 mt-6"
                        data-achievement-title="<?php echo esc_attr( $name ); ?>"
                        data-achievement-html="<?php echo htmlspecialchars( $achievement, ENT_QUOTES, 'UTF-8' ); ?>">
                            <?php echo esc_html('View Achievement', 'five-elements'); ?>
                                <?= Flux\Icon::output( 'next' ) ?>
                        </button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


