<?php get_template_part('/includes/meta'); ?>
<?php get_template_part('/includes/navbar'); ?>

<?php if (is_page('Home')) : ?>
    <header class="header z-0">
        <div class="header__image " style="background-image: url('<?php echo esc_url(get_template_directory_uri()) ?>/src/img/clip.png');"></div>
        <a href="">
            <div class="header__brochure"><i class="fa fa-download text-accent"></i> Download our brochure</div>
        </a>
    </header>

<?php else : ?>
    <header class="header header--small  z-0 relative">
        <div class="header__image header__image--small" style="background-image: url('<?php the_post_thumbnail_url()?>'"></div>
        <a href="">
            <div class="header__brochure"><i class="fa fa-download text-accent"></i> Download our brochure</div>
        </a>
    </header>
<?php endif; ?>