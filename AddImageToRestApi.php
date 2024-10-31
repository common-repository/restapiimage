<?php
	/*
		Plugin Name: RestApiImage
		Plugin URI: #
		Description: افزودن تصویر شاخص به rest api
		Version: 1.4
		Author: Vahid Garousi
		Author URI: http://aslemajara.ir
		
	*/
	
add_action('rest_api_init', 'register_rest_images' );

function register_rest_images(){
    register_rest_field( array('post'),
        'image_url',
        array(
            'get_callback'    => 'get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_rest_featured_image( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}

?>