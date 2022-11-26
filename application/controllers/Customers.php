<?php

class Customers extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Customer';
		$this->load->model('model_customers');
		$this->load->model('model_notif');
	}

	public function index()
	{
		$this->render_template('customers/index', $this->data);
	}

	public function fetchCustomerData()
	{

		$result = array('data' => array());
		$data = $this->model_customers->getCustomerData();

		foreach ($data as $key => $value) {
			// button
			$buttons = '';
			$buttons .= '<button type="button" class="btn btn-outline-secondary btn-sm" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$buttons .= ' <button type="button" class="btn btn-outline-secondary btn-sm" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fas fa-trash"></i></button>';

			$status = ($value['status'] == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['cust_name'],
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
		$this->form_validation->set_rules('name', 'Customer name', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'cust_name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'country' => $this->input->post('country'),
				'status' => $this->input->post('status'),
			);

			$create = $this->model_customers->create($data);
			if ($create == true) {
				helper_log('2',  'Add new customer: ' . implode(', ', $data));
				$response['success'] = true;
				$response['messages'] = 'Succesfully created';
			} else {
				$response['success'] = false;
				$response['messages'] = 'Error in the database while creating the selected customer';
			}
		} else {
			$response['success'] = false;
			foreach ($_POST as $key => $value) {
				$response['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($response);
	}

	public function fetchCustomerDataById($id = null)
	{
		if ($id) {
			$data = $this->model_customers->getCustomerData($id);
			echo json_encode($data);
		}
	}

	public function update($id)
	{

		$response = array();
		if ($id) {
			$this->form_validation->set_rules('edit_name', 'Customer name', 'trim|required');
			$this->form_validation->set_rules('edit_status', 'Status', 'trim');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'cust_name' => $this->input->post('edit_name'),
					'address' => $this->input->post('edit_address'),
					'phone' => $this->input->post('edit_phone'),
					'country' => $this->input->post('edit_country'),
					'status' => $this->input->post('edit_status'),
				);

				$update = $this->model_customers->update($id, $data);
				if ($update == true) {
					helper_log('3',  'Update customer : ' . implode(', ', $data));
					$response['success'] = true;
					$response['messages'] = 'Succesfully updated';
				} else {
					$response['success'] = false;
					$response['messages'] = 'Error in the database while updating the selected customer';
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

		$customer_id = $this->input->post('customer_id');
		$response = array();
		if ($customer_id) {
			$delete = $this->model_customers->remove($customer_id);
			if ($delete == true) {
				helper_log('4',  'Remove customer id: ' . $customer_id);
				$response['success'] = true;
				$response['messages'] = "Customer successfully removed";
			} else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the selected customer";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}
}
