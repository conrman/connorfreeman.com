<?php 
/* * *
 *	Custom Field Registrations
 */
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_carousel',
		'title' => 'Carousel',
		'fields' => array (
			array (
				'key' => 'field_55760079ec9ad',
				'label' => 'Carousel',
				'name' => 'carousel',
				'type' => 'true_false',
				'instructions' => 'Would you like to use a carousel at the top of this page?',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_55760158ec9ae',
				'label' => 'Carousel Format',
				'name' => 'carousel_format',
				'type' => 'select',
				'instructions' => 'Select the format you would like for the carousel',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55760079ec9ad',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'boxed' => 'Boxed',
					'fluid' => 'Fluid',
					'full' => 'Full Page',
				),
				'default_value' => 'fluid',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5577350db0c1d',
				'label' => 'Carousel Animation',
				'name' => 'carousel_animation',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55760079ec9ad',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'slide' => 'Slide',
					'fade' => 'Fade',
				),
				'default_value' => 'slide',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_55760216ec9af',
				'label' => 'Carousel Data',
				'name' => 'carousel_data',
				'type' => 'select',
				'instructions' => 'Select what kind of data you would like to appear in the Carousel',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55760079ec9ad',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'images' => 'Images',
					'posts' => 'Posts',
				),
				'default_value' => 'images',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5576024dec9b0',
				'label' => 'Carousel Images',
				'name' => 'carousel_images',
				'type' => 'gallery',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55760079ec9ad',
							'operator' => '==',
							'value' => '1',
						),
						array (
							'field' => 'field_55760216ec9af',
							'operator' => '==',
							'value' => 'images',
						),
					),
					'allorany' => 'all',
				),
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_55760289ec9b1',
				'label' => 'Carousel Posts',
				'name' => 'carousel_posts',
				'type' => 'relationship',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55760216ec9af',
							'operator' => '==',
							'value' => 'posts',
						),
					),
					'allorany' => 'all',
				),
				'return_format' => 'object',
				'post_type' => array (
					0 => 'all',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
					1 => 'post_type',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => 10,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>