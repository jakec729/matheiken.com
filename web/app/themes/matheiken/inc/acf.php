<?php
function my_acf_add_local_field_groups() {
	acf_add_local_field_group(array (
		'key' => 'group_5742105ba8294',
		'title' => 'Cover Photo',
		'fields' => array (
			array (
				'key' => 'field_5742106147981',
				'label' => 'Cover Photo Position',
				'name' => 'cover_photo_position',
				'type' => 'radio',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'top-left' => 'top-left',
					'top-right' => 'top-right',
					'bottom-left' => 'bottom-left',
					'bottom-right' => 'bottom-right',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'top-left',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	acf_add_local_field_group(array (
		'key' => 'group_57425470602e1',
		'title' => 'Hero Image',
		'fields' => array (
			array (
				'key' => 'field_57425496cef9d',
				'label' => 'Hero Images',
				'name' => 'hero_images',
				'type' => 'gallery',
				'instructions' => 'This is the hero image for your page or post. Upload multiple images to make it a slideshow.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'min' => '',
				'max' => '',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array (
				'key' => 'field_5757439acf4a8',
				'label' => 'Video/Embed',
				'name' => 'embed',
				'type' => 'oembed',
				'instructions' => 'Paste the link for your video or embed',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'width' => '',
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	acf_add_local_field_group(array (
		'key' => 'group_5734c4448cb63',
		'title' => 'Project Fields',
		'fields' => array (
			array (
				'key' => 'field_57420f8d7c48a',
				'label' => 'Project Short Description',
				'name' => 'project_short_description',
				'type' => 'text',
				'instructions' => 'This field appears in bold above your project\'s text content.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_57537a7997ed4',
				'label' => 'Project Images',
				'name' => 'project_images',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => '',
				'max' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'sub_fields' => array (
					array (
						'key' => 'field_57537a8c59f57',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 80,
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array (
						'key' => 'field_57537a9f59f58',
						'label' => 'Alignment',
						'name' => 'alignment',
						'type' => 'radio',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array (
							'none' => 'none',
							'float-left' => 'float-left',
							'float-right' => 'float-right',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => 'none',
						'layout' => 'vertical',
					),
				),
			),
			array (
				'key' => 'field_574305304270b',
				'label' => 'Related Projects',
				'name' => 'related_projects',
				'type' => 'relationship',
				'instructions' => 'Select posts to appear in the related projects footer.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
				),
				'filters' => array (
					0 => 'post_type',
				),
				'elements' => '',
				'min' => '',
				'max' => '',
				'return_format' => 'object',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
}
add_action('acf/init', 'my_acf_add_local_field_groups');