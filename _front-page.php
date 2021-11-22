<?php
/**
 * Template Name: Home page
 */
get_template_part('/includes/header'); ?>
<main class="main <?php echo is_front_page() ? 'main--frontpage' : 'main--standard' ?>">
    <section class="pb-10">
        <div class="container md:max-w-xl lg:max-w-2xl px-5 px-sm-0">
            <h1 id="scroll2me" class="text-center mb-5"><?php the_field('intro_heading') ?></h1>
        </div>
        <div class="container md:max-w-xl lg:max-w-1xl px-10 text-center">
            <p><?php the_field('intro_text') ?></p>
        </div>
    </section>
    <section class="py-10">
        <?php get_template_part('/includes/processes'); ?>
    </section>
    <section class="py-10">
        <?php get_template_part('/includes/largeVideo'); ?>
    </section>
    <section class="py-10">
        <?php get_template_part('/includes/news'); ?>
    </section>
    <section class="py-10">
        <?php get_template_part('/includes/testimonials'); ?>
    </section>
</main>
<?php get_template_part('/includes/footer'); ?>