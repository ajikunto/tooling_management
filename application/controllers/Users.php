<?php

class Users extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Users';
		$this->load->library('upload');
		$this->load->model('model_users');
		$this->load->model('model_notif');
	}

	public function password_hash($pass = '')
	{
		if ($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	function do_upload()
	{
		//The name of the directory that we need to create.
		$directoryName = './user/';

		//Check if the directory already exists.
		if (!is_dir($directoryName)) {
			//Directory does not exist, so lets create it.
			mkdir($directoryName, 0755);
		}
		$config['upload_path'] = $directoryName . '/';
		$config['allowed_types'] = 'jpeg|gif|jpg|png';
		$config['max_size']     = 2048;
		//$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);

		if (!empty($_FILES['filedoc']['name'])) {
			if ($this->upload->do_upload('filedoc')) {
				$doc = $this->upload->data();
				$nama_file = $doc['file_name'];

				$user = $this->session->userdata('id');

				$this->model_users->create_file($nama_file, $user);
				$this->session->set_flashdata('msg', '<div class="alert alert-info">Foto Uploaded Successfuly. Foto will shown in next session</div>');
				redirect('users/profile');
			} else {
				echo $this->upload->display_errors();
			}
		} else {
			echo "image is empty or type of image not allowed";
		}
	}

	public function profile()
	{

		$header_data = $this->model_users->getHeader();
		$this->data['header_data'] = $header_data;

		$user_id = $this->session->userdata('id');
		$user_data = $this->model_users->getUserData($user_id);
		$this->data['user_data'] = $user_data;

		//$user_group = $this->model_users->getUserGroup($user_id);
		//$this->data['user_group'] = $user_group;

		if ($user_id) {
			$this->form_validation->set_rules('fname', 'First name', 'trim');
			$this->form_validation->set_rules('lname', 'Last name', 'trim');
			//$this->form_validation->set_rules('dept', 'Dept', 'trim');

			if ($this->form_validation->run() == TRUE) {
				// true case
				if (empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
					$data = array(
						'firstname' => $this->input->post('fname'),
						'lastname' => $this->input->post('lname'),
					);

					$update = $this->model_users->edit($data, $user_id);
					if ($update == true) {
						$this->session->set_flashdata('success', 'Successfully updated');
						redirect('users/profile/', 'refresh');
					} else {
						$this->session->set_flashdata('errors', 'Error occurred!!');
						redirect('users/profile/', 'refresh');
					}
				} else {
					$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if ($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
							'password' => $password,
							'firstname' => $this->input->post('fname'),
							'lastname' => $this->input->post('lname'),
						);

						$update = $this->model_users->edit($data, $user_id);
						if ($update == true) {
							$this->session->set_flashdata('success', 'Successfully updated');
							redirect('users/profile/', 'refresh');
						} else {
							$this->session->set_flashdata('errors', 'Error occurred!!');
							redirect('users/profile/', 'refresh');
						}
					} else {
						// false case
						$user_data = $this->model_users->getUserData($user_id);
						$this->data['user_data'] = $user_data;

						$this->render_template('users/profile', $this->data);
					}
				}
			} else {
				// false case
				$user_data = $this->model_users->getUserData($user_id);
				$this->data['user_data'] = $user_data;

				$this->render_template('users/profile', $this->data);
			}
		}
	}

	function upload_header()
	{
		//The name of the directory that we need to create.
		$directoryName = './user/img';

		//Check if the directory already exists.
		if (!is_dir($directoryName)) {
			//Directory does not exist, so lets create it.
			mkdir($directoryName, 0755);
		}
		$config['upload_path'] = $directoryName . '/';
		$config['allowed_types'] = 'jpeg|gif|jpg|png';
		$config['max_size']     = 1024;
		//$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);

		if (!empty($_FILES['filedoc']['name'])) {
			if ($this->upload->do_upload('filedoc')) {
				$doc = $this->upload->data();
				$nama_file = $doc['file_name'];

				$this->model_users->create_header($nama_file);
				$this->session->set_flashdata('msg-h', '<div class="alert alert-info">Foto Uploaded Successfuly. Foto will shown in next header</div>');
				redirect('users/profile');
			} else {
				echo $this->upload->display_errors();
			}
		} else {
			echo "image is empty or type of image not allowed";
		}
	}

	public function delete_header($id)
	{
		if ($id) {
			$delete = $this->model_users->remove_header($id);
			if ($delete == true) {
				$this->session->set_flashdata('msg-h', 'Successfully removed');
				redirect('users/profile', $this->data);
			} else {
				$this->session->set_flashdata('msg-h', 'Error occurred!!');
				redirect('users/profile', $this->data);
			}
		}
	}
}
