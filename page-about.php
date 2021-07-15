

<?php get_template_part('/includes/header'); ?>
<main class="main <?php echo is_front_page() ? 'main--frontpage' : 'main--standard' ?>">
    <section class="py-10  content">
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

    <section class="py-10 ">
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