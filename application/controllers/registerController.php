<?php

	class RegisterController extends CI_controller {
	
		public function checkRegistration() {
			$this->form_validation->set_rules('regUser', 'Username', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('regPass', 'Password', 'trim|required|min_length[4]');
			$this->form_validation->set_rules('regCPass', 'Confirm Password', 'trim|required|matches[regPass]');

			if($this->form_validation->run()) {
				$name = $this->input->post('regUser');
				$pass = $this->input->post('regPass');
				$this->session->set_flashdata('success', 'Registration Successful');

				$this->load->model('LoginModel');
				$this->LoginModel->register($name, $pass);
				
				redirect('LoginController/index');

			} else {

				$this->load->view('Register');
			}

		}

	}
?>