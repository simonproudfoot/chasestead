<?php
/**
 * Template Name: Contact
 */
?>
<?php get_template_part('/includes/header'); ?>
<main class="main <?php echo is_front_page() ? 'main--frontpage' : 'main--standard' ?>">
  <div class="container">
    <div class="row justify-end">
      <div class="col-12 md:col-5 pt-10 contact-content">
        <?php if (get_field('phone_number', 'option')) : ?>
          <h4>Telephone</h4>
          <span class="break"></span>
          <p class="mb-2">T: <?php the_field('phone_number', 'option') ?></p>
        <?php endif; ?>
        <br>
        <h4>Email</h4>
        <span class="break"></span>
        <?php if (get_field('contact_email', 'option')) : ?>
          <div class="mb-2">
            <p class="inline text-accent">General:</p>
            <p class="inline"><?php the_field('contact_email', 'option') ?></p>
          </div>
        <?php endif; ?>
        <?php if (get_field('sales_email', 'option')) : ?>
          <div class="mb-2">
            <p class="inline text-accent">Sales:</p>
            <p class="inline"><?php the_field('sales_email', 'option') ?></p>
          </div>
        <?php endif; ?>
        <br>
        <?php if (get_field('fax_number', 'option')) : ?>
          <h4>Fax</h4>
          <span class="break"></span>
          <div class="mb-2">
            <p class="inline"><?php the_field('fax_number', 'option') ?></p>
          </div>
        <?php endif; ?>
        <br>
        <?php if (get_field('address', 'option')) : ?>
          <h4>Address</h4>
          <span class="break"></span>
          <?php the_field('address', 'option');  ?>
        <?php endif; ?>
      </div>
      <div class="col-12 md:col-6 contactForm">
        <div class="contactForm__inner bg-primary text-white  p-4 md:p-10">
          <p class="text-white pb-10">Please fill in your enquiry and someone will be in touch</p>
          <?php echo do_shortcode('[contact-form-7 id="87" title="Contact form 1"]'); ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('/includes/footer'); ?>