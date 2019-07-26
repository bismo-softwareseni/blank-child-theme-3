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
		'name' => __( 'Basic Settings', 'ssblanktheme_child_2' ),
		'type' => 'heading'
	);

	//-- upload logo
	$options[] = array(
		'name' 	=> __( 'Logo', 'ssblanktheme_child_2' ),
		'desc' 	=> __( 'Please select a logo for your site', 'ssblanktheme_child_2' ),
		'id' 	=> 'ss_blank_logo',
		'type' 	=> 'upload'
	);

	//-- sidebars to show on frontpage
	$ss_sidebars_options = array();

	//-- check box values
	$ss_sidebars_options[ 0 ] = array(
		'ssbt-sidebar-left' 	=> __('Left Sidebar', 'ssblanktheme_child_2'),
		'ssbt-sidebar-right' 	=> __('Right Sidebar', 'ssblanktheme_child_2')
	);

	//-- default sidebars to show
	$ss_sidebars_options[ 1 ] = array(
		'ssbt-sidebar-left' 	=> '0',
		'ssbt-sidebar-right' 	=> '1'
	);

	$options[] = array(
		'name' 		=> __('Sidebars To Show On Frontpage', 'ssblanktheme_child_2'),
		'desc' 		=> __('Please choose which sidebar that you want to show on frontpage', 'ssblanktheme_child_2'),
		'id' 		=> 'ss_blank_sidebars_visibility',
		'std' 		=> $ss_sidebars_options[ 1 ],
		'type' 		=> 'multicheck',
		'options' 	=> $ss_sidebars_options[ 0 ]
	);
	//-- end sidebars to show on frontpage


	//-- limit posts to show on frontpage
	$options[] = array(
		'name' => __('Max amount of posts to show', 'ssblanktheme_child_2'),
		'desc' => __('Limit posts to show on the frontpage', 'ssblanktheme_child_2'),
		'id' => 'ss_blank_post_limit',
		'std' => '5',
		'type' => 'text'
	);

	return $options;
}
