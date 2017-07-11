<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2/4/17
 * Time: 10:21 AM
 */

namespace Davis\baseurl;

/**
 * Class BaseUrl
 * @package Davis\baseurl
 */

class BaseUrl {

	public static function url() {
		$base_url = self::fullUrl($_SERVER);
		return $base_url;
	}

	protected static function urlOrigin($s, $use_forwarded_host=false) {
		$ssl = ( ! empty($s['HTTPS']) && $s['HTTPS'] == 'on' ) ? true:false;
		$sp = strtolower( $s['SERVER_PROTOCOL'] );
		$protocol = substr( $sp, 0, strpos( $sp, '/'  )) . ( ( $ssl ) ? 's' : '' );

		$port = $s['SERVER_PORT'];
		$port = ( ( ! $ssl && $port == '80' ) || ( $ssl && $port=='443' ) ) ? '' : ':' . $port;

		$host = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
		$host = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;

		return $protocol . '://' . $host;

	}

	protected static function fullUrl($s, $use_forwarded_host=false ) {
		return self::urlOrigin($s, $use_forwarded_host).'/';
	}




}