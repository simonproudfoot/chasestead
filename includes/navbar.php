<nav>
    <div class="preNav d-block z-20">
        <div class="relative flex items-center justify-between md:px-6 lg:px-8 ">
            <div class="flex-1 flex items-center justify-cnter sm:items-stretch md:justify-end">
                <div class="sm:block">
                    <div class="flex">
                        <a href="#"><button class="bg-accent hover:accent-dark py-1 px-3 mx-3  tablet:mx-6 mb-0">GET A QUOTE ></button></a>
                        <a href="tel:<?php the_field('phone_number', 'option') ?>" class="text-accent hidden sm:block hover:text-white mx-6 "><?php the_field('phone_number', 'option') ?></a>
                        <a href=""><img src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/spain.svg" class="ml-4 my-5" alt="spain" width="27" height="17"></a>
                        <a href=""><img src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/germany.svg" class="ml-2 my-5" alt="germany" width="28" height="18"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mainNav w-full z-10">
        <div x-data="{ menuOpen: false }" class="flex flex-col max-w-screen-xl  mx-auto tablet:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between sm:w-full tablet:w-full">
                <a href="<?php echo site_url() ?>"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/<?php echo is_page( 'Home' ) ? 'logo-white' : 'logo' ?>.svg" width="272" height="86"></a>
                <button class="tablet:hidden focus:outline-none" @click="menuOpen = !menuOpen">
                    <svg fill="currentColor" viewBox="0 0 16 18" class="w-6 h-6">
                        <path v-show="!menuOpen" fill="<?php echo is_page( 'Home' ) ? '#fff' : '#000' ?>" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path v-show="menuOpen" fill="<?php echo is_page( 'Home' ) ? '#fff' : '#000' ?>" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': menuOpen, 'hidden': !menuOpen}" class="mainNav__largeNav flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row <?php echo is_page( 'Home' ) ? 'text-white' : 'text-primary' ?>">
                <div class="mainNav__dropdown" @mouseover="dropDown('about', true)" @mouseleave="dropDown('about', false)">
                    <a href="" class="px-2 font-bold <?php echo is_page( 'Home' ) ? 'text-white' : 'text-primary' ?>">About</a>
                </div>
                <div class="mainNav__dropdown" @mouseover="dropDown('Processes', true)" @mouseleave="dropDown('Processes', false)">
                    <a href="" class="px-2 font-bold <?php echo is_page( 'Home' ) ? 'text-white' : 'text-primary' ?>">Processes</a>
                    <ul style="opacity: 0" ref="Processes">
                        <?php
                        $loop = new WP_Query(
                            array(
                                'post_type' => 'process'
                            )
                        );
                        while ($loop->have_posts()) : $loop->the_post(); ?>
                            <a href="<?php the_permalink() ?>">
                                <li><?php the_title(); ?></li>
                            </a>
                            <span></span>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
                <div class="mainNav__dropdown" @mouseover="dropDown('Sectors', true)" @mouseleave="dropDown('Sectors', false)">
                    <a class="px-2 font-bold <?php echo is_page( 'Home' ) ? 'text-white' : 'text-primary' ?>">Sectors</a>
                    <ul style="opacity: 0" ref="Sectors">
                        <li style="opacity: 0">One</li>
                        <span></span>
                        <li style="opacity: 0">Two</li>
                        <span></span>
                        <li style="opacity: 0">Three</li>
                        <span></span>
                        <li style="opacity: 0">Four</li>
                    </ul>
                </div>
                <div class="mainNav__dropdown" @mouseover="dropDown('News', true)" @mouseleave="dropDown('News', false)">
                    <a href="<?php echo site_url() ?>/news" class="px-2 font-bold <?php echo is_page( 'Home' ) ? 'text-white' : 'text-primary' ?>">News</a>
                </div>
                <div class="mainNav__dropdown">
                    <a href="<?php echo site_url() ?>/vacancies" class="px-2 font-bold <?php echo is_page( 'Home' ) ? 'text-white' : 'text-primary' ?>">Vacancies</a>
                </div>
                <div class="mainNav__dropdown" @mouseover="dropDown('Contact', true)" @mouseleave="dropDown('Contact', false)">
                    <a class="px-2 font-bold <?php echo is_page( 'Home' ) ? 'text-white' : 'text-primary' ?>">Contact</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Mobile menu, show/hide based on menu state. -->
    <div v-show="menuOpen" class="mobileMenu z-8 tablet:hidden">
        <ul class="px-2 sm:px-3 md:px-6 lg:px-8">
            <li><a href="" class="px-2 font-bold text-2xl text-white">About</a></li>
            <span></span>
            <li><a href="" class="px-2 font-bold text-2xl text-white">Processes</a></li>
            <span></span>
            <li><a href="" class="px-2 font-bold text-2xl text-white">Sectors</a></li>
            <span></span>
            <li><a href="" class="px-2 font-bold text-2xl text-white">News</a></li>
            <span></span>
            <li><a href="" class="px-2 font-bold text-2xl text-white">Vacancies</a></li>
            <span></span>
            <li><a href="" class="px-2 font-bold text-2xl text-white">Contact</a></li>
            <span></span>
            <li><a href="" class="pt-5 text-3xl text-accent sm:hidden">01462 480 048</a></li>
        </ul>
    </div>
</nav>