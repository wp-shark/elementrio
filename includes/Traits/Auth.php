<?php

namespace Elementrio\Traits;

/**
 * Trait for making singleton instance
 * This is a factory singleton
 *
 * @package Elementrio\Traits
 */
trait Auth {
    public static function validate($request){
        error_log(print_r($request ,true));
        
        self::nonce_check($request);
        self::permission_check($request);
    }
    public static function nonce_check($request){
        if (!wp_verify_nonce($request->get_header('X-WP-Nonce'), 'wp_rest')) {
			return [
				'status'  => 'fail',
				'message' => ['Nonce mismatch.'],
			];
		}
    }
    public static function permission_check($request){
        if (!is_user_logged_in() || !current_user_can('manage_options')) {
			return [
				'status'  => 'fail',
				'message' => ['Access denied.'],
			];
		}
    }

}