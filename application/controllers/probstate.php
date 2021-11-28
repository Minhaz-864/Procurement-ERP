<?php
defined('BASEPATH') or exit('No direct script access allowed');
class probstate extends CI_Controller
{
    //Validating login
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('uid') && $this->session->userdata('approved'))
            redirect('login');
    }

    //Function for adding expenses
    public function add()
    {
        //form validation
        $this->form_validation->set_rules('uname', 'uname');
        $this->form_validation->set_rules('room', 'room', 'required|numeric');
        $this->form_validation->set_rules('pc_num', 'pc_num', 'required|numeric');
        $this->form_validation->set_rules('statement', 'statement', 'required');
        $this->form_validation->set_rules('probdate', 'probdate', 'required');

        if ($this->form_validation->run()) {
            $name = $this->session->userdata('fname');
            $room = $this->input->post('room');
            $pc_num = $this->input->post('pc_num');
            $statement = $this->input->post('statement');
            $prodate = $this->input->post('probdate');
            $uid = $this->session->userdata('uid');

            $this->load->model('probstate_model');
            $this->probstate_model->add($uid, $name, $room, $pc_num, $statement, $prodate);
        } else {
            $this->load->view('add-probstate');
        }
    }
    // Manage Expenses
    public function manage()
    {
        // $state = ($this->input->post('state'))?1:0;
        // $this->load->model('probstate_model');
        // $this->probstate_model->update($state);
        
        

        if ($this->input->post('pending')) {
            $value = 0;
            $this->load->model('probstate_model');
            $problemdetails = $this->probstate_model->manage($value);
            $this->load->view('manage-problem', ['problemdetails' => $problemdetails]);
        }
        elseif ($this->input->post('solved')) {
            // execute code to forget the password
            $value = 1;
            $this->load->model('probstate_model');
            $problemdetails = $this->probstate_model->manage($value);
            $this->load->view('manage-problem', ['problemdetails' => $problemdetails]);
        }
        else{
            $value = 0;
            $this->load->model('probstate_model');
            $problemdetails = $this->probstate_model->manage($value);
            $this->load->view('manage-problem', ['problemdetails' => $problemdetails]);
        }
}
    //Delete Expenses
    public function update()
    {
        $id = $this->input->post('ID');
        $this->load->model('probstate_model');
        $this->probstate_model->updatestate($id);
        $this->session->set_flashdata('success', 'Successfully Updated');
        redirect('probstate/manage');
    }
}
