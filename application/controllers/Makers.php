<?php

class Makers extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Tooling Maker';
		$this->load->model('model_makers');
		$this->load->model('model_notif');
	}

	public function index()
	{
		$this->render_template('makers/index', $this->data);
	}

	public function fetchMakerData()
	{

		$result = array('data' => array());
		$data = $this->model_makers->getMakerData();

		foreach ($data as $key => $value) {
			// button
			$buttons = '';
			$buttons .= '<button type="button" class="btn btn-outline-secondary btn-sm" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$buttons .= ' <button type="button" class="btn btn-outline-secondary btn-sm" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fas fa-trash"></i></button>';

			$status = ($value['status'] == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['maker_name'],
				$value['address'],
				$value['phone'],
				$value['country'],
				$status,
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function create()
	{

		$response = array();
		$this->form_validation->set_rules('name', 'Maker name', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'maker_name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'country' => $this->input->post('country'),
				'status' => $this->input->post('status'),
			);

			$create = $this->model_makers->create($data);
			if ($create == true) {
				helper_log('2',  'Add new supplier: ' . implode(', ', $data));
				$response['success'] = true;
				$response['messages'] = 'Succesfully created';
			} else {
				$response['success'] = false;
				$response['messages'] = 'Error in the database while creating the selected maker';
			}
		} else {
			$response['success'] = false;
			foreach ($_POST as $key => $value) {
				$response['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($response);
	}

	public function fetchMakerDataById($id = null)
	{
		if ($id) {
			$data = $this->model_makers->getMakerData($id);
			echo json_encode($data);
		}
	}

	public function update($id)
	{

		$response = array();
		if ($id) {
			$this->form_validation->set_rules('edit_name', 'Maker name', 'trim|required');
			$this->form_validation->set_rules('edit_status', 'Status', 'trim');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'maker_name' => $this->input->post('edit_name'),
					'address' => $this->input->post('edit_address'),
					'phone' => $this->input->post('edit_phone'),
					'country' => $this->input->post('edit_country'),
					'status' => $this->input->post('edit_status'),
				);

				$update = $this->model_makers->update($id, $data);
				if ($update == true) {
					helper_log('3',  'Update supplier : ' . implode(', ', $data));
					$response['success'] = true;
					$response['messages'] = 'Succesfully updated';
				} else {
					$response['success'] = false;
					$response['messages'] = 'Error in the database while updating the selected maker';
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

		$id = $this->input->post('maker_id');
		$response = array();
		if ($id) {
			$delete = $this->model_makers->remove($id);
			if ($delete == true) {
				helper_log('4',  'Remove supplier id: ' . $id);
				$response['success'] = true;
				$response['messages'] = "Maker successfully removed";
			} else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the selected maker";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}
}
