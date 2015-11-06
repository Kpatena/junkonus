<?php

	class PostController extends CI_controller {
		public function post() {
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$category = $this->input->post('category');

			$this->load->model('PostModel');

			$this->PostModel->postItem($name, $description, $category);
			redirect('HomeController/index');
		}

		public function readAll(){
			$this->load->model('PostModel');
			$allPosts = $this->PostModel->readAll();

			// PROCESS ARRAY INTO CARDS... SOMEHOW
			//$this->load->view('Posts', $allPosts);
		}
	}
?>