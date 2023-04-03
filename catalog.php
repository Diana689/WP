<?php
/*
Template Name: Catalog

*/
?>
<?php get_header('catalog'); ?>
<main class="catalog-cards">
    <h1 class="catalog-cards__title"><?php the_field('catalog-cards-title'); ?></h1>
    <div class="catalog-cards__wrapper">         

      <?php 
       $args = array(
        'post_type' => 'post_type_name',
        'posts_per_page' => 7,
        );
        $p = get_posts($args);
        foreach($p as $post) {
          setup_postdata ($post);
      ?>
        <section class="catalog-cards__list catalog">
          <div class="catalog-cards__list-wrapper"> 
            <a class="catalog__card-link" href="#">
            
              <picture>
                <source media="(min-width: 1440px)" srcset="<?php the_field('product-img-des'); ?> 1x, <?php the_field('product-img-des-2x'); ?> 2x">
                <source media="(min-width: 768px)" srcset="<?php the_field('product-img-tab'); ?> 1x, <?php the_field('product-img-tab-2x'); ?> 2x">
                <img class="card-image__product-4" src="<?php the_field('product-img-mob'); ?>" srcset="<?php the_field('product-img-mob-2x'); ?> 2x" alt="Cat Energy PRO 1000 г">
              </picture>
            </a>
            <div class="catalog__card">
              <a class="catalog__title-link chicken-card__link" href="#">
                <h3 class="catalog__card-title"><?php the_title(); ?></h3>
              </a>
              <dl class="catalog__card-discription discription">
                <div class="discription__point">
                  <dt class="discription__point-name"><?php the_field('product-weight-title'); ?></dt>
                  <dr class="discription__point-info"><?php the_field('product-weight'); ?>г</dr>
                </div>
                <div class="discription__point">
                  <dt class="discription__point-name"><?php the_field('product-flavor-title'); ?></dt>
                  <dr class="discription__point-info"><?php the_field('product-flavor'); ?></dr>
                </div>
                <div class="discription__point">
                  <dt class="discription__point-name"><?php the_field('product-price-title'); ?></dt>
                  <dr class="discription__point-info"><?php the_field('product-price'); ?> Р.</dr>
                </div>
              </dl>
            </div>
          </div>
          <a class="catalog__card-button button" href="#">
            <span class="button-intro"> Заказать</span>
          </a>
        </section>     

      <?php } wp_reset_postdata(); ?>            
       
        <section class="catalog-cards__more">
          <div class="list-more">
            <h3 class="more__title"><?php the_field('more-products-title'); ?></h3>
            <p class="more__intro"><?php the_field('more-products-info'); ?></p>
            <button class="catalog-button pagination-show-more" type="button">
              <span class="catalog-button__intro"> показать все</span>
            </button>
          </div>
        </section>
    </div>
        <section class="catalog-cards__additional additional">
          <h2 class="additional__title"><?php the_field('additional-title'); ?></h2>
          <div class="additional__wrapper">
            <ul class="additional__card">

              <?php 
              $args = array(
                'post_type' => 'additional_items',
                'posts_per_page' => 4,
                );
                $p = get_posts($args);
                foreach($p as $post) {
                  setup_postdata ($post);
              ?>

                <li class="additional__card-item">
                  
                  <div class="card-item__wrapper">
                    <h3 class="additional__card-title"><?php the_title(); ?></h3>
                    <p class="additional__card-discription card-discription">
                      <span class="card-discription__point"><?php the_field('additional-product-quantity'); ?></span>
                      <span class="card-discription__into"><?php the_field('additional-product-price'); ?>Р.</span>
                    </p>
                  </div>
                  <a class="additional__card-button button" href="#">
                    <span class="button-intro"> Заказать</span>
                  </a>
                </li>
              <?php } wp_reset_postdata(); ?> 
              
            </ul>
            <p class="catalog-cards__intro"><?php the_field('present-intro'); ?>
            </p>
          </div>
        </section>
  </main>
  <?php get_footer(); ?>