<?php
/*
   Plugin Name: Disable Woocommerce Authentication
   Plugin URI: http://wordpress.org/extend/plugins/disable-woocommerce-authentication/
   Version: 0.1
   Author: Zachary Powell
   Description: removes all authentcation requirements from the woocommerce api
   Text Domain: disable-woocommerce-authentication
   License: GPLv3
  */

defined( 'ABSPATH' ) or exit;

function wc_authenticate_alter(){   
      return new WP_User( 1 );
}

add_filter( 'woocommerce_api_check_authentication', 'wc_authenticate_alter', 1 );

add_filter( 'woocommerce_rest_check_permissions', 'my_woocommerce_rest_check_permissions', 90, 4 );

function my_woocommerce_rest_check_permissions( $permission, $context, $object_id, $post_type  ){
  return true;
}
