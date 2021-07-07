<div class="container">
    <div class="largeVideo">
        <div class="largeVideo__overlay" ref="video01__overlay">
            <div class="largeVideo__overlay__inner">
                <h2 class="text-white font-thin">—  Discover  —</h2>
                <h2 class="text-accent mb-2 font-thin">Our workshop</h2>
                <div class="largeVideo__overlay__inner__play" @click="playVideo('video01', 'video01__overlay')"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/playVideo.svg" alt="play"></div>
            </div>
        </div>
        <video ref="video01" @ended="stopVideo()">
            <source src="<?php echo esc_url(get_template_directory_uri()) ?>/src/video/testVideo.mp4" loop type="video/mp4">
            Sorry, your browser doesn't support embedded videos.
        </video>
    </div>
</div>