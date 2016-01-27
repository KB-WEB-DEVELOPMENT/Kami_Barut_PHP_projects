<?php

	class Rest {

		function curl_get_call($url) {

			$headers = array('Accept:application/json','Content-Type:application/json');

			$handle = curl_init();

			curl_setopt($handle, CURLOPT_URL, $url);
			curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

			$response = curl_exec($handle);
			
			$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

			return $response; 

		}


		function curl_post_call($url, $data) {

			$headers = array('Accept:application/json','Content-Type:application/json');

			$handle = curl_init();

			curl_setopt($handle, CURLOPT_URL, $url);
			curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($handle, CURLOPT_POST, true);
			curl_setopt($handle, CURLOPT_POSTFIELDS, $data);

			$response = curl_exec($handle);
			
			$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

			return $response; 

		}

	}

?>
