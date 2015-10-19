<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Test extends CI_Controller {
 
    public function index()
    {           
		
            $data["name"] = "Md Ali Ahsan Rana";
            $data["designation"] = "Software Engineer"; 
			$document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
			$this->mongo_db->insert('stuff', $document);
            $this->load->view('test',$data);
    }
}
?>