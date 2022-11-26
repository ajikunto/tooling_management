<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_auth');
		$this->load->model('model_head');
	}

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login()
	{

		$this->logged_in();

		$response = array();
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			// true case
			$username_exists = $this->model_auth->check_username($this->input->post('username'));

			if ($username_exists == TRUE) {
				$login = $this->model_auth->login($this->input->post('username'), $this->input->post('password'));
				$head_img = $this->model_head->showHeader();
				if ($login) {

					$logged_in_sess = array(
						'id' => $login['id'],
						'username' => $login['username'],
						'foto' => $login['foto'],
						'head_img' => $head_img['file'],
						'logged_in' => TRUE
					);
					$this->session->set_userdata($logged_in_sess);
					helper_log('0', 'User Log-in');
					//diarahkan ke view home
					redirect('home', 'refresh');
				} else {
					$this->data['errors'] = 'Incorrect password';
					$this->load->view('login', $this->data);
				}
			}else {
					$this->data['errors'] = 'Username does not exist, please contact your superior';
					$this->load->view('login', $this->data);
			}	
		} else {
			// false case
			$this->load->view('login');
		}
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{

		helper_log('1',  'User Log-off');
		$this->session->sess_destroy();
		/* redirect('auth/login', 'refresh'); */
		redirect('public_home', 'refresh');
	}
}
