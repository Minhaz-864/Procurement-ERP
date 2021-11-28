<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class requisition extends CI_Controller {
//Validating login
function __construct(){
parent::__construct();
if(!$this->session->userdata('uid'))
redirect('login');
}

//Function for adding expenses
public function add(){
//form validation
$this->form_validation->set_rules('uname','User Name');
$this->form_validation->set_rules('itemName','Item Name', 'required');
$this->form_validation->set_rules('itemDes','Item Description', 'required');
$this->form_validation->set_rules('quan','Quantity', 'required|numeric');
$this->form_validation->set_rules('estimate','Estimated Price', 'required|numeric');
$this->form_validation->set_rules('requdate','Date of Requisition','required');
$this->form_validation->set_rules('po_num','PO Number', 'numeric');
$this->form_validation->set_rules('status','Requisition Status');
$this->form_validation->set_rules('s_person','Assigned Supplier');
if($this->form_validation->run())
{
// $fname = $this->session->userdata('fname');
$iname =$this->input->post('itemName');
$desitem = $this->input->post('itemDes');
$quan = $this->input->post('quan');
$estimation =$this->input->post('estimate');    
$edate=$this->input->post('requdate');
$po_num=$this->input->post('po_num');
$reqStat=$this->input->post('status');
$uid=$this->session->userdata('uid');	

$this->load->model('requisition_model');
$this->requisition_model->add($uid,$iname,$desitem,$quan,$estimation,$edate,$po_num,$reqStat);
} else{
$this->load->view('add-requisition');
}
}
// Manage Expenses
public function manage(){
$uid=$this->session->userdata('uid');
$this->load->model('requisition_model');
$reqdetails=$this->requisition_model->manage($uid);	
$this->load->view('requisition-control',['requdetails'=>$reqdetails]);
}
//Delete Expenses
public function delete($uid){
$this->load->model('requisition_model');
$this->Expenses_Model->delete($uid);
$this->session->set_flashdata('success','Requisition Record deleted');
redirect('requisition/manage');

}

}