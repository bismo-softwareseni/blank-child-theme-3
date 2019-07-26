<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {
	$options = array();

	//-- heading tab for basic setting
	$options[] = array(
		'name' => __( 'Basic Settings', 'ssblanktheme_child_3' ),
		'type' => 'heading'
	);

	//-- upload logo
	$options[] = array(
		'name' 	=> __( 'Logo', 'ssblanktheme_child_3' ),
		'desc' 	=> __( 'Please select a logo for your site', 'ssblanktheme_child_3' ),
		'id' 	=> 'ss_blank_logo',
		'type' 	=> 'upload'
	);

	//-- maintenance mode or normal mode
	$ss_maintenance_mode_options = array(
		'1' => __('Yes', 'ssblanktheme_child_3'),
		'0' => __('No', 'ssblanktheme_child_3')
	);

	$options[] = array(
		'name' => __('Enabling Maintenance Mode?', 'ssblanktheme_child_3'),
		'desc' => __('Please select yes if you want to enabling the maintenance mode', 'ssblanktheme_child_3'),
		'id' => 'ss_blank_maintenance_mode',
		'std' => '0',
		'type' => 'radio',
		'options' => $ss_maintenance_mode_options
	);

	return $options;
}
