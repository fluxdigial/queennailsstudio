</main>
<?php
$logo_footer = get_field( 'logo_footer', 'option' );
$address     = get_field( 'address', 'option' );
$link_map    = get_field( 'link_map', 'option' );
$phone       = get_field( 'phone', 'option' );
$email       = get_field( 'email', 'option' );
?>
<!-- < ?php get_template_part( 'template-parts/popup-booking' ); ?> -->
<footer class="footer">
	<div class="bg-[#fbf4f1] py-10 md:py-12 lg:py-14">
		<div class="container">
			<div class="footer__main flex flex-wrap items-start">
				<div class="w-full  lg:w-25 pr-0 lg:pr-5">
					<div class="footer__logo md:max-w-[200px] lg:max-w-[80%] mx-auto">
						<?php the_custom_logo(); ?>
					</div>

				</div>
				<div class="w-full md:w-1/3 lg:w-25 mt-6 lg:mt-0">
					<h3 class="text-heading font-bold text-[18px]  my-0">
						<?php echo esc_html( 'Contact address' ); ?>
					</h3>
					<ul class="footer__info list-none flex flex-col gap-3 p-0 mb-0 mt-6 text-primary">
						<li class="text-[16px] font-medium text-primary">
							<?php echo esc_html( $phone ); ?>
						</li>
						<li class="text-[16px] font-medium text-primary">
							<?php echo esc_html( $email ); ?>
						</li>
						<li class="text-[16px] font-medium text-primary">
							<?php if( $link_map ): ?>
								<a target="_blank" href="<?php echo esc_url( $link_map ); ?>" class="text-primary hover:text-[#911439] items-center flex flex-wrap gap-3 hover:no-underline">
									<?php echo esc_html( $address ); ?>
								</a>
							<?php else: ?>
								<?php echo esc_html( $address ); ?>
							<?php endif; ?>
						</li>
					</ul>
				</div>
				<div class="w-full md:w-1/3 lg:w-25 pl-0 lg:pl-5 mt-6 lg:mt-0">
					<div class="work mb-6">
						<h3 class="text-heading font-bold text-[18px]  my-0">
							<?php echo esc_html( 'Business Hours' ); ?>
						</h3>
						<?php
						$monday    = get_field( 'open_mon_sat', 'option' );
						$tuesday   = get_field( 'open_tuesday', 'option' );
						$wednesday = get_field( 'open_wednesday', 'option' );
						$thursday  = get_field( 'open_thursday', 'option' );
						$friday    = get_field( 'open_friday', 'option' );
						$saturday  = get_field( 'open_saturday', 'option' );
						$sunday    = get_field( 'open_sunday', 'option' );
						?>
						<ul class="list-none p-0 mt-6 m-0 grid grid-cols-1 gap-2">
							<?php if( !empty( $monday ) ): ?>
								<li class="flex flex-wrap gap-2 items-center">
									<span class="text-[16px] font-bold">Monday:</span>
									<p class="text-[14px] m-0 p-0"><?php echo esc_html( $monday ); ?></p>
								</li>
							<?php endif; ?>
							<?php if( !empty( $tuesday ) ): ?>
								<li class="flex flex-wrap gap-2 items-center">
									<span class="text-[16px] font-bold">Tuesday:</span>
									<p class="text-[14px] m-0 p-0"> <?php echo esc_html( $tuesday ); ?></p>
								</li>
							<?php endif; ?>
							<?php if( !empty( $wednesday ) ): ?>
								<li class="flex flex-wrap gap-2 items-center">
									<span class="text-[16px] font-bold">Wednesday:</span>
									<p class="text-[14px] m-0 p-0"> <?php echo esc_html( $wednesday ); ?></p>
								</li>
							<?php endif; ?>
							<?php if( !empty( $thursday ) ): ?>
								<li class="flex flex-wrap gap-2 items-center">
									<span class="text-[16px] font-bold">Thursday:</span>
									<p class="text-[14px] m-0 p-0"> <?php echo esc_html( $thursday ); ?></p>
								</li>
							<?php endif; ?>
							<?php if( !empty( $friday ) ): ?>
								<li class="flex flex-wrap gap-2 items-center">
									<span class="text-[16px] font-bold">Friday:</span>
									<p class="text-[14px] m-0 p-0"> <?php echo esc_html( $friday ); ?></p>
								</li>
							<?php endif; ?>
							<?php if( !empty( $saturday ) ): ?>
								<li class="flex flex-wrap gap-2 items-center">
									<span class="text-[16px] font-bold">Saturday:</span>
									<p class="text-[14px] m-0 p-0"> <?php echo esc_html( $saturday ); ?></p>
								</li>
							<?php endif; ?>

							<?php if( !empty( $sunday ) ): ?>
								<li class="flex flex-wrap gap-2 items-center">
									<span class="text-[16px] font-bold">Sunday:</span>
									<p class="text-[14px] m-0 p-0">
										<?php echo esc_html( $sunday ); ?>
									</p>
								</li>
							<?php endif; ?>
						</ul>
					</div>

					<div class="map rounded-xl overflow-hidden">
						<?php dynamic_sidebar( 'footer' ) ?>
					</div>
				</div>
				<div class="w-full md:w-1/3 lg:w-25 pl-0 lg:pl-5 mt-6 lg:mt-0">
					<h3 class="text-heading font-bold text-[18px]  my-0">
						<?php echo esc_html( 'Social' ); ?>
					</h3>
					<p class="mt-6 mb-0"><?php echo esc_html( 'Follow us on social media to keep up with all of our latest news, promotions and campaigns!' ); ?></p>
					<div class="flex flex-wrap justify-start gap-4 mt-6">
						<?php
						$socials = [
							'facebook'  => 'Facebook',
							'instagram' => 'Instagram',
							'twitter'   => 'Twitter',
							'youtube'   => 'Youtube',
							'threads'   => 'Threads',
							'tiktok'    => 'TikTok',
						];

						foreach( $socials as $key => $label ):
							$url = get_field( $key, 'option' );
							if( !empty( $url ) ):
								?>
								<a href="<?= esc_url( $url ); ?>" class="text-white flex justify-center items-center size-10 bg-primary hover:bg-[#8c2155] rounded-full hover:no-underline text-[20px] font-medium  " aria-label="<?= esc_attr( $label ); ?>" title="<?= esc_attr( $label ); ?>">
									<?= Flux\Icon::output( $key ); ?>
								</a>
								<?php
							endif;
						endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer__copyright bg-[#efcec9] py-4">
		<div class="container text-[#333] flex flex-wrap justify-center text-center text-[12px] lg:text-[15px] gap-x-2 gap-y-1">
			<?= wp_kses_post(
				sprintf(
					__( '© %d %s. All rights reserved. <span class="whitespace-nowrap">Developed by %s</span>.', 'flux' ),
					gmdate( 'Y' ),
					get_bloginfo( 'name' ),
					'<a href="https://fluxdigital.vn/" target="_blank" class="text-[#333] inline">Flux Digital</a>'
				)
			); ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

</body>

</html>