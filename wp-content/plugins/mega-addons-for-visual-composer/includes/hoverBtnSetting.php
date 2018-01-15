<?php 
$btnStyle = array(
		'Animated Button' =>  'animated',
		'3D button' =>  '3D',
	);
$animationStyle = array(
		'2D Transition' =>  'transition',
		'Background Transition' =>  'bg_transition',
		'Shadow and Glow' =>  'shadow',
		'Border Transition' =>  'brdr_transition',
		'Speech Bubbles' =>  'speech_bubbles',
	);
$speechBubbles = array(
		'Bubble Top' =>  'hvr-bubble-top',
		'Bubble Right' =>  'hvr-bubble-right',
		'Bubble Bottom' =>  'hvr-bubble-bottom',
		'Bubble Left' =>  'hvr-bubble-left',
		'Bubble Float Top' =>  'hvr-bubble-float-top',
		'Bubble Float Right' =>  'hvr-bubble-float-right',
		'Bubble Float Bottom' =>  'hvr-bubble-float-bottom',
		'Bubble Float Left' =>  'hvr-bubble-float-left',
	);
$brdrTransition = array(
		'Underline From Left' => 'hvr-underline-from-left',
		'Underline From Center' => 'hvr-underline-from-center',
		'Underline From Right' => 'hvr-underline-from-right',
		'Underline Reveal' => 'hvr-underline-reveal',
		'Overline Reveal' => 'hvr-overline-reveal',
		'Overline From Left' => 'hvr-overline-from-left',
		'Overline From Center' => 'hvr-overline-from-center',
		'Overline From Right' => 'hvr-overline-from-right',
		'Reveal' => 'hvr-reveal',
	);
$shadowTransition = array(
		'Shadow'		=>	'hvr-shadow',
		'Grow Shadow'	=>		'hvr-grow-shadow',
		'Float Shadow'	=>		'hvr-float-shadow',
		'Glow'			=>		'hvr-glow',
		'Shadow Radial'	=>		'hvr-shadow-radial',
		'Box Shadow Outset'	=>		'hvr-box-shadow-outset',
		'Box Shadow Inset'	=>		'hvr-box-shadow-inset',
		'Sweep to Left'	=>		'hvr-sweep-to-left',
	);
$bgTransition = array(
		'Fade' => 'hvr-fade',
		'Back Pulse' => 'hvr-back-pulse',
		'Sweep To Right' => 'hvr-sweep-to-right',
		'Sweep To Left' => 'hvr-sweep-to-left',
		'Sweep To Bottom' => 'hvr-sweep-to-bottom',
		'Sweep To Top' => 'hvr-sweep-to-top',
		'Bounce To Right' => 'hvr-bounce-to-right',
		'Bounce To Left' => 'hvr-bounce-to-left',
		'Bounce To Bottom' => 'hvr-bounce-to-bottom',
		'Bounce To Top' => 'hvr-bounce-to-top',
		'Radial Out' => 'hvr-radial-out',
		// 'Radial In' => 'hvr-radial-in',
		// 'Rectangle In' => 'hvr-rectangle-in',
		'Rectangle Out' => 'hvr-rectangle-out',
		// 'Shutter In Horizontal' => 'hvr-shutter-in-horizontal',
		'Shutter Out Horizontal' => 'hvr-shutter-out-horizontal',
		// 'Shutter In Vertical' => 'hvr-shutter-in-vertical',
		'Shutter Out Vertical' => 'hvr-shutter-out-vertical',
	);
$animationTransition = array(
	'Grow' 			=>  'hvr-grow',
	'Shrink' 			=>  'hvr-shrink',
	'Pulse'		=>	'hvr-pulse',
	'Pulse Grow'	=>	'hvr-pulse-grow',
	'Pulse Shrink'	=>	'hvr-pulse-shrink',
	'Push'			=>	'hvr-push',
	'Pop'			=>	'hvr-pop',
	'Bounce In'		=>	'hvr-bounce-in',
	'Bounce Out'	=>	'hvr-bounce-out',
	'Rotate'		=>	'hvr-rotate',
	'Grow Rotate'	=>	'hvr-grow-rotate',
	'Float'			=>	'hvr-float',
	'Sink'			=>	'hvr-sink',
	'Bob'			=>	'hvr-bob',
	'Hang'			=>	'hvr-hang',
	'Skew'			=>	'hvr-skew',
	'Skew Forward'	=>	'hvr-skew-forward',
	'Skew Backward'	=>	'hvr-skew-backward',
	'Wobble Horizontal'	=>	'hvr-wobble-horizontal',
	'Wobble Vertical'	=>	'hvr-wobble-vertical',
	'Wobble To Bottom Right'	=>	'hvr-wobble-to-bottom-right',
	'Wobble To Top Right'	=>	'hvr-wobble-to-top-right',
	'Wobble Top'	=>	'hvr-wobble-top',
	'Wobble Bottom'	=>	'hvr-wobble-bottom',
	'Wobble Skew'	=>	'hvr-wobble-skew',
	'Buzz'			=>	'hvr-buzz',
	'Buzz Out'		=>	'hvr-buzz-out',
	);

