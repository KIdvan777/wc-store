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
        ));
