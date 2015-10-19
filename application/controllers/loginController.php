<?php

	class loginController extends CI_controller {
	
		public function index() {
			$this->load->view('login');
		}

		public function register() {
			$this->load->view('register');
		}

		public function guest(){
			$data = array(
				"is_guest" => 1
			);

			$this->session->set_userdata($data);
			redirect('homeController/index');
		}
		
		public function checkLogin() {

			$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_verifyUser|min_length[4]');

			if($this->form_validation->run()) {

				$data = array(
					"email" => $this->input->post('username'),
					"is_logged_in" => 1
				);

				$this->session->set_userdata($data);
				redirect('homeController/index');
			} else {
				$this->load->view('login');
			}
		}

		public function verifyUser() {
			$name = $this->input->post('username');
			$pass = $this->input->post('password');

			$this->load->model('loginModel');

			if($this->loginModel->login($name, $pass)) {
				return true;
			} else {
				$this->form_validation->set_message('verifyUser', 'Incorrect Email or Password. Please try again.');
				return false;
			}
		}
	}
?>