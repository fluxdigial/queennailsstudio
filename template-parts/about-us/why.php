<?php
$why_title = get_field( 'why_title' );
$why_image = get_field( 'why_image' );
$whys      = get_field( 'why_items' );
if( empty( $whys ) ) {
	return;
}
?>
<section class="why py-12 md:py-14 xl:py-16 overflow-hidden">
	<div class="container">
		<div class="grid gap-12 lg:gap-0 grid-cols-1 lg:grid-cols-2">
			<div class="why__content flex flex-col justify-between">
				<h2 class="my-0 text-heading text-[32px] lg:text-[40px] font-normal  ">
					<?= nl2br( $why_title ); ?>
				</h2>
				<div class="why__wrapper mt-8 xl:pr-[100px] 2xl:pr-[94px]">
					<?php
					foreach( $whys as $index => $items ):
						$title = !empty( $items['title'] ) ? $items['title'] : '';
						$desc  = !empty( $items['content'] ) ? $items['content'] : '';
						$delay = $index * 0.3;
						?>
						<div class="why__item p-4 mb-4 lg:mb-5 bg-[#8c215505] rounded-[16px] border-[#8c215526] border-solid border-[1px] wow animate__animated animate__fadeInUp" data-wow-delay="<?= esc_attr( $delay . 's' ); ?>">
							<?php if( !empty( $title ) ): ?>
								<h3 class="why__item--title cursor-pointer text-[#8c2155] my-0 text-[18px] xl:text-[20px] font-medium">
									<?= nl2br( $title ); ?>
								</h3>
							<?php endif; ?>
							<?php if( !empty( $desc ) ): ?>
								<div class="why__item--desc pt-3 text-[#000000] my-0 text-[16px] lg:text-[18px]  font-light">
									<?= nl2br( $desc ); ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="why__image rounded-[30px] overflow-hidden order-first lg:order-last">
				<?php if( !empty( $why_image ) ): ?>
					<img src="<?= esc_url( $why_image ) ?>" alt="<?= nl2br( esc_html( $why_title ) ); ?>" loading="lazy" class="w-full aspect-square object-cover block" width="910" height="910">
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<script>
	jQuery( document ).ready( function ( $ ) {
		const $items = $( '.why__item' );
		const $titles = $( '.why__item--title' );
		const $descs = $( '.why__item--desc' );

		$descs.hide();

		const $firstItem = $items.first();
		$firstItem.find( '.why__item--desc' ).show();
		$firstItem.find( '.why__item--title' ).addClass( 'active' );

		$titles.on( 'click', function () {
			const $title = $( this );
			const $item = $title.closest( '.why__item' );
			const $desc = $item.find( '.why__item--desc' );

			if ( $desc.is( ':visible' ) ) return;

			$descs.slideUp( 300 );
			$titles.removeClass( 'active' );

			$desc.slideDown( 300 );
			$title.addClass( 'active' );
		} );
	} );
</script>