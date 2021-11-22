<div class="container hp-card-slider">
    <!--<h2 class="text-accent px-4">PROCESSES</h2>-->
    <carousel class="pt-10 px-2" :per-page="countCarousel" :mouse-drag="true" :navigation-enabled="true" :pagination-enabled="false">
        <?php
        $loop = new WP_Query(
            array(
                'post_type' => 'process'
            )
        );
        while ($loop->have_posts()) : $loop->the_post();
        ?>
            <slide class="px-2">
                <div class="card hp-card" style="overflow: hidden;">
                    <a class="card__link__inner" href="<?php the_permalink()?>">
                        <div class="card__thumbnail">
                            <img src="<?php the_post_thumbnail_url('small') ?>" alt="">
                        </div>
                        <div class="card__title" style="width: 100%">
                            <?php the_title(); ?>
                        </div>
                    </a>
                </div>
            </slide>
        <?php endwhile;
        wp_reset_postdata();
        ?>
    </carousel>
</div>