<header class="header header--process z-0" style="background-image: url('<?php if (!get_field('header_video') || !get_field('header_video_vimeo')) {
                                                                                echo the_post_thumbnail_url();
                                                                            } ?>">
    <?php if (get_field('header_video') || get_field('header_video_vimeo')) : ?>
        <?php if (!get_field('local_or_vimeo')) : ?>
            <video class="header__video header__image hidden md:block" muted autoplay loop>
                <source src="<?php the_field('header_video') ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        <?php else : ?>
            <iframe class="header__video" id="player1" src="https://player.vimeo.com/video/<?php the_field('header_video_vimeo'); ?>?autoplay=1&loop=1&title=0&byline=0&portrait=0&muted=1&background=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        <?php endif; ?>
    <?php endif; ?>
    <div class="container ">
        <div class="header--process__content py-10">
            <ul class="header--process__content__inner__index">
                <?php
                $current = get_the_ID();
                global $post;
                global $type;
                $loop = new WP_Query(
                    array(
                        'post_type' => $type,
                        'order' => 'ASC'
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
<?php if (get_field('header_video') || get_field('header_video_vimeo') || get_query_var('post_type') == 'process') : ?>
    <?php if (!get_field('local_or_vimeo')) : ?>
        <video class="sm:hidden" muted autoplay loop style="width: 100%;">
            <source src="<?php the_field('header_video') ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php else : ?>
        <iframe class="" id="player1" src="https://player.vimeo.com/video/<?php the_field('header_video_vimeo'); ?>?autoplay=1&loop=1&title=0&byline=0&portrait=0&muted=1&background=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    <?php endif; ?>
<?php endif; ?>

<?php if (get_query_var('post_type') == 'sectors') : ?>
    <img src="<?php the_post_thumbnail_url('small_wide'); ?>" class="md:hidden" style="width: 100%;">
<?php endif; ?>