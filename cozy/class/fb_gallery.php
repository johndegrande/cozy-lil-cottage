<?php

class gallery
{
	//Fetch the json data using curl
	function get_data($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	
	function get_uploads($profile, $token) {
		$profile_uploads = "https://graph.facebook.com/".$profile."/photos?type=uploaded&fields=images,source,created_time,name&access_token=".$token;
		$photos = json_decode($this->get_data($profile_uploads),true);
		
		if (empty($photos["data"])) {
			return;
		} else {
			return $photos["data"];
		}
	}
	
	function get_albums($channel, $token){
		$fb_albums = "https://graph.facebook.com/".$channel."/albums?access_token=".$token;
		$albums = json_decode($this->get_data($fb_albums),true);
		if (empty($albums["data"])) {
			return;
		} else {
			return $albums["data"];
		}
	}
	
	function get_album_info($album_ID, $token) {
		$fb_album_info = "https://graph.facebook.com/".$album_ID."/?access_token=".$token;
		$albums = json_decode($this->get_data($fb_album_info),true);
		if (empty($albums)) {
			return;
		} else {
			return $albums;
		}
	}

	function get_album_thumbnail($album_ID, $token){
		return "https://graph.facebook.com/".$album_ID."/picture?access_token=".$token;
		
	}
	
	function get_profile_image($profile, $token){
		return "https://graph.facebook.com/".$profile."/picture?width=320&height=320&access_token=".$token;
		
	}

	function get_album_photos($album_ID, $token){
		$album_photos = "https://graph.facebook.com/".$album_ID."/photos?limit=1000&fields=name,source,picture,id,height,width&access_token=".$token;
		$photos = json_decode($this->get_data($album_photos),true);
		
		if (empty($photos["data"])) {
			return;
		} else {
			return $photos["data"];
		}
		
	}

	function get_user_details($profile, $token){
		$details = "https://graph.facebook.com/".$profile."?access_token=".$token;
		$data = json_decode($this->get_data($details),true);
		
		if (!isset($data["id"])) {
			return;
		} else {
			return $data;
		}
	}

	function get_author($user){
		return $user['name'];
		
	}	
	
	function get_summary($user_details){
		return $user_details['about'];
	}
	
	function get_likes($user_details){
		return number_format($user_details['likes']);
	}	
	
	
}

?>