<?php

/************ MetaBoxes **********/

if ( file_exists(  __DIR__ .'/CMB2/init.php' ) ) { require_once  __DIR__ .'/CMB2/init.php';};


add_filter( 'cmb2_meta_boxes', 'pf_metaboxes' );

function pf_metaboxes( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_meta_';


  	$meta_boxes['home'] = array(
	    'id'         => 'homemeta',
	    'title'      => 'Home Page header elements',
	    'object_types'  => array( 'page'), // Post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'template-homepage.php' ),
	    'context'    => 'normal',
	    'priority'   => 'high',
	    'show_names' => true, // Show field names on the left
	    'fields'     => array(
				array (
			    'name' => 'Welcome text',
			    'id'   => 'welcometext',
			    'type' => 'textarea_small',
			  ),
			  array (
			    'name' => 'Button text',
			    'id'   => 'buttontext',
			    'type' => 'text_medium',
			  ),
			  array (
			    'name' => 'Button url',
			    'id'   => 'buttonurl',
			    'type' => 'text_url',
			  ),



	    )
	  );

  $meta_boxes['page'] = array(
    'id'         => 'pagemeta',
    'title'      => 'Add page content here',
    'object_types'  => array( 'page'), // Post type
    //'show_on'      => array( 'key' => 'page-template', 'value' => 'template-homepage.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
			array(
			  'id'          => 'sections',
			  'type'        => 'group',
			  'description'        => __( 'Repeatable Sections', 'cmb' ),
			  'options'     => array(
			    'group_title'   => __( 'Section {#}', 'cmb' ),
			    'add_button'    => __( 'New section', 'cmb' ),
			    'remove_button' => __( 'Remove section', 'cmb' ),
			    'sortable'      => true, // beta
			  ),
			  'fields' => array (
					array(
						'name'    => 'Fulwidth divider',
						'desc'    => 'Add an image to the top of section. (optional)',
						'id'      => 'divider',
						'type'    => 'file',
					),
			    array (
			      'name' => 'Title',
			      'id'   => 'title',
			      'type' => 'text',
			    ),
			    array (
			      'name' => 'Lead',
			      'id'   => 'lead',
			      'type' => 'wysiwyg',
            'options' => array(
              'media_buttons' => false, // show insert/upload button(s)
              'textarea_rows' =>  8, // rows="..."
              'teeny' => true, // output the minimal editor config used in Press This
            ),
			    ),
			    array (
			      'name' => 'Left column',
			      'id'   => 'contentleft',
			      'type' => 'wysiwyg',
            'options' => array(
              //'media_buttons' => false, // show insert/upload button(s)
              'textarea_rows' =>  12, // rows="..."
              'teeny' => true, // output the minimal editor config used in Press This
            ),
			    ),
			    array (
			      'name' => 'Right column',
			      'id'   => 'contentright',
			      'type' => 'wysiwyg',
            'options' => array(
              //'media_buttons' => false, // show insert/upload button(s)
              'textarea_rows' =>  12, // rows="..."
              'teeny' => true, // output the minimal editor config used in Press This
            ),
			    ),

			  ) 

			),

		)



  );






	  return $meta_boxes;
	}





add_action('admin_init','pf_remove_editor');
function pf_remove_editor() {
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
  $post_type = get_post_type($post_id);

	if( !isset( $post_id ) ) return;

  if( ($post_type == 'page') || ($post_type == 'apartment') ) {
  	add_post_type_support( 'page', 'excerpt' );
  	remove_post_type_support('page', 'editor');
  }
}



