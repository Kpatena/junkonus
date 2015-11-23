<?php

	class PostController extends CI_controller {

		public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('Home', array('error' => ' ' ));
        }

		public function do_upload() {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			$config['max_width']  = '1024';
			$config['max_height']  = '1024';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('Home', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('upload_success', $data);
			}
			

			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$category = $this->input->post('category');

			$this->load->model('PostModel');

			$this->PostModel->postItem($name, $description, $category);
		}

		public function readAll(){
			$this->load->model('PostModel');
			$allPosts = $this->PostModel->readAll();

			// PROCESS ARRAY INTO CARDS... SOMEHOW
			//$this->load->view('Posts', $allPosts);
		}
	}
?>