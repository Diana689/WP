<!DOCTYPE html>
<html class="page" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title>Функциональное питание для котов cat energy</title>

<?php wp_head(); ?>

</head>

<body class="page__body">
  <header class="page-header">
    <div class="page-header__logo">
      <a class="page-header__logo-items" href="home">
        <picture>
          <source media="(min-width: 1440px)" srcset="<?php the_field('header-logo-des'); ?>">
          <source media="(min-width: 768px)" srcset="<?php the_field('header-logo-tab'); ?>">
          <img class="page-header__logo-icon" src="<?php the_field('header-logo-mob'); ?>" alt="Логотип">
        </picture>
      </a>
      <?php the_custom_logo(); ?>      
    </div>
    <nav class="page-header__main-nav page-header__main-nav--opened page-header__main-nav--nojs" >
      <button class="main-nav__toggle" type="button"><span class="visually-hidden">Открыть меню</span></button>      
      <?php wp_nav_menu(); ?>  
    </nav>
  </header>
  <script>
    var navMain = document.querySelector('.page-header__main-nav');
    var navToggle = document.querySelector('.main-nav__toggle');

    navMain.classList.remove('page-header__main-nav--nojs');

    navToggle.addEventListener('click', function(){
      if (navMain.classList.contains('page-header__main-nav--closed')){
        navMain.classList.remove('page-header__main-nav--closed');
        navMain.classList.add('page-header__main-nav--opened');
      } else {
        navMain.classList.add('page-header__main-nav--closed');
        navMain.classList.remove('page-header__main-nav--opened');
      }
    });
  </script>