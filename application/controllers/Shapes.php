<?php

class Shapes extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Shapes';
		$this->load->library('upload');
		$this->load->model('model_shapes');
		$this->load->model('model_notif');
	}

	public function index()
	{
		$this->render_template('shapes/index', $this->data);
	}

	public function fetchShapeData()
	{

		$result = array('data' => array());
		$data = $this->model_shapes->getShapeData();
		foreach ($data as $key => $value) {

			$lihat = '';
			if (!empty($value['dwg_file'])) {
				$lihat .= '<a href="' . './drawings/' . $value['dwg_file']  . '" target="_blank">' . $value['init']  . '</a>';
			} else {
				$lihat = $value['init'];
			}

			// button
			$buttons = '';
			$buttons .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Upload Drawing" onclick="drwUpload(' . $value['id'] . ')" data-toggle="modal" data-target="#uploadModal"><i class="fas fa-drafting-compass"></i></button>';
			$buttons .= '<button type="button" class="btn btn-outline-secondary btn-sm" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$buttons .= ' <button type="button" class="btn btn-outline-secondary btn-sm" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';

			$status = ($value['status'] == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>';

			$result['data'][$key] = array(
				$lihat,
				$value['name'],
				$value['appli'],
				$status,
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function create()
	{
		$response = array();
		$this->form_validation->set_rules('init', 'Initial', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('appli', 'Appli', 'trim');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'init' => $this->input->post('init'),
				'name' => $this->input->post('name'),
				'appli' => $this->input->post('appli'),
				'status' => $this->input->post('status'),
			);

			$create = $this->model_shapes->create($data);
			if ($create == true) {
				helper_log('2',  'Add new tooling type: ' . implode(', ', $data));
				$response['success'] = true;
				$response['messages'] = 'New Shape Succesfully created';
			} else {
				$response['success'] = false;
				$response['messages'] = 'Error in the database while creating the new shape';
			}
		} else {
			$response['success'] = false;
			foreach ($_POST as $key => $value) {
				$response['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($response);
	}

	public function fetchShapeDataById($id = null)
	{
		if ($id) {
			$data = $this->model_shapes->getShapeData($id);
			echo json_encode($data);
		}
	}

	public function update($id)
	{

		$response = array();
		if ($id) {
			$this->form_validation->set_rules('edit_init', 'Initial', 'trim|Required');
			$this->form_validation->set_rules('edit_name', 'Name', 'trim|Required');
			$this->form_validation->set_rules('edit_appli', 'Application', 'trim');
			$this->form_validation->set_rules('edit_status', 'Status', 'trim|Required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'init' => $this->input->post('edit_init'),
					'name' => $this->input->post('edit_name'),
					'appli' => $this->input->post('edit_appli'),
					'status' => $this->input->post('edit_status'),
				);

				$update = $this->model_shapes->update($id, $data);
				if ($update == true) {
					helper_log('3',  'Update tooling type : ' . implode(', ', $data));
					$response['success'] = true;
					$response['messages'] = 'Shape Succesfully updated';
				} else {
					$response['success'] = false;
					$response['messages'] = 'Error in the database while updating the selected shape';
				}
			} else {
				$response['success'] = false;
				foreach ($_POST as $key => $value) {
					$response['messages'][$key] = form_error($key);
				}
			}
		} else {
			$response['success'] = false;
			$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	public function remove()
	{

		$shape_id = $this->input->post('shape_id');
		$response = array();
		if ($shape_id) {
			$delete = $this->model_shapes->remove($shape_id);
			if ($delete == true) {
				helper_log('4',  'Remove Tooling Type id: ' . $shape_id);
				$response['success'] = true;
				$response['messages'] = "A Shape successfully removed";
			} else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the selected shape";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}
		echo json_encode($response);
	}

	public function labelDeleteById($id = null)
	{
		if ($id) {
			$data = $this->model_shapes->getDeldata($id);
			echo json_encode($data);
		}
	}

	public function do_upload()
	{

		$id = $this->input->post('label_id', TRUE);
		//The name of the directory that we need to create.
		$directoryName = './drawings/';

		//Check if the directory already exists.
		if (!is_dir($directoryName)) {
			//Directory does not exist, so lets create it.
			mkdir($directoryName, 0755);
		}
		$config['upload_path'] = $directoryName . '/';
		$config['allowed_types'] = 'pdf|jpeg|jpg|png|bmp';
		$config['max_size']     = 2048;
		$config['overwrite']     = TRUE;

		$this->upload->initialize($config);

		if (!empty($_FILES['filedoc'])) {

			if ($this->upload->do_upload('filedoc')) {
				$doc = $this->upload->data();
				$nama_file = $doc['file_name'];
				$data = array('dwg_file' => $nama_file);
				$this->model_shapes->buat_file($id, $data);
				helper_log('2',  'Upload drawing for : ' . $id);
				//$this->session->set_flashdata('msg', '<div class="alert alert-info">File Uploaded Successfuly.</div>');
				echo "<script>alert('Drawing file Uploaded Successfuly.');</script>";
				redirect('shapes', 'refresh');
			} else {
				$salah = $this->upload->display_errors();
				echo "<script>alert('$salah');</script>";
				redirect('shapes', 'refresh');
			}
		} else {
			echo "Image file is empty or the type is not allowed";
		}
	}
}
