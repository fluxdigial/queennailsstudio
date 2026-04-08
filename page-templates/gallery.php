<?php
/**
 * Template Name: Gallery
 */
get_header();

$gallery_tabs = get_field( 'gallery_tab' );
if( empty( $gallery_tabs ) )
	return;
?>

<section class="banner">
	<div class="container">
		<h1 class="page__title text-center text-heading text-[40px] md:text-[42px] lg:text-[44px] xl:text-[48px] font-bold py-16 m-0">
			<?php the_title(); ?>
		</h1>
	</div>
</section>

<section class="gallery py-8 xl:py-16">
	<div class="container">
		<!-- Tabs -->
		<div class="gallery__tabs flex flex-wrap justify-center gap-4 mb-8">
			<?php foreach( $gallery_tabs as $index => $tab ): ?>
				<button class="gallery__tab px-4 py-2 rounded-full border text-lg font-medium transition-all duration-300 <?= $index === 0 ? 'active bg-[#911439] text-white' : 'bg-transparent text-black' ?>" data-tab="tab-<?= $index; ?>">
					<?= esc_html( $tab['gallery_title_tab'] ); ?>
				</button>
			<?php endforeach; ?>
		</div>
		<?php foreach( $gallery_tabs as $index => $tab ):
			$images = $tab['gallery_image'];
			if( empty( $images ) )
				continue;
			?>
			<div id="tab-<?= $index; ?>" class="gallery__content <?= $index === 0 ? 'block' : 'hidden'; ?>">
				<div id="lightgallery-<?= $index; ?>" class="gallery__grid">
					<?php foreach( $images as $i => $image_url ):
						$attachment_id = attachment_url_to_postid( $image_url );
						$img_title     = $attachment_id ? get_the_title( $attachment_id ) : '';
						?>
						<a href="<?= esc_url( $image_url ); ?>" class="gallery__item <?= $i >= 12 ? 'lazy-load' : 'active' ?>" data-lg-size="1400-933" data-sub-html="<h4><?= esc_attr( $img_title ); ?></h4>">
							<img src="<?= $i < 12 ? esc_url( $image_url ) : '' ?>" data-src="<?= esc_url( $image_url ); ?>" class="gallery__image <?= $i >= 12 ? 'lazy' : 'loaded' ?>" alt="<?= esc_attr( $img_title ); ?>">
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<script>
	document.addEventListener( 'DOMContentLoaded', function () {
		const tabs = document.querySelectorAll( '.gallery__tab' );
		const contents = document.querySelectorAll( '.gallery__content' );

		tabs.forEach( tab => {
			tab.addEventListener( 'click', () => {
				// Xóa active ở tất cả nút
				tabs.forEach( t => t.classList.remove( 'active', 'bg-[#911439]', 'text-white' ) );
				tabs.forEach( t => t.classList.add( 'bg-transparent', 'text-black' ) );

				// Thêm active cho nút được click
				tab.classList.add( 'active', 'bg-[#911439]', 'text-white' );
				tab.classList.remove( 'bg-transparent', 'text-black' );

				// Ẩn/hiện nội dung
				const target = tab.dataset.tab;
				contents.forEach( c => c.classList.add( 'hidden' ) );
				document.getElementById( target ).classList.remove( 'hidden' );
			} );
		} );

		// --- Lazy load + LightGallery ---
		document.querySelectorAll( '[id^="lightgallery-"]' ).forEach( gallery => {
			const lazyImages = gallery.querySelectorAll( 'img.lazy' );
			const lazyObserver = new IntersectionObserver( ( entries, observer ) => {
				entries.forEach( entry => {
					if ( entry.isIntersecting ) {
						const img = entry.target;
						const src = img.getAttribute( 'data-src' );
						if ( src ) {
							img.src = src;
							img.classList.remove( 'lazy' );
							img.classList.add( 'loaded' );
							observer.unobserve( img );
						}
					}
				} );
			}, { rootMargin: '200px' } );

			lazyImages.forEach( img => lazyObserver.observe( img ) );

			lightGallery( gallery, {
				selector: 'a',
				plugins: [ lgZoom, lgThumbnail ],
				thumbnail: true,
				zoom: true,
				download: false,
				actualSize: false,
			} );
		} );
	} );
</script>

<?php get_footer(); ?>