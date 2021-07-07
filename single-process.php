<?php get_template_part('/includes/meta'); ?>
<?php get_template_part('/includes/navbar'); ?>
<header class="header--process z-0" style="background-image: url('<?php echo the_post_thumbnail_url() ?>');">
    <div class="container ">
        <div class="header--process__content py-10">
            <ul class="header--process__content__inner__index">
                <?php
                $current = get_the_ID();
                global $post;
                $loop = new WP_Query(
                    array(
                        'post_type' => 'process'
                    )
                );
                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <a href="<?php the_permalink() ?>">
                        <li class="<?php if ($current == $post->ID) { ?> active <?php } ?>"><?php the_title(); ?></li>
                    </a>
                <?php endwhile;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
        <div class="header--process__shape" style="background-image: url('<?php echo esc_url(get_template_directory_uri()) ?>/src/img/processheader_overlay.png')">
        </div>
    </div>
</header>
<main class="main <?php echo is_front_page() ? 'main--frontpage' : 'main--standard' ?>">
    <section class="py-10">
        <div class="container">
            <div class="cta ">
                <div class="cta__titlebar px-25 text-white">
                    <div class="cta__titlebar__sliderNav hidden">
                        <div class="nav">
                            <span v-for="(n, i) in slideCount" class="navDot" @click="slideChange(i+1)" :class="currentSlide == i+1 ? 'active':null"></span>
                        </div>
                        <div class="arrows">
                            <span class="arrows--btn arrows--left" style="background-image: url('<?php echo esc_url(get_template_directory_uri()) ?>/src/img/arrow.svg')" @click="slidePrev(true)">
                            </span>
                            <span class="arrows--btn" style="background-image: url('<?php echo esc_url(get_template_directory_uri()) ?>/src/img/arrow.svg')" @click="slideNext(true)">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="cta__image cta__image--gallery  z-10" autoPlay="autoPlaySlides = false">
                    <?php
                    $imagesA = get_field('gallery');
                    $imgIndex = 0;
                    if ($imagesA) :
                        foreach ($imagesA as $image) :
                            $imgIndex++ ?>
                            <img v-if="selectedImg === <?php echo $imgIndex ?>" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="">
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="cta__content pt-15">
                    <?php
                    $imgIndexPreview = 0;
                    $imagesB = get_field('gallery');
                    if ($imagesB) : ?>
                        <ul class="cta__content__inner cta__content__inner--gallery">
                            <?php foreach ($imagesB as $image) : $imgIndexPreview++ ?>
                                <li :class="selectedImg === <?php echo $imgIndexPreview ?> ? 'active' : null"><img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" @click="selectImage(<?php echo $imgIndexPreview ?>)" />
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <section>
</main>
<?php get_template_part('/includes/footer'); ?>