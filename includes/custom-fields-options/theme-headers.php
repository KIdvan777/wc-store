<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;


// Default options page
Container::make( 'theme_options',  'Настроить Хэдэры')
		->set_icon('dashicons-carrot')
        ->add_tab( 'Шапка_1', array(
            Field::make( 'radio', 'wc_header_one', 'Включить хэдэр 1' )
                ->set_options(array(
                    'on'=>'Включить',
                    'off'=>'Выключить',
                ))
		))
        ->add_tab( 'Шапка_2', array(
            Field::make( 'radio', 'wc_header_two', 'Включить хэдэр 2' )
                ->set_options(array(
                    'on'=>'Включить',
                    'off'=>'Выключить',
                ))
        ))
		->add_tab( 'Шапки', array(
			Field::make( 'select', 'wc_headers', 'Выберите шапку' )
					->add_options($item = array(
						'1' => 'вариант 1 ',
						'2' => 'вариант 2',
						'3' => 'вариант 3',
					)),
                    //  first header
					Field::make( 'image', 'wc_header_background_one', 'фон' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_headers',
							'value' => '1',
							'compare' => '=',
						)
					)),
					Field::make( 'text', 'wc_header_name_one', 'Название сайта' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_headers',
							'value' => '1',
							'compare' => '=',
						)
					)),
					Field::make( 'text', 'wc_header_desc_one', 'Описание сайта' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_headers',
							'value' => '1',
							'compare' => '=',
						)
					)),
                    // second header
					Field::make( 'image', 'wc_header_background_two', 'фон' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_headers',
							'value' => '2',
							'compare' => '=',
						)
					)),
					Field::make( 'text', 'wc_header_name_two', 'Название сайта' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_headers',
							'value' => '2',
							'compare' => '=',
						)
					)),
					Field::make( 'text', 'wc_header_desc_two', 'Описание сайта' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_headers',
							'value' => '2',
							'compare' => '=',
						)
					)),
                    //  third header
					Field::make( 'image', 'wc_header_backgrounds_three', 'фон' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_headers',
							'value' => '3',
							'compare' => '=',
						)
					)),
					Field::make( 'text', 'wc_header_name_three', 'Название сайта' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_headers',
							'value' => '3',
							'compare' => '=',
						)
					)),
					Field::make( 'text', 'wc_header_desc_three', 'Описание сайта' )
					->set_conditional_logic(array(
						'relation' => 'AND',
						array(
							'field' => 'wc_headers',
							'value' => '3',
							'compare' => '=',
						)
					))


				));
