<?php
$image_1 = get_field( 'image_store_1', 'option' );
$title_1 = get_field( 'title_store_1', 'option' );
$desc_1 = get_field( 'desc_store_1', 'option' );
$link_1 = get_field( 'link_book_store_1', 'option' );

$image_2 = get_field( 'image_store_2', 'option' );
$title_2 = get_field( 'title_store_2', 'option' );
$desc_2 = get_field( 'desc_store_2', 'option' );
$link_2 = get_field( 'link_book_store_2', 'option' );
?>
<div id="popup-booking" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-[2000]">
  <div class="bg-[#eff0e2] rounded-2xl px-4 lg:px-6 py-8 max-w-[600px] w-full relative">
    <button id="closePopup" class="close-popup"><?= Flux\Icon::output( 'close' ) ?></button>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="flex flex-col items-center text-center">
        <img src="<?= esc_url($image_1) ?>" alt="<?php echo $title_1; ?>" class="hidden lg:block w-full aspect-video object-cover">
        <h3 class="text-heading font-bold text-[18px] mt-5 mb-0"> <?php echo $title_1; ?></h3>
        <p class="text-[15px] font-normal"><?php echo $desc_1; ?></p>
        <?php if ( ! empty($link_1 )) : ?>
            <div class="intro__btn flex justify-start">
            <a href="<?= esc_url($link_1) ?>" target="_blank" class="text-center px-6 py-2 flex items-center justify-center w-[180px] text-[16px] text-white border-solid border-[1px]  border-[#D2B48C] rounded-[30px] bg-[#D2B48C] font-medium hover:bg-[#221914]  hover:no-underline " title="Button" >
                <?= esc_html( 'Book now' ); ?>
            </a>
            </div>
        <?php endif; ?>
      </div>
      <div class="flex flex-col items-center text-center">
        <img src="<?= esc_url($image_2) ?>" alt="<?php echo $title_2; ?>" class="hidden lg:block w-full aspect-video object-cover">
        <h3 class="text-heading font-bold text-[18px] mt-5 mb-0"> <?php echo $title_2; ?></h3>
        <p class="text-[15px] font-normal"><?php echo $desc_2; ?></p>
        <?php if ( ! empty($link_2 )) : ?>
            <div class="intro__btn flex justify-start">
                <a href="<?= esc_url($link_2) ?>" target="_blank" class="text-center px-6 py-2 flex items-center justify-center w-[180px] text-[16px] text-white border-solid border-[1px]  border-[#D2B48C] rounded-[30px] bg-[#D2B48C] font-medium hover:bg-[#221914] hover:no-underline " title="Button" >
                    <?= esc_html( 'Book now' ); ?>
                </a>
            </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
