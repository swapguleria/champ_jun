<?php
class ACM {

	public $Config = array(
			'server' => 'developement',
			//'token' => '146ce842 814733dd 7380054a c37acb5c 6f5f455d e2b8874f 3d583e31 f0eab4bc',
			//'message' => '',
			'badge' => '',
			'pass' => 'flamedevelopers@123',
			'sound' => '123.mp3',
			'filename' => 'acm_debug.pem',
	);
	//put your code here
	// constructor
	function __construct() {
			
	}

	/**
	 * Sending Push Notification
	 */

	public function send_notification($registatoin_ids, $message, $count = null, $model = null) {
		
		$Config = $this->Config;
		$deviceTokens = is_array ( $registatoin_ids ) ? $registatoin_ids : array (
				$registatoin_ids 
		);
	
		$deviceTokens = array_filter ( $deviceTokens );
		
		$msg = $message;
		
		// Construct the notification payload
		
		$body = array ();
	

		$body['aps'] = array('alert' => isset($message['content'])?$message['content']:'hi');
// updated
		
		$body ['aps'] ['data'] = array_filter ( $message );
		
		$body ['aps'] ['badge'] = ( int ) $count;
		
		$body ['aps'] ['sound'] = $Config ['sound'];
		
		$tBody = json_encode ( $body );
		
		// self::log ( "Body:" . $tBody );
		
		/* End of Configurable Items */
		$server = isset ( $Config ['server'] ) ? $Config ['server'] : 'developement';
		
		if ($server == 'production') {
			$appleServer = 'ssl://gateway.push.apple.com:2195';
			$certpem = dirname ( __FILE__ ) . '/acm_prod.pem';
			self::log ( "production set" );
		} else {
			
			$appleServer = 'ssl://gateway.sandbox.push.apple.com:2195';
			$certpem = dirname ( __FILE__ ) . '/acm_debug.pem';
					}
		foreach ( $deviceTokens as $deviceToken ) {
			
			if (in_array ( $deviceToken, array (
					'(null)',
					'null' 
			) ) || strlen ( $deviceToken ) < 32)
				continue;
			
			$ctx = stream_context_create ();
			stream_context_set_option ( $ctx, 'ssl', 'local_cert', $certpem );
			
			// assume the private key passphase was removed.
			stream_context_set_option ( $ctx, 'ssl', 'passphrase', $Config ['pass'] );
			
			$fp = @stream_socket_client ( $appleServer, $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx );
			
			
			if ($fp == null) {
				self::log ( "Failed to connect $err $errstr" );
				return "ERROR";
			} else {
				self::log ( 'Connection OK' );
			}
			
			
			$tToken = str_replace ( ' ', '', $deviceToken );
			
			try {
				$pack = @pack ( 'H*', $tToken ) . pack ( 'n', strlen ( $tBody ) );
				$msg = chr ( 0 ) . chr ( 0 ) . chr ( 32 ) . $pack . $tBody;
				Yii::log(CVarDumper::dumpAsString($msg),CLogger::LEVEL_WARNING,'notification');
				$result = @fwrite ( $fp, $msg, strlen ( $msg ) );
				if (! $result) {
					self::log ( 'Undelivered message count: ' . $result . '<br />' );
				} else {
					self::log ( 'Delivered message count: ' . $result . '<br />' );
				}
			} catch ( Exception $e ) {
				var_dump ( $e );
			}
			fclose ( $fp );
		}
		
		return "OK";
	}

	function log($msg)
	{
		//echo $msg;
	}
}
?>
