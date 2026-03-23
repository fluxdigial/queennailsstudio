<?php
$title = get_field( 'about_title' );
$desc = get_field( 'about_desc' );
if ( empty( $desc ) && empty( $title ) ) {
	return;
}
?>
<section class="about py-12 md:py-14 xl:py-16">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 items-start">
            <?php if ( ! empty( $title ) ) : ?>
                <h1
                    class="lg:sticky lg:top-[120px] my-0 text-left pr-0 lg:pr-8 text-[30px] lg:text-[40px] font-bold	wow animate__animated animate__fadeInUp" >
                    <?php echo $title; ?>
                </h1>
            <?php endif; ?>
            <div class="about__desc text-heading mt-5 xl:mt-0 text-left text-[16px] lg:text-[18px] font-light  wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                <?php if ( ! empty( $desc ) ) : ?>
                    <?= $desc; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>