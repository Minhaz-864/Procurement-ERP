<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

public function index(){
//Validation for login form

$this->form_validation->set_rules('email','Email id','required|valid_email');
$this->form_validation->set_rules('password','Password','required');
if($this->form_validation->run()){
    $email=$this->input->post('email');
	$password=$this->input->post('password');
    $encpass=md5($password);
	$this->load->model('Login_Model');
    $validate=$this->Login_Model->index($email,$encpass);

if($validate){
$this->session->set_userdata('uid',$validate->ID);	
$this->session->set_userdata('fname',$validate->FullName);
$this->session->set_userdata('role',$validate->Role);
$this->session->set_userdata('approved', $validate->Approval);
if($this->session->userdata('approved')){	
redirect('dashboard');
    }
    else{
        $this->session->set_flashdata('error','You were not approved as a valid user by the officials. Check Back later.');
        redirect('login');
    }
 }
else {
$this->session->set_flashdata('error','Invalid login details.Please try again.');
redirect('login');

}

} else{
$this->load->view('index');	
}
}


}