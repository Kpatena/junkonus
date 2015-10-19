<?php

	class homeController extends CI_controller {
	
		public function index() {
			if($this->session->userdata('is_logged_in') == 1) {
				$this->load->view('home');
			} else {
				redirect('loginController/index');
			}
		}

		public function logout() {
			$this->session->sess_destroy();
			redirect('loginController/index');
		}
	}
?>