$hvrBtn_params = array(
				array(
					"type" 			=> "dropdown",
					"heading" 		=> __( 'Style', 'hbtn-vc' ),
					"param_name" 	=> "btn_style",
					"description" 	=> __( 'Choose button style', 'hbtn-vc' ),
					"group" 		=> 'General',
					"value" 		=> $btnStyle,
				),
				array(
					"type" 			=> "dropdown",
					"heading" 		=> __( 'Animation Style', 'hbtn-vc' ),
					"param_name" 	=> "anim_style",
					"description" 	=> __( 'Choose animation style on hover', 'hbtn-vc' ),
					"group" 		=> 'General',
					"dependency" => array('element' => "btn_style", 'value' => 'animated'),
					"value" 		=> $animationStyle,
				),
				array(
					"type" 			=> "dropdown",
					"heading" 		=> __( '2D Transition', 'hbtn-vc' ),
					"param_name" 	=> "anim_trans",
					"description" 	=> __( 'Choose animation style on hover', 'hbtn-vc' ),
					"group" 		=> 'General',
					"dependency" => array('element' => "anim_style", 'value' => 'transition'),
					"value" 		=> $animationTransition,
				),
				array(
					"type" 			=> "dropdown",
					"heading" 		=> __( 'Background Transition', 'hbtn-vc' ),
					"param_name" 	=> "bg_trans",
					"description" 	=> __( 'Choose animation style on hover', 'hbtn-vc' ),
					"group" 		=> 'General',
					"dependency" => array('element' => "anim_style", 'value' => 'bg_transition'),
					"value" 		=> $bgTransition,
				),
				array(
					"type" 			=> "dropdown",
					"heading" 		=> __( 'Border Transition', 'hbtn-vc' ),
					"param_name" 	=> "brdr_trans",
					"description" 	=> __( 'Choose animation style on hover', 'hbtn-vc' ),
					"group" 		=> 'General',
					"dependency" => array('element' => "anim_style", 'value' => 'brdr_transition'),
					"value" 		=> $brdrTransition,
				),
				array(
					"type" 			=> "dropdown",
					"heading" 		=> __( 'Speech Bubbles', 'hbtn-vc' ),
					"param_name" 	=> "bubble_trans",
					"description" 	=> __( 'Choose animation style on hover', 'hbtn-vc' ),
					"group" 		=> 'General',
					"dependency" => array('element' => "anim_style", 'value' => 'speech_bubbles'),
					"value" 		=> $speechBubbles,
				),
				array(
					"type" 			=> "dropdown",
					"heading" 		=> __( 'Shadow and Glow', 'hbtn-vc' ),
					"param_name" 	=> "shadow_trans",
					"description" 	=> __( 'Choose animation style on hover', 'hbtn-vc' ),
					"group" 		=> 'General',
					"dependency" => array('element' => "anim_style", 'value' => 'shadow'),
					"value" 		=> $shadowTransition,
				),
				array(
					"type" 			=> 	"dropdown",
					"heading" 		=> 	__( 'Button Align', 'hbtn-vc' ),
					"param_name" 	=> 	"align",
					"description" 	=> 	__( 'select text align', 'hbtn-vc' ),
					"group" 		=> 	'General',
						"value" 		=> array(
							"Left"		=> "left",
							"Center"		=> "center",
							"Right"		=> "right",
						)
				),
				array(
					"type" 			=> "textfield",
					"heading" 		=> __( 'Padding [Top Bottom]', 'hbtn-vc' ),
					"param_name" 	=> "padding_top",
					"description" 	=> __( 'It will increase height of button e.g 10px', 'hbtn-vc' ),
					"group" 		=> 'General',
				),
				array(
					"type" 			=> "textfield",
					"heading" 		=> __( 'Padding [Left Right]', 'hbtn-vc' ),
					"param_name" 	=> "padding_left",
					"description" 	=> __( 'It will increase width of button e.g 20px', 'hbtn-vc' ),
					"group" 		=> 'General',
				),
				array(
					"type" 			=> "textfield",
					"heading" 		=> __( 'Radius', 'hbtn-vc' ),
					"param_name" 	=> "btn_radius",
					"description" 	=> __( 'set button radius e.g 5px', 'hbtn-vc' ),
					"dependency" => array('element' => "btn_style", 'value' => 'animated'),
					"group" 		=> 'General',
				),
				array(
					"type" 			=> "iconpicker",
					"heading" 		=> __( 'Select icon', 'hbtn-vc' ),
					"param_name" 	=> "btn_icon",
					"description" 	=> __( 'it will be show within text', 'hbtn-vc' ),
					"group" 		=> 'Text',
				),
				array(
					"type" 			=> "textfield",
					"heading" 		=> __( 'Button text', 'hbtn-vc' ),
					"param_name" 	=> "btn_text",
					"description" 	=> __( 'Write button text', 'hbtn-vc' ),
					"group" 		=> 'Text',
				),
				array(
					"type" 			=> "textfield",
					"heading" 		=> __( 'Text font size', 'hbtn-vc' ),
					"param_name" 	=> "btn_size",
					"description" 	=> __( 'Set font size in pixel e.g 18px', 'hbtn-vc' ),
					"group" 		=> 'Text',
				),
				array(
					"type" 			=> "textfield",
					"heading" 		=> __( 'Button URL', 'hbtn-vc' ),
					"param_name" 	=> "btn_url",
					"description" 	=> __( 'Write button url as link', 'hbtn-vc' ),
					"group" 		=> 'Text',
				),
				array(
					"type" 			=> "textfield",
					"heading" 		=> __( 'Open in new windows', 'hbtn-vc' ),
					"param_name" 	=> "btn_next",
					"description" 	=> __( 'Write _blank for open link in new windows or leave blank for none', 'hbtn-vc' ),
					"group" 		=> 'Text',
				),

				/** border **/

				array(
					"type" 			=> "colorpicker",
					"heading" 		=> __( 'Border color', 'hbtn-vc' ),
					"param_name" 	=> "btn_border",
					"description" 	=> __( 'Set color of border e.g #269CE9', 'hbtn-vc' ),
					"dependency" => array('element' => "btn_style", 'value' => 'animated'),
					"group" 		=> 'Border',
				),
				array(
					"type" 			=> "textfield",
					"heading" 		=> __( 'Border width', 'hbtn-vc' ),
					"param_name" 	=> "border_width",
					"description" 	=> __( 'Set width of border in pixel e.g 1px', 'hbtn-vc' ),
					"dependency" => array('element' => "btn_style", 'value' => 'animated'),
					"group" 		=> 'Border',
				),


				/** color **/

				array(
					"type" 			=> "colorpicker",
					"heading" 		=> __( 'Text color', 'hbtn-vc' ),
					"param_name" 	=> "btn_clr",
					"description" 	=> __( 'Set color of text e.g #ffff', 'hbtn-vc' ),
					"group" 		=> 'Color',
				),

				array(
					"type" 			=> "colorpicker",
					"heading" 		=> __( 'Background color', 'hbtn-vc' ),
					"param_name" 	=> "btn_bg",
					"description" 	=> __( 'Set color of background e.g #269CE9', 'hbtn-vc' ),
					"group" 		=> 'Color',
				),

				array(
					"type" 			=> "colorpicker",
					"heading" 		=> __( 'Background Shadow color', 'hbtn-vc' ),
					"param_name" 	=> "btn_shadow",
					"description" 	=> __( 'keep it same and much dark from background color', 'hbtn-vc' ),
					"dependency" => array('element' => "btn_style", 'value' => '3D'),
					"group" 		=> 'Color',
				),

				array(
					"type" 			=> "colorpicker",
					"heading" 		=> __( 'Hover Text color', 'hbtn-vc' ),
					"param_name" 	=> "btn_hvrclr",
					"description" 	=> __( 'Set color of text on hover e.g #ffff', 'hbtn-vc' ),
					"dependency" => array('element' => "btn_style", 'value' => 'animated'),
					"group" 		=> 'Color',
				),

				array(
					"type" 			=> "colorpicker",
					"heading" 		=> __( 'Background color', 'hbtn-vc' ),
					"param_name" 	=> "btn_hvrbg",
					"description" 	=> __( 'Set color of background on hover e.g #269CE9', 'hbtn-vc' ),
					"dependency" => array('element' => "btn_style", 'value' => 'animated'),
					"group" 		=> 'Color',
				),
			);

?>