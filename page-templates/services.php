<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Services
 */
?>
<?php get_header();
$serivces = get_field( 'serivces' );
if( empty( $serivces ) )
	return;
?>

<section class="banner">
	<div class="container">
		<h1 class="page__title m-0 text-center text-heading text-[40px] md:text-[42px] lg:text-[44px] xl:text-[48px] font-bold py-16">
			<?php the_title(); ?>
		</h1>
	</div>
</section>
<section class="services py-12 md:py-14 xl:py-16">
	<div class="container">
		<?php foreach( $serivces as $index => $item ):
			$service_title       = $item['service_title'];
			$services_item       = $item['services_item'];
			$service_addon_title = $item['addon_title'];
			$service_addon       = $item['service_addon'];
			?>
			<div id="" class="service__section bg-[#fbf4f1] p-6 rounded-lg mt-8 first:mt-0">
				<h2 class="service__title text-[20px] md:text-[24px] font-bold text-center mb-6">
					<?= esc_html( $service_title ); ?>
				</h2>
				<div class="service__price--type">
					<ul class="m-0 p-0 flex items-center justify-end gap-4 md:gap-8 lg:gap-10 list-none text-primary font-medium text-[14px] lg:text-[16px]">
						<li>Infill</li>
						<li>Off/Renew</li>
						<li class="text-[#911439] font-bold">Full Set</li>
					</ul>
				</div>
				<div class="service__items ">
					<?php if( !empty( $services_item ) ): ?>
						<?php foreach( $services_item as $i => $service ):
							$item_title          = $service['title'];
							$item_price_full_set = $service['price_full_set'];
							$item_price_infill   = $service['price_infill'];
							$item_price_offrenew = $service['price_offrenew'];
							$item_content        = $service['content'];
							?>
							<div class="service__item border rounded-lg text-left" id="service-item-<?= $index . '-' . $i; ?>">
								<div class="service__item--list flex justify-space-between items-center">
									<h3 class="service__item-title text-[16px] md:text-[18px] lg:text-xl font-semibold">
										<?= esc_html( $item_title ); ?>
									</h3>
									<span class="dots"></span>
									<ul class="service__item-price  ml-4 m-0 p-0 flex items-center justify-end gap-4 md:gap-8 lg:gap-10  list-none">
										<?php if( !empty( $item_price_infill ) ): ?>
											<li class="min-w-0 md:min-w-[40px] lg:min-w-[60px] text-[18] md:text-[20px] lg:text-[24px] whitespace-nowrap font-medium text-[#333]">
												<?= esc_html( $item_price_infill ); ?>
											</li>
										<?php endif; ?>
										<?php if( !empty( $item_price_offrenew ) ): ?>
											<li class="min-w-0 md:min-w-[40px] lg:min-w-[60px] text-[18] md:text-[20px] lg:text-[24px] whitespace-nowrap font-medium text-[#333]">
												<?= esc_html( $item_price_offrenew ); ?>
											</li>
										<?php endif; ?>

										<li class="min-w-0 md:min-w-[40px] lg:min-w-[60px] text-[18] md:text-[20px] lg:text-[24px] whitespace-nowrap font-medium text-[#911439]">
											<?php if( !empty( $item_price_full_set ) ): ?>
												<?= esc_html( $item_price_full_set ); ?>
											<?php endif; ?>
										</li>
									</ul>
								</div>
								<?php if( !empty( $item_content ) ): ?>
									<div class="service__item-content text-base bg-[#faefed] p-4">
										<?= $item_content; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php if( !empty( $service_addon_title ) ): ?>
						<h3><?= esc_html( $service_addon_title ); ?></h3>
					<?php endif; ?>
					<?php if( !empty( $service_addon ) ): ?>
						<div class="service__addon grid grid-cols-1 gap-x-10 gap-y-4 mt-6">
							<?php foreach( $service_addon as $addon ):
								$addon_name           = $addon['name'];
								$addon_price_full_set = $addon['price_full_set'];
								$addon_price_infill   = $addon['price_infill'];
								$addon_price_offrenew = $addon['price_offrenew'];
								?>
								<div class="service__addon--list">
									<h3 class="service__addon-name text-[14px] lg:text-lg leading-[1.5] font-medium my-0">
										<?= esc_html( $addon_name ); ?>
									</h3>
									<span class="dots"></span>
									<ul class=" ml-4 m-0 p-0 flex items-center justify-end gap-4 md:gap-8 lg:gap-10  list-none">
										<?php if( !empty( $addon_price_infill ) ): ?>
											<li class="service__addon-price whitespace-nowrap text-base lg:text-[18px] font-semibold text-[#911439] ml-4">
												<?= esc_html( $addon_price_infill ); ?>
											</li>
										<?php endif; ?>
										<?php if( !empty( $addon_price_offrenew ) ): ?>
											<li class="service__addon-price whitespace-nowrap text-base lg:text-[18px] font-semibold text-[#911439] ml-4">
												<?= esc_html( $addon_price_offrenew ); ?>
											</li>.
										<?php endif; ?>
										<?php if( !empty( $addon_price_full_set ) ): ?>
											<li class="service__addon-price whitespace-nowrap text-base lg:text-[18px] font-semibold text-[#911439] ml-4">
												<?= esc_html( $addon_price_full_set ); ?>
											</li>
										<?php endif; ?>
									</ul>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
<?php get_footer(); ?>