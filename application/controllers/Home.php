<?php

class Home extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Firqan Aji Ramadhan//
        $this->not_logged_in();

        $this->data['page_title'] = 'Toolings Management';
        $this->load->model('model_users');
        $this->load->model('model_tooling');
        $this->load->model('model_shapes');
        $this->load->model('model_mgrades');
        $this->load->model('model_customers');
        $this->load->model('model_makers');
    }

    public function index()
    {
        $user_id = $this->session->userdata('id');

        $user_data = $this->model_users->getUserData($user_id);
        $this->data['user_data'] = $user_data;

        $proc_data = $this->model_tooling->getProcess();
        $this->data['proc_data'] = $proc_data;

        $shapeCS_data = $this->model_shapes->getActiveShapeCS();
        $this->data['shapeCS_data'] = $shapeCS_data;

        $shapeUB_data = $this->model_shapes->getActiveShapeUB();
        $this->data['shapeUB_data'] = $shapeUB_data;

        $mgrade_data = $this->model_mgrades->getActiveMgrade();
        $this->data['mgrade_data'] = $mgrade_data;

        $cust_data = $this->model_customers->getAllCustomers();
        $this->data['cust_data'] = $cust_data;

        $maker_data = $this->model_makers->getAllMakers();
        $this->data['maker_data'] = $maker_data;

        $this->data['graph_toolingThis'] = $this->model_tooling->chartThisYear();
        $this->data['graph_toolingLast'] = $this->model_tooling->chartLastYear();

        $this->data['statistic'] = $this->model_tooling->getPercent();

        $this->data['total_built'] = $this->model_tooling->countTotalBuilt();
        $this->data['total_share'] = $this->model_tooling->countTotalShare();
        $this->data['total_shape'] = $this->model_shapes->countTotalShapes();
        $this->data['total_revise'] = $this->model_tooling->countTotalRevise();

        $this->render_template('home', $this->data);
    }
}
