<?php if (get_field('gallery')) : ?>
    <section class="py-10">
        <div class="container">
            <div class="cta">
                <div class="cta__titlebar px-25 text-white">
                    <div class="cta__titlebar__sliderNav hidden">
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

                <div class="cta__image cta__image--gallery  z-10" autoPlay="autoPlaySlides = false">
                    <?php
                    $imagesA = get_field('gallery');
                    $imgIndex = 0;
                    if ($imagesA) :
                        foreach ($imagesA as $image) :
                            $imgIndex++ ?>
                            <img v-if="selectedImg === <?php echo $imgIndex ?>" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="">
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="cta__content pt-15">
                    <?php
                    $imgIndexPreview = 0;
                    $imagesB = get_field('gallery');
                    if ($imagesB) : ?>
                        <ul class="cta__content__inner cta__content__inner--gallery">
                            <?php foreach ($imagesB as $image) : $imgIndexPreview++ ?>
                                <li :class="selectedImg === <?php echo $imgIndexPreview ?> ? 'active' : null"><img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" @click="selectImage(<?php echo $imgIndexPreview ?>)" />
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section> <?php endif; ?>