  <footer class="footer bg-primary mt-10 py-10">
    <div class="container">
      <div class="row">
        <div class="col-12 sm:col-6 md:col-4">
          <a href="/">
            <img class="block mt-5" src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/logo-white.svg" width="180" height="86">
          </a>
          <img class="block mb-5 mt-5" src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/50.svg" width="150" height="86">
          <a href="<?php echo esc_url(get_template_directory_uri()) ?>/src/AS9100D-BS-EN-ISO-9001.2015-Chasestead-Group-expiry-28.11.22.pdf">
            <img class="inline-block mt-5 mr-2" src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/AS9100.svg" width="55" height="">
          </a>
          <a href="<?php echo esc_url(get_template_directory_uri()) ?>/src/Essentials-19-20.pdf">
            <img class="inline-block mt-5" src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/ce.webp" width="120" height="">
          </a>
          <a href="<?php echo esc_url(get_template_directory_uri()) ?>/src/GDPR.pdf">
            <img class="block mt-5" src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/Certification-Logos-04.png" width="50" height="50" alt="GDPR logo" class="mb-4">
          </a>
        </div>

        <?php if (get_field('address', 'option')) : ?>
          <div class="col-12 sm:col-6 md:col-3 text-white mt-5 sm:mt-0">
            <span class="break"></span>
            <?php the_field('address', 'option') ?>
          </div>
        <?php endif; ?>
        <div class="col-12 sm:col-6 md:col-3">
          <span class="break"></span>
          <?php if (get_field('phone_number', 'option')) : ?>
            <a href="tel:<?php the_field('phone_number', 'option') ?>">
              <p class="text-white mb-2">T: <?php the_field('phone_number', 'option') ?></p>
            </a>
          <?php endif; ?>
          <?php if (get_field('fax_number', 'option')) : ?>
            <p class="text-white mb-2">F: <?php the_field('fax_number', 'option') ?></p>
          <?php endif; ?>
          <?php if (get_field('contact_email', 'option')) : ?>
            <p class="text-white mb-2">E: <?php the_field('contact_email', 'option') ?></p>
          <?php endif; ?>
        </div>
        <div class="col-12 sm:col-6 md:col-2">
          <span class="break"></span>
          <?php if (get_field('facebook_social_url', 'option')) : ?>
            <a href="<?php the_field('facebook_social_url', 'option') ?>">
              <i class="fab fa-facebook-f text-white mr-4" style="font-size: 22px;"></i>
            </a>
          <?php endif; ?>
          <?php if (get_field('twitter_social_url', 'option')) : ?>
            <a href="<?php the_field('twitter_social_url', 'option') ?>">
              <i class=" fab fa-twitter text-white" style="font-size: 22px;"></i>
            </a>
          <?php endif; ?>
          <small class="block mt-3 text-white">© Chasestead Ltd <?php echo date("Y"); ?></small>
        </div>
      </div>
    </div>

  </footer>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//code.tidio.co/3gct0kfxbzkyl1bve8vovzjkskpt80rh.js" async></script>

  <script>

$( document ).ready(function() {

      $(".head-arrow-down").click(function(e) {
        e.preventDefault();
        var aid = $(this).attr("href");
        $('html,body').animate({scrollTop: $(aid).offset()},'slow');
    });

});



  </script>
  </body>
  <?php wp_footer(); ?>
  <style>

    body {
      overflow-x: hidden;
    }

    .wpcf7-textarea {
      background-color: #324776;
      padding: 1em !important;
      color: #fff !important;
      width: 100% !important;
      margin-bottom: 1em !important;
    }

    [v-cloak] {
      display: none
    }

    .main--frontpage {
        padding-top: 43%;
    }

    p.alignleft,
    .alignleft {
      float: left !important;
      margin: 5px 20px 20px 0 !important;
    }

    #tidio-chat {
      display: none !important;
    }

    .header {
      min-height: 477px;
    }

    .head-arrow-down {
      background: url('<?php echo esc_url(get_template_directory_uri()) ?>/src/img/down-arrow.png');
      height: 70px;
      width: 70px;
      background-size: contain;
      position: absolute;
      top: 72%;
      left: 50%;
      transform: translateX(-50%);
      z-index: 9;
      scroll-behavior: smooth;
    }

    h1#scroll2me {
        padding-top: 8%;
    }

    @media (max-width: 767px) {
     
      .head-arrow-down {
          background: url(http://ducknest.co.uk/chasestead/wp-content/themes/chasestead/src/img/down-arrow.png);
          height: 50px;
          width: 50px;
          top: 70%; 
          background-size: 50px;
      }

    }

  .container404 {
      display: grid;
      justify-content: center;
      align-items: center;
      margin: 4% 0;
      text-align: center;
  }

  .container404 h1 {
    font-size: 3.2em;
    text-align: center;
  }
  .header--front:after {
  transform: rotate(0deg) !important;
  }

  .header__img {
    height: 100%;
    width: 100%;
}

.hp-card.card {
    position: relative;
}

.hp-card.card .card__title {
    position: absolute;
    text-align: left;
    top: 0;
    color: #fff;
    background: rgba(0, 0, 0, 0.5);
}


@media (max-width: 767px) {
  
  .hp-card-slider .VueCarousel-inner {
    padding-top: unset;
  }

  .header--front .overlay {
    background-color: rgba(10, 27, 65, 0.5);
  }

  /* header .header--front img {
    max-width: unset;
  }  */
  
}

@media (max-width: 576px) {
    .main--frontpage {
      padding-top: 150px;
    }
    .header--front {
    height: 281px !important;
    min-height: unset;
    }
    .header {
      height: 281px !important;
    }
    .header.header--front .header__img img {
      margin-top: 14%;
    }
    .head-arrow-down {
      display: none;
    }
  }

  </style>

  </html>