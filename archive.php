<?php
get_template_part('/includes/header'); ?>
<main class="main <?php echo is_page('Home') ? 'main--frontpage' : 'main--standard' ?>">
    <section class="pt-20">
        <?php
        query_posts(array(
            'post_type' => get_query_var('post_type'),
            'showposts' => 15
        ));
        ?>
        <div class="container">
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="cta mb-10">
                        <?php if (wp_get_post_categories()) : ?>
                            <div class="cta__titlebar px-25 text-white">
                                <?php echo wp_get_post_categories() ?>
                            </div>
                        <?php endif; ?>
                        <?php if (get_query_var('post_type') == 'vacancies'|| get_query_var('post_type') == 'news') : ?>
                            <span class="cta__flag z-10"><?php echo get_the_date() ?></span>
                        <?php endif; ?>
                        <div class="cta__image z-5 ">
                            <img class="bg-secondary" src="<?php echo the_post_thumbnail_url('med_square') ?>" alt="">
                        </div>
                        <div class="cta__content pt-15">
                            <div class="cta__content__inner">
                                <h2 class="text-white text-uppercase"><?php the_title(); ?></h2>
                                <span class="break"></span>
                                <p class="text-white">
                                    <?php if (get_the_excerpt()) {
                                        echo  the_excerpt();
                                    } elseif (get_the_content()) {
                                        the_content();
                                    };
                                    ?></p>
                                <?php if (get_query_var('post_type') == 'vacancies') : ?>
                                    <p class="mt-5"><small class="text-white">Salary: <?php the_field('salary'); ?></small></p>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="inline-block no-underline bg-transparent hover:bg-white text-white font-semibold hover:text-primary py-2 px-4 border border-blue-500 hover:border-transparent mt-4"><?php echo get_query_var('post_type') == 'vacancies' ? 'APPLY HERE' : 'Read more' ?></a>
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