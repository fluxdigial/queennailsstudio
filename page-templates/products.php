<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Products
 */
?>
<?php get_header();
$products = get_field( 'products' );
if( empty( $products ) ){
   return;
}
?>
<section class="banner">
    <div class="container">
        <h1 class="page__title m-0 text-center text-heading text-[40px] md:text-[42px] lg:text-[44px] xl:text-[48px] font-bold py-16">
            <?php the_title(); ?>
        </h1>
    </div>
</section>
<section class="products py-12 md:py-14 xl:py-20">
    <div class="container">
    <div class="products__wrap grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4  wow animate__animated animate__fadeInUp">
        <?php foreach ( $products as $product ) :
                $image         = isset( $product['product_image'] ) ? $product['product_image'] : '';
                $name          = ! empty( $product['name_product'] ) ? $product['name_product'] : '';
                $content          = ! empty( $product['desc_product'] ) ? $product['desc_product'] : '';
            ?>
            <div class="products__item p-4">
                <div class="products__item--inner border border-[#e0e0e0] p-4 h-full flex flex-col">
                    <?php if ( ! empty( $image ) ) : ?>
                        <div class="products__item--image mb-4">
                            <img src="<?= esc_url( $image ) ?>" alt="<?php echo  $name ; ?>" class="w-full h-auto">
                        </div>
                    <?php endif; ?>
                    <?php if ( ! empty( $name ) ) : ?>
                        <h3 class="products__item--name text-heading text-[18px] font-semibold mb-2">
                            <?php echo esc_html( $name ); ?>
                        </h3>
                    <?php endif; ?>
                    <?php if ( ! empty( $content ) ) : ?>
                        <p class="products__item--description line-clamp-2 text-[14px] font-light mb-4 flex-grow">
                            <?php echo  $content ; ?>
                        </p>
                    <?php endif; ?>
                </div>
                </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>
<?php get_footer(); ?>