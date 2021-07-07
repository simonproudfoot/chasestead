<div class="container">
    <h2 class="text-accent px-4">PROCESSES</h2>
    <carousel class="pt-10 px-2" :per-page="slidecount" :mouse-drag="true" :navigation-enabled="true" :pagination-enabled="false">
        <?php
        $loop = new WP_Query(
            array(
                'post_type' => 'process'
            )
        );
        while ($loop->have_posts()) : $loop->the_post();
        ?>
            <slide class="px-2">
                <div class="card">
                    <a href="<?php the_permalink()?>">
                        <div class="card__thumbnail">
                            <img src="<?php the_post_thumbnail_url() ?>" alt="">
                        </div>
                        <div class="card__title">
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