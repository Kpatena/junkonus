<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blogmodel extends CI_Model{
 
    /**
     * returns a list of articles
     * @return array  
     */
    function get_articles_list(){
        $list = Array();
         
        $list[0] = (object)NULL; 
        $list[0]->title = "first blog title";
        $list[0]->author = "author 1";
 
        $list[0] = (object)NULL;
        $list[1]->title = "second blog title";
        $list[1]->author = "author 2";
 
        return $list;
    }

    // public function post($title, $description, $category) {
    //     date_default_timezone_set("America/Vancouver");
    //     $time = date("l") . " " . date("y/m/d") . " " . date("h:ia");

    //     $user = $this->session->userdata('username');
    //     $postDetails = array("username" => $user, "title" => $title,
    //         "category" => $category, "time" => $time, "description" => $password);

    //     $this->mongo_db->insert('posts', $postDetails);
    // }
}

public function get_client_ip() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

// public function get_geo_location() {

//     $user_ip = getenv('REMOTE_ADDR');
//     //http://www.geoplugin.net/php.gp?ip=$user_ip
//     $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
//     $country = $geo["geoplugin_countryName"];
//     $city = $geo["geoplugin_city"];
//     $region = $geo["geoplugin_region"];
//     echo "City: " . $city . "<br>";
//     echo "Region: " . $region . "<br>";
//     echo "Country: " . $Country . "<br>";
// }

?>