<?php get_template_part('/includes/meta'); ?>
<?php get_template_part('/includes/navbar'); ?>
<?php if (is_page('Home')) : ?>
    <header>
        <div class="header header--front">
            <?php if (get_field('header_video') || get_field('header_video_vimeo')) : ?>
                <?php if (!get_field('local_or_vimeo')) : ?>
                    <video class="header__video header__image" muted autoplay loop>
                        <source src="<?php the_field('header_video') ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php else : ?>
                    <iframe class="header__video" id="player1" src="https://player.vimeo.com/video/<?php the_field('header_video_vimeo'); ?>?autoplay=1&loop=1&title=0&byline=0&portrait=0&muted=1&background=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (get_field('brochure_pdf_file', 'option')) : ?>
                <a href="<?php echo the_field('brochure_pdf_file', 'option') ?>">
                    <div class="header__brochure"><i class="fa fa-download text-accent"></i> Download our brochure</div>
                </a>
            <?php endif; ?>
    </header>
    <?php elseif (is_page('contact')) : { ?>
        <header class="z-10 relative">
            <div class="header header--map relative">
                <div class="header__innerclip">
                    <iframe width="100%" height="450" style="border:0" loading="lazy" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD08ZGji-OhOjmCgylg3rRsqvJ0hl6fyew&q=SG6 1JX">
                    </iframe>
                </div>
            </div>
        </header>
    <?php } ?>
<?php else : ?>
    <header class=" relative">
        <div class="header header--small relative">
            <div class="header__innerclip">
                <div class="container">
                    <h1 class="header__title font-thin uppercase">
                        <?php if (is_archive()) : ?>
                            <?php if (get_query_var('post_type') == 'process') : ?>
                                Processes
                            <?php else : ?>
                                <?php the_title(); ?>
                            <?php endif; ?>
                        <?php elseif (is_single() && get_query_var('post_type') == 'news') : ?>
                            Latest news
                        <?php elseif (is_page(89)) : ?>
                            world class prototyping engineers
                        <?php else : ?>
                            <?php the_title(); ?>
                        <?php endif; ?>
                    </h1>
                </div>
                <?php if (!is_archive()) : ?>
                    <div class="header__image header__image--small bg-primary" style="background-image: url('<?php the_post_thumbnail_url('singleHead') ?>'">
                    </div>
                <?php else : ?>
                    <div class="header__image header__image--small bg-primary" style="background-image: url('<?php echo esc_url(get_template_directory_uri()) ?>/src/img/aviaton.jpg'">
                    </div>
                <?php endif; ?>
                <div class="header--process__shape" style="background-image: url('<?php echo esc_url(get_template_directory_uri()) ?>/src/img/processheader_overlay.png')">

                </div>
            </div>
        </div>
        <?php if (get_field('brochure_pdf_file', 'option')) : ?>
            <a href="<?php echo the_field('brochure_pdf_file', 'option') ?>" class="z-10">
                <div class="header__brochure"><i class="fa fa-download text-accent"></i> Download our brochure</div>
            </a>
        <?php endif; ?>
    </header>
<?php endif; ?>