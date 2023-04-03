<?php
/*
Template Name: form

*/
?>
<?php get_header('form'); ?>


<main class="form-main">
    <section class="page-main__form form">
      <div class="form__wrapper">
        <h1 class="form__title"><?php the_field('form-title'); ?></h1>
        <p class="form__intro"><?php the_field('form-intro'); ?></p>


        <form class="form__data js-form" action="#" method="post">

        <?php echo do_shortcode('[contact-form-7 id="258" title="Контактная форма"]') ?>
        
        </form>       
    </section>
  </main>
  <?php get_footer(); ?>