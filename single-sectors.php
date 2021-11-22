
<?php get_template_part('/includes/meta'); ?>
<?php get_template_part('/includes/navbar'); ?>
<?php 
$type = 'sectors';
get_template_part('/includes/singleHeader')?>
<main class="main <?php echo is_front_page() ? 'main--frontpage' : 'main--standard' ?>">
<?php if (get_field('top_left_column') || get_field('top_right_column')) : ?>
        <section class="py-10  bg-grey-lighter content font-bold">
            <div class="container">
                <div class="row justify-around">
                    <div class="col-12 md:col-5">
                        <?php the_field('top_left_column') ?>
                    </div>
                    <div class="col-12 md:col-5">
                        <?php the_field('top_right_column') ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php get_template_part('/includes/gallery');?>
    <section class="py-10 content">
        <div class="container">
            <div class="row justify-around">
                <div class="col-12 md:col-5">
                    <?php the_field('bottom_left_column') ?>
                </div>
                <div class="col-12 md:col-5">
                    <?php the_field('bottom_right_column') ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_template_part('/includes/footer'); ?>