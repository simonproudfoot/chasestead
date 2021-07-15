<?php get_template_part('/includes/meta'); ?>

<?php get_template_part('/includes/header'); ?>
<main class="main <?php echo is_front_page() ? 'main--frontpage' : 'main--standard' ?>">
    <section class="py-16 content">
        <div class="container">
            <?php the_post_thumbnail('singleHead') ?>
            <div class="md:px-20 mt-10">
                <h1 class="font-thin md:max-w-xs text-2xl uppercase"><?php the_title(); ?></h1>
                <span class="break"></span>
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="bg-grey-lighter block w-100 h-2 mb-20"></div>
    </div>

    <?php get_template_part('/includes/news'); ?>
</main>
<?php get_template_part('/includes/footer'); ?>