<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QueenNailsStudio
 */

get_header();
?>
<section class="page py-12 xl:py-16">
    <div class="container">
        <h1 class="page__title text-heading text-[40px] md:text-[42px] lg:text-[44px] xl:text-[48px]  font-bold my-0 mb-8 md:mb-12">
            <?php the_title(); ?>
        </h1>
        <div class="page-content">
            <?php
            the_content();
            ?>
        </div>
    </div>
</section>

<?php
get_footer();