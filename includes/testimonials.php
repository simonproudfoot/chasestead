<?php if (have_rows('testimonial_slider', 'option')) : ?>
    <div class="container px-1 sm:px-6" style="max-width: 1000px;">
        <div class="row no-gutter testimonial">
            <div class="col-1 sm:col-2 testimonial__left relative">
                <span class="line"></span>
                <span class="circle" style="left: 0;"></span>
            </div>
            <?php the_sub_field('item'); ?>
            <div class="col-10 sm:col-8 testimonial__content">
                <carousel class="text-center" :per-page="1" :mouse-drag="true" :navigation-enabled="false" :pagination-enabled="false">
                    <?php while (have_rows('testimonial_slider', 'option')) : the_row(); ?>
                        <slide>
                            <div class="py-5 px-3">
                                <?php the_sub_field('item'); ?>
                            </div>
                        </slide>
                    <?php endwhile; ?>
                </carousel>
            </div>
            <div class="col-1 sm:col-2 testimonial__right relative">
                <span class="line"></span>
                <span class="circle" style="right: 0;"></span>
            </div>
        </div>
    </div>
<?php endif; ?>