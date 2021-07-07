  <footer class="footer bg-primary mt-10 py-10">
    <div class="container">
      <div class="row">
        <div class="col-12 sm:col-6 md:col-4">
          <a href="/"><img class="block" src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/logo-white.svg" width="180" height="86"></a>
          <img class="block mt-4" src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/50.svg" width="150" height="86">
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
  <?php wp_footer(); ?>
  </body>

  </html>