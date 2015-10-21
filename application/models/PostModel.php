<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PostModel extends CI_Model{
	public function postItem($name, $description){
		$postDetails = array("name" => $name, "description" => $description);

        $this->mongo_db->insert('posts', $postDetails);
	} 

	public function readAll(){
		$allPosts = $this->mongo_db->get('posts');

        return $allPosts;
	}
}
?>