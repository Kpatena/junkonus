<?php

	class LoginController extends CI_controller {
	
		public function index() {
			$this->load->view('Login');
		}

		public function register() {
			$this->load->view('Register');
		}

		public function guest(){
			$data = array(
				"is_guest" => 1
			);

			$this->session->set_userdata($data);
			redirect('HomeController/index');
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
				redirect('HomeController/index');
			} else {
				$this->load->view('Login');
			}
		}

		public function verifyUser() {
			$name = $this->input->post('username');
			$pass = $this->input->post('password');

			$this->load->model('LoginModel');

			if($this->LoginModel->login($name, $pass)) {
				return true;
			} else {
				$this->form_validation->set_message('verifyUser', 'Incorrect Email or Password. Please try again.');
				return false;
			}
		}

	}
?>