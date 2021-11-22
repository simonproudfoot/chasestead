<div class="container" :count="slideCount = <?php echo wp_count_posts('news')->publish <= 5 ? wp_count_posts('news')->publish : 5 ?>">
    <div class="cta">
        <div class="cta__titlebar px-25 text-white">
            <div class="cta__titlebar__sliderNav ">
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
        <span class="cta__flag z-20">News</span>
        <div class="cta__image z-10">
            <?php
            $imgIndex = 0;
            $loop = new WP_Query(
                array(
                    'post_type' => 'news', // This is the name of your post type - change this as required,
                    'posts_per_page' => 5 // This is the amount of posts per page you want to show
                )
            );
            while ($loop->have_posts()) : $loop->the_post();
            ?>
                <?php $imgIndex++ ?>
                <img v-show="currentSlide === <?php echo $imgIndex ?>" src="<?php echo the_post_thumbnail_url('med_square') ?>" alt="">
            <?php endwhile; ?>
            <?php
            wp_reset_postdata(); ?>
        </div>
        <div class="cta__content pt-15">
            <?php
            $index = 0;
            $loop = new WP_Query(
                array(
                    'post_type' => 'news', // This is the name of your post type - change this as required,
                    'posts_per_page' => 5 // This is the amount of posts per page you want to show
                )
            );
            while ($loop->have_posts()) : $loop->the_post();
            ?>
                <?php $index++ ?>
                <div class="cta__content__inner slideContent" v-show="currentSlide === <?php echo $index ?>">
                    <h2 class="text-white text-uppercase"><?php the_title(); ?></h2>
                    <span class="break"></span>
                    <p class="text-white"><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="inline-block no-underline bg-transparent hover:bg-white text-white font-semibold hover:text-primary py-2 px-4 border border-blue-500 hover:border-transparent mt-4 ">Read more</a>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>