<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class accReq extends CI_Controller {
//Validating login
function __construct(){
parent::__construct();
if(!$this->session->userdata('uid') && $this->session->userdata('approved'))
redirect('login');
}


// Manage information
public function manage(){
$this->load->model('accReq_model');
$userdetails=$this->accReq_model->manage();	
$this->load->view('manage-access',['userdetails'=>$userdetails]);
}
//Update information 
public function update(){
    $fname = $this->input->post('uname');
$this->form_validation->set_rules('infoUpdate','Role');
$this->form_validation->set_rules('approve','Approve');
$data = array(
    'Role' => $this->input->post('infoUpdate'),
    'Approval'=> $this->input->post('approve')
);
$this->load->model('accReq_model');
$this->accReq_model->update($data, $fname);
}
//Delete Expenses
public function delete($uid){
$this->load->model('Expenses_Model');
$this->Expenses_Model->delete($uid);
$this->session->set_flashdata('success','Expense Record deleted');
redirect('Expenses/manage');

}

}