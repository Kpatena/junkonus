<?php

	class PostController extends CI_controller {
		public function post() {
			$name = $this->input->post('name');
			$description = $this->input->post('description');

			$this->load->model('PostModel');

			$this->PostModel->postItem($name, $description);
			redirect('HomeController/index');
		}

		public funtion readAll(){
			$this->load->model('PostModel');
			$allPost = $this->PostModel->readAll();
		}
	}
?>