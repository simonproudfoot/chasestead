<?php query_posts('posts_per_page=5'); ?>
<span class="hidden">
{{slideCount = <?php echo wp_count_posts()->publish <= 5 ? wp_count_posts()->publish : 5 ?>}} <!-- pass number of slides to JS -->
</span>
<div class="container">
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
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php $imgIndex++ ?>
                    <img v-show="currentSlide === <?php echo $imgIndex ?>" src="<?php echo the_post_thumbnail_url() ?>" alt="">
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="cta__content pt-15">
            <?php
            $index = 0;
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php $index++ ?>
                    <div class="cta__content__inner slideContent" v-if="currentSlide === <?php echo $index ?>">
                        <h2 class="text-white text-uppercase"><?php the_title(); ?></h2>
                        <span class="break"></span>
                        <p class="text-white"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="inline-block no-underline bg-transparent hover:bg-white text-white font-semibold hover:text-primary py-2 px-4 border border-blue-500 hover:border-transparent mt-4 ">Read more</a>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>