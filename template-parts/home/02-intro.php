<?php
$intro_itemss = get_field( 'intros' );
if( empty( $intro_itemss ) ) {
	return;
}
?>
<section class="intro py-12 md:py-14 xl:py-20 overflow-hidden">
	<div class="container">
		<div class="intro__wrap flex flex-col gap-12">
			<?php
			foreach( $intro_itemss as $index => $items ):
				$image      = isset( $items['intro_image'] ) ? $items['intro_image'] : '';
				$title      = !empty( $items['intro_title'] ) ? $items['intro_title'] : '';
				$content    = !empty( $items['intro_content'] ) ? $items['intro_content'] : '';
				$button     = !empty( $items['intro_button'] ) ? $items['intro_button'] : '';
				$link       = !empty( $items['intro_link'] ) ? $items['intro_link'] : '';
				$delay      = $index * 0.3;
				$side_class = ( $index % 2 === 0 ) ? 'intro__item--left' : 'intro__item--right';
				?>
				<div class="intro__item <?= $side_class ?> flex flex-col lg:flex-row lg:flex-nowrap gap-5 justify-center items-center">
					<div class="intro__item--content w-full lg:w-2/3 flex-1 lg:pr-8 wow animate__animated animate__fadeInUp">
						<?php if( !empty( $title ) ): ?>
							<h2 class="intro__title my-0 text-heading text-left text-[30px] lg:text-[40px] font-bold">
								<?php echo $title; ?>
							</h2>
						<?php endif; ?>
						<?php if( !empty( $content ) ): ?>
							<div class="intro__desc mt-6 max-w-[924px] text-[#000000] text-left text-[16px] lg:text-[18px] font-light  mx-auto">
								<?= $content; ?>
							</div>
						<?php endif; ?>
						<?php if( !empty( $link ) ): ?>
							<div class="intro__btn flex justify-start">
								<a href="<?= esc_url( $link ) ?>" class="text-center px-6 py-3 flex items-center justify-center w-[180px] text-[18px] text-white border-solid border-[1px]  border-[#911439] rounded-[30px] bg-[#911439] font-medium hover:no-underline " title="Button <?= $index + 1 ?>">
									<?= esc_html( $button ); ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
					<div class="intro__item--image w-full lg:w-1/3 rounded-t-[40%] rounded-b-[30px] overflow-hidden">
						<?php if( !empty( $image ) ): ?>
							<img src="<?php echo esc_url( $image ) ?>" class="block w-full object-cover aspect-3/4" alt="<?php echo $title; ?>">
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>