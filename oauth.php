<?php
	echo $_GET["code"];
	$code = $_GET["code"];

	exec("curl -F grant_type=authorization_code \
			-F client_id=511d20aaebf083f243087bc461886b5d79bd862e029d400e9870fa7d1982c6b6 \
			-F client_secret=ee8726114499258fa121e7e0c78c643f887429b598c8ff9af5121e496ebfa2fa \
			-F code=$code \
			-F redirect_uri=https://ft-ping-pong.herokuapp.com/oauth.php \
			-X POST https://api.intra.42.fr/oauth/token",$arr);
	print_r($arr);
	$access_token = $arr[0]['access_token'];
	var_dump($access_token);
	echo "TEST";
	exec("curl -H 'Authorization: Bearer $access_token' 'https://api.intra.42.fr/v2/me'", $out);
	print_r($out);
?>
