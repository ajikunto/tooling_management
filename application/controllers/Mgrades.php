<?php

class Mgrades extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Materials';
		$this->load->model('model_mgrades');
		$this->load->model('model_notif');
	}

	public function index()
	{
		$this->render_template('mgrades/index', $this->data);
	}

	public function fetchMgradeData()
	{
		$result = array('data' => array());
		$data = $this->model_mgrades->getMgradeData();
		foreach ($data as $key => $value) {
			// button
			$tombol = '';
			$tombol .= '<button type="button" class="btn btn-outline-secondary btn-sm" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$tombol .= ' <button type="button" class="btn btn-outline-secondary btn-sm" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			$status = ($value['status'] == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['name'],
				$value['descript'],
				$value['standard'],
				$status,
				$tombol
			);
		}
		echo json_encode($result);
	}

	public function create()
	{
		$response = array();
		$this->form_validation->set_rules('name', 'grade name', 'trim|required');
		$this->form_validation->set_rules('desc', 'description', 'trim');
		$this->form_validation->set_rules('standard', 'standard', 'trim');
		$this->form_validation->set_rules('status', 'status', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'name' => $this->input->post('name'),
				'descript' => $this->input->post('desc'),
				'standard' => $this->input->post('standard'),
				'status' => $this->input->post('status'),
			);

			$create = $this->model_mgrades->create($data);
			if ($create == true) {
				helper_log('2',  'Add new material: ' . implode(', ', $data));
				$response['success'] = true;
				$response['messages'] = 'Succesfully created';
			} else {
				$response['success'] = false;
				$response['messages'] = 'Error in the database while creating the selected grade';
			}
		} else {
			$response['success'] = false;
			foreach ($_POST as $key => $value) {
				$response['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($response);
	}

	public function fetchMgradeDataById($id = null)
	{
		if ($id) {
			$data = $this->model_mgrades->getMgradeData($id);
			echo json_encode($data);
		}
	}

	public function update($id)
	{
		$response = array();
		if ($id) {
			$this->form_validation->set_rules('edit_name', 'Grade name', 'trim|required');
			$this->form_validation->set_rules('edit_desc', 'description', 'trim');
			$this->form_validation->set_rules('edit_standard', 'Standard', 'trim');
			$this->form_validation->set_rules('edit_status', 'Status', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'name' => $this->input->post('edit_name'),
					'descript' => $this->input->post('edit_desc'),
					'standard' => $this->input->post('edit_standard'),
					'status' => $this->input->post('edit_status'),
				);

				$update = $this->model_mgrades->update($id, $data);
				if ($update == true) {
					helper_log('3',  'Update material : ' . implode(', ', $data));
					$response['success'] = true;
					$response['messages'] = 'Grade Succesfully updated';
				} else {
					$response['success'] = false;
					$response['messages'] = 'Error in the database while updating the selected grade';
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

		$mgrade_id = $this->input->post('mgrade_id');
		$response = array();
		if ($mgrade_id) {
			$delete = $this->model_mgrades->remove($mgrade_id);
			if ($delete == true) {
				helper_log('4',  'Remove material id: ' . $mgrade_id);
				$response['success'] = true;
				$response['messages'] = "A  Material grade successfully removed";
			} else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the selected grade";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}
		echo json_encode($response);
	}
}
