</main>
<?php
    $logo_footer = get_field('logo_footer', 'option');
?>
<?php get_template_part( 'template-parts/popup-booking' ); ?>
<footer class="footer">
    <div class="bg-[#efcec9] py-10 md:py-12 lg:py-14">
        <div class="container">
            <div class="footer__main flex flex-wrap items-center">
                <div class="w-full lg:w-25 pr-0 lg:pr-5">
                    <div class="footer__logo max-w-[80%] mx-auto">
                        <?php the_custom_logo(); ?>
                    </div>
                    <div class="flex flex-wrap justify-center gap-4">
                        <?php
                            $socials = [
                                'facebook'  => 'Facebook',
                                'instagram' => 'Instagram',
                                'twitter'   => 'Twitter',
                                'youtube'   => 'Youtube',
                                'threads'    => 'Threads',
                                'tiktok'    => 'TikTok',
                            ];

                            foreach ( $socials as $key => $label ) :
                                $url = get_field( $key, 'option' );
                                if ( ! empty( $url ) ) :
                            ?>
                                <a href="<?= esc_url( $url ); ?>" class="text-white flex justify-center items-center size-10 bg-primary hover:bg-[#8b5e3c] rounded-full hover:no-underline text-[20px] font-medium  " aria-label="<?= esc_attr( $label ); ?>" title="<?= esc_attr( $label ); ?>">
                                    <?= Flux\Icon::output( $key ); ?>
                                </a>
                            <?php
                            endif;
                        endforeach; ?>
                    </div>
                </div>
                <div class="w-full lg:w-35">
                    <h3 class="text-heading font-bold text-[18px]  my-0"> <?php echo the_field( 'name_studio', 'option' ); ?></h3>
                    <ul class="footer__info list-none flex flex-col gap-3 p-0 mb-0 mt-4 text-primary">
                    <li class="text-[16px] font-medium text-primary">
                            <?php echo the_field( 'phone', 'option' ); ?>
                        </li>
                        <li class="text-[16px] font-medium text-primary">
                            <?php echo the_field( 'email', 'option' );?>
                        </li>
                        <li class="text-[16px] font-medium text-primary">
                            <?php echo the_field( 'address', 'option' );?>
                        </li>
                        <li class="text-[16px] font-medium text-primary">
                            <a target="_blank" href="<?php echo the_field( 'link_map', 'option' );?>" class="text-[#8b5e3c] items-center flex flex-wrap gap-3 hover:no-underline"><?php echo esc_html('View map') ?><?php Flux\Icon::output( 'location' ) ?></a>
                        </li>
                    </ul>
                </div>
                <div class="w-full lg:w-40 pl-0 lg:pl-5">
                    <div class="work ">
                        <ul class="list-none p-0 m-0 grid grid-cols-1 lg:grid-cols-3 gap-4">
                            <li>
                                <span class="text-[16px] font-bold">Mon - Fri</span>
                                <p class="text-[14px] m-0 p-0"><?php echo the_field( 'open_mon_fri', 'option' );?></p>
                            </li>
                            <li>
                                <span class="text-[16px] font-bold">Saturday</span>
                                <p class="text-[14px] m-0 p-0"> <?php echo the_field( 'open_saturday', 'option' );?></p>
                            </li>
                            <li>
                                <span class="text-[16px] font-bold">Sunday</span>
                                <p class="text-[14px] m-0 p-0"> <?php echo the_field( 'open_sunday', 'option' );?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="map mt-5 rounded-xl overflow-hidden">
                        <?php dynamic_sidebar( 'footer' ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copyright bg-[#202031] py-6">
        <div class="container text-white flex gap-2 flex-wrap justify-center text-center text-[14px] lg:text-[15px]">
            <?= wp_kses_post( sprintf( __( 'Copyright %d belongs to %s. All rights reserved. Developed by %s. ', 'flux' ), gmdate( 'Y' ), get_bloginfo( 'name' ), ' <a href="https://fluxdigital.vn/" target="_blank" class="text-heading"> Flux Digital</a>' ) ) ?>
        </div>
    </div>
</footer>
<?php
$button_contact = get_field( 'button_contact', 'option' );
if ( ! empty( $button_contact ) ) : ?>
    <div class="chat fixed bottom-4 right-4 lg:bottom-16 lg:right-10">
        <a target="_blank" href="<?php echo esc_url( $button_contact ); ?>">
            <?= Flux\Icon::output( 'inbox' ); ?>
        </a>
    </div>
<?php endif; ?>
<?php wp_footer(); ?>

</body>

</html>