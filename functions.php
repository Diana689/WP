<?php

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'header.css', get_template_directory_uri() . '/assets/bloks/header.css');
	wp_enqueue_style( 'page.css', get_template_directory_uri() . '/assets/bloks/page.css');
	wp_enqueue_style( 'catalogpage.css', get_template_directory_uri() . '/assets/bloks/catalogpage.css');
	wp_enqueue_style( 'formpage.css', get_template_directory_uri() . '/assets/bloks/formpage.css');
	wp_enqueue_style( 'footer.css', get_template_directory_uri() . '/assets/bloks/footer.css');
	wp_enqueue_style( 'fonts.css', get_template_directory_uri() . '/assets/global/fonts.css');
	wp_enqueue_style( 'global.css', get_template_directory_uri() . '/assets/global/global.css');

	wp_enqueue_script( 'script.js', get_template_directory_uri() . '/assets/script.js', array(), 'null', true );
	wp_enqueue_script( 'form.js', get_template_directory_uri() . '/assets/form.js', array(), 'null', true );

});

register_nav_menus( array(
	"menu" => esc_html__('Primary', 'blog-template' ),
));

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support( 'custom-logo' );


add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}


add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}

/* Товары */

add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_taxonomy( 'category_products', [ 'post_type_name' ], [
		'label'                 => 'Категории', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Категории',
			'singular_name'     => 'Категория',
			'search_items'      => 'Искать категории',
			'all_items'         => 'Все категории',
			'parent_item'       => 'Родит. категория',
			'parent_item_colon' => 'Родит. категория:',
			'edit_item'         => 'Ред. категория',
			'update_item'       => 'Обновить категорию',
			'add_new_item'      => 'Добавить категорию',
			'new_item_name'     => 'Новая категория',
			'menu_name'         => 'Категории',
		),
		'description'           => 'Рубрики для категорий', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'post_type_name', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	] );



	register_post_type( 'post_type_name', [
		'label'  => null,
		'labels' => [
			'name'               => 'Товары', // основное название для типа записи
			'singular_name'      => 'Товар', // название для одной записи этого типа
			'add_new'            => 'Добавить товар', // для добавления новой записи
			'add_new_item'       => 'Добавление товара', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование товара', // для редактирования типа записи
			'new_item'           => 'Новый товар', // текст новой записи
			'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
			'search_items'       => 'Искать товар', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Товары', // название меню
		],
		'public'                 => true,
		'menu_position'       => 7,
		'menu_icon'           => 'dashicons-welcome-add-page',		
		'supports'            => [ 'title', 'thumbnail','excerpt' ], // 'title','editor','author','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'has_archive'         => true,
	
	] );

}

/* Дополнительные товары */
add_action( 'init', 'additional_items_post_types' );

function additional_items_post_types(){

	register_taxonomy( 'category_additional_products', [ 'additional_items_post_types' ], [
		'label'                 => 'Категории', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Категории',
			'singular_name'     => 'Категория',
			'search_items'      => 'Искать категории',
			'all_items'         => 'Все категории',
			'parent_item'       => 'Родит. категория',
			'parent_item_colon' => 'Родит. категория:',
			'edit_item'         => 'Ред. категория',
			'update_item'       => 'Обновить категорию',
			'add_new_item'      => 'Добавить категорию',
			'new_item_name'     => 'Новая категория',
			'menu_name'         => 'Категории',
		),
		'description'           => 'Рубрики для категорий', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'additional_items_post_types', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	] );

	register_post_type( 'additional_items', [
		'label'  => null,
		'labels' => [
			'name'               => 'Дополнительные товары', // основное название для типа записи
			'singular_name'      => 'Дополнительный товар', // название для одной записи этого типа
			'add_new'            => 'Добавить дополнительный товар', // для добавления новой записи
			'add_new_item'       => 'Добавление дополнительного товара', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование дополнительного товара', // для редактирования типа записи
			'new_item'           => 'Новый дополнительный товар', // текст новой записи
			'view_item'          => 'Смотреть дополнительный товар', // для просмотра записи этого типа.
			'search_items'       => 'Искать дополнительный товар', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Дополнительные товары', // название меню
		],
		'public'                 => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-admin-page',		
		'supports'            => [ 'title','thumbnail' ], // 'title','editor','author','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'has_archive'         => true,
	
	] );

}

