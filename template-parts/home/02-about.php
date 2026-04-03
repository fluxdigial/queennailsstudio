<?php
$intro_items = get_field( 'intro' );
$image       = get_field( 'intro_image' );
$title       = get_field( 'intro_title' );
$content     = get_field( 'intro_content' );
$buttons     = get_field( 'buttons_intro' );

if( empty( $content ) ) {
	return;
}
?>
<section class="about relative pt-12 md:pt-14 xl:pt-20 overflow-hidden">
	<div class="container">
		<div class="about__title relative">
			<span class="block text-center w-full text-[3rem] md:text-[6rem] lg:text-[10rem] xl:text-[15rem] text-white font-black tracking-widest leading-none"><?php echo esc_html( 'Welcome' ); ?></span>
			<h2 class=" title text-center w-full lg:absolute text-[20px] md:text-[30px] xl:text-[2rem] z-10 my-0"><?php echo esc_html( $title ); ?></h2>
		</div>
		<div class="about__wrap mt-6 lg:mt-0 flex flex-col relative">
			<div class="about__wrap--image relative w-full">
				<?php if( !empty( $image ) ): ?>
					<div class=" md:mr-[10%] overflow-hidden ">
						<img src="<?php echo esc_url( $image ) ?>" class="aspect-video object-cover w-full block" alt="<?php echo $title; ?>">
					</div>
				<?php endif; ?>
			</div>
			<div class="about__wrap--content relative bg-white md:ml-[10%] p-6 md:p-10">
				<div><?php echo $content; ?></div>
				<?php if( !empty( $buttons ) ): ?>
					<div class="buttons__wrap mt-10 flex flex-col lg:flex-row gap-4 justify-end wow animate__animated animate__fadeInUp" aria-label="Slider Button <?= $index + 1 ?>">
						<?php foreach( $buttons as $index => $items ):
							$btn_text  = !empty( $items['intro_button'] ) ? $items['intro_button'] : '';
							$btn_link  = !empty( $items['intro_link'] ) ? esc_url( $items['intro_link'] ) : '';
							$is_even   = $index % 2 === 0;
							$btn_class = $is_even
								? 'text-white bg-[#911439] hover:text-[#911439] hover:bg-transparent'
								: 'text-[#911439] bg-transparent hover:text-white hover:bg-[#911439]';
							?>
							<?php if( $btn_link ): ?>
								<a href="<?= $btn_link ?>" target="_blank" class="flex justify-center items-center border-solid border-[1px] border-[#911439] inline-block rounded-[30px] px-6 py-3 xl:min-w-[160px] text-[18px] font-medium hover:no-underline <?= $btn_class ?>" title="Slider Button <?= $index + 1 ?>" data-wow-delay="<?= 0.3 + ( $index + 1 ) * 0.3 ?>s">
									<?= esc_html( $btn_text ); ?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>