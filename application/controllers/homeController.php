<?php

	class HomeController extends CI_controller {
	
		public function index() {
			if($this->session->userdata('is_logged_in') == 1 || $this->session->userdata('is_guest') == 1) {
				$this->load->view('Home');
			} else {
				redirect('LoginController/index');
			}
		}

		public function logout() {
			$this->session->sess_destroy();
			redirect('LoginController/index');
		}

		// public function post() {


		// }

		public function map() {
			$this->load->view('Map');
		}
	}
?>