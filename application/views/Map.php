<?php

	echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));
	// $user_ip = getenv('REMOTE_ADDR');
 //    //http://www.geoplugin.net/php.gp?ip=$user_ip
 //    $geo= unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']) );
 //    //$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=." $user_ip));
 //    print_r($geo);
    // $country = $geo['geoplugin_countryName'];
    // $city = $geo["geoplugin_city"];
    // $region = $geo["geoplugin_region"];
    // echo "City: " . $city . "<br>";
    // echo "Region: " . $region . "<br>";
    // echo "Country: " . $Country . "<br>";
?>