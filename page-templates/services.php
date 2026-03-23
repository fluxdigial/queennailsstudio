<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Services
 */
?>
<?php get_header();
$serivces = get_field('serivces');
if (empty($serivces))
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
    <?php foreach ($serivces as $index => $item):
        $service_title = $item['service_title'];
        $services_item = $item['services_item'];
        $service_addon = $item['service_addon'];
    ?>
        <div id="" class="service__section bg-[#efcec9] p-6 rounded-lg mt-8 first:mt-0">
            <h2 class="service__title text-[20px] md:text-[24px] font-bold text-center mb-6">
                <?= esc_html($service_title); ?>
            </h2>
            <div class="service__items ">
                <?php if (!empty($services_item)): ?>
                    <?php foreach ($services_item as $service):
                        $item_title = $service['title'];
                        $item_price = $service['price'];
                        $item_content = $service['content'];
                    ?>
                        <div class="service__item border rounded-lg text-left">
                            <div class="service__item--list flex justify-space-between items-center">
                                <h3 class="service__item-title text-xl font-semibold">
                                    <?= esc_html($item_title); ?>
                                </h3>
                                <span class="dots"></span>
                                <?php if (!empty($item_price)): ?>
                                    <span class="service__item-price text-[24px] whitespace-nowrap font-medium text-[#8b5e3c] ml-4">
                                        <?= esc_html($item_price); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="service__item-content text-base">
                                <?= $item_content; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                 <?php endif; ?>
                  <?php if (!empty($services_item) && !empty($service_addon)): ?>
                    <h3>Add-Ons</h3>
                    <?php endif; ?>
                <?php if (!empty($service_addon)): ?>
                <div class="service__addon grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4 mt-6">
                     <?php foreach ($service_addon as $addon):
                        $addon_name = $addon['name'];
                        $addon_price = $addon['price'];
                    ?>
                    <div class="service__addon--list">
                        <h3 class="service__addon-name text-[14px] lg:text-lg leading-[1.5] font-medium my-0">
                            <?= esc_html($addon_name); ?>
                        </h3>
                        <span class="dots"></span>
                        <?php if (!empty($addon_price)): ?>
                            <span class="service__addon-price whitespace-nowrap text-base lg:text-[18px] font-semibold text-[#8b5e3c] ml-4">
                                <?= esc_html($addon_price); ?>
                            </span>
                        <?php endif; ?>
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