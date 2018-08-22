<?php
/**
 * Created by Viktor Kim.
 * Date: 8/21/2018
 * Time: 22:00
 */

/**
 * Class Checker
 * Proxy list http://spys.one/proxys/RU/
 */

class Checker {

	private $site_url;
	private $user_email;
	private $proxy_list = array(
		'Uzgorod' => '46.8.28.17:8080',
		'Chernigiv' => '46.149.80.207:41258',
//		'Odessa' => '178.212.195.208:21231',
//		'Kyiv' => '109.86.74.139:21231',
	);
	private $curl;

	/**
	 * Checker constructor.
	 */
	public function __construct($site_url, $user_email) {
		$this->site_url = $site_url;
		$this->user_email = $user_email;
	}

	/**
	 *
	 */
	public function ping() {
		$this->curl = curl_init();
		curl_setopt($this->curl, CURLOPT_URL, $this->site_url);
		curl_setopt($this->curl, CURLOPT_CONNECT_ONLY, true);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT ,30); // connect timeout
		curl_setopt($this->curl, CURLOPT_TIMEOUT, 30); // curl timeout
		foreach ( $this->proxy_list as $location => $proxy_server) {
			curl_setopt($this->curl, CURLOPT_PROXY, $proxy_server);
			$curl_response = curl_exec($this->curl);
			if ($curl_response === false){

				$subject = $this->site_url . ' - error';
				$message = curl_error($this->curl);
				$message .= '\n Your site is unavailable for ' . $location;

				mail($this->user_email, $subject, $message);
			} else {
				var_dump($curl_response);
			}
		}

		curl_close($this->curl);
	}

}
