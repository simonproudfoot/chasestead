<?php
get_template_part('/includes/header'); ?>
<main class="main <?php echo is_page('Home') ? 'main--frontpage' : 'main--standard' ?>">

    <section class="pt-20">
        <?php query_posts('posts_per_page=10'); ?>
        <div class="container">
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="cta mb-10">
                        <?php if (wp_get_post_categories()) : ?>
                            <div class="cta__titlebar px-25 text-white">
                                <?php echo wp_get_post_categories() ?>
                            </div>
                        <?php endif; ?>
                        <span class="cta__flag z-20"><?php echo get_the_date() ?> </span>
                        <div class="cta__image z-10">
                            <img src="<?php echo the_post_thumbnail_url() ?>" alt="">
                        </div>
                        <div class="cta__content pt-15">
                            <div class="cta__content__inner">
                                <h2 class="text-white text-uppercase"><?php the_title(); ?></h2>
                                <span class="break"></span>
                                <p class="text-white"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="inline-block no-underline bg-transparent hover:bg-white text-white font-semibold hover:text-primary py-2 px-4 border border-blue-500 hover:border-transparent mt-4 ">Read more</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <!-- Pagination Goes Here -->

                <?php endif; ?>
              


                </div>
    </section>
</main>
<?php get_template_part('/includes/footer'); ?>