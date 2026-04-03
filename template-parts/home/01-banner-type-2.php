<?php
$title   = get_field( 'banner_type_2_title' );
$content = get_field( 'banner_type_2_desc' );
$buttons = get_field( 'banner_type_2_buttons' );
$image_1 = get_field( 'banner_type_2_image_1' );
$image_2 = get_field( 'banner_type_2_image_2' );
$image_3 = get_field( 'banner_type_2_image_3' );
if( empty( $image_1 ) && empty( $image_2 ) && empty( $image_3 ) ) {
	return;
}
?>
<section class="banner pt-12 md:pt-14 xl:pt-20 overflow-hidden ">
	<div class="container flex gap-10 lg:gap-16 flex-col">
		<div class="banner__title flex flex-wrap gap-4 items-start">
			<div class="w-full lg:w-2/3">
				<h2 class="lg:max-w-[65%] my-0 text-[32px] lg:text-[48px]"><?php echo $title; ?></h2>
			</div>
			<div class="banner__title--content w-full lg:w-1/3 flex-1">
				<p><?php echo esc_html( $content ); ?></p>
				<?php if( !empty( $buttons ) ): ?>
					<div class="banner__title--buttons">
						<?php foreach( $buttons as $index => $items ):
							$btn_text  = !empty( $items['button'] ) ? $items['button'] : '';
							$btn_link  = !empty( $items['link'] ) ? esc_url( $items['link'] ) : '';
							$is_even   = $index % 2 === 0;
							$btn_class = $is_even
								? 'text-white bg-[#911439] hover:text-[#911439] hover:bg-white'
								: 'text-[#911439] bg-white hover:text-white hover:bg-[#911439]';
							if( $btn_link ):
								?>
								<a href="<?= $btn_link ?>" target="_blank" class="flex w-fit justify-center items-center border-solid border-[1px] border-[#911439] rounded-[30px] px-6 py-3 xl:min-w-[160px] text-[18px] font-medium hover:no-underline <?= $btn_class ?>" title="Slider Button <?= $index + 1 ?>" data-wow-delay="<?= 0.3 + ( $index + 1 ) * 0.3 ?>s">
									<?php echo esc_html( $btn_text ); ?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="banner__images grid grid-cols-3 gap-4 items-center">
			<?php if( $image_1 ): ?>
				<div class="banner__image rounded-t-[1000px] rounded-b-[100px] overflow-hidden">
					<img src="<?php echo esc_url( $image_1 ); ?>" class="aspect-3/4 object-cover block w-full" alt="<?php echo esc_attr( $image_1 ); ?>">
				</div>
			<?php endif; ?>
			<?php if( $image_2 ): ?>
				<div class="banner__image rounded-t-[1000px] rounded-b-[1000px] overflow-hidden">
					<img src="<?php echo esc_url( $image_2 ); ?>" class="aspect-3/4 object-cover block w-full" alt="<?php echo esc_attr( $image_2 ); ?>">
				</div>
			<?php endif; ?>
			<?php if( $image_3 ): ?>
				<div class="banner__image rounded-t-[1000px] rounded-b-[100px] overflow-hidden">
					<img src="<?php echo esc_url( $image_3 ); ?>" class="aspect-3/4 object-cover block w-full" alt="<?php echo esc_attr( $image_3 ); ?>">
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>