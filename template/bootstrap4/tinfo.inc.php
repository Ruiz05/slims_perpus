<?php
// Main Setup
$sysconf['template']['base'] 					= 'php';
$sysconf['template']['responsive']  			= true;

// Please use at your own risk.
// Animation need big memories. Please adjust with your computer capability
// ========================================================================

// Run gradient animation - you may need a big memory to run it well.
$sysconf['template']['run_gradient_animation']  = false; // true or false
$sysconf['template']['run_animation']  = false; // true or false

// Choose gradient color
// Available color:  red, blue(default) , green, beach, mint, purple, pink
$sysconf['template']['default_gradient']		= 'blue';

// Show video or image for the background.
$sysconf['template']['background_mode']  		= 'none'; // video, image or none



// option
$sysconf['template']['option'][$sysconf['template']['theme']] = array(
  'option_1' => array(
		'dbfield' => 'run_gradient_animation',
		'label' => 'Run gradient animation',
		'type' => 'dropdown',
		'default' => 0, // 0 to false; 1 to true
		'data' => array(
			array(0, 'Disable'),
			array(1, 'Enable')
			)
  ),
  'option_2' => array(
		'dbfield' => 'run_animation',
		'label' => 'Run animation',
		'type' => 'dropdown',
		'default' => 0, // 0 to false; 1 to true
		'data' => array(
			array(0, 'Disable'),
			array(1, 'Enable')
			)
  ),
  // modified by Hasan Syaiful Rizal hsr@yudharta.ac.id
  'option_3' => array(
		'dbfield' => 'default_gradient',
		'label' => 'Gradient color',
		'type' => 'dropdown',
		'default' => 'blue',
		'data' => array(
			array('blue', 'Blue'),
			array('blue-angular', 'Blue Angular'),
			array('red', 'Red'),
			array('red-angular', 'Red Angular'),
			array('oranye', 'Orange'),
			array('oranye-angular', 'Orange Angular'),
			array('pink', 'Pink'),
			array('pink-angular', 'Pink Angular'),
			array('green', 'Green'),
			array('green-angular', 'Green Angular'),
			array('beach', 'Beach'),
			array('beach-angular', 'Beach Angular'),
			array('mint', 'Mint'),
			array('mint-angular', 'Mint Angular'),
			array('purple', 'Purple'),
			array('purple-angular', 'Purple Angular'),
			array('gray-light', 'Light Gray'),
			array('gray-light-angular', 'Light Gray Angular'),
			array('gray-dark', 'Dark Gray'),
			array('gray-dark-angular', 'Dark Gray Angular')
			)
  ),
  'option_4' => array(
		'dbfield' => 'background_mode',
		'label' => 'Background mode',
		'type' => 'dropdown',
		'default' => 'none',
		'data' => array(
			array('none', 'none'),
			array('image', 'Image'),
			array('video', 'Video')
  ))
);
