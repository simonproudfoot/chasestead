<div class="container">
    <div class="largeVideo">
        <div class="largeVideo__overlay" ref="video01__overlay">
            <div class="largeVideo__overlay__inner">
                <h2 class="text-white font-thin">— Discover —</h2>
                <h2 class="text-accent mb-2 font-thin">Our workshop</h2>
                <div class="largeVideo__overlay__inner__play" @click="playVideo('video01', 'video01__overlay')">
                    <img src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/playVideo.svg" alt="play">
                </div>
            </div>
        </div>
        <?php if (get_field('feature_video') || get_field('feature_video_vimeo')) : ?>
            <?php if (get_field('local_or_vimeo')) : ?>
                <video class="header__video header__image" ref="video01" allowfullscreen @ended="stopVideo('video01__overlay')">
                    <source src="<?php the_field('feature_video') ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php else : ?>
                <vimeo-player :controls="false" ref="video01" video-id="<?php the_field('feature_video_vimeo') ?>" @ended="stopVideo('video01__overlay')">
                </vimeo-player>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>