<?php
/*
Template Name: home

*/
?>

<?php get_header(); ?>
  <main class="page-main">
    <section class="program-selection">
      <h1 class="page-main__title"><?php the_field('main-title'); ?></h1>
      <h2 class="visually-hidden">Программа питания для похудения</h2>
      <p class="program-selection__slogan"><?php the_field('text'); ?></p>
      <a class="program-selection__link" href="<?php the_field('form-page-link'); ?>">
        <span class="program-selection__link-intro" >подобрать программу</span>
      </a>
    </section>
    <section class="program">
      <div class="program-wrapper">
        <section class="program-slim">
          <div class="program-slim__wrapper">
            <h1 class="program-slim__title"><?php the_field('slim-program-title'); ?></h1>
            <div class="program-slim__description">
              <?php the_field('slim-program'); ?>
            </div>
            <a class="program-slim__catalog" href="<?php the_field('slim-catalog-link'); ?>">каталог slim </a>
          </div>
        </section>
        <section class="program-pro">
          <div class="program-pro__wrapper">
            <h1 class="program-pro__title"><?php the_field('pro-program-title'); ?></h1>
            <div class="program-pro__description">
              <?php the_field('weight-gain-program'); ?>
            </div>
            <a class="program-pro__catalog" href="<?php the_field('pro-catalog-link'); ?>">каталог pro </a>
          </div>
        </section>
      </div>
    </section>
    <section class="program-operation">
      <div class="program-operation__wrapper">
        <h2 class="program-operation__title"><?php the_field('program-operation-title'); ?></h2>        
        <?php the_field('discription'); ?>      
      </div>
    </section>
      <section class="example">
        <div class="example__title-wrapper" >
        <h2 class="example__title"><?php the_field('example-title'); ?></h2>
        </div>
        <div class="example__wrapper">
          <article class="example__discription">
            <div class="example__intro">
            <?php the_field('example-discription'); ?>             
            </div>
            <div class="example__result result">
              <div class="example__result-wraper">
                <p class="result__weight">
                  <b class="result__weight-intro"><?php the_field('weight'); ?> КГ </b>
                  <span class="result__weight-discription">снижение веса</span>
                </p>
                <p class="result__days">
                  <b class="result__days-intro"><?php the_field('days'); ?> ДНЕЙ</b>
                  <span class="result__days-discription">затрачено времени</span>
                </p>
              </div>
              <b class="example__cost">Затраты на питание:
                <span class="example__cost-item" ><?php the_field('cost'); ?> РУБ.</span></b>
            </div>
          </article>
          <article class="example__slider">
            <div class="slider-wrapper">
              <div class="img slider-after"></div>
              <div class="img slider-before"></div>
            </div>
            <div class="example__slider-change change">
              <span class="change-before">Было</span>
              <input class="change__item" type="range" id="fader" oninput="onSliderChange(this.value)">
              <span class="change-after">Стало</span>
            </div>
          </article>        
        </div>
    </section>
  </main>

  <?php get_footer(); ?>