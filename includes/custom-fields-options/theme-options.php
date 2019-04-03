<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;


// Default options page
Container::make( 'theme_options',  'Настройки темы')
		->set_icon('dashicons-carrot')
	    ->add_tab( 'Шапка', array(
	        Field::make( 'select', 'wc_header_logic', 'Будет использоваться логотип?' )
					->add_options(array(
						'yes' => 'Да, буду использовать логотип ',
						'no' => 'Нет, буду использовать текст',
					)),
					Field::make( 'image', 'wc_header_logo', 'Логотип' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_header_logic',
							'value' => 'yes',
							'compare' => '=',
						)
					)),
	        Field::make( 'text', 'wc_header_name', 'Название сайта' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_header_logic',
							'value' => 'no',
							'compare' => '=',
						)
					)),
					Field::make( 'text', 'wc_header_desc', 'Описание сайта' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_header_logic',
							'value' => 'no',
							'compare' => '=',
						)
					)),
    ) ) ->add_tab( 'Подвал', array(
			Field::make( 'text', 'wc_footer_copyright', 'Копирайт' )
				->set_default_value('Копирайт')->set_width(50),
			Field::make( 'text', 'wc_footer_phone', 'Телефон' )
				->set_default_value('111-11-11')->set_width(50),
			Field::make( 'radio', 'wc_footer_newsletter_show', 'Включить блок подписки(newslleter)' )
				->set_options(array(
					'on'=>'Включить',
					'off'=>'Выключить',
				))->set_width(30),
			Field::make( 'radio', 'wc_footer_widget_show', 'Включить блок виджетов' )
				->set_options(array(
					'on'=>'Включить',
					'off'=>'Выключить',
				))->set_width(30),
		) );
